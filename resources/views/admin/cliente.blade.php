@extends('layouts.template')

@section('title', 'Clientes')


@section('content')

<div class="section__content section__content--p30">
    <div class="container-fluid">

        @if($errors->any())
              
                         @foreach($errors->all() as $erro)
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                <span class="badge badge-pill badge-danger">Erro</span>
                                {{$erro}} 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach            
                    

                 @endif  

                 @if(isset($sms))

                 <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                     <span class="badge badge-pill badge-success">Success</span>
                     {{$sms}}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
 
                 @endif


        <div class="row mb-3">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h2 class="title-1">Serviços</h2>
                    <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#registarusuarioModal" >
                        <i class="zmdi zmdi-plus"></i>Registar</button>
                </div>
            </div>
        </div>
        <div class="myresponsivetable table-responsive table-responsive-data3 ">
        <table class="table " id="datatable">
            <thead class="table-dark">
           
                <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Nif</th>
                        <th>Morada</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Mensalidade</th>
                        <th>Serviço</th>
                        <th>PT</th>
                        <th>Acções</th>
                    </tr>
                
            </thead>
            <tbody>
                

                @php 
                //formatando o valor que vem da BD no formato de dinheiro
               // $valor = number_format($s->multa, 2,",",".");

                @endphp
            @if(isset($cliente))
                  @foreach($cliente as $c)
                <tr>
                    <td>{{ $c->id}}</td>
                    <td>{{ $c->nome}}</td>
                    <td>{{ $c->nif}}</td>
                    <td>{{ $c->morada}}</td>
                    <td>{{ $c->telefone}}</td>
                    <td>{{ $c->email}}</td>
                    <td>{{ $c->tipo}}</td>
                    <td>{{ $c->preco}}</td>
                    <td>{{ $c->servico}}</td>
                    <td>{{ $c->pt}}</td>
                    <td> 
                        <button class="btn btn-md btn-outline-primary editar" id="">
                            <a class="bnEditar" href="{{url("")}}">Alterar</a>
                        </button>
                    </td>
                   

                </tr>
                @endforeach
                   
            @endif 
            </tbody>
          </table>
        </div>
    </div>
</div>




<!-- modal registar Clientes -->
<div class="modal fade" id="registarusuarioModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Registar Clientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{url('/dashboard/clientes/store')}}" method="Post" novalidate="novalidate">
                                    @csrf

                                    <div class="row">
                                        
                                        <div class="col-6">
                                            <label for="nome" class="control-label mb-1">Nome</label>
                                            <div class="input-group">
                                                <input id="nome" name="nome" type="text" class="form-control"  required>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label for="nif" class="control-label mb-1">Nif</label>
                                            <div class="input-group">
                                                <input id="nif" name="nif" type="text" class="form-control"  required>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        
                                        <div class="col-6">
                                            <label for="morada" class="control-label mb-1">Morada</label>
                                            <div class="input-group">
                                                <input id="morada" name="morada" type="text" class="form-control"  required>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label for="telefone" class="control-label mb-1">Telefone</label>
                                            <div class="input-group">
                                                <input id="telefone" name="telefone" type="text" class="form-control"  required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-6">
                                            <label for="email" class="control-label mb-1">Email</label>
                                            <div class="input-group">
                                                <input id=email" name="email" type="text" class="form-control"  required>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <label for="select" class=" form-control-label">Tipo</label>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <select name="tipo" id="select" class="form-control">
                                                        <option selected="selected">Selecione</option>
                                                        <option value="Particular">Particular</option>
                                                        <option value="Empresa">Empresa</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        
                                    </div>


                                    <div class="row">
                                        
                                        <div class="col-6">
                                            <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <label for="select" class=" form-control-label">Serviço</label>
                                                </div>
                                              
                                                <div class="col-12 col-md-12">
                                                    <select name="servico" id="select" class="form-control">
                                                        <option selected="selected">Selecione</option>
                                                        @foreach($servicos as $s)
                                                        <option value="{{$s->id}}">{{$s->descricao}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <label for="select" class=" form-control-label">PT</label>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <select name="pt" id="select" class="form-control">
                                                        <option selected="selected">Selecione</option>
                                                        @foreach( $pt as $p)
                                                        <option value="{{$p->id}}">{{$p->localizacao}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <label for="preco" class="control-label mb-1">Preço</label>
                                            <div class="input-group">
                                                <input id="preco" name="preco" type="text" class="form-control"  required>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="text-right">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- end modal medium -->

@if(@isset($se))
@php

@endphp

<!-- modal alterar serviços -->
<div class="modal fade" id="alterarServicoModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Registar Serviços</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{url('/user/registar')}}" method="Post" novalidate="novalidate">
                                    @csrf

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <label for="select" class=" form-control-label">Descrição</label>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <select name="permission" id="select" class="form-control">
                                                        <option selected="selected">{{$s->descricao}}</option>
                                                        <option value="Monofásico">Monofásico</option>
                                                        <option value="Trifásico">Trifásico</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="multa" class="control-label mb-1">Multa</label>
                                            <div class="input-group">
                                                <input id="multa" name="email" value="{{$s->multa}}" type="text" class="form-control"  required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-right">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endif
<!-- end modal medium -->
<script>
    $(document).ready(function(){
        //mascaras com jmask
        $('#multa').mask('#.##0,00',{reverse: true});


    });

    
    $(document).on('click','.editar',function(){

        //$('#alterarServicoModal').modal('show');
    });   
    
    
    $(document).ready(function(){
        //codigo para inicializar a data table
       var table=$('#datatable').DataTable();
     
            
        });
</script>

@endsection