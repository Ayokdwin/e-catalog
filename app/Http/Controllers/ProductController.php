<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    
    public function show_products(){
        $product = Product::with(['category', 'materials'])->get();
        return view('admin.product', compact('product'));
    }

    public function create_product(){
         $categories = Category::all();
        return view('admin.create_product', compact('categories'));
    }
    public function store_product(Request $request){
       
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'base_price' => 'required|numeric',
           
        ]);

        $imagePath = $request->file('image')->store('products', 'public');
        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'description' => $request->description,
            'base_price' => $request->base_price,
            'is_active' => true,
        ]);
        return redirect()->route('admin.show_products')->with('success', 'Product created successfully.');
    }
    public function destroy_product($id){
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->route('admin.show_products')->with('success', 'Product deleted successfully.');
    }
    public function sembunyikan_product($id){
            $product = Product::findOrFail($id);
            $product->is_active = !$product->is_active;

    $product->save();

    return redirect()->back()->with(
        'success',
        $product->is_active
            ? 'Product displayed successfully.'
            : 'Product hidden successfully.'
    );
            return redirect()->back()->with('success', 'Product hidden successfully.');
    }
    public function edit_product($id){
            $product = Product::findOrFail($id);
            $categories = Category::all();
            return view('admin.edit_product', compact('product', 'categories'));
    }
    public function update_product(Request $request, $id){
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'base_price' => 'required|numeric',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->base_price = $request->base_price;
        $product->save();

        return redirect()->route('admin.show_products')->with('success', 'Product updated successfully.');
    }
}
