<header id="topnav" class="no-print">
         <div class="topbar-main">
            <div class="container-fluid">
               <!-- Logo container-->
               <div class="logo">
                  <!-- Image Logo --> <a href="" class="logo"><img src="/assets/images/logo.png" alt="" height="40" class="logo-small"> <img src="/assets/images/logo.png" alt="" height="40" class="logo-large"></a>
               </div>
               <!-- End Logo container-->
               <div class="menu-extras topbar-custom">
                  <ul class="list-inline float-right mb-0">
                     @if(auth()->guard('doctor')->user())
                     <!-- Messages-->
                     <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><i class="mdi mdi-email-outline noti-icon"></i> <span class="badge badge-warning badge-pill noti-icon-badge">{{App\Message::latest('created_at', 'patient_id')->where('doctor_id',auth()->guard('doctor')->user()->id)->where('from_status',3)->where('seen',0)->count()}}</span></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-animated dropdown-menu-lg">
                           <!-- item-->
                           <div class="dropdown-item noti-title">
                              <span class="badge badge-danger float-right">{{App\Message::latest('created_at', 'patient_id')->where('doctor_id',auth()->guard('doctor')->user()->id)->where('from_status',3)->count()}}</span>
                              <h5>Messages</h5>
                           </div>
                           <?php $messages=App\Message::latest('created_at', 'patient_id')->where('doctor_id',auth()->guard('doctor')->user()->id)->where('from_status',3)->get();  ?>
                           <div class="slimscroll" style="max-height: 200px;">
                             
                              @foreach($messages as $message) 
                              <a href="{{url('/doctor/messages')}}" class="dropdown-item notify-item">
                                 <div class="notify-icon"><img src="/assets/img/{{App\Patient::where('id',$message->patient_id)->first()->img}}" alt="user-img" class="img-fluid rounded-circle"> </div>
                                 <p class="notify-details"><b>{{App\Patient::where('id',$message->patient_id)->first()->name }}</b><span class="text-muted">{{$message->subject}}</span></p>
                              </a>
                              @endforeach

                           </div>
                        </div>

                        
                     <li class="list-inline-item dropdown notification-list">
                        <label style="color: white;">{{auth()->guard('doctor')->user()->name}} </label><a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><img  src="/assets/img/{{auth()->guard('doctor')->user()->img}}" alt="user" class="rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                           <a class="dropdown-item" href="{{url('/doctor/profile',['id'=>auth()->guard('doctor')->user()->id])}}"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>  
                           <a class="dropdown-item" href="{{url('/doctor/hospital',['id'=>auth()->guard('doctor')->user()->id])}}"><i class="fa fa-hospital-o"></i> My Hospital</a> 
                         <a class="dropdown-item" href="{{url('/doctor/logout')}}"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a></div>
                     </li>
                      @endif

                      @if(auth()->guard('pharmacist')->user())
                      <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><i class="mdi mdi-email-outline noti-icon"></i> <span class="badge badge-warning badge-pill noti-icon-badge">{{App\Message::latest('created_at', 'patient_id')->where('pharmacist_id',auth()->guard('pharmacist')->user()->id)->where('from_status',3)->where('seen',0)->count()}}</span></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-animated dropdown-menu-lg">
                           <!-- item-->
                           <div class="dropdown-item noti-title">
                              <span class="badge badge-danger float-right">{{App\Message::latest('created_at', 'patient_id')->where('doctor_id',auth()->guard('pharmacist')->user()->id)->where('from_status',3)->count()}}</span>
                              <h5>Messages</h5>
                           </div>
                           <?php $messages=App\Message::latest('created_at', 'patient_id')->where('pharmacist_id',auth()->guard('pharmacist')->user()->id)->where('seen',0)->where('from_status',3)->get();  ?>
                           <div class="slimscroll" style="max-height: 200px;">
                             
                              @foreach($messages as $message) 
                              <a href="{{url('/pharmacist/messages')}}" class="dropdown-item notify-item">
                                 <div class="notify-icon"><img src="/assets/img/{{App\Patient::where('id',$message->patient_id)->first()->img}}" alt="user-img" class="img-fluid rounded-circle"> </div>
                                 <p class="notify-details"><b>{{App\Patient::where('id',$message->patient_id)->first()->name }}</b><span class="text-muted">{{$message->subject}}</span></p>
                              </a>
                              @endforeach

                           </div>
                        </div>

                     <li class="list-inline-item dropdown notification-list">
                        <label style="color: white;">{{auth()->guard('pharmacist')->user()->name}} </label><a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><img  src="/assets/img/{{auth()->guard('pharmacist')->user()->img}}" alt="user" class="rounded-circle"></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                           <a class="dropdown-item" href="{{url('/pharmacist/profile',['id'=>auth()->guard('pharmacist')->user()->id])}}"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>  
                           <a class="dropdown-item" href="{{url('/pharmacist/pharmacy',['id'=>auth()->guard('pharmacist')->user()->id])}}"><i class="mdi mdi-pharmacy"></i> My Pharmacy</a> 
                         <a class="dropdown-item" href="{{url('/pharmacist/logout')}}"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a></div>
                     </li>
                      @endif
                     <li class="menu-item list-inline-item">
                        <a class="navbar-toggle nav-link">
                           <div class="lines"><span></span> <span></span> <span></span></div>
                        </a>
                     </li>
                  </ul>
               </div>
               <!-- end menu-extras -->
               <div class="clearfix"></div>
            </div>
         </div>
         <div class="navbar-custom">
            <div class="container-fluid">
               <div id="navigation">
                  <!-- Navigation Menu-->
                  <ul class="navigation-menu">
                     @if(auth()->guard('doctor')->user())
                     <li class="has-submenu"><a href="{{url('doctor/home')}}"><i class="dripicons-home"></i>Home</a></li>
                     <li class="has-submenu"><a href="{{url('doctor/patients')}}"><i class="dripicons-user-group"></i>Patients</a></li>
                     <li class="has-submenu"><a href="{{url('doctor/prescriptions')}}"><i class="dripicons-document-edit"></i>Prescriptions</a></li>
                     <li class="has-submenu">
                        <a href="{{url('doctor/messages')}}"><i class="dripicons-message"></i>Recieved Messages</a>
                     </li>
                     <li class="has-submenu">
                        <a href="{{url('doctor/sent')}}"><i class="dripicons-message"></i> Sent Messages</a>
                     </li>
                     @endif
                     
                     @if(auth()->guard('pharmacist')->user())
                     <li class="has-submenu"><a href="{{url('pharmacist/home')}}"><i class="dripicons-home"></i>Home</a></li>
                     <li class="has-submenu"><a href="{{url('pharmacist/patients')}}"><i class="dripicons-user-group"></i>Patients</a></li>
                     <li class="has-submenu"><a href="{{url('pharmacist/prescriptions')}}"><i class="dripicons-document-edit"></i>Prescriptions</a></li>
                     <li class="has-submenu">
                        <a href="{{url('pharmacist/messages')}}"><i class="dripicons-message"></i>Recieved Messages</a>
                     </li>
                     <li class="has-submenu">
                        <a href="{{url('pharmacist/sent')}}"><i class="dripicons-message"></i> Sent Messages</a>
                     </li>
                     @endif
                  </ul>
                  <!-- End navigation menu -->
               </div>
               <!-- end #navigation -->
            </div>
            <!-- end container -->
         </div>
         <!-- end navbar-custom -->
      </header>