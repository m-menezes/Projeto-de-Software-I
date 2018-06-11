@extends('template.template')
@section('conteudo')
<?php $titulo = "Cadastro de notícias"; ?>
@include('_includes.titulo')
<div class="container">
	<div class="m-4">
		<form class="m-3" method="POST" action="{{route('save_noticia')}}" enctype="multipart/form-data">
			{{ csrf_field() }}
			@include('dashboard.form_noticia')
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
<script>
	$(document).ready(function () {
		$("#input-pt-br").fileinput({
			language: "pt-BR",
			showUpload: false,
			allowedFileExtensions: ["jpg", "png"],
			overwriteInitial: false,
			initialPreviewAsData: true,
		});
	});
</script>
@endsection