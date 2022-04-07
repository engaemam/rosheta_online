
@extends('patient.layouts.master')

@section('content')

<div class="wrapper" style="margin-bottom: 500px; margin-top: 20px;">
         <div class="container-fluid">
            <div class=" col-md-8 col-md-offset-2  col-sm-8 " style="text-align: left;">
              <center><h3 class="p_d_title_0">Sent Messages</h3></center>
              <div class="panel-body" style="padding-top: 20px;">
                <ul class="list-group">
                   @include('layouts.message')
                  @foreach($messages as $message)
                    <li class="list-group-item" style="margin-bottom: 10px;">
                        <div class="row">
                            <div class="col-xs-2 col-md-2">
                                <img src="/assets/img/{{$message->to_status==1?App\Doctor::find($message->doctor_id)->img : App\Pharmacist::find($message->pharmacist_id)->img}}" height="100" width="100" alt="user" class="rounded-circle" /></div>
                            <div class="col-xs-8 col-md-8">
                                <div>
                                    
                                    <label style="color: red;">Subject: </label>  {{$message->subject}}
                                    <div class="mic-info">
                                       <label style="color: red;"> To: </label> <a href="#">{{$message->to_status==1?'DR\ '.App\Doctor::find($message->doctor_id)->name:'PH\  '.App\Pharmacist::find($message->pharmacist_id)->name}} </a><label style="color: red;"> on </label> {{$message->created_at}}
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
 </div>
</div>


@endsection