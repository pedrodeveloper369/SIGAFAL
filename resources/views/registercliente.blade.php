@extends('layouts.main')

@section('title', 'SIGFAL-Clientes')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Clientes</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Registar Cliente</h3>
                </div>
                <hr>
                <form action="{{ url('/dashboard/clientes')}}" method="post" novalidate="novalidate">
                   @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Nome</label>
                        <input id="cc-pament" name="nome" type="text" class="form-control" aria-required="true" aria-invalid="false" >
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">Nif</label>
                        <input id="cc-name" name="nif" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                            autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                    </div>

                    <div class="form-group">
                        <div class="col col-md-3">
                            <label for="select" name="tipo_cliente" class=" form-control-label">Tipo Cliente</label>
                        </div>
                        <div class="col-12 col-md-12">
                            <select  name="tipo_cliente" id="select" class="form-control">
                                <option value="">Selecione</option>
                                <option value="Pessoa Física">Pessoa Física</option>
                                <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cc-number" class="control-label mb-1">Morada</label>
                        <input id="cc-number" name="morada" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                            data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                            autocomplete="cc-number">
                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="cc-exp" class="control-label mb-1">Email</label>
                                <input id="cc-exp" name="email" type="email" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                                    data-val-cc-exp="Please enter a valid month and year" 
                                    autocomplete="cc-exp">
                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="x_card_code" class="control-label mb-1">Telefone</label>
                            <div class="input-group">
                                <input id="x_card_code" name="telefone" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
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