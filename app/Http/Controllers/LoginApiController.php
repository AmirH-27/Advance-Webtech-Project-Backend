<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Acc;
use App\Models\Otps;
use Illuminate\Http\Request;
use App\Models\Token;
use Illuminate\Support\Str;
use DateTime;
use App\Mail\MyMail;
use Illuminate\Support\Facades\Mail;

class LoginAPIController extends Controller
{
    //
    public function login(Request $req){
        $user = Accounts::where('name', $req->username)->where('password', $req->password)->first();
        if($user){
            $api_token = Str::random(64);
            $token = new Token();
            $token->user_id = $user->id;
            $token->token = $api_token;
            $token->created_at = new DateTime();
            if($user->type == "admin"){
                $token->type = "admin";
            }
            elseif($user->type == "user"){
                $token->type = "user";
            }
            $token->save();
            return $token;
        }
    }

    public function registration(Request $request){
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
        $user = new Accounts();
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->type = "user";

        $user->save();

        $api_token = Str::random(64);
        $token = new Token();
        $token->user_id = $user->id;
        $token->token = $api_token;
        $token->type = $user->type;
        $token->created_at = new DateTime();
        $token->save();
        return $token;
    }
    public function verify(Request $request){
        $otp = $request->otp;
        $data = Otps::where('otp', $otp)->where('expired_at', false)->first();
        if($data){
            Accounts::where('email', $data->email)->update(['verified' => 'verified']);
            Otps::where('otp', $data->otp)->update(['expired_at' => true]);
            return $data;
        }
        return "Otp Invalid";
    }
    public function logout(Request $request){
        $req = $request->delete_token;
        $token = Token::where('expired_at', null)->first();
        if($req == "delete" && $token){
            Token::where('expired_at', null)->update(['expired_at'=>new DateTime()]);
            return "token_expired";
        }
        return "Not Expired";
    }
}
