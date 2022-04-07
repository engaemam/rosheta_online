@extends('layouts.master')
@section('content')

<div class="wrapper">
         <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
               <div class="col-sm-12">
                  <div class="page-title-box">
                     <div class="btn-group float-left ">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                           <li class="breadcrumb-item"><a href="{{url('/doctor/home')}}">Rosheta-online</a></li>
                           <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                           <li class="breadcrumb-item active">Hospital</li>
                        </ol>
                     </div>

                     <section style="padding-top: 20px;">
                      <div class="container" >
                        <div class="row">
                        <div class="col-lg-8" style="margin-left: 150px;">
                            @include('layouts.message')
                          <div class="panel panel-default margin-left-100px" style="padding: 10px;">
                            <center><img src="/assets/img/{{$hospital->img}}" style="  height: 200px; width: 200px;"></center>
                                            <label style="color: red;">Name: </label>
                                            {{$hospital->name}}  <br>
                                            <label style="color: red;">Examine Price: </label>
                                            {{$hospital->ex_price }}  <br> 
                                             <label style="color: red;">Country: </label>
                                            {{$hospital->country }}  <br> 
                                             <label style="color: red;">Address: </label>
                                            {{$hospital->address }}  <br>
                                             <label style="color: red;">Phone: </label>
                                            {{$hospital->phone }}  <br> 
                                             <label style="color: red;">Mobile: </label>
                                            {{$hospital->mobile }}  <br> 
                                             <label style="color: red;">Doctor: </label>
                                            {{App\Doctor::where('id',$hospital->doctor_id)->first()->name }}  <br>  
                                            <label style="color: red;">Summary: </label>
                                            {{$hospital->summary}}  <br>
                                            <br>      
                                            <a href="#" class="btn btn-primary " data-toggle="modal"  data-target="#hospital"> <i class="fa fa-edit"></i> Edit Hospital</a>
                                        

                            </div>
                          </div>
                        </div>  
                      </div>
                    </div>
                    </section>

                  </div>
               </div>
            </div>
            <!-- end page title end breadcrumb -->
         </div>
         <!-- end container -->
      </div>


<div class="modal fade" id="hospital" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="myModalLabel">Edit Hospital</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <form action="{{url('/doctor/edh')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
             
                   <input class="form-control" required="" id="mo" value="{{$hospital->id}}"  name="hospital_id" type="hidden">

             <div class="form-group">
                <div class="col-md-12">
                <label class="mm" for="name">Name: </label>
                
                   <input class="form-control" value="{{$hospital->name}}"   id="mo"  name="name" type="text">        
                 </div>
             </div>

             <div class="form-group">
                <div class="col-md-12">
                <label class="mm" for="name">Examine Price: </label>
                
                   <input class="form-control" value="{{$hospital->ex_price}}"   id="mo"  name="ex_price" type="text">        
                 </div>
             </div>

             <div class="form-group">
                <div class="col-md-12">
                <label class="mm" for="address">Country: </label>
                
                   <input class="form-control" value="{{$hospital->country}}"  id="mo"  name="country" type="text">        
                 </div>
             </div>
             
             <div class="form-group">
                <div class="col-md-12">
                <label class="mm" for="address">Address: </label>
                
                   <input class="form-control" value="{{$hospital->address}}"  id="mo"  name="address" type="text">        
                 </div>
             </div>
             <div class="form-group">
                <div class="col-md-12">
                <label class="mm" for="address">Phone: </label>
                
                   <input class="form-control" value="{{$hospital->phone}}"  id="mo"  name="phone" type="text">        
                 </div>
             </div>
             <div class="form-group">
                <div class="col-md-12">
                <label class="mm" for="address">Mobile: </label>
                
                   <input class="form-control" value="{{$hospital->mobile}}"  id="mo"  name="mobile" type="text">        
                 </div>
             </div>
             

             <div class="form-group">
                <div class="col-md-12">
                <label class="mm" for="img">Photo: </label>
                
                    <span class="btn btn-info btn-file" style="margin-bottom: 10px;">
                        <i class="fa fa-image"></i> Choose file <input type="file" style=" opacity:0; height: 10px; width: 50px;" name="img">
                    </span>
                 </div>
             </div>

             <div class="form-group">
                <div class="col-md-12">
                <label class="mm" for="summary">Summary: </label>
                
                   <textarea class="form-control" id="details" rows="4" name="summary">{{$hospital->summary}}</textarea>   

                 </div>
             </div>
             
             <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Save</button>
                
            </div>
            
         </form>
      </div>
      
    </div>
  </div>
</div>



@endsection