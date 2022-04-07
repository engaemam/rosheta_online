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
                                    <a href="{{url('/pharmacist/prescription',['id'=>$prescription->id])}}"  title="Prescription Details" class="btn btn-warning" > <i class="fa fa-eye"></i></a>
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




@endsection
