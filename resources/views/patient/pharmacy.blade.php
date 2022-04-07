@extends('patient.layouts.master')

@section('content')

     
    <section class="project_all_details">  
        <div class="container">  
            <div class="row">  
              @if(!auth()->guard('patient')->user())
               <div class="col-md-8 col-sm-8 col-md-offset-2  col-xs-8">
               @else
                <div class="col-md-8 col-sm-8  col-xs-8">
                @endif
                @include('layouts.message')
                   <div class="left_side_details">
                      <div class="details_title">
                            <h3> {{$pharmacy->name}}. </h3>
							<ul class="list-inline">
								<li>
									<p><img src="/patient/img/icons/location-G.png" class="img-responsive" alt=""/> {{$pharmacy->address}}. </p>
									<p><img src="/patient/img/icons/phone-call-G2.png" class="img-responsive" alt=""/> {{$pharmacy->phone}}, {{$pharmacy->mobile}}. </p>
								</li>	
								<li>
									<img src="/patient/img/icons/icon_user.png" class="img-responsive" alt=""/> {{App\Pharmacist::find($pharmacy->pharmacist_id)->name}} </p>
								</li>

							</ul>

                      </div>
                      <div class="project_d_slider">
                           <div class="demo">
                            <div class="item">
                              <img src="/assets/img/{{$pharmacy->img}}" width="100%" class="img-responsive carousel_imgs" alt=""/>
                            </div>
                        </div>	  
                      </div>

                      <div class="listing-description margin-30">
                        <h3 class="p_d_title_0">Summary </h3>

                          <p>
                          {{$pharmacy->summary}}.
                          </p>
                      </div>
                     
                   
                   </div>
                   
               </div>
               @if(auth()->guard('patient')->user())
               <div class="col-md-4 col-sm-12 col-xs-12"> 
                   <div class="right_side_details">
                       <div class="pos_fixed">
                            <div class="btn_search_col s_search">
                                <a href="#" class="my_btn">
                                <img src="/patient/img/icons/message.png" class="img-responsive" alt=" "/>
                                    Send Message </a>
                           </div>
                           <div class="send_email">
                            <form id="msg_form" method="post" action="{{url('/reply/pharmacist')}}">
                              {{csrf_field()}}
                            <input type="hidden" value="{{$pharmacy->pharmacist_id}}" name="pharmacist_id">
                               <input type="text" name="subject" class="form-control" placeholder="Subject" style="margin-bottom: 10px;">
                                <textarea class="form-control" rows="4" name="body" placeholder="Message body" id="comment"></textarea>
                                  <div class="btn_search_col s_search">
                                    <a href="#" onclick="document.getElementById('msg_form').submit();" class="my_btn"> 
                                        <img src="/patient/img/icons/message.png" class="img-responsive" alt=" "/>
                                        SEND
                                      </a>
                                 </div>
                                 </form>
                           </div>
                       </div>
                   </div>
               </div>
               @endif
            </div>
        </div>  
    </section> 

@endsection