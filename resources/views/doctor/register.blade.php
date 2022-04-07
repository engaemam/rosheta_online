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
                     <div class="col-lg-8 col-md-8">
                        <div class="card">
                           <div class="card-body">
                              <h3 class="text-center mt-0 m-b-15"><a href="" class="logo logo-admin"><img src="/assets/images/logo-dark.png" height="40" alt="logo"></a></h3>
                              <h3 class="text-muted text-center font-18"><b>Register Personal information & Your Hospital Information</b></h3>
                              @include('layouts.message')
                              <div class="p-3">
                                 <form class="form-horizontal" id="doc_reg" method="post" enctype="multipart/form-data" action="{{url('/doctor/doregister')}}">
                                    {{csrf_field()}}
                                    <div class="form-group row">
                                       <div class="col-6"><input class="form-control" value="{{old('name')}}"  type="text" name="name" required="" placeholder="Your name"></div>
                                       <div class="col-6"><input class="form-control" value="{{old('hospital_name')}}"  type="text" name="hospital_name" required="" placeholder="Hospital name"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6"><input class="form-control" value="{{old('email')}}"  name="email" type="email" required="" placeholder="Your email"></div>
                                       <div class="col-6"><input class="form-control"value="{{old('hospital_country')}}"  name="hospital_country" type="text" required="" placeholder="Hospital country name"></div>
                                    </div>
                                    <div class="form-group row">
                                       <div class="col-6"><input class="form-control"  name="password" type="password" required="" placeholder="Your password"></div>
                                       <div class="col-6"><input class="form-control" value="{{old('hospital_address')}}"  name="hospital_address" type="text" required="" placeholder="Hospital address"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6"><input class="form-control" name="address" value="{{old('address')}}"  type="text" required="" placeholder="Your address"></div>
                                       <div class="col-6"><input class="form-control" value="{{old('hospital_cost')}}"  name="hospital_cost" type="text" required="" placeholder="Hospital examine cost"></div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-6"><input class="form-control" name="phone" value="{{old('phone')}}"  type="text" required="" placeholder="Your phone"></div>
                                       <div class="col-6"><input class="form-control" value="{{old('hospital_phone')}}"  name="hospital_phone" type="text" required="" placeholder="Hospital phone"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6"><input class="form-control" value="{{old('mobile')}}" name="mobile" type="text" required="" placeholder="Your mobile"></div>
                                       <div class="col-6"><input class="form-control" value="{{old('hospital_mobile')}}" name="hospital_mobile" type="text" required="" placeholder="Hospital mobile"></div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-6"><span class="btn btn-primary btn-file" style="margin-bottom: 5px;">
                                          <i class="fa fa-image"></i> Your photo <input class="form-control" name="img" style=" opacity:0; height: 10px; width: 50px;" type="file" required="" ></span></div>
                                       <div class="col-6"><span class="btn btn-primary btn-file" style="margin-bottom: 5px;">
                                          <i class="fa fa-image"></i> Hospital photo <input class="form-control" name="hospital_img" style=" opacity:0; height: 10px; width: 50px;" type="file" required="" ></span></div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-6" >
                                          <select name="gender" class="form-control">
                                             <option value="1">Male</option>
                                             <option value="2">Female</option>
                                          </select>
                                        </div>
                                       <div class="col-6"><input class="form-control"  name="bachelor" type="text" required="" placeholder="Your bachelor "></div>
                                    </div>
                                     <div class="form-group row">
                                     
                                       <div class="col-6"><input class="form-control" value="{{old('country')}}"  name="country" type="text" required="" placeholder="Your country "></div>
                                    </div>
                                    <div class="form-group row">
                                       
                                       <div class="col-12"> <textarea class="form-control" rows="5" name="summary" type="text" required="" placeholder="Hospital details">{{old('summary')}}</textarea> </div>
                                    </div>
                                    <div class="form-group row">
                                       
                                       <div class="col-12"> <textarea class="form-control" rows="5" name="biography" type="text" required="" placeholder="Your biography">{{old('biography')}}</textarea> </div>
                                    </div>

                                    <div class="form-group text-center row m-t-20">
                                       <div class="col-12"><button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register</button></div>
                                    </div>
                                    <div class="form-group m-t-10 mb-0 row">
                                       <div class="col-12 m-t-20 text-center"><a href="{{url('/doctor/register')}}"   class="text-muted">Already have account?</a></div>
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
      <!-- jQuery  --><script src="/assets/js/jquery.min.js"></script><script src="/assets/js/bootstrap.bundle.min.js"></script><script src="/assets/js/modernizr.min.js"></script><script src="/assets/js/detect.js"></script><script src="/assets/js/fastclick.js"></script><script src="/assets/js/jquery.slimscroll.js"></script><script src="/assets/js/jquery.blockUI.js"></script><script src="/assets/js/waves.js"></script><!-- App js --><script src="/assets/js/app.js"></script>
   </body>

</html>