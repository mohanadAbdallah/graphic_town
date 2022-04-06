<?php

namespace App\Models;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'subcategoryname_ar',
        'subcategoryname_en',
        'image',
        'category_id'
    ];

    public function Category(){
        return $this->belongsTo(category::class);
    }
    public function Product(){

        return $this->hasMany(Product::class);

    }

}
