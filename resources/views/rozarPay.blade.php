@extends('master')
@section("content")
<div class="container">
    <form action="" id="paymentForm" method="POST">
        @csrf
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="container">
            <div class="form-group text-center">
                <img src="https://images.unsplash.com/photo-1587080413959-06b859fb107d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=592&q=80"
                    width="200">
            </div>
            <div class="form-group">
                <label for="product-name">Product Name</label>
                <input type="text" class="form-control" id="product-name" name="name">
            </div>
            <div class="form-group">
                <label for="product-price">Product Price</label>
                <input type="text" class="form-control" id="product-price" name="price">
            </div>
            <button type="button" id="payNowBtn" class="btn btn-primary">Pay Now</button>
    </form>
</div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})
const payNowBtn = document.getElementById('payNowBtn');

payNowBtn.addEventListener('click', (event) => {
    // var formData = new FormData(this);
    const name = document.getElementById('product-name').value;
    const price = document.getElementById('product-price').value;
    const multipliedPrice = parseInt(price) * 100;

    const razorpay = new Razorpay({
        key: 'rzp_test_TXXix8YWV89uQj',
        amount : price * 100,
        currency : 'INR',
        name : name,
        description:'kMart',
        image: 'https://tse3.mm.bing.net/th?id=OIP.DjOJOwC2EC8ltiqNhail3QHaBk&pid=Api&P=0',
        prefill:{
            name:name,
            email:'koushal@gmail.com',
            contact:'9646965742',     
        },
        handler: async (razorpayResponse) => {
       
            $.ajax({
        url: '/paymentForm',
        type: 'POST',
        data: JSON.stringify({
        name: name,
        amount: multipliedPrice,
        payment_id: razorpayResponse.razorpay_payment_id
    }),
    headers: {
        'Content-Type': 'application/json'
    },       
        success: function(data) {
            console.log('Success');
            console.log(data);
        },
        error: function(error) {
            console.log('Error');
            console.log(error);
        }
    });

        }
    });
   
    razorpay.open();
});


</script>
@endsection