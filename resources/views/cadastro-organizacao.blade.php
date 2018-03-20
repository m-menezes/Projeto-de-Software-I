@extends('template.template')
@section('conteudo')
<?php $titulo = "Cadastro de novas organização"; ?>
@include('_includes.titulo')
<div class="container">
    <div class="m-4">
        <form class="m-3" method="POST" action="{{route('create_org')}}">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-12">
                    <input name="name" required type="text" class="form-control" id="name" placeholder="Razão social">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <input name="email" required type="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group col-6">
                    <input name="cnpj" required type="text" class="form-control" id="cnpj" placeholder="CNPJ">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <input name="endereco" type="text" class="form-control" id="endereco" placeholder="Endereço">
                </div>
                <div class="form-group col-6">
                    <input name="telefone" type="text" class="form-control" id="telefone" placeholder="Telefone">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <input name="password" required type="password" class="form-control" id="password" placeholder="Senha">
                </div>
                <div class="form-group col-6">
                    <input name="repassword" required type="password" class="form-control" id="repassword" placeholder="Repita Senha">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-outline-success w-100">Cadastrar</button>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </form>
    </div>
</div>
@endsection
