<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_name', 'product_type', 'product_value'];
    protected $hidden = ["created_at", "updated_at"];

    // Um produto pode ter muitos fornecedores
    public function suppliers(){
        return $this->belongsToMany(Suppliers::class, 'product_supplier','product_id','supplier_id');
    }

    //Um produto tem um registro de estoque
    public function stock(){
        return $this->hasOne(Stock::class, 'product_id','product_id');
    }
}
