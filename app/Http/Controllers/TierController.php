<?php

namespace App\Http\Controllers;

use App\Models\QuantityTier;
use App\Models\TierBenefit;
use Illuminate\Http\Request;

class TierController extends Controller
{
    public function index()
    {
        $quantity_tiers = QuantityTier::with('benefits')->get();

        return view('admin.tier', compact('quantity_tiers'));
    }
    public function create(){
        return view('admin.create_qty_tier');
    }
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'min_qty' => 'required|integer|min:1',
            'max_qty' => 'required|integer|min:1|gt:min_qty',
            'price_per_unit' => 'required|numeric|min:0',
            'is_negotiable' => 'required|boolean',
            'benefits' => 'nullable|array',
        ]);
        $quantity_tier = QuantityTier::create([
            'label' => $request->label,
            'min_qty' => $request->min_qty,
            'max_qty' => $request->max_qty,
            'price_per_unit' => $request->price_per_unit,
            'is_negotiable' => $request->is_negotiable,
        ]);
        if ($request->has('benefits')) {

        foreach ($request->benefits as $benefit) {

            TierBenefit::create([
                'tier_id' => $quantity_tier->id,
                'benefit' => $benefit,
            ]);

        }
        return redirect()->route('admin.tier')->with('success', 'Quantity tier created successfully.');
    }
}
    public function destroy($id)
    {
        $quantity_tier = QuantityTier::findOrFail($id);
        $quantity_tier->benefits()->delete();
        $quantity_tier->delete();

        return redirect()->route('admin.tier')->with('success', 'Quantity tier deleted successfully.');
    }
}
