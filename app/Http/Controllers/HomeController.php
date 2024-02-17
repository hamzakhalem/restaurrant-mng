<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Food;
use App\Models\FoodChef;
use App\Models\Cart;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();
        $chefs = FoodChef::all();
        $userid = Auth::id();
        $count = Cart::where('user_id', $userid)->count();
        return view('home', compact('foods', 'chefs', 'count'));
    }
    public function showcart($id)
    {
        // $foods = Food::all();
        // $chefs = FoodChef::all();
        // $userid = Auth::id();
        $carts = Cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();
        $count = $carts->count();
        return view('showcart', compact('carts', 'count'));
    }

    public function addtocart(Request $request){
        $id = Auth::id();

        if($id){
            $cart = new Cart();
            $cart->user_id = $id;
            $cart->food_id = $request->foodid;
            $cart->quantity= $request->quantity;
            $cart->save();
            return redirect('home');
        }
        else{
            return redirect('login');
        }
    }
    public function redirects(){
        $usertype = Auth::user()->usertype;
        
        if($usertype == 1){
            
            return view('admin.adminhome');
        }
        else {
            $foods = Food::all();
            $chefs = FoodChef::all();
            $userid = Auth::id();

            $count = Cart::where('user_id', $userid)->count();

            return view('home', compact('foods', 'chefs', 'count'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   
}
