<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Models\Teams;
use App\Models\Token;
use App\Mail\TeamMail;
use Illuminate\Support\Facades\Mail;

class UserApiController extends Controller
{
    public function profile(){
        $userActive = Token:: where('expired_at', null)->first();
        $user_id = $userActive->user_id;
        $user = Accounts::where('id', $user_id)->first();
        return $user;
    }
    public function profileEdit(Request $request){
        $user = Accounts::where('id', $request->id)->first();
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return $user;
    }
    public function addTeam(Request $request){
        $userActive = Token:: where('expired_at', null)->first();
        $user_id = $userActive->user_id;
        $team = new Teams();
        $team->name = $request->teamName;
        $team->code = "#".''.(string)random_int(1000,9000);
        $team->creator = $user_id;
        $team->members = null;
        $team->save();

        $user = Accounts::where('id', $user_id)->first();
        $emailAddress = $user->email;
        $details = [
            'tittle' => 'Team Created',
            'team_name' => $team->name,
        ];

        Mail::to($emailAddress)->send(new TeamMail($details));
        return $team;
    }

    public function teamList(){
        $userActive = Token:: where('expired_at', null)->first();
        $user_id = $userActive->user_id;
        $teams = Teams::where('creator', $user_id)->get();
        return $teams;
    }

    public function deleteTeam($id){
        $team = Teams::find($id);
        if($team){
            $team->delete();
        }
        return "Not Deleted";
    }
}
