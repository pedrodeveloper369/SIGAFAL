@extends('layouts.main')

@section('title', 'SIGFAL-Serviços')
@section('content')
<div class="row m-t-30">
    @if (isset($sms))
    <div class="alert alert-success" role="alert">
        {{$sms}}
    </div>
    @endif
    <div class="col-md-12">
        <div class="text-left mt-3 mb-2 ">
            
            <a href="{{url('/dashboard')}}"> <button class="btn btn-primary btn-lg">HOME</button></a>
            <a href="{{url('/dashboard/servico.register')}}"> <button class="au-btn au-btn-icon au-btn--green au-btn--large"> <i class="zmdi zmdi-plus"></i> Registar</button></a>
            <!-- Button trigger modal -->
			<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#smallmodal">
			Small
			</button>
        </div>
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <div class=" table-responsive table--no-card m-b-30">
                    <table class="table ">
                        <thead class="table-dark">
                            <tr>
                                <th>Id</th>
                                <th>Descrição</th>
                                <th>Multa</th>
                                <th >Ações</th>
                            </tr>
                        </thead>
                        <tbody class="mytable">
                            
                            @foreach ($servicos as $s)
                                
                           
                        
                            <tr>
                                
                                <td>{{$s->id}}</td>
                                <td>{{$s->descricao}}</td>
                                <td>{{$s->multa}}</td>
                                
                                <td>
                                <a href="{{$s->id}}"><button type="button" class="btn btn-primary ">Editar</button></a>
                                <a href="{{$s->id}}"><button type="button" class="btn btn-secondary ">Bloquear</button></a>
                                <a href="{{$s->id}}"> <button type="button" class="btn btn-danger ">Excluir</button> </a>
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

<!-- modal small -->
<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Small Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra and the mountain
                    zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus Dolichohippus. The latter
                    resembles an ass, to which it is closely related, while the former two are more horse-like. All three belong to the
                    genus Equus, along with other living equids.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal small -->

@endsection