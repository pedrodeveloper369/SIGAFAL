<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagamento;
use App\Models\Cliente;
use App\Models\Servico;
use App\Models\Pt;
use Illuminate\Support\Facades\DB;

    session_start();

class PagamentoController extends Controller
{
    public function index(){
        $pagamento = Pagamento::all();

        return view("admin.pagamentos", ['pagamento' => $pagamento]);
    }

    public function buscarCliente(Request $request){
        
        $nif = $request->get('nif');
        
        if(!($clientes = Cliente::where('nif',$nif)->first())){  
            return redirect()->back()
            ->with('sms_erro', 'Cliente Inexistente, Verifique se o NIF está correto');
        }
        
        /*$servico = Servico::where('id',$cliente->servico_id)->first();
        $pt = Pt::where('id',$cliente->servico_id)->first();
*/
        $cliente=DB::table('clientes')->where('nif',$nif)
        ->join('servicos','clientes.servico_id','=','servicos.id')
        ->join('pts','clientes.pt_id','=','pts.id')
        ->select('clientes.*', 'servicos.descricao as servico','pts.localizacao as pt')->first();

        return view("admin.pagamento", [
            'cliente' => $cliente
            
        ]); 
 
    }

    public function pagamento(Request $request){

        $_SESSION['modo']=$request->modo_pagamento;
        $_SESSION['banco']=$request->banco;
        $_SESSION['qtd']=$request->qtd;
        $_SESSION['id_cliente']=$request->id_cliente;
        $_SESSION['valor_total']=$request->valor_total; 
        $_SESSION['id_documento']=$request->id_documento;
       
       return view('admin.dados_pagamento', [
            'qtd' => $_SESSION['qtd']
       ]);
    }
}
