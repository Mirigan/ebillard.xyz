<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Image;

/**
 * @Middleware("web")
 * @Middleware("guest", except={"logout"})
 */
class AuthController extends Controller
{

    /**
    * Get login page.
    *
    * @Get("login", as="login")
    *
    * @return Response
    */
    public function login()
    {
        return view('auth.login', ['error' => null]);
    }

    /**
     * Handle an authentication attempt.
     *
     * @Post("login", as="doLogin")
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $input = $request->only('username', 'password');
        if(Auth::attempt(['username' => $input['username'], 'password' => $input['password']])) {
            return redirect()->intended('/');
        } else {
            return view('auth.login', ['error' => 'Bad Credentials']);
        }
    }

    /**
    * Get sign up page
    *
    * @Get("sign-up", as="signup")
    */
    public function getSignup()
    {
        return view('auth.signup', ['error' => null]);
    }

    /**
    * Do sign up
    *
    * @Post("sign-up", as="doSignup")
    */
    public function doSignup(Request $request)
    {
        // $input = $request->only('username', 'email', 'password', 'password_confirmation', 'avatar');

        if($request['password_confirmation'] !== $request['password']){
            return view('auth.signup', ['error' => 'Passwords don\'t match']);
        } elseif(User::where('username', '=', $request['username'])->exists())
        {
            return view('auth.signup', ['error' => 'Username already used']);
        } elseif (User::where('email', '=', $request['email'])->exists())
        {
            return view('auth.signup', ['error' => 'Email already used']);
        }

        $tmp = bcrypt($request['password']);
        $user = User::create(['username' => $request['username'], 'email' => $request['email'], 'avatar' => $request['avatar'], 'password' => $tmp, 'avatar' => 'avatars/default.jpg']);
        if($request->hasFile('avatar')){
            Image::make($request->file('avatar'))->resize(75, 75,
                function ($constraint) {
                    $constraint->aspectRatio();
                })->save('avatars/'.$request['username'].'_avatar.'.$request->file('avatar')->getClientOriginalExtension());
            $user->avatar = 'avatars/'.$request['username'].'_avatar.'.$request->file('avatar')->getClientOriginalExtension();
        }

        $user->save();

        Auth::attempt(['username' => $user->username, 'password' => $request['password']]);
        return redirect()->intended('/');
    }

    /**
    * Log the user out.
    *
    * @Get("logout", as="logout")
    * @Middleware("auth")
    *
    * @return Response
    */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
