<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable=[
        'suppliername',
        'address',
        'number',
        'email',
        'status',
    ];

    public function product(){
        return $this->belongsTo(Product::class,'id','suppliers_id');
    }

    public function purchase(){
        return $this->belongsTo(Purchase::class,'id','products_id');
    }


}
