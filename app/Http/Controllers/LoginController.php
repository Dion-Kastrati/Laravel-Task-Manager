<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPost(Request $request)
    {
    $credetials = [
        'email' => $request->email,
        'password' => $request->password,
    ];
    if (Auth::attempt($credetials)) {
        $request->session()->regenerate();
        return redirect()->route('tasks');
    }
        return back()->with('error', 'Wrong credentials!');
    }
}
