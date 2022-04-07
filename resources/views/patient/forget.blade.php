@extends('patient.layouts.master')

@section('content')

<section style="margin-bottom: 320px;">
  <div class="container" >
  <div class="row">
    <div class="col-sm-5 col-sm-offset-3">
      @include('layouts.message')
      <h3 class="pull-center">Patient forgot password</h3>
      <div class="panel panel-default">
        <div class="panel-body">
          <form action="{{url('/patient/forget')}}" method="post"  enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group" >
                <label>Email</label>
              <input type="text" name="email" required placeholder="Email" class="form-control">
            </div>  
             
            <button type="submit" class="btn btn-success pull-right">Send reset email</button>
        </form>
        </div>
      </div>
    </div>  
  </div>
</div>
</section>


@endsection