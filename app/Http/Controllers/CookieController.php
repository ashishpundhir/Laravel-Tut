<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;   //NOTE that this line is important

class CookieController extends Controller
{
    public function setCookie(Request $request){
        $response=new Response("Cookie is set!");
        $response->cookie('name','Ashish',1);//1 minutes(optional parameter)
        //$response->withCookie(cookie('name', 'lpu', $minutes));
        return $response;
    }
    public function getCookie(Request $request){
        return $request->cookie('name');
    }
    public function deleteCookie(Request $request){
        $response=new Response("Cookie is deleted!");
        $response->cookie('name','');
        return $response;
    }
}
