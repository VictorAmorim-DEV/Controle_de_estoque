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
                'product_name'=> 'required|string',
                'product_type'=> 'required|string',
                'product_value'=>'required|numeric',
                'supplier_ids'=>'array',
                'supplier_ids.*'=>'exists:suppliers,suppliers_id'
            ]);

            $addProducts = Products::create($validated);

            if(!empty($validated['supplier_ids'])){
                $addProducts->suppliers()->sync($validated['supplier_ids']);
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
        try{
            $listProducts = Products::with('suppliers')->get();
            return response() -> json($listProducts,200);

        } catch (Exception $e) {
            return response() -> json([
                'message'=> "Erro ao carregar a lista de produtos",
                'error' => $e->getMessage()
            ],500);
        }
    
    }
    public function updateProduct(Request $request){
        try{
            $validated = $request -> validate([
                'product_id'=>'required|integer|exists:products,product_id',
                'product_name'=> 'required|string',
                'product_type'=> 'required|string',
                'product_value'=>'required|numeric',
                'supplier_ids'=>'array',
                'supplier_ids.*'=>'exists:suppliers,suppliers_id'
            ]);

            $updateProduct = Products::find($validated['product_id']);

            if (!$updateProduct) {
                return response()->json(["message"=>"Produto não encontrado!"],404);
            }
            $updateProduct->update($validated);

            if(!empty($validated['supplier_ids'])){
                $updateProduct->suppliers()->sync($validated['supplier_ids']);
            }

            return response() -> json([
                'message'=>"Produto atualizado com sucesso",
                'data' => $updateProduct,
            ],201);
        } 
        catch (Exception $e) {
            return response() -> json([
                'message'=> "Erro ao atualizar produto!",
                'error' => $e->getMessage()
            ],500);
        }
    
    }
    public function deleteProduct(Request $request){
        try{
            $id = $request->product_id;
            $deleteProduct = Products::find($id);

            if (!$deleteProduct) {
                return response()->json(["message"=>"Produto não registrado!"],404);
            }

            $deleteProduct -> delete();

            return response() -> json([
                'message'=>"Produto deletado com sucesso",
                'data'=>$deleteProduct,
            ],200);
           

        } catch (Exception $e) {
            return response()->json([
                'message'=>"Erro inesperado ao tentar deletar o produto!",
                'error'=>$e->getMessage()
            ],500);
        }
    
    }
}
