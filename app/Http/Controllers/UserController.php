<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

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

    public function registerPost(Request $request){
        $incomingFields = $request->validate([
            'name' =>['required', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password'=>['required', 'min:8', 'max:20']
        ]);
        // Security measure
        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['email'] = strip_tags($incomingFields['email']);
        $incomingFields['password'] = Hash::make($incomingFields['password']);
        
        if (User::create($incomingFields)){
            return redirect()->route('login');
        }
        else{
            return back()->with('error', 'Database error!');
        }
    }    
}
