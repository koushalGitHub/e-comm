@extends('master')
@section("content")
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<style>
.form-container {
    margin-top: 50px;
    /* or padding-top: 50px; */
}
</style>

<body>
    <div class="container">
    @if (isset($_message))
        <div class="row justify-content-center">
            <h3 style="color: green;">{{ $_message }}</h3>
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <form class="form-container" action="login" method="post">
                    <div class="form-group">
                        @csrf
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" id="password">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" id="show-password-btn">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-block">login</button>
                </form>
                @if (isset($error_message))
            <p style="color: red;">{{ $error_message }}</p>
        @endif
            </div>
        </div>
    </div>
</body>

</html>
<script>
document.getElementById("show-password-btn").addEventListener("click", function() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
});
</script>
@endsection