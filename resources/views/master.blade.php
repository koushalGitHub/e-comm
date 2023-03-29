<!DOCTYPE html>
<html lang="en">

<head>


<title>E-comm Project</title>
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
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

    
</head>
   
    <!-- Bootstrap CSS -->

    <style>
    .container {
        margin-top: 50px;
        /* or padding-top: 50px; */
    }

    .details_img {
        width: 300px;
        height: 300px;
    }

    .container {
        margin-bottom: 50px;
    }

    .search_box {
        width: 500px !important;
    }

    .img-size {
        width: 300px;
        height: 300px;
    }

    .trending-items {
        float: left;
        width: 20%;
    }

    .caption {
        text-align: center;
    }

    .trending-wrapper {
        margin: 30px;
    }
    .cartListDivider{
        border-bottom:1px solid;
        margin-bottom:20px;
        padding-bottom:20px
    }

    /* Mobile styles */
    @media only screen and (max-width: 600px) {
        .trending-wrapper {
            flex-wrap: wrap;
            /* allows items to wrap to a new line on smaller screens */
        }

        .trending-items {
            width: 100%;
            /* makes each item take up the full width of the screen on smaller screens */
        }

        .img-size {
            width: 80%;
            /* reduces the size of the images on smaller screens */
        }
    }

    /* Tablet styles */
    @media only screen and (min-width: 601px) and (max-width: 900px) {
        .trending-items {
            width: 50%;
            /* makes each item take up half the width of the screen on tablets */
        }
    }

    /* Desktop styles */
    @media only screen and (min-width: 901px) {
        .trending-items {
            width: 25%;
            /* makes each item take up a quarter of the width of the screen on larger screens */
        }
    }


    #search-form {
  margin-top:-348px;
  margin-right: 97px;
  float: right;
  width: 40px;
  height: 40px;
  overflow: hidden;
  display: inline-block;
  transition: width 0.35s ease-in-out;
  background-color: #eee;
  position: relative;
}

#search-input {
  width: 0;
  height: 40px;
  padding: 5px;
  font-size: 16px;
  border: none;
  outline: none;
  background-color: #eee;
  transition: width 0.35s ease-in-out;
  position: absolute;
  left: 0;
}

#search-icon {
  width: 40px;
  height: 40px;
  background-color: #333;
  color: #fff;
  border: none;
  outline: none;
  cursor: pointer;
  position: absolute;
  right: 0;
  z-index: 1;
}

.fa-search {
  font-size: 20px;
}


    </style>

     

<body>
    {{View::make('header')}}
    @yield('content')
    {{View::make('footer')}}
</body>

</html>