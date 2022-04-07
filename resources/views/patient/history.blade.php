 
@extends('patient.layouts.master')

@section('content')

<div class="wrapper" style="margin-bottom: 500px; margin-top: 20px;">
         <div class="container-fluid">
            <div class=" col-md-8 col-md-offset-2  col-sm-8 " style="text-align: left;">
              <center><h3 class="p_d_title_0">Medical History</h3></center>
              <div class="panel-body" style="padding-top: 20px;">
                <ul class="list-group">
                  @foreach($prescriptions as $prescription)
                    <li class="list-group-item" style="margin-bottom: 10px;">
                        <div class="row">
                            
                            <div class="col-xs-8 col-md-8">
                                <div>
                                    
                                    <label style="color: red;">Status: </label>  {{$prescription->status}}
                                    <div class="mic-info">
                                       <label style="color: red;"> Dr: </label> <a href="#">{{App\Doctor::find($prescription->doctor_id)->name}} </a>
                                       <br>
                                       <label style="color: red;"> Created at:  </label> {{$prescription->created_at}}
                                    </div>
                                </div>
                                <div class="comment-text">
                                 <label style="color: red;"> Notes: </label>   {{ $prescription->notes}}
                                </div>

                               <a  href="{{url('/prescription',['id'=>$prescription->id])}}" class="btn btn-sm btn-hover  btn-primary pull-right" ><span class="glyphicon glyphicon-doc-alt"  style="padding-right:3px;"></span>View Prescription</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    
                </ul>
                
            </div>
          </div>
</div>
 </div>
</div>

 


@endsection