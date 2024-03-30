<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Message;


class DashboradController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function dashborad(){
        
        // add here policy auth
        
        $user = auth()->user();
    
        if($user->role == 'seller'){
            
            $this->authorize('view', $user);

            // $active_dashborad = "active";

            // return view('admin.dashborad', compact('active_dashborad'));
        }else if($user->role == 'admin'){
            
            // authorize it should admin or seler other than these users will get reject
            $this->authorize('view', $user);
            
            
            // ocunt how many users in teh system
            $user = User::where('role', '!=', 'admin')->get();
            $count = $user->count();
            
            // get teh info product 
            $product = Product::all();
            $total = 0;
            $sold = 0;

            // the info of all product sold in the system  
            foreach ($product as $item){
                $total += $item->sold * $item->price;
                $sold += $item->sold;
            }
            // dd($count);
            
            $active_dashborad = "active";
            
            return view('admin.dashborad', compact('active_dashborad', 'total', 'sold', 'count'));
        }else{
            $this->authorize('view', $user);
        }
        

    }

    public function category () {
        $user = auth()->user();
 
        if($user->role == 'seller'){
            
            $this->authorize('view', $user);

            // $active_dashborad = "active";

            // return view('admin.dashborad', compact('active_dashborad'));
        }else if($user->role == 'admin'){
            $this->authorize('view', $user);

            $active_category = "active";
            $category = Category::all();
            return view('admin.category', compact('category', 'active_category'));
        }else{
            $this->authorize('view', $user);
        }
    }

    // Product
    public function product () {
        $user = auth()->user();
 
        if($user->role == 'seller'){
            
            $this->authorize('view', $user);

            // $active_dashborad = "active";

            // return view('admin.dashborad', compact('active_dashborad'));
        }else if($user->role == 'admin'){
            $this->authorize('view', $user);

            $active_product = "active";
            $seller = User::all();
            $category = Category::all();
            $product = Product::all();
            return view('admin.product', compact('category','product','seller', 'active_product'));
        }else{
            $this->authorize('view', $user);
        }
    }
    
    public function users () {
        $user = auth()->user();
 
        if($user->role == 'admin'){
            
            $this->authorize('admin', $user);
            $user = User::where('role', '!=', 'admin')->get();
            $order = Order::all();
            $category = Category::all();
            $product = Product::all();
            // to privg the pivot table 
            $order->load('products');
            $active_users = "active";

            return view('admin.users', compact('active_users', 'user', 'order', 'category', 'product'));
        }else{
            $this->authorize('admin', $user);
        }
    }

    public function message () {
        
        $message = Message::all();
        return view('admin.message', compact('message'));
    }
    
}