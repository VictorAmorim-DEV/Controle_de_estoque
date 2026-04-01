<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\Suppliers;

class SuppliersController extends Controller
{
    //CRUD -> Created - Read - Update - Delete

    public function addSuppliers(Request $request){    //Created
    
        try{
            // Limpa o telefone: remove tudo que NÃO for número
            $phoneOnlyNumbers = preg_replace('/\D/', '', $request->suppliers_contact);

            // Substitui o valor na Request para o Laravel validar o número limpo
            $request->merge(['suppliers_contact' => $phoneOnlyNumbers]);

            $validated = $request -> validate([
                'suppliers_name' => 'required|string',
                'suppliers_contact' =>'required|regex:/^[0-9]{10,11}$/|unique:suppliers,suppliers_contact',
                'suppliers_email' => 'required|email|unique:suppliers,suppliers_email',
            ],[
                'suppliers_contact.regex' => 'O número de telefone é inválido. Certifique-se de está digitando corretamente',
                'suppliers_contact.unique' => 'Esse número de telefone já foi cadastrado, digite outro número válido',
                'suppliers_contact.require' => 'Campo obrigatório.',

                'suppliers_email.email' => 'Email inválido. Certifique-se de está digitando o email corretamente.',
                'suppliers_email.unique' => 'Esse email já foi cadastrado, digite outro email válido',
                'suppliers_email.require' => 'Campo obrigatório.',
            ]);

            $addSuppliers = Suppliers::create($validated);
            return response() -> json([
                'message'=> "Fornecedor adicionado com sucesso",
                'data' => $addSuppliers,
            ],201);
            
        } catch (Exception $e) {
            return response() -> json([
                'message'=> "Erro inesperado ao registrar fornecedor!",
                'error' => $e->getMessage()
            ],500);
        }
    }
//
//
     public function listSuppliers(){    //Read
    
        try{
            $suppliers = Suppliers::all();
            return response() -> json($suppliers,200);

        } catch (Exception $e) {
            return response() -> json([
                'message'=> "Erro ao carregar a lista de fornecedores",
                'error' => $e->getMessage()
            ],500);
        }
    }
//
//
     public function updateSuppliers(Request $request){    //Update
     
        try{
            // Limpa o telefone: remove tudo que NÃO for número
            $phoneOnlyNumbers = preg_replace('/\D/', '', $request->suppliers_contact);

            // Substitui o valor na Request para o Laravel validar o número limpo
            $request->merge(['suppliers_contact' => $phoneOnlyNumbers]);

            $id = $request->suppliers_id;

            $validated = $request -> validate([
                'suppliers_id' => 'required|integer',
                'suppliers_name' => 'required|string',
                'suppliers_contact' =>"required|regex:/^[0-9]{10,11}$/|unique:suppliers,suppliers_contact,{id},suppliers_id",
                'suppliers_email' => "required|email|unique:suppliers,suppliers_email,{id},suppliers_id",
            ],[
                'suppliers_contact.regex' => 'O número de telefone é inválido',
                'suppliers_contact.unique' => 'Esse número de telefone pertence a outro fornecedor. Digite outro número válido',

                'suppliers_email.email' => 'Email inválido.',
                'suppliers_email.unique' => 'Esse email pertence a outro fornecedor. Digite outro email válido',
            ]);

            $updateSuppliers = Suppliers::find($id);

            if (!$updateSuppliers) {
                return response()->json(["message"=>"Fornecedor não registrado!"],404);
            }

            $updateSuppliers -> update($validated);

            return response() -> json([
                'message'=> "Dados do fornecedor atualizados com sucesso",
                'data' => $updateSuppliers,
            ],200);

        } catch (Exception $e) {
            return response() -> json([
                'message'=> "Erro inesperado ao tentar alterar dados do fornecedor!",
                'error' => $e->getMessage()
            ],500);
        }
    }
//
//
    public function deleteSuppliers(Request $request){    //Delete
    
        try{
            $id = $request->id;
            $deleteSuppliers = Suppliers::find($id);

            if (!$deleteSuppliers) {
                return response()->json(["message"=>"Fornecedor não registrado!"],404);
            }

            $deleteSuppliers -> delete();

            return response() -> json([
                'message'=> "Fornecedor deletado com sucesso",
                'data' => $deleteSuppliers,
            ],200);
           

        } catch (Exception $e) {
            return response() -> json([
                'message'=> "Erro inesperado ao tentar deletar os dados do fornecedor!",
                'error' => $e->getMessage()
            ],500);
        }
    }


}
