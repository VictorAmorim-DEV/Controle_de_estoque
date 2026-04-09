<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\Products;

class ProductsController extends Controller
{
    public function addProduct(Request $request){
        try{
            $validated = $request -> validate([
                'product_id'=>'required|integer|exists:products,product_id',
                'product_name'=> 'required|integer',
                'product_type'=> 'required|string',
                'product_value'=>'required|decimal',
                'supplier_ids'=>'array',
                'supplier_ids.*'=>'exists:suppliers,suppliers_id'
            ]);

            $addProducts = Products::create($validated);

            if($request->has(('supplier_ids'))){
                $addProducts->suppliers()->sync($request->suppliers_ids);
            }

            return response() -> json([
                'message'=>"Produto adicionado com sucesso",
                'data' => $addProducts,
            ],201);
        } 
        catch (Exception $e) {
            return response() -> json([
                'message'=> "Erro ao adicionar produto!",
                'error' => $e->getMessage()
            ],500);
        }
    
    } 
    public function listProduct(){
    
    }
    public function updateProduct(){
    
    }
    public function deleteProduct(){
    
    }
}
