<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuantityTier extends Model
{
    protected $fillable = ['label','min_qty','max_qty','price_per_unit','is_negotiable'];
    
    public function benefits(){
        return $this->hasMany(TierBenefit::class, 'tier_id');
    }
}
