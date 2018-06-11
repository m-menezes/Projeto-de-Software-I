@extends('template.template')
@section('conteudo')
<?php $titulo = "Editar produto"; ?>
@include('_includes.titulo')
<div class="container">
	<div class="m-4">
		<form class="m-3" method="get" action="{{route('update_produto', $registro->id)}}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<!-- PRODUTO -->
			<h5 class="col-12 weight-300">PRODUTO</h5>
			@include('dashboard.form_produto')
			<div class="row">
				<div class="form-group col-12">
					<button type="submit" class="btn btn-outline-success w-100">Salvar</button>
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