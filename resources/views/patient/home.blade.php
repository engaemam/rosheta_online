
@extends('patient.layouts.master')

@section('content')
@include('patient.layouts.carousel')
    <section class="newly_added_projects"> 
        <div class="container">  
            <div class="row">  
                <div class="main_sec_title">
                    <h3> From Our Hospitals </h3>
                </div>
                @foreach($hospitals as $hospital)
                <div class="col-md-4 col-sm-6 col-xs-12"> 
                    <div class="m_realestate_block">  
                        <div class="m_realestate_block_img">  
                            <a href="{{url('/hospital',['id'=>$hospital->id])}}"> <img src="/assets/img/{{$hospital->img}}" class="img-responsive" alt="" /> </a>
                        </div>  
                        <div class="m_realestate_details">  
                           <div class="m_realestate_block_info"> 
                               <h3><a href="{{url('/hospital',['id'=>$hospital->id])}}"> {{$hospital->name}}. </a></h3>
                                <p><img src="/patient/img/icons/location-B.png" class="img-responsive" alt=""/> {{$hospital->address}}. </p>
                            </div>  
                            
                            <div class="m_realestate_item_more_info_01 ">  
                                <ul class="list-inline">
                                    <li>
                                        <img src="/patient/img/icons/icon_user.png" class="img-responsive" alt=""> {{App\Doctor::where('id',$hospital->doctor_id)->first()->name }} 
                                    </li>                                    
                                    
                                </ul>
                            </div> 
                        </div> 
                    </div> 
                </div>
                @endforeach


                <div class="clearfix"></div>
                <div class="btn_site">
                    <a href="{{url('/patient/hospitals')}}" class="main_btn_1 ">  see all </a>
                </div>
            </div>  
            </div>  
    </section> 


     <section class="newly_added_projects"> 
        <div class="container">  
            <div class="row">  
                <div class="main_sec_title">
                    <h3> From Our Pharmacies </h3>
                </div>
                @foreach($pharmacies as $pharmacy)
                <div class="col-md-4 col-sm-6 col-xs-12"> 
                    <div class="m_realestate_block">  
                        <div class="m_realestate_block_img">  
                            <a href="{{url('/pharmacy',['id'=>$pharmacy->id])}}"> <img src="/assets/img/{{$pharmacy->img}}" class="img-responsive" alt="" /> </a>
                        </div>  
                        <div class="m_realestate_details">  
                           <div class="m_realestate_block_info"> 
                               <h3><a href="{{url('/pharmacy',['id'=>$pharmacy->id])}}"> {{$pharmacy->name}}. </a></h3>
                                <p><img src="/patient/img/icons/location-B.png" class="img-responsive" alt=""/> {{$pharmacy->address}}. </p>
                            </div>  
                            
                            <div class="m_realestate_item_more_info_01 ">  
                                <ul class="list-inline">
                                    <li>
                                        <img src="/patient/img/icons/icon_user.png" class="img-responsive" alt=""> {{App\Pharmacist::where('id',$pharmacy->pharmacist_id)->first()->name }} 
                                    </li>                                    
                                    
                                </ul>
                            </div> 
                        </div> 
                    </div> 
                </div>
                @endforeach
                
                
                <div class="clearfix"></div>
                <div class="btn_site">
                    <a href="{{url('/patient/pharmacies')}}" class="main_btn_1 ">  see all </a>
                </div>
            </div>  
            </div>  
    </section> 

@endsection