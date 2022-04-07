
    <section class="nav_bar_section navbar-me">
        <nav class="navbar ">
          <div class="container">
            
            <div class="col-md-2">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-logo">
                        <a href="{{url('/')}}">
                        <img src="/patient/img/logo.png" style="padding-top: 20px;"  class="img-responsive" alt="sahmalnour" /> 
                        </a>
                    </div>    
                </div>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="col-md-10">
                    <div class="nav_menu">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{url('/')}}"> Home </a></li>
                            <li><a href="{{url('/patient/hospitals')}}"> Hospitals </a></li>
                            <li><a href="{{url('/patient/pharmacies')}}"> Pharmacies </a></li>
                            <li><a href="{{url('/about')}}"> About </a></li>
                            @if(auth()->guard('patient')->user())
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="fa fa-user"></span> {{auth()->guard('patient')->user()->name}}<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="{{url('/history/patient')}}"> Medical History </a></li>
                                  <li><a href="{{url('/sent')}}"> Sent </a></li>
                                  <li><a href="{{url('/messages')}}"> Messages </a></li>
                                  <li><a href="{{url('/patient/profile')}}"> My profile </a></li>
                                  <li><a href="{{url('/patient/logout')}}"> Logout </a></li>
                                </ul>
                            </li>
                            @endif

                            
                        <div class="left-s_menu">
                         @if(!auth()->guard('patient')->user()&&!auth()->guard('pharmacist')->user()&&!auth()->guard('doctor')->user())
                            <div class="btn-register">
                                <a href="{{url('/patient/login')}}"> Log In</a>
                            </div>
                            <div class="btn-register">
                                <a href="{{url('/patient/register')}}"> Register</a>
                            </div>
                             @endif
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </nav>
    </section>
    

    
     
    <section class="">  
        <div class="container">  
            <div class="row"> 
               <div class="col-md-12 col-sm-12 col-xs-12"> 

               </div>
            </div> 
        </div> 
    </section> 

