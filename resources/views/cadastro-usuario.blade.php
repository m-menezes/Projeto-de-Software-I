@extends('template.template')
@section('conteudo')
<?php $titulo = "Cadastro de novos usuários"; ?>
@include('_includes.titulo')
<div class="container">
    <div class="my-4">
        <form method="POST" action="{{route('register_user')}}">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-sm-12">
                    <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <input name="endereco" type="text" class="form-control" id="endereco" placeholder="Endereço">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <input name="telefone" type="text" class="form-control" id="telefone" placeholder="Telefone">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <input name="password" type="password" class="form-control" id="password" placeholder="Senha">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <input name="repassword" type="password" class="form-control" id="repassword" placeholder="Repita Senha">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
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
</div>
@endsection