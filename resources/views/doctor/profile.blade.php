@extends('layouts.master')
@section('content')

<div class="wrapper" style="margin-bottom: 20px;">
         <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
               <div class="col-sm-12">
                  <div class="page-title-box">
                     <div class="btn-group float-left ">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                           <li class="breadcrumb-item"><a href="{{url('/doctor/home')}}">Rosheta-online</a></li>
                           <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                           <li class="breadcrumb-item active">Profile</li>
                        </ol>
                     </div>

                     <section style="padding-top: 20px;">
                      <div class="container" >
                        <div class="row">
                        <div class="col-lg-8" style="margin-left: 150px;">
                            @include('layouts.message')
                          <div class="panel panel-default margin-left-100px" style="padding: 10px;">
                            <center><img src="/assets/img/{{$profile->img}}" style="border-radius: 50%;  height: 150px; width: 150px;"></center>
                                            <label style="color: red;">Name: </label>
                                            {{$profile->name}}  <br>
                                            <label style="color: red;">Email : </label>
                                            {{$profile->email}}  <br>
                                            <label style="color: red;">Country: </label>
                                            {{$profile->country }}  <br> 
                                            <label style="color: red;">Address: </label>
                                            {{$profile->address }}  <br> 
                                             <label style="color: red;">Phone: </label>
                                            {{$profile->phone }}  <br> 
                                             <label style="color: red;">Mobile: </label>
                                            {{$profile->mobile }}  <br> 
                                             <label style="color: red;">Bachelor: </label>
                                            {{$profile->bachelor }}  <br> 
                                             <label style="color: red;">Gender: </label>
                                            {{$profile->gender==1?'Male':'Female' }}  <br> 
                                            <label style="color: red;">Biography: </label>
                                            {{$profile->biography}}  <br>
                                            <br>      
                                            <a href="#" class="btn btn-primary " data-toggle="modal"  data-target="#profile"> <i class="fa fa-edit"></i> Edit profile</a>
                                        

                            </div>
                          </div>
                        </div>  
                      </div>
                    </div>
                    </section>

                  </div>
               </div>
            </div>

         </div>
</div>

<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="myModalLabel">Edit profile</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <form action="{{url('/doctor/edit')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
             
                   <input class="form-control" required="" id="mo" value="{{$profile->id}}"  name="doctor_id" type="hidden">

             <div class="form-group">
                <div class="col-md-12">
                <label class="mm" for="name">Name: </label>
                
                   <input class="form-control" value="{{$profile->name}}" required=""  id="mo"  name="name" type="text">        
                 </div>
             </div>


             <div class="form-group">
                <div class="col-md-12">
                <label class="mm" for="name">Email: </label>
                
                   <input class="form-control" value="{{$profile->email}}" required="" id="mo"  name="email" type="text">        
                 </div>
             </div>
             

             <div class="form-group">
                <div class="col-md-12">
                <label class="mm" for="password">Password: </label>
                
                   <input class="form-control" required="" id="mo" name="password" type="password">        
                 </div>
             </div>

             <div class="form-group">
                <div class="col-md-12">
                <label class="mm" for="address">Country: </label>
                
                   <input class="form-control" value="{{$profile->country}}" required="" id="mo"  name="country" type="text">        
                 </div>
             </div>
             <div class="form-group">
                <div class="col-md-12">
                <label class="mm" for="address">Address: </label>
                
                   <input class="form-control" value="{{$profile->address}}" required="" id="mo"  name="address" type="text">        
                 </div>
             </div>
             <div class="form-group">
                <div class="col-md-12">
                <label class="mm" for="address">Phone: </label>
                
                   <input class="form-control" value="{{$profile->phone}}" required="" id="mo"  name="phone" type="text">        
                 </div>
             </div>
             <div class="form-group">
                <div class="col-md-12">
                <label class="mm" for="address">Mobile: </label>
                
                   <input class="form-control" value="{{$profile->mobile}}" required="" id="mo"  name="mobile" type="text">        
                 </div>
             </div>
             <div class="form-group">
                <div class="col-md-12">
                <label class="mm" for="address">Bachelor: </label>
                
                   <input class="form-control" value="{{$profile->bachelor}}" required="" id="mo"  name="bachelor" type="text">        
                 </div>
             </div>
             <div class="form-group">
                <div class="col-md-12">
                <select name="gender" class="form-control">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>      
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
                <label class="mm" for="summary">Biography: </label>
                
                   <textarea class="form-control" required="" id="details" rows="4" name="biography">{{$profile->biography}}</textarea>   

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