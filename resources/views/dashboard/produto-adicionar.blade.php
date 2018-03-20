@extends('template.template')
@section('conteudo')
<?php $titulo = "Cadastro de produto"; ?>
@include('_includes.titulo')
<div class="container">
	<div class="m-4">
		<form class="m-3" method="POST" action="{{route('create_produto')}}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<!-- PRODUTO -->
			<h5 class="col-12 weight-300">PRODUTO</h5>
			<div class="row">
				<div class="form-group col-6">
					<input name="produto" type="text" required class="form-control" id="produto" placeholder="Produto" value="">
				</div>
				<div class="form-group col-6">
					<select name="tipo" class="form-control" id="tipo">
						<option disabled selected>Tipo de Produto</option>
						<option value="plastico">Plástico</option>
						<option value="metal">Metal</option>
						<option value="papel">Papel</option>
						<option value="vidro">Vidro</option>
						<option value="tecido">Tecido</option>
						<option value="eletronico">Eletrónico</option>
						<option value="outro">Outro</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-12">
					<textarea name="descricao" type"text" class="form-control" id="descricao" placeholder="Particularidades da coleta  [peso, tamanho]" rows="5"></textarea>
				</div>
			</div>
			<!-- LOCALIZACAO -->
			<h5 class="col-12 weight-300">LOCALIZAÇÃO</h5>
			<div class="row">
				<div class="form-group col-3">
					<input name="cep" type="text" required class="form-control" id="cep" placeholder="CEP" value="">
				</div>
				<div class="form-group col-7">
					<input name="endereco" type="text" required class="form-control" id="endereco" placeholder="Endereço" value="">
				</div>
				<div class="form-group col-2">
					<input name="numero" type="text" required class="form-control" id="numero" placeholder="Nº" value="">
				</div>
			</div>
			<div class="row">
				<div class="form-group col-6">
					<input name="bairro" type="text" required class="form-control" id="bairro" placeholder="Bairro" value="">
				</div>
				<div class="form-group col-6">
					<input name="complemento" type="text" class="form-control" id="complemento" placeholder="Complemento" value="">
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