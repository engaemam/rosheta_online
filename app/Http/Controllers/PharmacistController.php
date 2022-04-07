<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Message;
use App\Pharmacist;
use App\Pharmacy;
use App\Patient;
use App\Prescription;
use App\Item;
use DB;
use Mail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Mail\PharmacistResetPassword;
class PharmacistController extends Controller
{
    
    public function forget_password(){
        return view('pharmacist.forget');

    }



    public function home(){
        return view('pharmacist.home');

    }

    public function patients(){
    	$patients=Patient::all();
        return view('pharmacist.patients',compact(['patients']));

    }

    public function prescription($id){
    	$prescription=Prescription::find($id);
        return view('pharmacist.prescription',compact(['prescription']));

    }


    public function prescriptions(){
    	$prescriptions=Prescription::all();
        return view('pharmacist.prescriptions',compact(['prescriptions']));

    }

    public function messages(){
    	$messages=Message::latest('created_at', 'patient_id')->where('pharmacist_id',auth()->guard('pharmacist')->user()->id)->where('from_status',3)->get();
			foreach($messages as $message) {
			    $message->seen = 1;
			    $message->save();
			}
        return view('pharmacist.messages',compact(['messages']));

    }

    public function sent(){
    	$messages=Message::latest('created_at', 'patient_id')->where('pharmacist_id',auth()->guard('pharmacist')->user()->id)->where('to_status',3)->get();
        return view('pharmacist.sent',compact(['messages']));

    }

    public function pharmacy($id){
    	$pharmacy=Pharmacy::where('pharmacist_id',$id)->first();
    	//dd($pharmacy);
        return view('pharmacist.pharmacy',compact(['pharmacy']));

    }

    public function reply(Request $request){

        $data=$this->validate(request(),[
            'subject'=>'required',
            'body'=>'required',
            ],[
                'body'=>'Body',
                'subject'=>'Subject',
        ]);
        $msg=new Message();
        $msg->patient_id=$request->patient_id;
        $msg->body=$request->body;
        $msg->pharmacist_id=auth()->guard('pharmacist')->user()->id;
        $msg->from_status=2;
        $msg->to_status=3;
        $msg->subject=$request->subject;
        $msg->save();
        return back()->with(['success'=>'your Message sent successfully....']);
    }



    public function edit_pharmacy(Request $request){
        $data=$this->validate(request(),[
            'name'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'country'=>'required',
            'summary'=>'required',
            ],[
                'name'=>' name',
                'address'=>'address',
                'country'=>'Country',
                'mobile'=>'Mobile',
                'summary'=>'pharmacy summary',

        ]);

        
        	$pharmacy=Pharmacy::find($request->pharmacy_id);
	        $pharmacy->summary=$request->summary;
	        $pharmacy->name=$request->name;
	        $pharmacy->address=$request->address;
	        $pharmacy->phone=$request->phone;
	        $pharmacy->mobile=$request->mobile;
	        $pharmacy->country=$request->country;
	        $file = $request->file('pharmacy_img');
	        if($file){
	        $filename = time() . '.' . $file->getClientOriginalName();
	        $path = 'assets/img';
	        $file->move($path, $filename);
	        $pharmacy->img=$filename;
	        }
	        
	        $pharmacy->save();
	       return back()->with('success','Pharmacy information updated successfully');
        
        
   
    }

    public function profile($id){
    	$profile=Pharmacist::find($id);
        return view('pharmacist.profile',compact(['profile']));

    }

    public function patient($id){
    	$prescriptions=Prescription::where('patient_id',$id)->get();
    	$profile=Patient::find($id);
        return view('pharmacist.patient',compact(['profile','prescriptions']));

    }

    public function reset($token){
        $check=DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        if(!empty($check)){
            return view('pharmacist.reset_password',['data'=>$check]);
        }
        else{
           return view('pharmacist.forget');  
        }

    }

    public function reset_final($token){
        $this->validate(request(),[
                'password'=>'required|confirmed'
        ]);
        $check=DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        if(!empty($check)){
            $user=Pharmacist::where('email',$check->email)->update(['email'=>$check->email,'password'=>Hash::make(request('password'))]);
            DB::table('password_resets')->where('email',$check->email)->delete();
            if(auth()->guard('pharmacist')->attempt(['email'=>$check->email,'password'=>request('password')],false)){
            return redirect('/pharmacist/home');
                }
        }else{
            return back()->with(['error'=>'This email exceeds 2 hours ']);
        }

    }

    public function reset_request(Request $request){
        $user=Pharmacist::where('email',$request->email)->first();
        if(!empty($user)){
            $token=app('auth.password.broker')->createToken($user);
            DB::table('password_resets')->insert(['email'=>$user->email,'token'=>$token,'created_at'=>Carbon::now()]);
            Mail::to($user->email)->send(new PharmacistResetPassword(['data'=>$user,'token'=>$token]));
            return back()->with(['success'=>'Reset password email sent successfully']);
        }
        return back()->with(['error'=>'This email does not exist']);
        
    }



	public function edit_profile(Request $request){
		$data=$this->validate(request(),[
            'name'=>'required',
            'password'=>'required',
            'address'=>'required',
            'email'=>'required',
            'biography'=>'required',
            'mobile'=>'required',
            'country'=>'required',
            'bachelor'=>'required',
            ],[
                'img'=>'photo  ',
                'name'=>' name',
                'address'=>'address',
                'email'=>' email ',
                'password'=>'password ',
                'country'=>'Country',
                'mobile'=>'Mobile',
                'bachelor'=>'Bachelor',
                

        ]);
        $pharmacist= Pharmacist::find($request->pharmacist_id);
        $pharmacist->biography=$request->biography;
        $pharmacist->name=$request->name;
        $pharmacist->address=$request->address;
        $pharmacist->email=$request->email;
        $pharmacist->gender=$request->gender;
        $pharmacist->country=$request->country;
        $pharmacist->bachelor=$request->bachelor;
        $pharmacist->mobile=$request->mobile;
        $pharmacist->phone=$request->phone;
        $pharmacist->password=Hash::make($request->password);
        $file=$request->file('img');
        if($file){
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'assets/img';
        $file->move($path, $filename);
        $pharmacist->img=$filename;
        }
        
        $pharmacist->update();
        return back()->with('success','Your profile updated successfully');
   
    }


    
    

    public function login(){
        return view('pharmacist.login');
    }

    public function register(){
        return view('pharmacist.register');
    }

    public function change(){
        

        $patient=Patient::find(1);

        $patient->password=Hash::make('111111');
        $patient->save();

        
        
   
    }


    public function do_register(Request $request){
        $data=$this->validate(request(),[
            'name'=>'required',
            'password'=>'required',
            'address'=>'required',
            'email'=>'required',
            'pharmacy_name'=>'required',
            'biography'=>'required',
            'mobile'=>'required',
            'pharmacy_mobile'=>'required',
            'country'=>'required',
            'pharmacy_country'=>'required',
            'img'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
         	'pharmacy_address'=>'required',
            'summary'=>'required',
            'bachelor'=>'required',
            'pharmacy_img'=>'required|image|mimes:jpeg,png,jpg,gif,svg',],[
            ],[
                'img'=>'photo  ',
                'name'=>' name',
                'address'=>'address',
                'email'=>' email ',
                'password'=>'password ',
                'country'=>'Country',
                'mobile'=>'Mobile',
                'bachelor'=>'Bachelor',
                'pharmacy_address'=>'pharmacy address',
                'pharmacy_name'=>'pharmacy name',
                'summary'=>'pharmacy summary',
                'pharmacy_img'=>'pharmacy photo',
            	'pharmacy_mobile'=>'pharmacy mobile',
            	'pharmacy_country'=>'pharmacy country',

        ]);

        $pharmacist=new Pharmacist();
        $pharmacist->biography=$request->biography;
        $pharmacist->name=$request->name;
        $pharmacist->address=$request->address;
        $pharmacist->email=$request->email;
        $pharmacist->gender=$request->gender;
        $pharmacist->country=$request->country;
        $pharmacist->bachelor=$request->bachelor;
        $pharmacist->mobile=$request->mobile;
        $pharmacist->phone=$request->phone;
        $pharmacist->password=Hash::make($request->password);
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'assets/img';
        $file->move($path, $filename);
        $pharmacist->img=$filename;
        if($pharmacist->save()){
        	$pharmacy=new pharmacy();
        	$pharmacy->pharmacist_id=$pharmacist->id;
	        $pharmacy->summary=$request->summary;
	        $pharmacy->name=$request->pharmacy_name;
	        $pharmacy->address=$request->pharmacy_address;
	        $pharmacy->phone=$request->pharmacy_phone;
	        $pharmacy->mobile=$request->pharmacy_mobile;
	        $pharmacy->country=$request->pharmacy_country;
	        $file = $request->file('pharmacy_img');
	        $filename = time() . '.' . $file->getClientOriginalName();
	        $path = 'assets/img';
	        $file->move($path, $filename);
	        $pharmacy->img=$filename;
	        $pharmacy->save();
	       return back()->with('success','Your information registered successfully');
        }
        
   
    }



    public function check_login(Request $request)
    {   
        $remmberme = $request->remmberme==1?true:false;
        if(auth()->guard('pharmacist')->attempt(['email'=>$request->email,'password'=>$request->password],$remmberme)){
            return redirect('/pharmacist/home');
        }else{
            return back()->with(['error'=>'please enter a valid email and password to login']);
        }
    }

    public function logout()
    {
        auth()->guard('pharmacist')->logout();
        return redirect('/pharmacist/login');

    }
}
