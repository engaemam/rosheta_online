
@extends('patient.layouts.master')

@section('content')

<section style="margin-bottom: 220px;">
  <div class="container" >
  <div class="row">
    <div class="col-sm-5 col-sm-offset-3">
      @include('layouts.message')
      <h3 class="pull-center">Patient Registration</h3>
      <div class="panel panel-default">
        <div class="panel-body">
          <form action="{{url('/patient/doregister')}}" method="post"  enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group" >
              <label>Patient ID</label>
              <input type="text" name="pid"  placeholder="Patient ID" class="form-control">
            </div> 
            <div class="form-group" >
              <label>Name</label>
              <input type="text" name="name"  placeholder="Name" class="form-control">
            </div>  
            <div class="form-group" >
              <label>Email</label>
              <input type="text" name="email"  placeholder="Email" class="form-control">
            </div>  
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password"  placeholder="Password" class="form-control">
            </div>  
            <div class="form-group">
              <label>Gender</label>
              <select name="gender">
                <option value="1">Male</option>
                <option value="2">Female</option>
              </select>
            </div>  
            <div class="form-group" >
              <label>Age</label>
              <input type="text" name="age"  placeholder="Age" class="form-control">
            </div> 
            <div class="form-group" >
              <label>Phone</label>
              <input type="text" name="phone"  placeholder="Phone" class="form-control">
            </div> 
            <div class="form-group" >
              <label>Mobile</label>
              <input type="text" name="mobile"  placeholder="Mobile" class="form-control">
            </div> 
            <div class="form-group" >
              <label>Country</label>
              <input type="text" name="country"  placeholder="Country" class="form-control">
            </div> 
            <div class="form-group" >
              <label>Address</label>
              <input type="text" name="address"  placeholder="Address" class="form-control">
            </div> 
            <div class="form-group" >
              <label>Photo</label>
              <span class="btn btn-info btn-file" style="margin-bottom: 10px;">
                           <i class="fa fa-image"></i> Choose photo <input type="file" ="" name="img" style=" opacity:0; height: 5px; width: 100px;">
                              </span>
            </div> 
             <div class="form-group" >
              <label>Summary</label>
              <textarea name="summary" placeholder="Patient summary" class="form-control" rows="3"></textarea>
            </div> 

            <button type="submit" class="btn btn-success pull-right">Save</button>
        </form>
        </div>
      </div>
    </div>  
  </div>
</div>
</section>


@endsection