

@extends('layouts.master')
@section('content')

<div class="wrapper">
         <div class="container-fluid">
            <!-- Page-Title -->
            <center>
            <div class=" col-md-8  col-sm-8 " style="text-align: left;">
              <div class="panel-body " style="padding-top: 20px;">
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
                                       <label style="color: red;"> By: </label> <a href="#">{{App\Patient::where('id',$message->patient_id)->first()->name }} </a><label style="color: red;"> on </label> {{$message->created_at}}
                                    </div>
                                </div>
                                <div class="comment-text">
                                 <label style="color: red;"> Body: </label>   {{ $message->body}}
                                </div>
                               
                        
					    <a  href="#" onclick="document.getElementById('patient_id').value='{{App\Patient::where('id',$message->patient_id)->first()->id}}';" class="btn btn-sm btn-hover btn-primary" href="#" data-toggle="modal" data-target="#reply" ><span class="glyphicon glyphicon-share-alt" style="padding-right:3px;"></span>Reply to message</a>
					      
      
                              
                            </div>
                        </div>
                    </li>
                    @endforeach
                    
                </ul>
                
            </div>

        </div>
        </center>
    </div>
</div>


 <div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Replay to message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="doc_svp" method="post" enctype="multipart/form-data" action="{{url('/doctor/reply')}}">
                       
                                    {{csrf_field()}}
         <input type="hidden" name="patient_id" id="patient_id">
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
        <button type="button" onclick="document.getElementById('doc_svp').submit();" class="btn btn-primary">Send Message</button>
      </div>
    </div>
  </div>
</div>


                  

      @endsection