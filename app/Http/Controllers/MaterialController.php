<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    public function show_materials(){
        $materials = Material::all();
        return view('admin.materials', compact('materials'));
    }
    public function create_material(){
        return view('admin.create_material');
    }
    public function store_material(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price_per_unit' => 'required|numeric',
        ]);
       $imagePath = $request->file('image')->store('materials', 'public');
        $materials = Material::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'price_per_unit' => $request->price_per_unit,
        ]);
        return redirect()->route('admin.show_materials')->with('success', 'Material created successfully');
    }
    public function destroy_material($id){
        $material = Material::findOrFail($id);
        $material->delete();
        return redirect()->route('admin.show_materials')->with('success', 'Material deleted successfully');
    }
    public function edit_material($id){
        $material = Material::findOrFail($id);
        return view('admin.edit_material', compact('material'));
    }
    public function update_material(Request $request, $id){
        $material = Material::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price_per_unit' => 'required|numeric',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('materials', 'public');
            $material->image = $imagePath;
        }
        $material->name = $request->name;
        $material->price_per_unit = $request->price_per_unit;
        $material->save();
        return redirect()->route('admin.show_materials')->with('success', 'Material updated successfully');
    }   
   
}