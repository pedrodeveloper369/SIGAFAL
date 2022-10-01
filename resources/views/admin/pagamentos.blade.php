@extends('layouts.template')

@section('title', 'Pagamentos')


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

                 @if(session()->has('sms_erro'))

                 <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                     <span class="badge badge-pill badge-danger">erro</span>
                 
                     {{ session()->get('sms_erro') }}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
 
                 @endif


        <div class="row mb-3">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h2 class="title-1">Pagamentos</h2>
                    <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#modalbuscar" >
                        <i class="zmdi zmdi-plus"></i>Pagamento</button>

                        
                </div>
            </div>
        </div>
        <div class="myresponsivetable table-responsive table-responsive-data3 ">
        <table class="table " id="datatable">
            <thead class="table-dark">
           
                <tr>
                        <th>Id</th>
                        <th>Modo Pagameto</th>
                        <th>Banco</th>
                        <th>Valor</th>
                        <th>Valor Total</th>
                        <th>Estado</th>
                        <th>Quantidade</th>
                        <th>Serviço</th>
                        <th>PT</th>
                        <th>Data Pagamento</th>

                    </tr>
                
            </thead>
            <tbody>
                

                @php 
                //formatando o valor que vem da BD no formato de dinheiro
               // $valor = number_format($s->multa, 2,",",".");

                @endphp
            @if(isset($pagamento))
                  @foreach($pagamento as $pag)
                <tr>
                    
                </tr>
                @endforeach
                   
            @endif 
            </tbody>
          </table>
        </div>
    </div>
</div>
   

<!--modal buscar cliente-->
<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="modalbuscar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buscar Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="d-flex" action="{{url('/dashboard/pagamentos/buscarCliente')}}" method="Post" role="search">
                @csrf
                <input id="nif" name="nif" class="form-control me-2" type="search" placeholder="Informe o NIF do Cliente" aria-label="Search" autofocus>
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
      </div>
    </div>
  </div>

<script>
    $(document).ready(function(){
        $('#modalbuscar').on('show.bs.modal', function(){
            $(this).find('[autofocus]').focus();
        });
    })
</script>

@endsection