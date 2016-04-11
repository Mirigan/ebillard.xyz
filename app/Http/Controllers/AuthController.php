<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

/**
 * @Middleware("web")
 */
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

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
        $input = $request->only('username', 'email', 'password', 'password_confirmation', 'avatar');

        if($input['password_confirmation'] !== $input['password']){
            return view('auth.signup', ['error' => 'Passwords don\'t match']);
        } elseif(User::where('username', '=', $input['username'])->exists())
        {
            return view('auth.signup', ['error' => 'Username already used']);
        } elseif (User::where('email', '=', $input['email'])->exists())
        {
            return view('auth.signup', ['error' => 'Email already used']);
        }

        $tmp = $input['password'];
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);
        $user->save();

        Auth::attempt(['username' => $input['username'], 'password' => $tmp]);
        return redirect()->intended('/');
    }

    /**
    * Log the user out.
    *
    * @Get("logout", as="logout")
    *
    * @return Response
    */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
