<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Models\Otps;
use App\Mail\MyMail;
use DateInterval;
use DateTime;
use Mail;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function login(){
        return view('Pages.login.login');
    }
    public function registration(){
        return view('Pages.login.registration');
    }
    public function loginSubmit(Request $request){
        $validate = $request->validate([
            'userName' => 'required',
            'password' => 'required'
        ],
        [
            'userName.required'=>'Enter Your Name Please!',
            'password.required'=>'Enter Your Password Please!',
        ]
    );
        $userName = $request->input('userName');
        $password = $request->input('password');

        $user = Accounts::where('name', $userName)
            ->where('password', $password)
            ->first();

        if($user && $user->type == "admin"){
            $request->session()->put('user', $user->id);
            if($request->remember){
                setcookie('userName', $userName, time()+36000);
                setcookie('password', $password, time()+36000);
            }
            else{
                setcookie('userName', "");
                setcookie('password', "");
            }
            return redirect()->route('homeAdmin');
        }
        elseif($user && $user->type == "user"){
            $request->session()->put('user', $user->id);
            if($request->remember){
                setcookie('userName', $userName, time()+36000);
                setcookie('password', $password, time()+36000);
            }
            else{
                setcookie('userName', "");
                setcookie('password', "");
            }
            return redirect()->route('homeUser');
        }
        else{
            return "User name and Password do not match";
        }
    }
    public function registrationSubmit(Request $request){
        $otp = random_int(1000, 9000);
        $data = new Otps();
        $data->otp = $otp;
        $data->email = $request->email;
        $data->created_at = new DateTime();
        $data->expired_at = false;

        $data->save();

        $emailAddress = $request->email;
        $details = [
            'tittle' => 'Email Verification',
            'OTP' => $otp,
        ];

        Mail::to($emailAddress)->send(new MyMail($details));
        $validate = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'email',
            'phone' => 'required',
            'image_path' => 'required'
        ],
        [
            'name.required'=>'Enter Your Name Please!',
            'password.required'=>'Enter Your Password Please!',
            'email.email'=>'Enter Your Email Please!',
            'phone.required'=>'Enter Your Phone Number Please!',
            'image_path.required'=>'Upload a Picture!!'
        ]
    );
        $user = new Accounts();
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->type = "user";
        if($request->hasFile('image_path')){
            $imageName = time()."_".$request->file('image_path')->getClientOriginalName();
            $request->image_path->move(public_path('images'), $imageName);
            $user->image_path=$imageName;
            $user->save();
            return view('pages.mail.otp');
        }
        return "No File";
    }
    // public function otpCheck(){
    //     return view('pages.mail.otp');
    // }
    public function otpCheckSubmit(Request $request){
        $otp = $request->input('otp');
        $currentTime = new DateTime();
        $data = Otps::where('otp', $otp)->where('expired_at', false)->first();
        $expired_at = $data->expired_at;

        if($data){
            Accounts::where('email', $data->email)->update(['verified' => 'verified']);
            Otps::where('otp', $data->otp)->update(['expired_at' => true]);
            return redirect(route('homeUser'));
        }
        return "Otp Invalid";

    }
    public function logout(){
        session()->forget('user');
        return redirect(route('login'));
    }
}
