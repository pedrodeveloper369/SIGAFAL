@extends('layouts.template')

@section('title', 'Dados Pagamento')


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
                    <h2 class="title-1"></h2>
                </div>
            </div>
        </div>
        <div class="myresponsivetable table-responsive table-responsive-data3 ">
            
            <div class="container">
         
                <div class="row ml-4">
                  
                  <div class="col-md-12">
                   <h4 class="title-3">Dados para o Pagamento</h4><hr>
                   
                   
                    <form action="{{url('/dashboard/pagamento/store')}}" method="Post" novalidate="novalidate">
                        @csrf
                    
                        @for ($i=0; $i<$qtd; $i++)
                            
                        <div class="card">
                            <div class="card-body">
                        
                       
                        <div class="row">

                            <div class="col-6">
                                
                                <label for="data" class="control-label mb-1">Data</label>
                                <div class="input-group">
                                     <input id="data{{$i+1}}" name="data{{$i+1}}" type="month" min="0" class="form-control"  required>
                                 </div>
                            </div>

                            <div class="col-6">
                                
                                <label for="preco" class="control-label mb-1">Valor</label>
                                <div class="input-group">
                                     <input id="preco{{$i+1}}" name="preco{{$i+1}}" type="number" min="0" class="form-control"  required>
                                 </div>
                            </div>

                            <div class="col-6">
                                <label for="banco" class="control-label mb-1">Multa</label>
                                <select name="multa{{$i+1}}" id="multa{{$i+1}}" class="form-control">
                                    <option selected="selected">Selecione</option>
                                    <option value="com multa">Com Multa</option>
                                    <option value="sem multa">Sem Multa</option>
                                </select>
                            </div>

                            <div class="col-6" id="valor_multa">
                                <label for="banco" class="control-label mb-1">Valor da Multa</label>
                                <input id="valor_multa{{$i+1}}" name="valor_multa{{$i+1}}" type="number" min="0" class="form-control"  required>
                                 
                            </div>

                            
                            

                            
                        </div>

                        

                        </div>
                    </div>
                     @endfor
                        <div class="">
                            <button type="submit" class="btn col-12 btn-primary">Concluir Pagamento</button>
                        </div>

                    </form>
                    
                  </div>
              </div>
        </div>
    </div>
</div>



@endsection