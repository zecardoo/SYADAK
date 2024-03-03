<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $active_product = "active";
        $category = Category::all();
        $product = Product::all();
        return view('admin.product', compact('category','product', 'active_product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       
    }
    
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'des' =>['required', 'string', 'max:255'],
    //         'img' => ['required', 'string', 'image'],
    //         'price' => ['required', 'string'],
    //         'category' => ['required'],

    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        // $user = Auth()->user();
        $data = request()->validate([
            'name' =>'required',
            'description' => 'required',
            'img' => 'image',
            'price' =>'required',
            'quantity'=> 'required',
            'category_id'=>'required'
        ]);
        
        
        
        if(request('img')){
            $imagepath = request('img')->store('Product', 'public');

            $image = image::make(public_path("storage/{$imagepath}"))->fit(1200, 1200);
            $image->save();

           $imageArray =  ['img'=>  $imagepath];
        }
        auth()->user()->products()->create([
            'name'=>$data['name'],
            'description'=>$data['description'],
            'price'=>$data['price'],
            'quantity'=>$data['quantity'],
            'category_id'=>$data['category_id'],
            'img'=>  $imagepath,
            'sold'=> '0'

        ]);

        return redirect('/product');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $productId)
    {
        
        return view('home.product', compact('productId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $data = request()->validate([
            'name' => 'required',
            'price'=> 'required',
            'quantity'=> 'required',
            'description' => 'required',
            'img' => 'file'

        ]);

        if (request('img')) {
       
            $imagePath = $product->img;

            // Delete the image file from storage
            if ($imagePath && Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
            
            $imagepath = request('img')->store('product', 'public');
            $fullPath = public_path("storage/{$imagepath}");
            
        
            $image = image::make($fullPath)->fit(1200, 1200);
            $image->save();

            $imageArray =  ['img'=>  $imagepath];

        }
            
        $product->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        
               
        return response()->json(['message'=>  $product], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product)
    {
        
        // search about why when i do this way i can delete 
        $productt = Product::findOrFail($product);

        // Get the file path of the image
        $imagePath = $productt->img;

        // Delete the image file from storage
        if ($imagePath && Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
        
        // Delete the record from the database
        $productt->delete();

        return response()->json(['message' => 'category deleted successfully'], 200); 
    }
}