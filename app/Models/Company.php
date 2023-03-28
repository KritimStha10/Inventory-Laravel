<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'shortname',
        'status',
    ];

    public function product(){
        return $this->belongsTo(Product::class,'id','com_id');
    }
}
