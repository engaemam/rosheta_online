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
                           <li class="breadcrumb-item"><a href="#">Patient</a></li>
                           <li class="breadcrumb-item active">Medical history</li>
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
                                            {{$profile->name}}.  <br>
                                            <label style="color: red;">Email : </label>
                                            {{$profile->email}}.  <br>
                                            <label style="color: red;">Country: </label>
                                            {{$profile->country }}.  <br> 
                                            <label style="color: red;">Address: </label>
                                            {{$profile->address }}.  <br> 
                                             <label style="color: red;">Phone: </label>
                                            {{$profile->phone }}.  <br> 
                                             <label style="color: red;">Mobile: </label>
                                            {{$profile->mobile }}.  <br> 
                                             <label style="color: red;">Age: </label>
                                            {{$profile->age }}.  <br> 
                                             <label style="color: red;">Gender: </label>
                                            {{$profile->gender==1?'Male':'Female' }}  <br> 
                                            <label style="color: red;">Summary: </label>
                                            {{$profile->summary}}.  <br>
                                            <br>      
                                            <a href="#" class="btn btn-primary " data-toggle="modal"  data-target="#profile"> <i class="fa fa-edit"></i> Edit Patient</a>
                                        

                            </div>
                          </div>
                        </div>  
                      </div>
                    </div>
                    </section>
                    <h4 class="page-title " style="padding-left: 50px;">Prescriptions</h4>
                     <div class="row" style="margin-left: 30px; margin-top: 25px;">
               <div class="col-12">
                  
                  <div class="card m-b-30 ">
                     @include('layouts.message')
                     <div class="col-2 m-t-30 " style="margin-left: 20px;">
                     <a   class="btn btn-primary " href="#" title="Add Prescription"  data-toggle="modal" data-target="#add_presc"   onclick="document.getElementById('p_name').value='{{$profile->name}}';
                                    document.getElementById('p_id').value='{{$profile->id}}';"> <i class="fa fa-plus-circle"></i> Add Prescription</a>
                  </div>
                     <div class="card-body">
                        
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Phone</th> 
                                 <th>Gender</th> 
                                 <th>Status</th>
                                 <th>Notes</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($prescriptions as $prescription )
                              <tr>
                                 
                                 <td>{{$profile->name}}</td>
                                 <td>{{$profile->phone}}</td>
                                 <td>{{$profile->gender==1?'Male':'Female'}}</td>
                                 <td>{{$prescription->status}}</td>
                                 <td>{{$prescription->notes}}</td>
                                 <td>
                                    <a href="{{url('/doctor/prescription',['id'=>$prescription->id])}}"  title="Prescription Details" class="btn btn-warning" > <i class="fa fa-eye"></i></a>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>



                  </div>
               </div>
            </div>
            <!-- end page title end breadcrumb -->
         </div>
         <!-- end container -->
      </div>


<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="myModalLabel">Edit patient profile</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <form action="{{url('/doctor/edp')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
             
                   <input class="form-control" required="" id="mo" value="{{$profile->id}}"  name="patient_id" type="hidden">

                   <div class="form-group">
                <div class="col-md-12">
                <label class="mm" for="name">Patient ID: </label>
                
                   <input class="form-control" value="{{$profile->pid}}" required=""  id="mo"  name="pid" type="text">        
                 </div>
             </div>

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
                <label class="mm" for="address">Age: </label>
                
                   <input class="form-control" value="{{$profile->age}}" required="" id="mo"  name="age" type="text">        
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
                <label class="mm" for="summary">summary: </label>
                
                   <textarea class="form-control" required="" id="details" rows="4" name="summary">{{$profile->summary}}</textarea>   

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



<div class="modal fade" id="add_presc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Prescription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="doc_spr" method="post" enctype="multipart/form-data" action="{{url('/doctor/spr')}}">
                                    {{csrf_field()}}
          <input type="hidden" name="p_id" id="p_id">
          <input type="hidden" id="p_scnt_no" value="1" name="p_scnt_no" >
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Patient name:</label>
            <input type="text" name="p_name" class="form-control" id="p_name" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Patient status:</label>
            <input type="text" name="status" class="form-control" >
          </div>

          <div class="form-group"  id="p_scents">
            <p>
            <label for="recipient-name" class="col-form-label">Item 1:</label>
            <input type="text"  id="p_scnt" name="p_scnt_1" class="form-control" >
            </p>
          </div>
          <a href="#" id="addScnt" class="btn btn-info">Add new item</a>
          
          <div class="form-group">
            <label for="message-text" class="col-form-label">Notes:</label>
            <textarea class="form-control" name="notes" ></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="document.getElementById('doc_spr').submit();" class="btn btn-primary">Save Info</button>
      </div>
    </div>
  </div>
</div>


@endsection