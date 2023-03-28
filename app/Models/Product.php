<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_name',
        'cat_id',
        'com_id',
        'suppliers_id',
        'quantity',
        'status',

    ];

    public function Category(){
        return $this->hasOne(Category::class,'id','cat_id');
    }

    public function Company(){
        return $this->hasOne(Company::class,'id','com_id');
    }

    public function supplier(){
        return $this->hasOne(Supplier::class,'id','suppliers_id');
    }

    public function purchase(){
        return $this->belongsTo(Purchase::class,'id','products_id');
    }
}
