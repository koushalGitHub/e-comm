@extends('master')
@section("content")
<div id="result" class="trending-wrapper">
     @if (isset($error_message))
        <p style="color: red;">{{ $error_message }}</p>
     @elseif (isset($products) && count($products) > 0)
            @foreach($products as $key => $item)
                <div class=" trending-items">
                    <a href="details/{{$item->id}}">
                        <img class="img-size" src="{{url('uploads/products/' . $item['gallery'])}}" alt="img">
                        <div class="caption">
                            <h2>{{$item->name}}</h2>
                            <h5>{{$item->description}}</h5>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <p>No data found</p>
        @endif
    </div>
@endsection
