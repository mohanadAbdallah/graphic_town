<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $hidden = ['image','product_ar_name','product_en_name','product_ar_name','product_en_description','product_ar_description'];
    protected $appends = ['image_url','name','description'];

    public function getImageUrlAttribute()

    {
        return Storage::url($this->image);

    }
    public function getNameAttribute(){
        if(app()->getLocale()=='en'){
            return $this->product_en_name;
        }else
        {
            return $this->product_ar_name;
        }
    }
    public function getDescriptionAttribute(){
        if(app()->getLocale()=='en'){
            return $this->product_en_description;
        }else
        {
            return $this->product_ar_description;
        }
    }

    public function category(){

        return $this->belongsTo(Category::class);
    }
    public function subcategory(){

        return $this->belongsTo(Subcategory::class);
    }
}
