<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRegistration extends Controller
{
    public function postRegister(Request $request){
        // if($request->has(['username','email'])){//input //hasAny 
        //     //filled //missing //whenMissing //whenFilled //whenHas
        //     return "Fields are present in the form";
        // }else{
        //     return "Fields are absent in the form";
        // }
            // $request->whenMissing('username',function(){ //whenMissing is NOT working properly for me
            //     echo "Username is missing";
            // });
    }
    public function postAdd(Request $request){
        $val1=$request->input('num1');
        $val2=$request->input('num2');
        return ($val1+$val2);
    }
}
