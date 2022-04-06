<?php

namespace App\Models;
use App\Helpers\File;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\String_;

class category extends Model
{
    use HasFactory;

    protected $hidden = ['image','title_ar','title_en','description_ar','description_en'];
    protected $appends = ['image_url','title','description'];
    protected $fillable = ['category_status'];

    public function getImageUrlAttribute()

    {
        return Storage::disk(config('driver'))->url($this->image);

    }
    public function getTitleAttribute(){
        if(app()->getLocale()=='en'){
            return $this->title_en;
        }else
        {
            return $this->title_ar;
        }
    }
    public function getDescriptionAttribute(){
        if(app()->getLocale()=='en'){
            return $this->Description_en;
        }else
        {
            return $this->Description_ar;
        }
    }

    public function User(){

        return $this->belongsTo(User::class);

    }
    public function SupCategory(){

        return $this->hasMany(Subcategory::class);

    }
    public function Product(){

        return $this->hasMany(Product::class);

    }

}
