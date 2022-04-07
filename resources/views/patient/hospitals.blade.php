
@extends('patient.layouts.master')

@section('content')
<section class="all-compounds" style="margin-bottom: 100px;">  
        <div class="container">  
            <div class="row">  
              @foreach($hospitals as $hospital)
               <div class="col-md-4 col-sm-12 col-xs-12"> 
                   <a class=" project_block1 project_block2 project_block3" href="{{url('/hospital',['id'=>$hospital->id])}}">
                       <div class="project-img-0">
                           <img src="/assets/img/{{$hospital->img}}" class="img-responsive" alt=""/>
                       </div>
                       
                       <div class=" project_info_02">
                            <h3>{{$hospital->name}} </h3>
                            <p><img src="/patient/img/icons/location-G.png" class="img-responsive" alt=""/>{{$hospital->address}} . </p>
                            <p style="float: left;"><img src="/patient/img/icons/icon_user.png" class="img-responsive" alt=""> {{App\Doctor::find($hospital->doctor_id)->name}}</p>
                           

                       </div>
                   </a>
               </div>
               @endforeach
                <div class="clearfix"></div>
                <ul class="pagination">
                  {{$hospitals}}
                </ul>
            </div>  
        </div>  
    </section>


@endsection