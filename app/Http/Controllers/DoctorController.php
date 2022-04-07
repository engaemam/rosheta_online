<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Doctor;
use App\Hospital;
use App\Patient;
use App\Prescription;
use App\Item;
use DB;
use Mail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Mail\DoctorResetPassword;
class DoctorController extends Controller
{
    //

    public function forget_password(){
        return view('doctor.forget');

    }



    public function home(){
        return view('doctor.home');

    }

    public function patients(){
    	$patients=Patient::all();
        return view('doctor.patients',compact(['patients']));

    }

    public function prescription($id){
    	$prescription=Prescription::find($id);
        return view('doctor.prescription',compact(['prescription']));

    }


    public function prescriptions(){
    	$prescriptions=Prescription::all();
        return view('doctor.prescriptions',compact(['prescriptions']));

    }

    public function messages(){
    	$messages=Message::latest('created_at', 'patient_id')->where('doctor_id',auth()->guard('doctor')->user()->id)->where('from_status',3)->get();
        foreach($messages as $message) {
                $message->seen = 1;
                $message->save();
            }
    	//dd($messages);
        return view('doctor.messages',compact(['messages']));

    }

    public function sent(){
    	$messages=Message::latest('created_at', 'patient_id')->where('doctor_id',auth()->guard('doctor')->user()->id)->where('to_status',3)->get();
        return view('doctor.sent',compact(['messages']));

    }

    public function hospital($id){
    	$hospital=Hospital::where('doctor_id',$id)->first();
    	//dd($hospital);
        return view('doctor.hospital',compact(['hospital']));

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
        $msg->doctor_id=auth()->guard('doctor')->user()->id;
        $msg->from_status=1;
        $msg->to_status=3;
        $msg->subject=$request->subject;
        $msg->save();
        return back()->with(['success'=>'your Message sent successfully....']);
    }



    public function edit_hospital(Request $request){
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
                'summary'=>'Hospital summary',

        ]);

        
        	$hospital=Hospital::find($request->hospital_id);
	        $hospital->summary=$request->summary;
	        $hospital->name=$request->name;
	        $hospital->address=$request->address;
	        $hospital->phone=$request->phone;
	        $hospital->mobile=$request->mobile;
	        $hospital->country=$request->country;
	        $hospital->ex_price=$request->ex_price;
	        $file = $request->file('hospital_img');
	        if($file){
	        $filename = time() . '.' . $file->getClientOriginalName();
	        $path = 'assets/img';
	        $file->move($path, $filename);
	        $hospital->img=$filename;
	        }
	        
	        $hospital->save();
	       return back()->with('success','Hospital information updated successfully');
        
        
   
    }

    public function profile($id){
    	$profile=Doctor::find($id);
        return view('doctor.profile',compact(['profile']));

    }

    public function patient($id){
    	$prescriptions=Prescription::where('patient_id',$id)->get();
    	$profile=Patient::find($id);
        return view('doctor.patient',compact(['profile','prescriptions']));

    }

    

    public function reset($token){
        $check=DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        if(!empty($check)){
            return view('doctor.reset_password',['data'=>$check]);
        }
        else{
           return view('doctor.forget');  
        }

    }

    public function reset_final($token){
        $this->validate(request(),[
                'password'=>'required|confirmed'
        ]);
        $check=DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
        if(!empty($check)){
            $user=Doctor::where('email',$check->email)->update(['email'=>$check->email,'password'=>Hash::make(request('password'))]);
            DB::table('password_resets')->where('email',$check->email)->delete();
            if(auth()->guard('doctor')->attempt(['email'=>$check->email,'password'=>request('password')],false)){
            return redirect('/doctor/home');
                }
        }else{
            return back()->with(['error'=>'This email exceeds 2 hours ']);
        }

    }

    public function reset_request(Request $request){
        $user=Doctor::where('email',$request->email)->first();
        if(!empty($user)){
            $token=app('auth.password.broker')->createToken($user);
            DB::table('password_resets')->insert(['email'=>$user->email,'token'=>$token,'created_at'=>Carbon::now()]);
            Mail::to($user->email)->send(new DoctorResetPassword(['data'=>$user,'token'=>$token]));
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
        $doctor= Doctor::find($request->doctor_id);
        $doctor->biography=$request->biography;
        $doctor->name=$request->name;
        $doctor->address=$request->address;
        $doctor->email=$request->email;
        $doctor->gender=$request->gender;
        $doctor->country=$request->country;
        $doctor->bachelor=$request->bachelor;
        $doctor->mobile=$request->mobile;
        $doctor->phone=$request->phone;
        $doctor->password=Hash::make($request->password);
        $file=$request->file('img');
        if($file){
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'assets/img';
        $file->move($path, $filename);
        $doctor->img=$filename;
        }
        
        $doctor->update();
        return back()->with('success','Your profile updated successfully');
   
    }


    
    

    public function login(){
        return view('doctor.login');
    }

    public function register(){
        return view('doctor.register');
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
            'hospital_name'=>'required',
            'biography'=>'required',
            'mobile'=>'required',
            'hospital_mobile'=>'required',
            'country'=>'required',
            'hospital_country'=>'required',
            'img'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
         	'hospital_address'=>'required',
            'summary'=>'required',
            'bachelor'=>'required',
            'hospital_img'=>'required|image|mimes:jpeg,png,jpg,gif,svg',],[
            ],[
                'img'=>'photo  ',
                'name'=>' name',
                'address'=>'address',
                'email'=>' email ',
                'password'=>'password ',
                'country'=>'Country',
                'mobile'=>'Mobile',
                'bachelor'=>'Bachelor',
                'hospital_address'=>'Hospital address',
                'hospital_name'=>'Hospital name',
                'summary'=>'Hospital summary',
                'hospital_img'=>'Hospital photo',
            	'hospital_mobile'=>'Hospital mobile',
            	'hospital_country'=>'Hospital country',

        ]);

        $doctor=new Doctor();
        $doctor->biography=$request->biography;
        $doctor->name=$request->name;
        $doctor->address=$request->address;
        $doctor->email=$request->email;
        $doctor->gender=$request->gender;
        $doctor->country=$request->country;
        $doctor->bachelor=$request->bachelor;
        $doctor->mobile=$request->mobile;
        $doctor->phone=$request->phone;
        $doctor->password=Hash::make($request->password);
        $file = $request->file('img');
        $filename = time() . '.' . $file->getClientOriginalName();
        $path = 'assets/img';
        $file->move($path, $filename);
        $doctor->img=$filename;
        if($doctor->save()){
        	$hospital=new Hospital();
        	$hospital->doctor_id=$doctor->id;
	        $hospital->summary=$request->summary;
	        $hospital->name=$request->hospital_name;
	        $hospital->address=$request->hospital_address;
	        $hospital->phone=$request->hospital_phone;
	        $hospital->mobile=$request->hospital_mobile;
	        $hospital->country=$request->hospital_country;
	        $hospital->ex_price=$request->hospital_cost;
	        $file = $request->file('hospital_img');
	        $filename = time() . '.' . $file->getClientOriginalName();
	        $path = 'assets/img';
	        $file->move($path, $filename);
	        $hospital->img=$filename;
	        $hospital->save();
	       return back()->with('success','Your information registered successfully');
        }
        
   
    }


    public function edit_patient(Request $request){
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

        $patient=Patient::find($request->patient_id);
        $patient->summary=$request->summary;
        $patient->name=$request->name;
        $patient->pid=$request->pid;
        $patient->address=$request->address;
        $patient->email=$request->email;
        //$patient->gender=$request->gender;
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
        
	   return back()->with('success','Patient information updated successfully');
        
   
    }


    public function save_patient(Request $request){
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

    public function add_presc(Request $request){
        $data=$this->validate(request(),[
            'status'=>'required',
            ],[
            ],[
                'status'=>'Status',
            
        ]);
        $prescription=new Prescription();
        $prescription->status=$request->status;
        $prescription->notes=$request->notes;
        $prescription->patient_id=$request->p_id;
        $prescription->doctor_id=auth()->guard('doctor')->user()->id;
        
        if($prescription->save()){
        	for ($i=1; $i <=$request->p_scnt_no ; $i++) { 
        		$x=("p_scnt_$i");
        		$item=new Item();
        		$item->name=$request->$x;
        		$item->prescription_id=$prescription->id;
        		$item->save();
        	}
        	return back()->with('success','Prescription dded successfully...');
        }
    }

    public function check_login(Request $request)
    {   
        $remmberme = $request->remmberme==1?true:false;
        if(auth()->guard('doctor')->attempt(['email'=>$request->email,'password'=>$request->password],$remmberme)){
            return redirect('/doctor/home');
        }else{
            return back()->with(['error'=>'please enter a valid email and password to login']);
        }
    }

    public function logout()
    {
        auth()->guard('doctor')->logout();
        return redirect('/doctor/login');

    }

}
