<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstimationFactor extends Model
{
    protected $fillable = ['name','type','extra_cost'];
}
