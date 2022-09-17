@extends('layouts.main')

@section('title', 'SIGFAL-Clientes')
@section('content')
<div class="row m-t-30">
    <div class="col-md-12">
        <div class="text-left mt-3 mb-2 ">
            
            <a href="{{url('/dashboard')}}"> <button class="btn btn-primary btn-lg">HOME</button></a>
            <a href="{{url('/dashboard/clientes.register')}}"> <button class="au-btn au-btn-icon au-btn--green au-btn--large"> <i class="zmdi zmdi-plus"></i> Registar</button></a>
       
        </div>
        <!-- DATA TABLE-->
        <div class="table-responsive table-responsive-data3 ">
            <table class="table table-data1 " id="datatable">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Nif</th>
                                <th>Morada</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th colspan="4">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="mytable">
                            
                            @foreach ($clientes as $cli)
                                
                           
                        
                            <tr>
                                
                                <td>{{$cli->nome}}</td>
                                <td>{{$cli->nif}}</td>
                                <td>{{$cli->morada}}</td>
                                <td class="process">{{$cli->telefone}}</td>
                                <td class="process">{{$cli->email}}</td>
                                <td>
                                <a href="{{$cli->id}}"><button type="button" class="btn btn-primary ">Editar</button></a>
                                <a href="{{$cli->id}}"><button type="button" class="btn btn-secondary ">Bloquear</button></a>
                                <a href="{{$cli->id}}"> <button type="button" class="btn btn-danger ">Excluir</button> </a>
                                </td>
                                
                            </tr>
                            @endforeach
                            
                        </tbody>
                       </table>
                    </div>  
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>

<script>

$(document).ready(function(){
        //abrir modal para editar
       var table=$('#datatable').DataTable();
       table.on('click', '.edit_data',function(){
        $tr=$(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr=$tr.prev('.parent');
        }
       });
    });
</script>

@endsection