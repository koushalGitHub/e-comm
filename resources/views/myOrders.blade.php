@extends('master')
@section("content")

<div class="container">
    <?php dd($order);  ?>
    <div class="row">
        <div class="col-sm-6">
            <img class="details_img" src="{{url('uploads/products/' . $order['gallery'])}}">
        </div>
        <div class="col-sm-6">
                <a href="/home">Go Back</a>
                <h2>{{$order['name']}}</h2>
                <h3>Price : {{$order['price']}}</h3>
                <h3>Details : {{$order['description']}}</h3>
                <h3>category : {{$order['category']}}</h3>
                <br><br>  
                <form action="/add_to_cart" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$order['id']}}">
                    <input type="submit" class="btn btn-primary" value="Add to Cart">
            </form>
                <br><br>
                <button class="btn btn-success">Buy Now</button>
        </div>
    </div>
</div>
@endsection