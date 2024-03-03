<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Events\CartEvent;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;


class CartController extends Controller
{
    // public function __construct(){
    //     $this.middleware('auth');
    // }

    public function __construct(){
        
        $this->middleware('auth');
        
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user()->id;
        $cart = Cart::where('user_id', $user)->first();
        $products = $cart->products;
        
        return view('home.checkout', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        $user = auth()->user()->id;
        $cart = Cart::where('user_id', $user)->first();
        $order = Order::where('user_id', $user)->first();
        $product = $cart->products;
    
        
        foreach ($product as $item) {
            // Calculate subtotal 
            $subtotal = $item->price * $item->pivot->quantity;
            
            // Decrease product quantity 
            $decrease = Product::where('id', $item->id)->decrement('quantity', $item->pivot->quantity);
            
            // Increase product sold 
            $sold = Product::where('id', $item->id)->increment('sold', $item->pivot->quantity);
            
            // Find the product
            $productItem = Product::find($item->id);
        
            // Attach the product to the order with quantity and subtotal
            $order->products()->attach($productItem, [
                'quantity' => $item->pivot->quantity,
                'subtotal' => $subtotal,
            ]);
        }
        $cart->products()->detach();


        // return response()->json(['message' => $order], 200);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //when i add dd() in vue js the system give 500 wrong in server neeed more search about this problem 
        // $data = $request->all();
                
        $data = request()->validate([
            'product_id'=> 'required',
            'Quantity'=> 'required',
        ]);
        
        $user = auth()->user()->id;
        $cart = Cart::where('user_id', $user)->first();
        $product = Product::find($data['product_id']);
        $duplicate = $cart->products()->where('product_id', $product->id)->first();
        // $duplicate = $cart->products()->where('product_id', $product->id)->exists();

        
        // // if it is not duplicate 
        if(!$duplicate){
            $cart->products()->attach($product, ['quantity' => $data['Quantity']]);

        }else{
            $overdata = $data['Quantity'] + $duplicate->pivot->quantity;
            
            if($product->quantity >= $overdata){
                // $increase = Cart::where('product_id', $data['product_id'])->increment('quantity',$data['Quantity']  );
                $cart->products()->updateExistingPivot($product->id, ['quantity' => $overdata]);

            }else {
                // Handle the case where the sum is greater than the available quantity (e.g., show an error message)
                // You can customize this part based on your application's logic
                // For example, you might want to redirect back with a message
                return redirect()->back()->with('error', 'Insufficient stock.');
            }
        }

        $user = auth()->user()->id;
        $cart = Cart::where('user_id', $user)->first();
        $data = $cart->products;
        $count = $data->count();
        Broadcast(new CartEvent($count));
        //message should be added in vue.js to show the data and can be set any name
        return response()->json(['message' => $count], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = auth()->user()->id;
        $cart = Cart::where('user_id', $user)->first();
        $data = $cart->products;
        $count = $data->count();
        Broadcast(new CartEvent($count));
        return response()->json(['data' => $count], 200);

        // return response()->join($count, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}