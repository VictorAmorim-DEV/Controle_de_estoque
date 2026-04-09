<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'products_in_stock';
    protected $primaryKey = 'stock_entry_id';
    protected $fillable = ['product_id', 'product_quantity'];
    protected $hidden = ["created_at", "updated_at"];

    public function product(){
        return $this->belongsTo(Products::class, 'product_id','product_id');
    }
}
