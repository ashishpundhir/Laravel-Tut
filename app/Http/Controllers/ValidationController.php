<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'name'=>'required|min:6|max:12',
            'email'=>'required|email|max:120',
            'password'=>'required|numeric'
        ],         //['','',''] is also acceptable syntax
        [
            'name.required'=>"You can't leave name empty!!!",
            'name.min'=>"Atleast 6 chars you must fill out!!!"
        ]);
        echo $request->input('name')."<br>".$request->email."<br>".$request->password."<br>";
    }
}
