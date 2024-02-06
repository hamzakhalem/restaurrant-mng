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
        User::find($id)->delete();
        return redirect()->route('users');
    }
    
    public function foodmenu(){
        $foods = Food::all();
        return view('admin.foodmenu', compact('foods'));
        
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
    
    public function deleteFood($id){
        Food::find($id)->delete();
        return redirect()->route('foodmenu');
    }
    
    public function updatefoodpage($id){
        $food = Food::find($id);
        return view('admin.updatefood', compact('food'));
    }

    public function updatefood(Request $request){
        $food = Food::find($request->id);
        $imagefood = $request->image;
        // $imageName = time() . '.' . $imagefood->getClientOriginalExtension();
        // $request->image->move('foodimages', $imageName);
        
        // $food->image = $imageName;
        $food->title = $request->title;
        $food->price = $request->price;
        $food->description = $request->description;
        
        $food->save();
        
        return redirect()->route('foodmenu');
    }
}
