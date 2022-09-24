<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pt;
use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente=DB::table('clientes')
        ->join('servicos','clientes.servico_id','=','servicos.id')
        ->join('pts','clientes.pt_id','=','pts.id')
        ->select('clientes.*', 'servicos.descricao as servico','pts.localizacao as pt')
        ->orderBy('clientes.id','desc')
        ->get();
        $pt=Pt::all();
        $servicos=Servico::all();
        return view('admin.cliente',['cliente'=>$cliente,'pt'=>$pt, 'servicos'=>$servicos]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $c=new Cliente;
        $c->nome=$request->nome;
        $c->nif=$request->nif;
        $c->tipo=$request->tipo;
        $c->email=$request->email;
        $c->telefone=$request->telefone;
        $c->morada=$request->morada;
        $c->preco=$request->preco;
        $c->servico_id=$request->servico;
        $c->pt_id=$request->pt;
       // dd($request->pt);
        $c->save();

        $cliente=DB::table('clientes')
        ->join('servicos','clientes.servico_id','=','servicos.id')
        ->join('pts','clientes.pt_id','=','pts.id')
        ->select('clientes.*', 'servicos.descricao as servico','pts.localizacao as pt')
        ->orderBy('clientes.id','desc')
        ->get();
        $pt=Pt::all();
        $servicos=Servico::all();
        $sms='Cliente registado com sucesso.';
        return view('admin.cliente',['cliente'=>$cliente,'pt'=>$pt, 'servicos'=>$servicos,'sms'=>$sms]);



        
    }

    public function showEmpresa(){

        $cliente=DB::table('clientes')
        ->join('servicos','clientes.servico_id','=','servicos.id')
        ->join('pts','clientes.pt_id','=','pts.id')
        ->select('clientes.*', 'servicos.descricao as servico','pts.localizacao as pt')
        ->where('clientes.tipo','=','Empresa')
        ->orderBy('clientes.id','desc')
        ->get();
        return view('admin.clienteempresa',['cliente'=>$cliente]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
