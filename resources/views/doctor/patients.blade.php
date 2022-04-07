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
                           <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                           <li class="breadcrumb-item active">Patients</li>
                        </ol>
                     </div>
                     <div class="row" style="margin-left: 30px; margin-top: 25px;">
               <div class="col-12">
                  
                  <div class="card m-b-30 ">
                     @include('layouts.message')
                     <div class="col-2 m-t-30 " style="margin-left: 20px;">
                     <a   class="btn btn-primary " href="#" data-toggle="modal" data-target="#add_patient"> <i class="fa fa-plus-circle"></i> Add Patient</a>
                  </div>
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
                                    <a href="#" data-toggle="modal" title="Edit patient" data-target="#edit_patient"  
                                    onclick="document.getElementById('patient_name').value='{{$patient->name}}';
                                    document.getElementById('patient_id').value='{{$patient->id}}';
                                    document.getElementById('patient_email').value='{{$patient->email}}';
                                    document.getElementById('summary').innerHTML ='{{$patient->summary}}';
                                    document.getElementById('patient_address').value='{{$patient->address}}';
                                    document.getElementById('patient_country').value='{{$patient->country}}';
                                    document.getElementById('pid').value ='{{$patient->pid}}';
                                    document.getElementById('patient_phone').value='{{$patient->phone}}';
                                    document.getElementById('patient_mobile').value='{{$patient->mobile}}';
                                    document.getElementById('patient_age').value ='{{$patient->age}}';
                                    "

                                     class="btn btn-sm btn-info" > <i class="fa fa-edit"></i></a>
                                    <a href="#" title="Add Prescription"  data-toggle="modal" data-target="#add_presc"  
                                     onclick="document.getElementById('p_name').value='{{$patient->name}}';
                                    document.getElementById('p_id').value='{{$patient->id}}';" class="btn btn-sm btn-warning" > <i class="dripicons-document-edit"></i></a>
                                    <a href="{{url('/doctor/vwp',['id'=>$patient->id])}}" title="View medical history " class="btn btn-sm btn-primary" > <i class="fa fa-eye"></i></a>
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

      <div class="modal fade" id="edit_patient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit patient info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="doc_edp" method="post" enctype="multipart/form-data" action="{{url('/doctor/edp')}}">
                                    {{csrf_field()}}
         <input type="hidden" name="patient_id" id="patient_id">
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Patient ID:</label>
            <input type="text" name="pid" class="form-control" id="pid" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" name="name" class="form-control" id="patient_name" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="email" name="email" class="form-control" id="patient_email">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" name="password" class="form-control" id="patient_password" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Country:</label>
            <input type="text" name="country" class="form-control" id="patient_country">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Address:</label>
            <input type="text" name="address" class="form-control" id="patient_address">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone:</label>
            <input type="text" name="phone" class="form-control" id="patient_phone">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mobile:</label>
            <input type="text" name="mobile" class="form-control" id="patient_mobile">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Age:</label>
            <input type="text" name="age" class="form-control" id="patient_age">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Photo:</label>
            <span class="btn btn-primary btn-file" style="margin-bottom: 5px;">
              <i class="fa fa-image"></i> Patient photo <input class="form-control" name="img" style=" opacity:0; height: 10px; width: 50px;" type="file" required="" ></span>
           </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Summary:</label>
            <textarea class="form-control" name="summary" id="summary"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="document.getElementById('doc_edp').submit();" class="btn btn-primary">Update Info</button>
      </div>
    </div>
  </div>
</div>


 <div class="modal fade" id="add_patient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="doc_svp" method="post" enctype="multipart/form-data" action="{{url('/doctor/svp')}}">
                                    {{csrf_field()}}
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Patient ID:</label>
            <input type="text" name="pid" class="form-control">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" name="name" class="form-control" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="email" name="email" class="form-control" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" name="password" class="form-control" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Country:</label>
            <input type="text" name="country" class="form-control" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Address:</label>
            <input type="text" name="address" class="form-control" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone:</label>
            <input type="text" name="phone" class="form-control" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mobile:</label>
            <input type="text" name="mobile" class="form-control"  >
          </div>
          <div class="form-group" >
            <label for="recipient-name" class="col-form-label">Gender:</label>
            <select name="gender" class="form-control">
               <option value="1">Male</option>
               <option value="2">Female</option>
            </select>
         </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Age:</label>
            <input type="text" name="age" class="form-control" >
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Photo:</label>
            <span class="btn btn-primary btn-file" style="margin-bottom: 5px;">
              <i class="fa fa-image"></i> Patient photo <input class="form-control" name="img" style=" opacity:0; height: 10px; width: 50px;" type="file" required="" ></span>
           </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Summary:</label>
            <textarea class="form-control" name="summary" ></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="document.getElementById('doc_svp').submit();" class="btn btn-primary">Save Info</button>
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