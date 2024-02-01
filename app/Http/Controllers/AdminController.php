<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('admin.user', compact('users'));

    }
    public function deleteUser($id){
        User::find($id)->delete();
        return redirect()->route('users');
    }
}
