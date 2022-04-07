

@extends('layouts.master')
@section('content')

<div class="wrapper">
         <div class="container-fluid">
            <!-- Page-Title -->
           <center>
            <div class=" col-md-8  col-sm-8 " style="text-align: left;">

              <div class="panel-body" style="padding-top: 20px;">
                <ul class="list-group">
                	 @include('layouts.message')
                	@foreach($messages as $message)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-2">
                                <img src="/assets/img/{{App\Patient::where('id',$message->patient_id)->first()->img}}" height="100" width="100" alt="user" class="rounded-circle" /></div>
                            <div class="col-xs-8 col-md-8">
                                <div>
                                    
                                    <label style="color: red;">Subject: </label>  {{$message->subject}}
                                    <div class="mic-info">
                                       <label style="color: red;"> To: </label> <a href="#">{{App\Patient::where('id',$message->patient_id)->first()->name }} </a><label style="color: red;"> on </label> {{$message->created_at}}
                                    </div>
                                </div>
                                <div class="comment-text">
                                 <label style="color: red;"> Body: </label>   {{ $message->body}}
                                </div>
					      
      
                              
                            </div>
                        </div>
                    </li>
                    @endforeach
                    
                </ul>
                
            </div>
          </div>
</div>
</center>
 </div>
</div>


                  

      @endsection