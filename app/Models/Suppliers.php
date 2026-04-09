<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'suppliers_id';
    protected $fillable = ['suppliers_name', 'suppliers_contact', 'suppliers_email'];
    protected $hidden = ["created_at", "updated_at"];

    public function products(){
        return $this->belongsToMany(Products::class, 'product_supplier','supplier_id','product_id');
    }
}
