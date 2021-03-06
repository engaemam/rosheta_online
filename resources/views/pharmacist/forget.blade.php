<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
      <title>Rosheta-Online</title>
      <meta content="Admin Dashboard" name="description">
      <meta content="ThemeDesign" name="author">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
      <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
   </head>
   <body class="pb-0">
      <!-- Loader -->
      <div id="preloader">
         <div id="status">
            <div class="spinner"></div>
         </div>
      </div>
      <!-- Begin page -->
      <div class="accountbg">
         <div class="content-center">
            <div class="content-desc-center">
               <div class="container">
                  <div class="row justify-content-center">
                     <div class="col-lg-5 col-md-8">
                        <div class="card">
                           <div class="card-body">
                              <h3 class="text-center mt-0 m-b-15"><a href="" class="logo logo-admin"><img src="/assets/images/logo-dark.png" height="40" alt="logo"></a></h3>
                              <h4 class="text-muted text-center font-18"><b>Pharmacist Forgot Password</b></h4>
                              @include('layouts.message')
                              <div class="p-2">
                                 <form class="form-horizontal m-t-20" method="post" id="doc_log" action="{{url('/pharmacist/forget')}}">
                                    {{csrf_field()}}
                                    <div class="form-group row">

                                       <div class="col-12"><input class="form-control" name="email" value="{{old('email')}}" type="text" required="" placeholder="Email"></div>
                                    </div>
                                    
                                    <div class="form-group text-center row m-t-20">
                                       <div class="col-12"><button  onclick="document.getElementById('doc_log').submit();" class="btn btn-primary btn-block waves-effect waves-light" type="submit">Send Reset Email</button></div>
                                    </div>
                                    
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end row -->
               </div>
            </div>
         </div>
      </div>
<script src="/assets/js/jquery.min.js"></script><script src="/assets/js/bootstrap.bundle.min.js"></script><script src="/assets/js/modernizr.min.js"></script><script src="/assets/js/detect.js"></script><script src="/assets/js/fastclick.js"></script><script src="/assets/js/jquery.slimscroll.js"></script><script src="/assets/js/jquery.blockUI.js"></script><script src="/assets/js/waves.js"></script><!-- App js --><script src="/assets/js/app.js"></script>
   </body>
</html>