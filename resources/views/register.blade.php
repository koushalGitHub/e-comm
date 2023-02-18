@extends('master')
@section("content")
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
   
  </head>
  <body>
 
    <div class="container">
      <div class="row">
    
        <div class="col-md-6 col-md-offset-3">
          <h2>Registration Form</h2>
          <form method="POST" action="register">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" value="{{ old('email') }}">
    @if (isset($_message))
            <p style="color: red;">{{ $_message }}</p>
        @endif
</div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password">
        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
    </div>


    <button type="submit" class="btn btn-primary">Register</button>
</form>

        </div>
      </div>
    </div>
  </body>
</html>
@endsection