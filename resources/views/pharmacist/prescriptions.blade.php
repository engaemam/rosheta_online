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
                           <li class="breadcrumb-item"><a href="#">Pharamcist</a></li>
                           <li class="breadcrumb-item active">Prescriptions</li>
                        </ol>
                     </div>
                     <div class="row" style="margin-left: 30px; margin-top: 25px;">
                      <div class="col-12">
                  
                  <div class="card m-b-30 ">
                     @include('layouts.message')
                     <div class="col-2 m-t-30 " style="margin-left: 20px;">
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
                                 <th class="no-print">Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($prescriptions as $prescription )
                              <tr>
                                 
                                 <td>{{App\Patient::where('id',$prescription->patient_id)->first()->name}}</td>
                                 <td>{{App\Patient::where('id',$prescription->patient_id)->first()->phone}}</td>
                                 <td>{{App\Patient::where('id',$prescription->patient_id)->first()->gender==1?'Male':'Female'}}</td>
                                 <td>{{$prescription->status}}</td>
                                 <td>{{$prescription->notes}}</td>
                                 <td class="no-print">
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