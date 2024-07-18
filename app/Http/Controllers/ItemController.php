<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function displayItem(){
        $itemname='Shirt';
        return "The item name is ".$itemname;
    }
    public function displayItem1($itemname="Duster"){
        return "The item name is ".$itemname;
    }
    public function displayItem2($itemname="Marker"){
        return view('items',['itemname'=>$itemname]);
    }
    public function displayAllItems(){
        $items=['item1','item2','item3','item4','item5'];
        return view('allItems',compact('items'));
    }
    public function isSetFunction(){
        $items=['item1','item2','item3','item4','item5'];
        return view('isSetItems',compact('items'));
    }
    public function emptyFunction(){
        $items=[];
        return view('emptyItems',compact($items));
    }
    public function products(){
        //$products=['Product 1','Product 2','Product 3','Product 4','Product 5'];
        $products=["type"=>"Shirt","brand"=>"Gucci","price"=>1000];
        return view('products',compact('products'));
    }
}
