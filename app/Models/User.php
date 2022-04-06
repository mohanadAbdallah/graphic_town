<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function categories(){
        return $this->hasMany(category::class);
    }
    public function sub_categories(){
        return $this->hasMany(Subcategory::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
//    public function categories(){
//        return $this->hasMany('App\Models\company');
//    }
//    public function role(){
//        return $this->belongsTo('App\Models\role');
//    }

}
