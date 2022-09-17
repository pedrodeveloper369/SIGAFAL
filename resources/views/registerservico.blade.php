@extends('layouts.main')

@section('title', 'SIGFAL-Clientes')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Serviços</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Registar Serviços</h3>
                </div>
                <hr>
                <form action="{{ url('/dashboard/servicos')}}" method="post" novalidate="novalidate">
                   @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="cc-exp" class="control-label mb-1">Descrição</label>
                                <input id="cc-exp" name="descricao" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                                    data-val-cc-exp="Please enter a valid month and year" 
                                    autocomplete="cc-exp">
                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="x_card_code" class="control-label mb-1">Multa</label>
                            <div class="input-group">
                                <input id="x_card_code" name="multa" type="text" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
                                    data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button id="payment-button" type="submit" class="btn btn-success btn-md">
                            <i class="fa fa-dot-circle-o"></i>
                            Registar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection