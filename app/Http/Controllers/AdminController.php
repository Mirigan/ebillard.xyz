<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * @Controller(prefix="admin")
 * @Middleware("web")
 */
class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
    * Get admin index page
    *
    * @Get("/", as="admin.index")
    */
    public function getIndex()
    {
        return view('admin.index');
    }
}
