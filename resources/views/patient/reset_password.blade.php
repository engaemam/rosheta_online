@extends('patient.layouts.master')

@section('content')

<section style="margin-bottom: 220px;">
  <div class="container" >
  <div class="row">
    <div class="col-sm-5 col-sm-offset-3">
      @include('layouts.message')
      <h3 class="pull-center">Patient Login</h3>
      <div class="panel panel-default">
        <div class="panel-body">
          <form method="post" >
            {{csrf_field()}}
            <div class="form-group" >
                <label>Email</label>
              <input type="text" name="email" value="{{$data->email}}" required placeholder="Email" class="form-control">
            </div>  
            <div class="form-group">
                <label>Password</label>
              <input type="password" name="password" required placeholder="Password" class="form-control">
            </div>  
            <div class="form-group">
                <label>Confirm Password</label>
              <input type="password" name="password_confirmation" required placeholder="Confirm Password" class="form-control">
            </div>  
             <button type="submit" class="btn btn-success pull-right">Reset Password</button>
        </form>
        </div>
      </div>
    </div>  
  </div>
</div>
</section>


@endsection