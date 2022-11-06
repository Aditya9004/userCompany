<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function list() {
        $users = User::all();
        $title = 'User List';
        return view('userlist',compact('users','title'));
    }

    public function add() {
        $title = 'Add User';
        return view('usercreate',compact('title'));
    }

    public function create() {
        User::create([
            'name' => request()->get('name')
        ]);
        return redirect('/users/list')->with('status','User Added Successfully');
    }

    public function edit($id) {
        $user = User::find($id);
        $title = 'Edit User';
        return view('useredit',compact('user','title'));
    }

    public function update($id) {
        $user = User::find($id);
        if(!$user) {
            return redirect('/users/list')->with('error','User Not Found');
        }
        $user->update(['name'=>request()->get('name')]);
        return redirect('/users/list')->with('status','User Updated Successfully');

    }

    public function delete() {
        $userID = request()->get('id');
        $user = User::find($userID);
        if(!$user) {
            return response()->json(['success'=>false,'message'=>"User Not Found"]);
        }
        $user->delete();
        return response()->json(['success'=>true, 'message'=>"User Deleted Successfully"]);
    }
}
