<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\Stock;

class StockController extends Controller
{
    //CRUD -> Created - Read - Update - Delete

    public function addStockItems(Request $request){    //Created
    
        try{
            $validated = $request -> validate([
                'product_id'=>'required|integer|exists:products,product_id',
                'product_quantity' => 'required|integer',
            ]);

            $addItems = Stock::create($validated);
            return response() -> json([
                'message'=> "Item adicionado ao estoque com sucesso",
                'data' => $addItems,
            ],201);
            
        } catch (Exception $e) {
            return response() -> json([
                'message'=> "Erro ao adicionar o item ao estoque!",
                'error' => $e->getMessage()
            ],500);
        }
    }
//
//
     public function listStockItems(){    //Read
    
        try{
            $itemsToStock = Stock::with('product.suppliers')->get();
            return response() -> json($itemsToStock,200);

        } catch (Exception $e) {
            return response() -> json([
                'message'=> "Erro ao carregar a lista do estoque",
                'error' => $e->getMessage()
            ],500);
        }
    }
//
//
     public function updateStockItems(Request $request){    //Update
     
        try{
            $validated = $request -> validate([
                'stock_entry_id'=>'required|integer|exists:products_in_stock,stock_entry_id',
                'product_id'=>'required|integer|exists:products,product_id',
                'product_quantity' => 'required|integer',
            ]);

            $itemInStock = Stock::find($validated['stock_entry_id']);

            if (!$itemInStock) {
                return response()->json(["message"=>"Item não encontrado no estoque!"],404);
            }

            $itemInStock -> update($validated);

            return response() -> json([
                'message'=> "Estoque atualizado com sucesso",
                'data' => $itemInStock,
            ],200);

        } catch (Exception $e) {
            return response() -> json([
                'message'=> "Erro ao tentar alterar o item!",
                'error' => $e->getMessage()
            ],500);
        }
    }
//
//
    public function deleteStockItems(Request $request){    //Delete
    
        try{
            $id = $request->stock_entry_id;
            $itemToDelete = Stock::find($id);

            if (!$itemToDelete) {
                return response()->json(["message"=>"Item não encontrado no estoque!"],404);
            }

            $itemToDelete -> delete();

            return response() -> json([
                'message'=> "Item deletado com sucesso",
                'data' => $itemToDelete,
            ],200);
           

        } catch (Exception $e) {
            return response() -> json([
                'message'=> "Erro inesperado ao tentar deletar o item do estoque!",
                'error' => $e->getMessage()
            ],500);
        }
    }

    
}
