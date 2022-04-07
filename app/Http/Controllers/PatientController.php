<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Pharmacy;
use App\Patient;
use App\Message;
use App\Prescription;
use DB;
use Mail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Mail\PatientResetPassword;
class PatientController extends Controller
{
    public function home(){
    	$hospitals=Hospital::take(3)->get();
    	$pharmacies=Pharmacy::take(3)->get();
        return view('patient.home',compact(['hospitals','pharmacies']));

    }

    public function login(){
        return view('patient.login');
    }

    public function register(){
        return view('patient.register');
    }

    public function about(){
        return view('patient.about');
    }

    public function hospital($id){
    	$hospital=Hospital::find($id);
        return view('patient.hospital',compact(['hospital']));
    }

    public function profile(){
    	$profile=Patient::find(auth()->guard('patient')->user()->id);
        return view('patient.profile',compact(['profile']));
    }

    public function pharmacy($id){
    	$pharmacy=Pharmacy::find($id);
        return view('patient.pharmacy',compact(['pharmacy']));
    }

    public function hospitals(){
        $hospitals=Hospital::paginate(3);
        return view('patient.hospitals' ,compact(['hospitals']));
    }
    public function pharmacies(){
        $pharmacies=Pharmacy::paginate(3);
        return view('patient.pharmacies' ,compact(['pharmacies']));
    }

    public function check_login(Request $request)
    {   
        $remmberme = $request->remmberme==1?true:false;
        if(auth()->guard('patient')->attempt(['email'=>$request->email,'password'=>$request->password],$remmberme)){
            return redirect('/');
        }else{
            return back()->with(['error'=>'please enter a valid email and password to login']);
        }
    }

    public function do_register(Request $request){
        $data=$this->validate(request(),[
            'name'=>'required',
            'password'=>'required',
            'address'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'country'=>'required',
            'pid'=>'required',
            'summary'=>'required',
            'age'=>'required',
            'img'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            ],[
                'pid'=>'Patient ID',
                'name'=>' Name',
                'address'=>'Address',
                'email'=>' Pmail ',
                'password'=>'Password',
                'country'=>'Country',
                'mobile'=>'Mobile',
                'summary'=>'Patient summary',
                'img'=>'photo'

        ]);

        $patient=new Patient();
        $patient->summary=$request->summary;
        $patient->name=$request->name;
        $patient->pid=$request->pid;
        $patient->address=$request->address;
        $patient->email=$request->email;
        $patient->gender=$request->gender;
        $patient->country=$request->country;
        $patient->age=$request->age;
        $patient->gender=$request->gender;
        $patient->mobile=$request->mobile;
        $patient->phone=$request->phone;
        $patient->password=Hash::make($request->password);
        $file = $request->file('img');
        if($file){
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'assets/img';
        $file->move($path, $filename);
        $patient->img=$filename;
        }
        $patient->save();
        
	       return back()->with('success','Patient information registered successfully');
        
   
    }

    public function messages(){
    	$messages=Message::latest('created_at', 'patient_id')->where('patient_id',auth()->guard('patient')->user()->id)->where('to_status',3)->get();
        
        return view('patient.messages',compact(['messages']));

    }

    public function sent(){
    	$messages=Message::latest('created_at', 'patient_id')->where('patient_id',auth()->guard('patient')->user()->id)->where('from_status',3)->get();
        return view('patient.sent',compact(['messages']));

    }

    public function reply_doctor(Request $request){

        $data=$this->validate(request(),[
            'subject'=>'required',
            'body'=>'required',
            ],[
                'body'=>'Body',
                'subject'=>'Subject',
        ]);
        $msg=new Message();
        $msg->doctor_id=$request->doctor_id;
        $msg->body=$request->body;
        $msg->patient_id=auth()->guard('patient')->user()->id;
        $msg->from_status=3;
        $msg->to_status=1;
        $msg->subject=$request->subject;
        $msg->save();
        return back()->with(['success'=>'your Message sent successfully....']);
    }


    public function reply_pharmacist(Request $request){

        $data=$this->validate(request(),[
            'subject'=>'required',
            'body'=>'required',
            ],[
                'body'=>'Body',
                'subject'=>'Subject',
        ]);
        $msg=new Message();
        $msg->pharmacist_id=$request->pharmacist_id;
        $msg->body=$request->body;
        $msg->patient_id=auth()->guard('patient')->user()->id;
        $msg->from_status=3;
        $msg->to_status=2;
        $msg->subject=$request->subject;
        $msg->save();
        return back()->with(['success'=>'your Message sent successfully....']);
    }

    public function history(){
    	$prescriptions=Prescription::where('patient_id',auth()->guard('patient')->user()->id )->get();
        
        return view('patient.history',compact(['prescriptions']));

    }

    public function prescription($id){
    	$prescription=Prescription::find($id);
        return view('patient.prescription',compact(['prescription']));

    }

    public function edit_profile(Request $request){
        $data=$this->validate(request(),[
            'name'=>'required',
            'password'=>'required',
            'address'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'country'=>'required',
            'pid'=>'required',
            'summary'=>'required',
            'age'=>'required',
            ],[
                'pid'=>'Patient ID',
                'name'=>' Name',
                'address'=>'Address',
                'email'=>' Pmail ',
                'password'=>'Password',
                'country'=>'Country',
                'mobile'=>'Mobile',
                'summary'=>'Patient summary',

        ]);

        $patient=Patient::find(auth()->guard('patient')->user()->id);
        $patient->summary=$request->summary;
        $patient->name=$request->name;
        $patient->pid=$request->pid;
        $patient->address=$request->address;
        $patient->email=$request->email;
        $patient->country=$request->country;
        $patient->age=$request->age;
        $patient->mobile=$request->mobile;
        $patient->phone=$request->phone;
        $patient->password=Hash::make($request->password);
        $file = $request->file('img');
        if($file){
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'assets/img';
        $file->move($path, $filename);
        $patient->img=$filename;
        }
        $patient->update();
        
	   return back()->with('success','Your information updated successfully');
        
   
    }

     public function forget_password(){
        return view('patient.forget');

    }

    public function reset($token){
        $check=DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        if(!empty($check)){
            return view('patient.reset_password',['data'=>$check]);
        }
        else{
           // DB::table('password_resets')->where('email','mostafadeveloper2016@gmail.com')->delete();
           return view('patient.forget');  
        }

    }

    public function reset_final($token){
        $this->validate(request(),[
                'password'=>'required|confirmed'
        ]);
        $check=DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        if(!empty($check)){
            $user=Patient::where('email',$check->email)->update(['email'=>$check->email,'password'=>Hash::make(request('password'))]);
            DB::table('password_resets')->where('email',$check->email)->delete();
            if(auth()->guard('patient')->attempt(['email'=>$check->email,'password'=>request('password')],false)){
            return redirect('/');
                }
        }else{
            return back()->with(['error'=>'This email exceeds 2 hours ']);
        }

    }

    public function reset_request(Request $request){
        $user=Patient::where('email',$request->email)->first();
        if(!empty($user)){
            $token=app('auth.password.broker')->createToken($user);
            DB::table('password_resets')->insert(['email'=>$user->email,'token'=>$token,'created_at'=>Carbon::now()]);
            Mail::to($user->email)->send(new PatientResetPassword(['data'=>$user,'token'=>$token]));
            return back()->with(['success'=>'Reset password email sent successfully']);
        }
        return back()->with(['error'=>'This email does not exist']);
        
    }



    public function logout()
    {
        auth()->guard('patient')->logout();
        return redirect('/patient/login');

    }


}
