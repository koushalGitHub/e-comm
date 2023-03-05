@extends('master')
@section("content")

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .preview-image {
  display: block;
  width: 100px;
  height: 100px;
  object-fit: cover;
  margin-right: 10px;
  margin-bottom: 10px;
}
.preview-container {
  display: inline-block;
  position: relative;
}
.preview-remove {
  position: absolute;
  top: -5px;
  right: -5px;
  background-color: white;
  border-radius: 50%;
  width: 20px;
  height: 20px;
  line-height: 20px;
  text-align: center;
  cursor: pointer;
}

    </style>
</head>
<div class="container">
    <h2 class="success" style="color:green">Product Added Successfully</h2>
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
            <input type="file" name="images[]" id="image-input" multiple>
            <div id="image-preview"></div>

            <!-- <input type="file" class="form-control-file" id="fileInput" name="gallery"> -->
        </div>
        <!-- <input type="submit" value="Submit"> -->
        <input type="submit" value="Add Product" class="btn btn-primary">
    </form>

</div>
<script>
$(document).ready(function() {
    $('.success').hide();
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
        // var img = $('#image-input').val();

        // formData.append("file", img);
        var images = $('#image-input')[0].files;
        for(var i = 0; i < images.length; i++){
        formData.append("images[]", images[i]);
        }
        // alert(images);
        // console.log($images);
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
                // alert(data);
                console.log(data);
                // Handle the response from the server
                // alert("Product added successfully");
                $('.success').show();
                setTimeout(function(){
                    $('.success').hide();
                }, 5000);
                // $('form').trigger("reset");
            }
        });
    });
   

    $('#image-input').on('change', function() {
  var files = $(this).get(0).files;
  for (var i = 0; i < files.length; i++) {
    var file = files[i];
    var reader = new FileReader();
    reader.onload = function(e) {
      var img = $('<img>').attr('src', e.target.result).addClass('preview-image');
      var container = $('<div>').addClass('preview-container').append(img);
      var remove = $('<div>').addClass('preview-remove').html('&times;');
      remove.on('click', function() {
        container.remove();
      });
      container.append(remove);
      $('#image-preview').append(container);
    }
    reader.readAsDataURL(file);
  }
});


});

</script>
@endsection
