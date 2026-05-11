<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Material;
use App\Models\ProductVariant;
use App\Models\Size;

class DashboardController extends Controller
{
    public function index(){

        return view('admin.dashboard');
    }

    
}

