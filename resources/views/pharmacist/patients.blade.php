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
                           <li class="breadcrumb-item"><a href="#">Rosheta-online</a></li>
                           <li class="breadcrumb-item"><a href="#">Pharmacist</a></li>
                           <li class="breadcrumb-item active">Patients</li>
                        </ol>
                     </div>
                     <div class="row" style="margin-left: 30px; margin-top: 25px;">
               <div class="col-12">
                  
                  <div class="card m-b-30 ">
                     @include('layouts.message')
                     
                     <div class="card-body">
                        
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                           <thead>
                              <tr>
                                 <th>Photo</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Phone</th> 
                                 <th>Gender</th> 
                                 <th>Address</th>
                                 <th>Age</th>
                                 <th class="no-print">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($patients as $patient )
                              <tr>
                                 <td><img  src="/assets/img/{{$patient->img}}" height="45" width="50" alt="user" class="rounded-circle"></td>
                                 <td>{{$patient->name}}</td>
                                 <td>{{$patient->email}}</td>
                                 <td>{{$patient->phone}}</td>
                                 <td>{{$patient->gender==1?'Male':'Female'}}</td>
                                 <td>{{$patient->address}}</td>
                                 <td>{{$patient->age}}</td>
                                 <td class="no-print">
                                    
                                     
                                    <a href="{{url('/pharmacist/vwp',['id'=>$patient->id])}}" title="View medical history " class="btn btn-sm btn-primary" > <i class="fa fa-eye"></i></a>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!-- end col -->
            </div>
                  </div>
               </div>
            </div>
            <!-- end page title end breadcrumb -->
         </div>
         <!-- end container -->
      </div>






@endsection