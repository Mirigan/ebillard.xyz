<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    /**
     * Show the Index Page
     * @Get("/", as="index")
     */
    public function getIndex()
    {
        return view('index');
    }

    /**
     * Show the Index Page
     * @Get("/second", as="second")
     */
    public function getSecond()
    {
        return view('second');
    }
}
