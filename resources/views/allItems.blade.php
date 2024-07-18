{{--<h2>The items are:</h2>--}}
{{--@forelse($items as $item)
    <h4>{{$item}}</h4>
@empty
    <p>No items</p>
@endforelse
--}}
{{--
@for($i=0;$i<count($items);$i++)
    {{$items[$i]}}
@endfor
--}}

<h2>Using if-else:</h2>
@if(count($items)===1)
    <h4>Only 1 item is left in stock</h4>
@elseif(count($items)>1)
    <h4>Items are available</h4>
@else
    <h4>Out of Stock</h4>
@endif

<h2>Using switch statement:</h2>
@switch(count($items))
    @case(1)
        <h4>1 item</h4>
        @break;
    @case(2)
        <h4>2 items</h4>
        @break;
    @case(3)
        <h4>3 items</h4>
        @break;
    @case(4)
        <h4>4 items</h4>
        @break;
    @case(5)
        <h4>5 items</h4>
        @break;
    @default
        <h4>Out of Stock or More than 5 items<h4>
@endswitch

<h2>Using while loop:</h2>
@php
    $i=0;
@endphp
@while($i<count($items))
    <li>{{$items[$i]}}</li>
    @php
        $i++;
    @endphp
@endwhile
