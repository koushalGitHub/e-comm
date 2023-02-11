<?php 
use App\Http\Controllers\ProductController;
$total = 0;
if(Session::has('user'))
{
    $total=ProductController::cart_item();

}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>
<style>
@media (max-width: 991px) {
    .navbar-nav {
        flex-direction: column;
    }

    .navbar-nav .nav-link {
        padding: .5rem 1rem;
    }

    .navbar-collapse {
        justify-content: flex-end;
    }

    .navbar-toggler {
        display: block;
    }

}

@media (max-width: 576px) {
    .form-inline {
        display: none;
    }

}

.nav-link {
    color: white;
}

.search_box {
    width: 300px !important;
}
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
        <a class="nav-link" href="/home">Kk-Mart</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                @if(Session::has('user'))
                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hiii
         {{Session::get('user')['name']}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/logout">LogOut</a>
         
        </div>
      </li>
      @else
      <li><a href="/login">Login</a></li>
      @endif
            </ul>
            
        </div>
       <div class="cart">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/cartList">Cart({{$total}})</a>
            </li>
        </ul>
        <div>
    </nav>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <div id="result"></div>
</body>

</html>
<script>
    
$(document).ready(function() {
    $('#result').show();
    $('.search_box').on('keyup', function() {
        var query = $(this).val();
        $.ajax({
            url: '{{URL::to('search')}}',
            type: 'GET',
            data: {
                query: query
            },
            success: function(data) {
          
                $('#result').html(data);
                    console.log(data);
            }
        });
    });
});
</script>