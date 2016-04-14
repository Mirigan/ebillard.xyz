<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\User;
use Image;
use Carbon\Carbon;

/**
 * @Controller(prefix="admin")
 * @Middleware("web")
 * @Middleware("admin")
 */
class AdminController extends Controller
{

    /**
    * Get admin index page
    *
    * @Get("/", as="admin.index")
    */
    public function getIndex()
    {
        return view('admin.index', [
            'articles' => Article::orderBy('date', 'desc')->take(5)->get(),
            'users' => User::orderBy('id', 'desc')->take(5)->get()
        ]);
    }

    /**
    * Get new article page
    *
    * @Get("/article/create", as="admin.article.new")
    */
    public function getNewArticle()
    {
        return view('admin.article.new', ['error' => null]);
    }

    /**
    * Do new article
    *
    * @Post("/article/create", as="admin.article.create")
    */
    public function doNewArticle(Request $request)
    {
        $inputs = $request->only('title', 'description', 'subtitle', 'content', 'image');

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
    * @Get("/article/", as="admin.article.all")
    */
    public function getAllArticle()
    {
        return view('admin.article.all', ['articles' => Article::orderBy('date', 'desc')->paginate(10)]);
    }

    /**
    * Get admin article page
    *
    * @Get("/article/{id}", as="admin.article", where={"id": "[0-9]+"})
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
    * @Get("/article/{id}/edit", as="admin.article.edit", where={"id": "[0-9]+"})
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
    * @Post("/article/{id}", as="admin.article.doEdit", where={"id": "[0-9]+"})
    */
    public function doEditArticle(Request $request, $id)
    {
        $article = Article::find($id);
        if ($article == null) {
            return response()->view('errors.articleNotFound', [], 404);
        }

        $inputs = $request->only('title', 'description', 'subtitle', 'content', 'image');
        if ($inputs['title'] != null)
            $article->title = $inputs['title'];
        if ($inputs['description'] != null)
            $article->description = $inputs['description'];
        if ($inputs['subtitle'] != null)
            $article->subtitle = $inputs['subtitle'];
        if($request->hasFile('image')){
            Image::make($request->file('image'))->save('articles/'.$article->title.'.'.$request->file('image')->getClientOriginalExtension());
            $article->image = 'articles/'.$article->title.'.'.$request->file('image')->getClientOriginalExtension();
        }

        $article->update = Carbon::now()->format('Y-m-d');
        $article->save();

        return redirect()->route('admin.article.all');
    }

    /**
    * Delete a specific article
    *
    * @Delete("/article/{id}", as="admin.article.delete", where={"id": "[0-9]+"})
    */
    public function deleteArticle($id)
    {
        $article = Aricle::find($id);
        if ($article == null) {
            return response()->view('errors.articleNotFound', [], 404);
        }

        return redirect()->route('admin.article.all');
    }

    /**
    * Get all users page
    *
    * @Get("/user/", as="admin.user.all")
    */
    public function getAllUser()
    {
        return view('admin.user.all', ['users' => User::paginate(10)]);
    }

    /**
    * Get admin user page
    *
    * @Get("/user/{id}", as="admin.user", where={"id": "[0-9]+"})
    */
    public function getUser($id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response()->view('errors.userNotFound', [], 404);
        }

        return view('admin.user.show', ['user' => $user]);
    }

    /**
    * Get edit user page
    *
    * @Get("/user/{id}/edit", as="admin.user.edit", where={"id": "[0-9]+"})
    */
    public function getEditUser($id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response()->view('errors.userNotFound', [], 404);
        }

        return view('admin.user.edit', ['user' => $user, 'error' => null]);
    }

    /**
    * Edit user
    *
    * @Post("/user/{id}", as="admin.user.doEdit", where={"id": "[0-9]+"})
    */
    public function doEditUser(Request $request, $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response()->view('errors.userNotFound', [], 404);
        }

        $inputs = $request->only('username', 'email', 'password', 'password_confirmation', 'avatar', 'deleteAvatar');

        if(User::where('username', '=', $inputs['username'])->exists() && $user->username != $inputs['username'])
        {
            return view('admin.user.edit', ['user' => $user, 'error' => 'Username already used']);
        } elseif (User::where('email', '=', $inputs['email'])->exists() && $user->email != $inputs['email'])
        {
            return view('admin.user.edit', ['user' => $user, 'error' => 'Email already used']);
        }

        $user->username = $inputs['username'];
        $user->email = $inputs['email'];

        if($inputs['password'] != null){
            if($inputs['password'] === $inputs['password_confirmation'])
                $user->password = bcrypt($inputs['password']);
            else
                return view('admin.user.edit', ['user' => $user, 'error' => 'Passwords don\'t match']);
        }

        if($inputs['deleteAvatar']){
            File::delete('public/'.$user->avatar);
            $user->avatar = 'avatars/default.jpg';
        }

        if($request->hasFile('avatar')){
            Image::make($request->file('avatar'))->resize(75, 75,
                function ($constraint) {
                    $constraint->aspectRatio();
                })->save('avatars/'.$request['username'].'_avatar.'.$request->file('avatar')->getClientOriginalExtension());
            $user->avatar = 'avatars/'.$request['username'].'_avatar.'.$request->file('avatar')->getClientOriginalExtension();
        }

        $user->save();

        return redirect()->route('admin.user.all');
    }

    /**
    * Delete a specific user
    *
    * @Delete("/user/{id}", as="admin.user.delete", where={"id": "[0-9]+"})
    */
    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response()->view('errors.userNotFound', [], 404);
        }

        if (!$user->admin) {
            $user->delete();
        }

        return redirect()->route('admin.user.all');
    }
}
