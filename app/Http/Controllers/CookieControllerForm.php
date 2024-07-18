<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieControllerForm extends Controller
{
    public function setCookie(Request $request){
        $response=new Response($request->input('cookie'));
        $response->cookie('name',$request->input('cookie'),1);
        return $response;
    }
    public function getCookie(Request $request){
        return $request->cookie('name');
    }
}
