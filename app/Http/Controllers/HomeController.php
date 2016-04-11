<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

/**
* @Middleware("web")
*/
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
     * Show the contact Page
     * @Get("/contact-me", as="contact")
     */
    public function getContact()
    {
        return view('contact');
    }

    /**
     * Send the contact email
     * @Post("/contact-me", as="doContact")
     */
    public function doContact()
    {
        return view('contact');
    }
}
