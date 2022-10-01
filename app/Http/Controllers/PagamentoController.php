<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagamento;
use App\Models\Cliente;
use App\Models\Servico;
use App\Models\Pt;
use App\Models\ClientePagamento;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;

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


    public function retornaMes($mes){
        switch ($mes){
            case "01":
                return "Janeiro";
            
            case "02":
                return "Fevereiro";
            case "03":
                return "Março";
                
            case "04":
                return "Abril";
            case "05":
                return "Maio";
                    
            case "06":
                return "Junho";
            case "07":
                    return "Julho";
                
            case "08":
                return "Agosto";
            case "09":
                return "Setembro";
                    
            case "10":
                return "Outubro";
            case "11":
                return "Novembro";
                       
            case "12":
                return "Dezembro";
        }
    }


    public function store(Request $request){
        $p=new Pagamento();
       
        $p->modopagamento=$_SESSION['modo'];
        $p->nomebanco=$_SESSION['banco'];
        $p->id_docpagamento=$_SESSION['id_documento'];
        $p->estado='não verficicado';
        $p->qtd= $_SESSION['qtd'];
        $p->user_id=Auth::user()->id;
        $p->valortotal = 233;
        $p->datapagamento = date('y-m-d');
        $p->save();

        $qtd=$p->qtd;
        
        for($i=0; $i<$qtd; $i++){
            $c=new ClientePagamento();
            $cont=$i+1;
            $ano= explode('-', $request["data".$cont]);
            $c->ano = $ano[0];
            $c->mes = $this->retornaMes($ano[1]);
            $c->cliente_id = $_SESSION['id_cliente'];
            $c->pagamento_id = $p->id;
            $c->preco =$request["preco".$cont];
            $c->save();

        }

        dd("feito");
    }

    
}
