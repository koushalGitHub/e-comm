@extends('master')
@section("content")
<div class="trending-wrapper">
    <h2>Cart List Products</h2>
    <a class="btn btn-success" href="orderNow">Oder Now</a>
    <br><br>
    @foreach($products as $key => $items)
    <div class="row cartListDivider" style="padding:5px">
        <div class="col-sm-3">
            <a href="details/{{$items->id}}">
                <img class="img-size" src="{{$items->gallery}}" alt="img">
            </a>
        </div>
        <div class="col-sm-3">
            <a href="details/{{$items->id}}">
                <div class="caption" style="text-align:center;">
                    <h5>{{$items->name}}</h5>
                    <p>{{$items->price}}</p>
                    <p>{{$items->description}}</p>
                </div>
            </a>
        </div>
        <div class="col-sm-3">
            <a href="/removeCart/{{$items->cartId}}" class="btn btn-warning">Remove From Cart</a>
        </div>
    </div>
    @endforeach
</div>
<a class="btn btn-success" href="orderNow">Oder Now</a>
<div id="result"></div>
</body>
</html>
@endsection