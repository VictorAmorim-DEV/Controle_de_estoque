<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'tbl_produtos_em_estoque';
    protected $primaryKey = 'produto_id';
    protected $fillable = ['nome_produto', 'tipo_produto', 'qunatidade_produto'];
    protected $hidden = ["created_at", "updated_at"];
}
