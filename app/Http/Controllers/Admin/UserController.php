<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Image;
use Carbon\Carbon;

/**
 * @Controller(prefix="admin/user")
 * @Middleware("web")
 * @Middleware("admin")
 */
class UserController extends Controller
{
    /**
    * Get all users page
    *
    * @Get("/user/", as="admin.user.all")
    */
    public function getAllUser()
    {
        return view('admin.user.all', ['users' => User::paginate(10)]);
    }

    /**
    * Get admin user page
    *
    * @Get("/user/{id}", as="admin.user", where={"id": "[0-9]+"})
    */
    public function getUser($id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response()->view('errors.userNotFound', [], 404);
        }

        return view('admin.user.show', ['user' => $user]);
    }

    /**
    * Get edit user page
    *
    * @Get("/user/{id}/edit", as="admin.user.edit", where={"id": "[0-9]+"})
    */
    public function getEditUser($id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response()->view('errors.userNotFound', [], 404);
        }

        return view('admin.user.edit', ['user' => $user, 'error' => null]);
    }

    /**
    * Edit user
    *
    * @Post("/user/{id}", as="admin.user.doEdit", where={"id": "[0-9]+"})
    */
    public function doEditUser(Request $request, $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response()->view('errors.userNotFound', [], 404);
        }
        $inputs = $request->only('username', 'email', 'password', 'password_confirmation', 'avatar', 'deleteAvatar');

        if(User::where('username', '=', $inputs['username'])->exists() && $user->username != $inputs['username'])
        {
            return view('admin.user.edit', ['user' => $user, 'error' => 'Username already used']);
        } elseif (User::where('email', '=', $inputs['email'])->exists() && $user->email != $inputs['email'])
        {
            return view('admin.user.edit', ['user' => $user, 'error' => 'Email already used']);
        }
        $user->username = $inputs['username'];
        $user->email = $inputs['email'];
        if($inputs['password'] != null){
            if($inputs['password'] === $inputs['password_confirmation'])
                $user->password = bcrypt($inputs['password']);
            else
                return view('admin.user.edit', ['user' => $user, 'error' => 'Passwords don\'t match']);
        }
        if($inputs['deleteAvatar']){
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
        return redirect()->route('admin.user.all');
    }

    /**
    * Delete a specific user
    *
    * @Delete("/user/{id}", as="admin.user.delete", where={"id": "[0-9]+"})
    */
    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response()->view('errors.userNotFound', [], 404);
        }

        if (!$user->admin) {
            $user->delete();
        }

        return redirect()->route('admin.user.all');
    }
}
