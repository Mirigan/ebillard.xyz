<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Mail;

/**
 * @Controller(prefix="password")
 * @Middleware("web")
 * @Middleware("guest")
 */
class PasswordController extends Controller
{
    /**
    * Get reset password page.
    *
    * @Get("reset", as="password.reset")
    *
    * @return Response
    */
    public function getRessetPassword()
    {
        return view('auth.password.email', ['error' => null]);
    }

    /**
    * Send reset password email.
    *
    * @Post("reset", as="password.reset.send")
    *
    * @return Response
    */
    public function sendRessetPassword(Request $request)
    {
        if(!User::where('email', '=', $request['email'])->exists())
            return view('auth.password.email', ['error' => 'No user found']);
        $user = User::where('email', '=', $request['email'])->first();
        $user->remember_token = str_random(60);
        $user->save();
        Mail::send('emails.reset', ['user' => $user], function ($message) use ($user) {
                $message->from('contact@ebillard.xyz', 'Contact eBillard.xyz');
                $message->to('emilien.billard@gmail.com')->subject('Reset Password | ebillard.xyz');
            }
        );

        return view('auth.password.email', ['error' => 'Email send to '.$user->email]);
    }

    /**
    * Get reset password page.
    *
    * @Get("reset/{token}", as="password.reset.form")
    *
    * @return Response
    */
    public function getFromRessetPassword(Request $request, $token)
    {
        if(!User::where('email', '=', $inputs['email'])->exists()){
            return view('auth.password.email', ['error' => 'Email invalid']);
        } else {
            $user = User::where('email', '=', $inputs['email'])->first();
            if($user->remember_token !== $token)
                return view('auth.password.email', ['error' => 'Token invalid']);
            else{
                $user->remember_token = null;
                $user->save();
            }
        }

        return view('auth.password.reset', ['error' => null, 'user' => $user]);
    }

    /**
    * Do reset password.
    *
    * @Post("reset/user", as="password.reset.do")
    *
    * @return Response
    */
    public function doResetPassword(Request $request)
    {
        $user = User::find($request['user_id']);
        if($user == null)
            return view('auth.password.email', ['error' => 'User invalid']);

        if($request['password'] === $request['password_confirmation']){
            $user->password = bcrypt($request['password']);
            $user->save();

            Auth::attempt(['username' => $user->username, 'password' => $request['password']]);
        }

        return redirect()->route('index');
    }
}
