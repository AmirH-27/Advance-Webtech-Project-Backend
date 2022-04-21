<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Models\Meetings;
use Illuminate\Notifications\Action;

class AdminController extends Controller
{
    public function home(){
        return view('pages.admin.homeAdmin');
    }
    public function profile(){
        $user_id = session()->get('user');
        $user = Accounts::where('id', $user_id)->first();

        return view('pages.admin.profile')->with('user', $user);
    }
    public function profileEdit(Request $request){
        $user = Accounts::where('id', $request->id)->first();

        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->route('homeAdmin');
    }
    public function userList(){
        $users = Accounts::where('type', 'user')->get();
        return view('pages.admin.userList')->with('users', $users);
    }

    public function editUser(Request $request){
        $user = Accounts::where('id', $request->id)->first();
        return view('pages.admin.editUser')->with('user', $user);
    }
    public function editUserSubmit(Request $request){
        $user = Accounts::where('id', $request->id)->first();

        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->route('userList');
    }

    public function deleteUser(Request $request){
        $user = Accounts::where('id', $request->id)->first();
        return view('pages.admin.deleteUser')->with('user', $user);
    }

    public function deleteUserSubmit(Request $request){
        $user = Accounts::where('id', $request->id)->first();
        $user->delete();
        return redirect()->route('userList');
    }
    public function addUser(){
        return view('pages.admin.addUser');
    }
    public function addUserSubmit(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'email',
            'phone' => 'required',
            'image_path' => 'required'
        ],
        [
            'name.required'=>'Enter Users Name Please!',
            'password.required'=>'Enter Users Password Please!',
            'email.email'=>'Enter Users Email Please!',
            'phone.required'=>'Enter Users Phone Number Please!',
            'image_path.required'=>'Upload Users Picture!!'
        ]
    );
        $user = new Accounts();
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->phone;
        $user->phone = $request->email;
        $user->type = "user";
        if($request->hasFile('image_path')){
            $imageName = time()."_".$request->file('image_path')->getClientOriginalName();
            $request->image_path->move(public_path('images'), $imageName);
            $user->image_path=$imageName;
            $user->save();
            return $this->userList();
        }
        return "No File";
    }
    public function meetingList(){
        $meets = Meetings::all();
        return view('pages.admin.meetingList')->with('meets', $meets);
    }

}
