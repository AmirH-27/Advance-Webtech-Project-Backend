<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teams;
use App\Mail\MyMail;
use Illuminate\Support\Facades\Mail;

class TeamController extends Controller
{
    public function createTeam(){
        return view('pages.user.CreateTeam');
    }
    public function createTeamSubmit(Request $request){
        $user_id = session()->get('user');
        $team = new Teams();
        $team->name = $request->name;
        $team->code = "#".''.(string)random_int(1000,9000);
        $team->creator = $user_id;
        $team->members = null;
        $team->save();
        return redirect(route('homeUser'));
    }
    public function viewTeam(Request $request){
        $team = Teams::where('name', $request->name)->first();
        return view('pages.user.viewTeam')->with('team', $team);
    }
    public function addMember(){

    }
}
