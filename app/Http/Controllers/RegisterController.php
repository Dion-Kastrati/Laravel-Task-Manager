<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerPost(Request $request){
        $user = new User();
        $incomingFields = $request->validate([
            'name' =>['required', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password'=>['required', 'min:8', 'max:20']
        ]);
        $incomingFields['password'] = Hash::make($incomingFields['password']);
        $user->save($incomingFields);
        // if ($user->save()){
        //     return redirect()->route('tasks');
        // }
        // else if (){
        //     return back()-with('error', "Wrong credentials!");
        // }
    }
}
