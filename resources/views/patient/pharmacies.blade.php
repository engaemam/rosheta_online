
@extends('patient.layouts.master')

@section('content')
<section class="all-compounds" style="margin-bottom: 100px;">  
        <div class="container">  
            <div class="row">  
              @foreach($pharmacies as $pharmacy)
               <div class="col-md-4 col-sm-12 col-xs-12"> 
                   <a class=" project_block1 project_block2 project_block3" href="{{url('/pharmacy',['id'=>$pharmacy->id])}}">
                       <div class="project-img-0">
                           <img src="/assets/img/{{$pharmacy->img}}" class="img-responsive" alt=""/>
                       </div>
                       
                       <div class=" project_info_02">
                            <h3>{{$pharmacy->name}} </h3>
                            <p><img src="/patient/img/icons/location-G.png" class="img-responsive" alt=""/>{{$pharmacy->address}} . </p>
                            <p style="float: left;"><img src="/patient/img/icons/icon_user.png" class="img-responsive" alt=""> {{App\Pharmacist::find($pharmacy->pharmacist_id)->name}}</p>
                           

                       </div>
                   </a>
               </div>
               @endforeach
                <div class="clearfix"></div>
                <ul class="pagination">
                  {{$pharmacies}}
                </ul>
            </div>  
        </div>  
    </section>


@endsection