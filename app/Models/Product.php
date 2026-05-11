<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','name','description','image','base_price','is_active'];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function materials(){
        return $this->belongsToMany(Material::class, 'product_materials');
    }
    
    public function variants(){
        return $this->hasMany(ProductVariant::class);
    }
}
