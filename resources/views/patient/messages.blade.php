
@extends('patient.layouts.master')

@section('content')

<div class="wrapper" style="margin-bottom: 500px; margin-top: 20px;">
         <div class="container-fluid">
            <div class=" col-md-8 col-md-offset-2  col-sm-8 " style="text-align: left;">
              <center><h3 class="p_d_title_0">Inbox Messages</h3></center>
              <div class="panel-body" style="padding-top: 20px;">
                <ul class="list-group">
                   @include('layouts.message')
                  @foreach($messages as $message)
                    <li class="list-group-item" style="margin-bottom: 10px;">
                        <div class="row">
                            <div class="col-xs-2 col-md-2">
                                <img src="/assets/img/{{$message->from_status==1?App\Doctor::find($message->doctor_id)->img : App\Pharmacist::find($message->pharmacist_id)->img}}" height="100" width="100" alt="user" class="rounded-circle" /></div>
                            <div class="col-xs-8 col-md-8">
                                <div>
                                    
                                    <label style="color: red;">Subject: </label>  {{$message->subject}}
                                    <div class="mic-info">
                                       <label style="color: red;"> To: </label> <a href="#">{{$message->from_status==1?'DR\ '.App\Doctor::find($message->doctor_id)->name:'PH\  '.App\Pharmacist::find($message->pharmacist_id)->name}} </a><label style="color: red;"> on </label> {{$message->created_at}}
                                    </div>
                                </div>
                                <div class="comment-text">
                                 <label style="color: red;"> Body: </label>   {{ $message->body}}
                                </div>
                                @if($message->from_status==1)
                               <a  href="#" onclick="document.getElementById('doctor_id').value='{{$message->doctor_id}}';" class="btn btn-sm btn-hover btn-primary" href="#" data-toggle="modal" data-target="#reply_doctor" ><span class="glyphicon glyphicon-share-alt" style="padding-right:3px;"></span>Reply to message</a>
                               @endif
                               @if($message->from_status==2)
                               <a  href="#" onclick="document.getElementById('pharmacist_id').value='{{$message->pharmacist_id}}';" class="btn btn-sm btn-hover btn-primary" href="#" data-toggle="modal" data-target="#reply_pharmacist" ><span class="glyphicon glyphicon-share-alt" style="padding-right:3px;"></span>Reply to message</a>
                              @endif
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

 <div class="modal fade" id="reply_doctor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Replay to Doctor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="doc_rep" method="post" enctype="multipart/form-data" action="{{url('/reply/doctor')}}">
                       
                                    {{csrf_field()}}
         <input type="hidden" name="doctor_id" id="doctor_id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Subject:</label>
            <input type="text" name="subject" class="form-control"  >
          </div>


          <div class="form-group">
            <label for="message-text" class="col-form-label">Body:</label>
            <textarea class="form-control" name="body" rows="4" ></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="document.getElementById('doc_rep').submit();" class="btn btn-primary">Send Message</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="reply_pharmacist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Replay to Pharmacist</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="ph_rep" method="post" enctype="multipart/form-data" action="{{url('/reply/pharmacist')}}">
                       
                                    {{csrf_field()}}
         <input type="hidden" name="pharmacist_id" id="pharmacist_id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Subject:</label>
            <input type="text" name="subject" class="form-control"  >
          </div>


          <div class="form-group">
            <label for="message-text" class="col-form-label">Body:</label>
            <textarea class="form-control" name="body" rows="4" ></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="document.getElementById('ph_rep').submit();" class="btn btn-primary">Send Message</button>
      </div>
    </div>
  </div>
</div>


@endsection