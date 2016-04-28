<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Image;
use Carbon\Carbon;

/**
 * @Controller(prefix="admin/article")
 * @Middleware("web")
 * @Middleware("admin")
 */
class ArticleController extends Controller
{
    /**
    * Get new article page
    *
    * @Get("create", as="admin.article.new")
    */
    public function getNewArticle()
    {
        return view('admin.article.new', ['error' => null]);
    }

    /**
    * Do new article
    *
    * @Post("create", as="admin.article.create")
    */
    public function doNewArticle(Request $request)
    {
        $inputs = $request->only('title', 'description', 'subtitle', 'content', 's');

        if(Article::where('title', '=', $inputs['title'])->exists()){
            return view('admin.article.new', ['error' => 'Title already used']);
        }

        $article = Article::create($inputs);
        if($request->hasFile('image')){
            Image::make($request->file('image'))->save('articles/'.$article->title.'.'.$request->file('image')->getClientOriginalExtension());
            $article->image = 'articles/'.$article->title.'.'.$request->file('image')->getClientOriginalExtension();
        }
        $article->date = Carbon::now()->format('Y-m-d');

        $article->save();
        return redirect()->route('admin.article.all');
    }

    /**
    * Get all article page
    *
    * @Get("/", as="admin.article.all")
    */
    public function getAllArticle()
    {
        return view('admin.article.all', ['articles' => Article::orderBy('date', 'desc')->paginate(10)]);
    }

    /**
    * Get admin article page
    *
    * @Get("{id}", as="admin.article", where={"id": "[0-9]+"})
    */
    public function getArticle($id)
    {
        $article = Article::find($id);
        if ($article == null) {
            return response()->view('errors.articleNotFound', [], 404);
        }

        return view('admin.article.show', ['article' => $article]);
    }

    /**
    * Get admin edit article page
    *
    * @Get("{id}/edit", as="admin.article.edit", where={"id": "[0-9]+"})
    */
    public function getEditArticle($id)
    {
        $article = Article::find($id);
        if ($article == null) {
            return response()->view('errors.articleNotFound', [], 404);
        }

        return view('admin.article.edit', ['article' => $article, 'error' => null]);
    }

    /**
    * Edit article
    *
    * @Post("{id}", as="admin.article.doEdit", where={"id": "[0-9]+"})
    */
    public function doEditArticle(Request $request, $id)
    {
        $article = Article::find($id);
        if ($article == null) {
            return response()->view('errors.articleNotFound', [], 404);
        }

        $inputs = $request->only('title', 'description', 'subtitle', 'content', 'image');

        $article->title = $inputs['title'];
        $article->description = $inputs['description'];
        $article->subtitle = $inputs['subtitle'];
        $article->content = $inputs['content'];

        if($request->hasFile('image')){
            Image::make($request->file('image'))
            ->save('articles/'.$article->title.'.'.$request->file('image')->getClientOriginalExtension());
            $article->image = 'articles/'.$article->title.'.'.$request->file('image')->getClientOriginalExtension();
        }

        $article->update = Carbon::now()->format('Y-m-d');
        $article->save();

        return redirect()->route('admin.article', array('id' => $article->id));
    }

    /**
    * Delete a specific article
    *
    * @Delete("{id}", as="admin.article.delete", where={"id": "[0-9]+"})
    */
    public function deleteArticle($id)
    {
        $article = Article::find($id);
        if ($article == null) {
            return response()->view('errors.articleNotFound', [], 404);
        }

        $article->delete();

        return redirect()->route('admin.article.all');
    }
}
