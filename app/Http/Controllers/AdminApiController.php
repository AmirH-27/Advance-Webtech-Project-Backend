<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Models\Teams;

class AdminApiController extends Controller
{
    public function userList(){
        $users = Accounts::where('type', 'user')->get();
        return $users;
    }
    public function deleteUser($id){
        $user = Accounts::find($id);
        if($user){
            $user->delete();
        }
        return "Not Deleted";
    }
    public function editUser($id){
        $user = Accounts::find($id);
        if($user){
            return $user;
        }
    }
    public function teamList(){
        $teams = Teams::all();
        return $teams;
    }
}
