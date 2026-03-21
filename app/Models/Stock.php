<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'products_in_stock';
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_name', 'product_type', 'product_quantity'];
    protected $hidden = ["created_at", "updated_at"];
}
