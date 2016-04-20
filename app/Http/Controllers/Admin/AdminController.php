<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
}
