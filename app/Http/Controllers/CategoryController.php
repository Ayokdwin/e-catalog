<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show_categories(){
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }
    public function create_category(){
        return view('admin.create_category');
    }
    public function store_category(Request $request){
        $request->validate([
            'name'=> 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
        ]);
        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return redirect()->route('admin.show_categories')->with('success', 'Category created successfully');    
}
public function destroy_category($id){
    $category = Category::findOrFail($id);
    $category->delete();
    return redirect()->route('admin.show_categories')->with('success', 'Category deleted successfully');
}
public function edit_category($id){
    $category = Category::findOrFail($id);
    return view('admin.edit_category', compact('category'));
}
public function update_category(Request $request, $id){
    $request->validate([
        'name'=>'required|string|max:255',
        'slug'=>'required|string|max:255|unique:categories,slug,'.$id,
    ]);
    $category = Category::findOrFail($id);
    $category->update([
        'name' => $request->name,
        'slug' => $request->slug,
    ]);
    return redirect()->route('admin.show_categories')->with('success', 'Category updated successfully');

}

}
