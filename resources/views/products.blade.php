@extends('layouts')
@section('title')
    Products
@endsection
@section('content')

        @foreach($products as $product)
                Type:{{$product['type']}}<br>
                Brand:{{$product['brand']}}<br>
                Price:{{$product['price']}}<br>
                <br>
        @endforeach
    
@endsection