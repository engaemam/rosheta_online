@extends('layouts.master')
@section('content')

<div class="wrapper">
         <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
               <div class="col-sm-12">
                  <div class="page-title-box">
                     <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                           <li class="breadcrumb-item"><a href="#">Rosheta-online</a></li>
                           <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                           <li class="breadcrumb-item active">Home</li>
                        </ol>
                     </div>
                     <h3 class="page-title ">Dashboard</h3>
                     <div class="row" style="padding-top: 50px;">
                        <div class="col-xl-4 col-md-4">
                              <div class="card mini-stat m-b-30">
                                 <div class="p-3 bg-primary text-white">
                                    <div class="mini-stat-icon"><i class="mdi mdi-account-network float-right mb-0"></i></div>
                                    <h6 class="text-uppercase mb-0">Patients</h6>
                                 </div>
                                 <div class="card-body">
                                    <div class="border-bottom pb-4"><span class="badge badge-success">{{App\Patient::all()->count()}} </span><span class="ml-2 text-muted"> New patients </span></div>
                                    
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-4 col-md-4">
                              <div class="card mini-stat m-b-30">
                                 <div class="p-3 bg-primary text-white">
                                    <div class="mini-stat-icon"><i class="mdi mdi-account-network float-right mb-0"></i></div>
                                    <h6 class="text-uppercase mb-0">Doctors</h6>
                                 </div>
                                 <div class="card-body">
                                    <div class="border-bottom pb-4"><span class="badge badge-info">{{App\Doctor::all()->count()}} </span><span class="ml-2 text-muted">New Doctors</span></div>
                                    
                                 </div>
                              </div>
                           </div>

                           <div class="col-xl-4 col-md-4">
                              <div class="card mini-stat m-b-30">
                                 <div class="p-3 bg-primary text-white">
                                    <div class="mini-stat-icon"><i class="mdi mdi-account-network float-right mb-0"></i></div>
                                    <h6 class="text-uppercase mb-0">Pharmacists</h6>
                                 </div>
                                 <div class="card-body">
                                    <div class="border-bottom pb-4"><span class="badge badge-info">{{App\Pharmacist::all()->count()}} </span><span class="ml-2 text-muted">New Pharmacist</span></div>
                                    
                                 </div>
                              </div>
                           </div>
                           
                           <div class="col-xl-4 col-md-4">
                              <div class="card mini-stat m-b-30">
                                 <div class="p-3 bg-primary text-white">
                                    <div class="mini-stat-icon"><i class="mdi mdi-tag-text-outline float-right mb-0"></i></div>
                                    <h6 class="text-uppercase mb-0">Precriptions</h6>
                                 </div>
                                 <div class="card-body">
                                    <div class="border-bottom pb-4"><span class="badge badge-danger">{{App\Prescription::all()->count()}} </span><span class="ml-2 text-muted">New Prescriptions</span></div>
                                    
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-4 col-md-4">
                              <div class="card mini-stat m-b-30">
                                 <div class="p-3 bg-primary text-white">
                                    <div class="mini-stat-icon"><i class="mdi mdi-tag-text-outline float-right mb-0"></i></div>
                                    <h6 class="text-uppercase mb-0">Hospitals</h6>
                                 </div>
                                 <div class="card-body">
                                    <div class="border-bottom pb-4"><span class="badge badge-warning">{{App\Hospital::all()->count()}} </span><span class="ml-2 text-muted">New Hospitals</span></div>
                                    
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-4 col-md-4">
                              <div class="card mini-stat m-b-30">
                                 <div class="p-3 bg-primary text-white">
                                    <div class="mini-stat-icon"><i class="mdi mdi-tag-text-outline float-right mb-0"></i></div>
                                    <h6 class="text-uppercase mb-0">Pharmacies</h6>
                                 </div>
                                 <div class="card-body">
                                    <div class="border-bottom pb-4"><span class="badge badge-info">{{App\Pharmacy::all()->count()}} </span><span class="ml-2 text-muted">New Pharmacies</span></div>
                                    
                                 </div>
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