<?php

namespace App\Http\Controllers;
use App\Events\CartEvent;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Cart;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){
        
        $this->middleware('auth');
        
    }
    
    public function index()
    {

        $user = auth()->user()->role;
        
        $product = Product::all();
        // return response()->json($product);
        return view('home.main', compact('product'));
        
    }


    // public function dashborad(){
        
    //     $user = auth()->user()->role;
    //     // dd($user);
    //     if($user == 'user'){
    //         $product = Product::all();
    //         // return response()->json($product);
    //         return view('home.main', compact('product'));
    //     }else{
    //         $active_dashborad = "active";

    //         return view('admin.dashborad', compact('active_dashborad'));
    //     }
        

    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->all();
                
        $data = request()->validate([
            'product_id'=> 'required',
        ]);
        

        $product = Product::find($data['product_id']);
        $duplicate = Cart::where('product_id', $product->id)->first();
        $user = auth()->user()->id;
        
        // if it is not duplicate 
        if(!$duplicate){
            auth()->user()->carts()->create([
                'user_id'  => $user,
              'product_id' => $product->id,
                'quantity' => 1 
            ]);
        }else{
            $increase = Cart::where('product_id', $data['product_id'])->increment('quantity');
        }

        $data = Cart::all();
        $count = $data->count();
        Broadcast(new CartEvent($count));
        //message should be added in vue.js to show the data and can be set any name
        return response()->json(['message' => $data], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

        $data = Cart::all();
        $count = $data->count();
        Broadcast(new CartEvent($count));
        return response()->json(['data' => $count], 200);

        // return response()->join($data, 200);
    }

    public function productShow(){
            
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}