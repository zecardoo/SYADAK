<?php

namespace App\Http\Controllers;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
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
        $active_category = "active";
        $category = Category::all();
        return view('admin.category', compact('category', 'active_category'));
    }
                
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' =>'required',
            'des' => 'required',
            'img' => 'image',
        ]);
        // dd($data['img']);

        if (request('img')) {
            // dd( $uploadedFile);
            // dd(file_exists($uploadedFile));

            $imagepath = request('img')->store('category', 'public');
            $fullPath = public_path("storage/{$imagepath}");
            // $fullPath = storage_path("app/public/{$imagepath}");

            // Using the Storage facade to check file existence

            // dd($fullPath);
            // dd(file_exists($fullPath));

            // $imagePath = public_path("app/public/{$fullPath}");
            // dd(file_exists($imagePath));
        
            $image = image::make($fullPath)->fit(1200, 1200);
            $image->save();
        }

        Category::create([
            'name' => $data['name'],
            'des' => $data['des'],
            'img' => $imagepath,
        ]);

        return redirect("/category");
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
    public function edit(Category $category, Request $request)
    {
          
        
        // $vildate = Validator::make(request()->all(), [
        //     'img' => 'required'
        // ]);

        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'img' => 'file'

        ]);

        if (request('img')) {
       
            $imagePath = $category->img;

            // Delete the image file from storage
            if ($imagePath && Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
            
            $imagepath = request('img')->store('category', 'public');
            $fullPath = public_path("storage/{$imagepath}");
            
        
            $image = image::make($fullPath)->fit(1200, 1200);
            $image->save();

            $imageArray =  ['img'=>  $imagepath];

        }
            
        $category->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        
               
        return response()->json(['message'=>  $data], 200);
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
    public function destroy($category)
    {
        $categoryy = Category::findOrFail($category);
                // Get the file path of the image

        $imagePath = $categoryy->img;

        // Delete the image file from storage
        if ($imagePath && Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
        
        // Delete the record from the database
        $categoryy->delete();

        return response()->json(['message' => 'category deleted successfully'], 200);   
    }
}