<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
class AdminController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('admin.user', compact('users'));

    }
    public function deleteUser($id){

        
        return redirect()->route('users');
    }
    
    public function foodmenu(){
        $users = User::all();
        return view('admin.foodmenu', compact('users'));

    }

    public function addfood(Request $request){
        $food = new Food();

        $imagefood = $request->image;
        $imageName = time() . '.' . $imagefood->getClientOriginalExtension();
        $request->image->move('foodimages', $imageName);

        // $food->image = $imageName;
        $food->title = $request->title;
        $food->price = $request->price;
        $food->description = $request->description;

        $food->save();

        return redirect()->route('foodmenu');

    }
    
}
