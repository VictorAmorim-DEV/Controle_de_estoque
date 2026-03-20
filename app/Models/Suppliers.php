<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $table = 'tbl_suppliers';
    protected $primaryKey = 'suppliers_id';
    protected $fillable = ['suppliers_name', 'suppliers_contact', 'suppliers_email'];
    protected $hidden = ["created_at", "updated_at"];
}
