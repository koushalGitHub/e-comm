@extends('master')
@section("content")
<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-comm Project</title>
   

</head>
<style>

</style>
<body>
    <div id="carouselExampleIndicators" class="carousel slide" style="background-color: #172337;"data-ride="carousel">
            <ol class="carousel-indicators">
            @foreach($products as $key => $items)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                class="{{ $key == 0 ? 'active' : '' }}"></li>

            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($products as $key => $items)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <a href="details/{{$items['id']}}">
                    <img class="img-size" src="{{url('uploads/products/' . $items['gallery'])}}" alt="...">
                </a>
                <div class="carousel-caption">
                    <h5>{{$items['name']}}</h5>
                    <p>{{$items['description']}}</p>
                </div>

            </div>
            @endforeach


        </div>
    </div>
    <div class="carousel-control-prev">
    <a class="" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
    </div>
    
    @if (isset($error_message))
        <h2 style="color: red;">{{ $error_message }}</h2>
        @endif
    <div class="trending-wrapper">
        <h3>Trending Products</h3>
        @foreach($products as $key => $items)
        <div class="trending-items">
            <a href="details/{{$items['id']}}">
                <img class="img-size" src="{{url('uploads/products/' . $items['gallery'])}}" alt="img">
            
            <div class="caption">
                <h5>{{$items['name']}}</h5>
                <p>{{$items['description']}}</p>
            </div>
            </a>
        </div>
        @endforeach
    </div>
  

    <div id="result"></div>
   
</body>

</html>
@endsection
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
<script>
    
$(document).ready(function() {
    $('#result').html();
    
    $('.search_box').on('keyup', function() {
        var query = $(this).val();
        $.ajax({
            url: '{{URL::to('search')}}',
            type: 'GET',
            data: {
                query: query
            },
            success: function(data) {
                $('.carousel').hide();
                $('.trending-wrapper').hide();
                $('#result').show();
                $('#result').html(data);
                    console.log(data);
            }
        });
    });

});
    $(document).ready(function() {
  $("#search-form").submit(function(event) {
    event.preventDefault();
  });
  $("#search-form").hover(function() {
    $("#search-form").width(200);
    $("#search-input").width(160).focus();
  });
  $("#search-input").blur(function() {
    $("#search-form").width(40);
    $("#search-input").width(0);
  });
});



</script>