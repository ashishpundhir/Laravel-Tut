<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function getSessionData(Request $request){
        return $request->session()->all();
    }
    public function storeSessionData(Request $request){
        $request->session()->put('name','lpu');
        echo "Data has been added to the session";
    }
    public function deleteSessionData(Request $request){

    }
}
