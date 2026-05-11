<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\EstimationFactor;
use App\Models\Material;
use App\Models\Product;
use App\Models\QuantityTier;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $products = Product::with(['category', 'materials'])
            ->where('is_active', true)
            ->get();
        $categories = Category::all();
        $materials = Material::all();
        $estimation_factors = EstimationFactor::all();
        $quantity_tiers = QuantityTier::with('benefits')->get();
        
        return view('welcome', compact('products', 'categories', 'materials', 'estimation_factors', 'quantity_tiers'));
    }
}

