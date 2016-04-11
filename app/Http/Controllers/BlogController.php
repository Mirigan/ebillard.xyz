<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('blog.index');
    }
}
