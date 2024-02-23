<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\FoodChef;
use App\Models\Order;
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

    public function cheflist(){
        $chefs = FoodChef::all();
        return view('admin.cheflist', compact('chefs'));
    }
    
    public function reservatuionpage(){
        $reservations = Reservation::all();
        return view('admin.reservatuionpage', compact('reservations'));
        
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
    public function addchef(Request $request){
        $chef = new FoodChef();
        
        $imagechef = $request->image;
        $imageName = time() . '.' . $imagechef->getClientOriginalExtension();
        $request->image->move('chefimages', $imageName);
        
        $chef->name = $request->name;
        $chef->speciality = $request->speciality;
        $chef->image = $imageName;
        
        $chef->save();
        
        return redirect()->back();
        
    }
    
    public function deleteFood($id){
        Food::find($id)->delete();
        return redirect()->route('foodmenu');
    }
    
    public function deletechef($id){
        FoodChef::find($id)->delete();
        return redirect()->back();
    }
    
    public function updatefoodpage($id){
        $food = Food::find($id);
        return view('admin.updatefood', compact('food'));
    }

    public function updatechefpage($id){
        $chef = FoodChef::find($id);
        return view('admin.updatechefpage', compact('chef'));
    }

    public function orders(){
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }

    public function searchOrder(Request $request){
        $search = $request->search;
        $orders = Order::where('foodname', "Like", '%$'.$search.'%')->orWhere('name', "Like", '%$'.$search.'%')->get();
        return view('admin.orders', compact('orders'));
    }

    public function updatechef(Request $request){
        $chef = FoodChef::find($request->id);
        $imagechef = $request->image;
        $imageName = time() . '.' . $imagechef->getClientOriginalExtension();
        $request->image->move('chefimages', $imageName);
        
        $chef->name = $request->name;
        $chef->speciality = $request->speciality;
        $chef->image = $imageName;
        
        $chef->save();
        
        return redirect()->back();

        
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
    
    public function reservation(Request $request){
        $resevation = new Reservation();
        $resevation->name = $request->name;
        $resevation->email = $request->email;
        $resevation->guest = $request->guest;
        $resevation->phone = $request->phone;
        $resevation->time = $request->time;
        $resevation->date = $request->date;
        $resevation->message = $request->message;
        $resevation->save();
        
        return redirect()->back();
    }
}
