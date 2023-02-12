@extends('master')
@section("content")

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<div class="container">
    <!-- <form action="/storeProduct" enctype="multipart/form-data" method="post"> -->
    <form enctype="multipart/form-data" method="post">
        @csrf
      
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="description">Product Description</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="form-group">
            <label for="category">Product Category</label>
            <input type="text" class="form-control" id="category" name="category">
        </div>
        <div class="form-group">
            <label for="price">Product Price</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        <div class="form-group">
            <label for="gallery">Product Image</label>
            <input type="file" class="form-control-file" id="fileInput" name="gallery">
        </div>
        <!-- <input type="submit" value="Submit"> -->
        <input type="submit" value="Add Product" class="btn btn-primary">
    </form>

</div>
<script>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("form").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var fileInput = document.getElementById("fileInput");
        var name = $('#name').val();
        var description = $('#description').val();
        var category = $('#category').val();
        var price = $('#price').val();
        var img = $('#fileInput').val();

        formData.append("file", img);
        formData.append("name",name);
        formData.append("description", description);
        formData.append("category",category);
        formData.append("price", price);

        // Perform the AJAX request
        $.ajax({
            url: "/storeProduct",
            type: "post",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                // Handle the response from the server
                alert("Product added successfully");
                $('.success').show();
                setTimeout(function(){
                    $('.success').hide();
                }, 5000);
                $('form').trigger("reset");
            }
        });
    });
});

</script>
@endsection
