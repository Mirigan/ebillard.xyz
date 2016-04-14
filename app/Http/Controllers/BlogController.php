<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests;

/**
 * @Controller(prefix="blog")
 * @Middleware("web")
 */
class BlogController extends Controller
{
    /**
    * Get index page of the blog
    *
    * @Get("/", as="blog.index")
    */
    public function getIndex()
    {
        return view('blog.index', ['articles' => Article::orderBy('date', 'desc')->paginate(5)]);
    }

    /**
    * Get article's page
    *
    * @Get("/article/{id}", as="blog.article", where={"id": "[0-9]+"})
    */
    public function getArticle($id)
    {
        $article = Article::find($id);
        if ($article == null) {
            return response()->view('errors.articleNotFound', [], 404);
        }

        return view('blog.article', ['article' => $article]);
    }

}
