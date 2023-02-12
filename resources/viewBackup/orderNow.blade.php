
@extends('master')
@section("content")
<div class="col-sm-6">
<table class="table table-bordered border-primary">
  <thead>
    <tr>
      <th scope="col">Sr.no</th>
      <th scope="col">Price</th>
      <th scope="col">{{$total}} Rupee</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Tax</td>
      <td>0 Rupee</td>

    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Delivery</td>
      <td>100</td>

    </tr>
    <tr>
      <th scope="row">3</th>
      <td >Total Amount</td>
      <td>{{$total + 100}}</td>
    </tr>
  </tbody>
</table>
<form action="orderPlace" method="post">
  @csrf
  <div class="mb-3 form-group">

    <textarea type="text" name="address" value="" class="form-control" placeholder="Enter Your Address"></textarea>
</div>
  <div class="mb-3 form-group">
    <h6>Payment Method</h6>
        <p>
    <input type="radio" value="cash" name="payment"><span>Online Payment</span></p>
    <input type="radio" value="cash" name="payment"><span>EMI Payment</span></p>
    <input type="radio" value="cash" name="payment"><span>Cash on Delivery</span></p>
    <input type="radio" value="cash" name="payment"><span>Online Payment</span></p>
  </div>

  <button type="submit" class="btn btn-primary">Order Now</button>
</form>


</div>


@endsection