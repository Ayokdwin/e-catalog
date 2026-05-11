<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TierBenefit extends Model
{
    protected $fillable = ['tier_id','benefit'];
    
    public function tier(){
        return $this->belongsTo(QuantityTier::class, 'tier_id');
    }
}
