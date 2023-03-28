<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable=[
        'products_id',
        'batch_no',
        'suppliers_id',
        'quantity',
        'price_per_unit',
        'total_price',
        'date',
        'status',
    ];

    
    protected $hidden = ['created_at', 'updated_at'];


    public function product(){
        return $this->hasOne(Product::class,'id','products_id');
    }


    public function supplier(){
        return $this->hasOne(Supplier::class,'id','suppliers_id');
    }
}
