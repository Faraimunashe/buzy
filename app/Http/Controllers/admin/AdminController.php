<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::join('role_user', 'role_user.user_id', '=', 'users.id')
            ->where('role_user.role_id', 1)
            ->select('users.id', 'users.name', 'users.email', 'users.created_at')
            ->get();

        return view('admin.admin', [
            'users' => $users
        ]);
    }


    public function add(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try{

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->addRole('admin');

            event(new Registered($user));

            return redirect()->back()->with('success', 'Successfully added an admin');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function delete(Request $request)
    {
        $request->validate([
            'user_d' => ['required', 'integer'],
        ]);

        try{
            $user = User::find($request->user_id);

            $user->delete();

            return redirect()->back()->with('success', 'Successfully deleted admin');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
