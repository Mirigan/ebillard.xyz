<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Image;
use File;
use Auth;

/**
 * @Controller(prefix="account")
 * @Middleware("web")
 * @Middleware("auth")
 */
class AccountController extends Controller
{
    /**
    * Get account page
    *
    * @Get("overview", as="account")
    */
    public function getOverview()
    {
        return view('account.overview', ['user' => Auth::user()]);
    }

    /**
    * Get profile edite page
    *
    * @Get("profile", as="account.edit")
    */
    public function getEdit()
    {
        return view('account.profile', ['user' => Auth::user(), 'error' => null]);
    }

    /**
    * Get profile edite page
    *
    * @Post("profile", as="account.doEdit")
    */
    public function doEdit(Request $request)
    {
        $inputs = $request->only('username', 'email', 'password', 'password_confirmation', 'avatar', 'deleteAvatar');
        $user = Auth::user();

        if(User::where('username', '=', $inputs['username'])->exists() && $user->username != $inputs['username'])
        {
            return view('account.profile', ['user' => $user, 'error' => 'Username already used']);
        } elseif (User::where('email', '=', $inputs['email'])->exists() && $user->email != $inputs['email'])
        {
            return view('account.profile', ['user' => $user, 'error' => 'Email already used']);
        }

        $user->username = $inputs['username'];
        $user->email = $inputs['email'];

        if($inputs['password'] != null){
            if($inputs['password'] === $inputs['password_confirmation'])
                $user->password = bcrypt($inputs['password']);
            else
                return view('account.profile', ['user' => $user, 'error' => 'Passwords don\'t match']);
        }

        if($inputs['deleteAvatar'] == "yes"){
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


        return redirect()->route('account');
    }
}
