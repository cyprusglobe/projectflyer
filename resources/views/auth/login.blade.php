@extends('layout')

@section('content')
   <div class="row">
      <div class="col-md-6 col-md-offset-3">
           <form method="POST" action="/auth/login">
              {!! csrf_field() !!}

              <div class="form-group">
                 <label for="email">Email:</label>
                 <input type="email" name="email" class="form-control" value="{{ old('email') }}">
              </div>

              <div class="form-group">
                 <label for="password">Password:</label>
                 <input type="password" name="password" class="form-control" id="password">
              </div>

              <div class="form-group">
                 <input type="checkbox" name="remember"> Remember Me
              </div>

              <div class="form-group">
                 <button type="submit" class="btn btn-default">Login</button>
              </div>
           </form>

           @include('errors')
        </div>
   </div>
@endsection