<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userRole =  auth()->user()->role;
        $user =  auth()->user()->id;
        $order = Order::where('user_id',  $user)->first();
        $products = $order->products;
        
        
        if($userRole == 'user'){
            return view('home.profile', compact('products'));

        }else{
            return view('admin.profile', compact('user'));
        }
        // return view('admin.profile', compact('user'));
    }

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        
        $data = request()->validate([
            'name'=> 'required',
        ]);

        $user->update([
            'name' => $data['name'],
        ]);
        
        return response()->json(['message' => $data], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $this->authorize('admin', $user);

        // dd($user);
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

     
        
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
        ]);
       
        return redirect("/profile")->with('success', 'Updated The Data Successfully ');
    }

    public function userProfile(User $user){

        $this->authorize('admin', $user);

        $data = request()->validate([
            'name' => 'required',
            'email'=> 'required',
            'role' => 'required'
        ]);
        
        $user->update([
            'name'=> $data['name'],
            'email'=>$data['email'],
            'role'=>$data['role'],
        ]);


        return response()->json(['message'=> $data], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize('admin', $user);

        $user->delete();
                
        return response()->json(['message'=> 'deleted seccssfully'], 200);
    }
}