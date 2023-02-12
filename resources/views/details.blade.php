@extends('master')
@section("content")

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="details_img" src="{{url('uploads/products/' . $details['gallery'])}}">
        </div>
        <div class="col-sm-6">
                <a href="/home">Go Back</a>
                <h2>{{$details['name']}}</h2>
                <h3>Price : {{$details['price']}}</h3>
                <h3>Details : {{$details['description']}}</h3>
                <h3>category : {{$details['category']}}</h3>
                <br><br>  
                <form action="/add_to_cart" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$details['id']}}">
                    <button class="btn btn-primary">Add to Cart</button>
            </form>
                <br><br>
                <button class="btn btn-success">Buy Now</button>
        </div>
    </div>
</div>
@endsection