@extends('master')
@section("content")
<div class="trending-wrapper">
    <h2>Products Order List</h2>
   
    <br><br>
    @foreach($order as $key => $items)
    <div class="row cartListDivider" style="padding:5px">
        <div class="col-sm-3">
            <a href="details/{{$items->id}}">
                <img class="img-size" src="{{url('uploads/products/' . $items->gallery)}}" alt="img">
            </a>
        </div>
        <div class="col-sm-3">
            <a href="details/{{$items->id}}">
                <div class="caption" style="text-align:center;">
                    <h5>Name : {{$items->name}}</h5>
                    <p>Price : {{$items->price}}</p>
                    <p>Delivery status : {{$items->status}}</p>
                    <p>Payment Status : {{$items->payment_status}}</p>
                    <p>Payment Method : {{$items->payment_method}}</p>
                    <p>Delivery Address : {{$items->address}}</p>
                </div>
            </a>
        </div>
       
    </div>
    @endforeach
</div>

<div id="result"></div>
</body>
</html>
@endsection