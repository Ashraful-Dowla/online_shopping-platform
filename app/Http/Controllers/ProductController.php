<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('products.index')->with(['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('products.create')->with(['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request->product_name, '-');
        $validatedData = $this->validate($request, [
            'product_name' => 'required|min:3|max:255',
            'slug' => 'unique:products',
            'product_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'category_id' => 'required',
        ], ['slug.unique' => 'Product name is already taken']);

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            $validatedData['product_image'] = $filename;
        }

        Product::create($validatedData);
        return redirect()->back()->with('message', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('products.edit')->with(['product' => $product, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request['slug'] = Str::slug($request->product_name, '-');
        $validatedData = $this->validate($request, [
            'product_name' => 'required|min:3|max:255',
            'product_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'category_id' => 'required',
        ], ['slug.unique' => 'Product name is already taken']);

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            if ($product->product_image) {
                Storage::delete('/public/images/' . $product->product_image);
            }
            $request->image->storeAs('images', $filename, 'public');
            $validatedData['product_image'] = $filename;
        }

        $product->update($validatedData);
        return redirect()->back()->with('message', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->product_image) {
            Storage::delete('/public/images/' . $product->product_image);
        }
        $product->delete();
        return redirect()->back()->with('message', 'Product deleted!');
    }
}
