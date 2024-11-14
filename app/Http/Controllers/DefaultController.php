<?php

namespace App\Http\Controllers;

class DefaultController extends Controller
{
    public function showLoginForm(){
        return view("login");
    }

    public function showRegisterForm(){
        return view("register");
    }

    function showTasksGet(){
        return view('tasks');
     }

    function addNewTaskGet(){
        return view('addNewTask');
    }
}