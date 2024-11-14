<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect(route("home"));
        }else{
            session()->flash('login_check', true);
            return redirect('/Login');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route("home"));
    }

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);


        Auth::attempt($request->only(['email','password']));
        // $request->only(['email','password'])->session()->regenerate();
        return redirect(route("home"));
    }
}
