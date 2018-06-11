@extends('template.template')
@section('conteudo')
<?php $titulo = "Edição de notícias"; ?>
@include('_includes.titulo')
<div class="container">
	<div class="m-4">
		<form class="m-3" method="POST" action="{{route('update_noticia', $registro->id)}}" enctype="multipart/form-data">
			{{ csrf_field() }}
			@include('dashboard.form_noticia')
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
<script>
	$(document).ready(function () {
		$("#input-pt-br").fileinput({
			language: "pt-BR",
			showUpload: false,
			showRemove: false,
			allowedFileExtensions: ["jpg", "png"],
			overwriteInitial: false,
			initialPreviewAsData: true,
			// deleteUrl: 'deleteUrl',
			initialPreview: [
				"<?php if(isset($registro->imagem_path)){echo $registro->imagem_path; }?>",
			],
			initialPreviewConfig: [{
				caption: "<?php if(isset($registro->imagem_name)){echo $registro->imagem_name; }?>",
			}],
		});
	});
</script>
@endsection