<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'digits:10', 'starts_with:07'],
            'address' => ['required', 'string'],
            'image' => ['required', 'file', 'mimes:jpg,png']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->addRole('user');

        event(new Registered($user));

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/profiles'), $imageName);

        $acc = new Account();
        $acc->user_id = $user->id;
        $acc->phone = $request->phone;
        $acc->address = $request->address;
        $acc->image = $imageName;
        $acc->save();

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
