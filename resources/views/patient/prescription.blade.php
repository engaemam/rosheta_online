
@include('layouts.header')
<div class="wrapper">
         <div class="container-fluid">
            <!-- Page-Title -->
            <center  style="padding-top: 30px;">
            <div class=" col-md-8  col-sm-8 " style="text-align: left;">
              <div class="row">
               <div class="col-12">
                  <div class="card m-b-30">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-12">
                              <div class="invoice-title">
                                 <h4 class="float-right font-16"><strong>Prescription # {{$prescription->id}}</strong></h4>
                                 <h3 class="m-t-0"><img src="/assets/images/logo.png" alt="logo" height="45"></h3>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-6">
                                    <address><strong>Patient Name:</strong><br>{{App\Patient::where('id',$prescription->patient_id)->first()->name}}</address>
                                 </div>
                                 <div class="col-6 text-right">
                                    <address><strong>Patient Address:</strong><br>
                                      {{App\Patient::where('id',$prescription->patient_id)->first()->address}}
                                    </address>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-6 m-t-30">
                                    <address><strong>Patient Mobile:</strong><br>{{App\Patient::where('id',$prescription->patient_id)->first()->mobile}}</address>
                                 </div>
                                 <div class="col-6 m-t-30 text-right">
                                    <address><strong>Creation Date:</strong><br>{{$prescription->created_at->format('Y-m-d')}}<br><br></address>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-12">
                              <div class="panel panel-default">
                                 <div class="p-2">
                                    <h3 class="panel-title font-20"><strong>Prescription summary</strong></h3>
                                 </div>
                                 <div class="">
                                    <div class="table-responsive">
                                       <table class="table">
                                          <thead>
                                             <tr>
                                                <td><strong>Item</strong></td>
                                                <td class="text-center"><strong>Notes</strong></td>
                                             </tr>
                                          </thead>
                                          <tbody>
                                            @foreach(App\Item::where('prescription_id',$prescription->id)->get() as $item)
                                             <tr>
                                                <td>{{$item->name}}</td>
                                                <td class="text-center">{{$item->notes}} </td>
                                                
                                             </tr>
                                             @endforeach
                                             
                                             <tr>

                                                <td class="thick-line ">Signature</td>
                                                <td class=" thick-line text-center">........................................</td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                    <div class="d-print-none mo-mt-2">
                                       <div class="float-right"><a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                        <!-- end row -->
                     </div>
                  </div>
               </div>
               <!-- end col -->
            </div>
        </center>
    </div>
</div>
@include('layouts.footer')
