<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Categories;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::where('is_deleted', false)->get();

        return view ('product_form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_name' => 'required|unique:products,product_name',
            'category' => 'required|exists:categories,category_id',
            'price' => 'required|numeric|min:0',
            'stocks' => 'required|integer|min:0',
        ]);

    $validated['category_id'] = $request->category;

    if($request->hasFile('product_image')){
        $filenameWithExtensions = $request->file('product_image')->getClientOriginalName();
       $filenmae = pathinfo($filenameWithExtensions, PATHINFO_FILENAME);
       $extensions = $request->file('product_image')->getClientOriginalExtension();
       $filenameToStore = $filename . '-' . $extensions;
       $request->file('product_image')->storeAs('Uploads/Products Images',$filenameToStore);
       $validated['product_image'] = $filenameToStore;
    }

    $product = Product::create($validated);

    $product = Product::create($validated);

    if (!$products) {
        return redirect()->route('products')->with([
            'message' => 'Unable to add product',
            'type' => 'error',
        ]);
}

    return redirect()->route('products')->with([
        'message' => 'Product added successfully!',
        'type' => 'success',
    ]);
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
