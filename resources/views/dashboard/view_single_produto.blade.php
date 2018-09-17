@extends('template.template')
@section('conteudo')
<?php $titulo = "Produto: ".$produto->produto; ?>
@include('_includes.titulo')
<div class="container">
	<div class="m-4">
		<div class="row">
			<!--Card-->
			<div class="card card-cascade wider reverse my-2 card-list-noticias">
				@if(isset($produto->imagem_path))
				<div class="view overlay">
					<img width="100%"; src="{{$produto->imagem_path}}" />
				</div>
				@endif
				<div class="card-body <?php echo (isset(Auth::user()->roles) == 0) ? 'pb-0' : ''; ?>">
					<h4 class="card-title text-center"><strong>{{$produto->produto}}</strong></h4>
					<span class="badge badge-primary">Tipo do produto: {{$produto->tipo}}</span>
					<span class="badge badge-info">Data de Publicação: {{$produto->created_at}}</span>
					<p class="card-text mt-3"><?php echo nl2br($produto->descricao); ?></p>
				</div>
			</div>
			<!--Card-->
		</div>
	</div>
</div>
@endsection