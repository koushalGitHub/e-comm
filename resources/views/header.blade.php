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
        <a class="nav-link" style="color:white" href="/home">Kk-Mart</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if(Session::has('user'))
                <li class="nav-item">
                    <a class="nav-link" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/myOrders">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/addProduct">Add Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>

                @endif
                @if(!Session::has('user'))
                <li class="nav-item">
                    <a class="nav-link" style="color:white" href="/login">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" style="color:white" href="/register">Register</a>
                </li>@endif

                @if(Session::has('user'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Hiii
                        {{Session::get('user')['name']}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/logout">LogOut</a>

                    </div>
                </li>
                @else

                @endif
            </ul>

        </div>
        <div class="cart">
            <ul class="navbar-nav">
                @if(Session::has('user'))
                <form action="search" method="post">
                    @csrf
                    <div class="input-group rounded">
                        <input type="search" name="name" class="form-control rounded " placeholder="Search">
                        <button><span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                        </button>

                    </div>
                </form>
                @endif

                <li class="nav-item">
                    <!-- <a class="nav-link" href="/cartList">Cart({{$total}})</a> -->
                    <a class="nav-link" href="/cartList">Cart <span id="cart-count"></span></a>
                </li>
            </ul>
            <div>
    </nav>
</body>

</html>
<script>
$(document).ready(function() {
 
            $('button').click(function(e) {
                let inputValue = $('input[name="name"]').val().trim();
                if (!inputValue) {
                    e.preventDefault();
                }
            });
        
    });


function updateCartCount() {
    $.ajax({
        url: '/update_cart_count',
        type: 'GET',
        success: function(data) {
            $('#cart-count').text(data);
        },
    });
}

$(document).ready(function() {
    updateCartCount();
});
</script>