<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Mail;

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
    public function doContact(Request $request)
    {
        $inputs = $request->only('name', 'email', 'subject', 'content');
        Mail::send('emails.contact', [
                'name' => $inputs['name'],
                'email' => $inputs['email'],
                'subject' => $inputs['subject'],
                'content' => $inputs['content']
            ], function ($message) use ($inputs) {
                $message->subject($inputs['subject']);
                $message->from('contact@ebillard.xyz', 'Contact eBillard.xyz');
                $message->sender($inputs['email'], $inputs['name']);
                $message->to('bonjour@ebillard.xyz');
            }
        );
        return redirect()->route('contact');
    }
}
