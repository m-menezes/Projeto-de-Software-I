@extends('template.template')
@section('conteudo')
<div class="bg-topo w-100">
	@include('_includes.index-topo')
</div>
<div class="jumbotron w-100">
	<div class="container">
		<h1 class="block-title weight-300">Notícias</h1>
	</div>
</div>
<div class="container p-0 mb-4">
	<div class="row m-2">
		<div class="card-columns">
			@foreach($noticias as $noticia)
			<div class="card">
				@if($noticia->imagem_path)
				<img class="card-img-top" src="{{$noticia->imagem_path}}" alt="{{$noticia->titulo}}">
				@endif
				<div class="card-body">
					<h5 class="card-title"><a class="d-inline-block mb-2 text-success weight-300" href="{{route('noticias')}}">{{$noticia->titulo}}</a></h5>
					<p class="card-text">{{str_limit($noticia->descricao, 200, $end = ' [...]')}}</p>
					<p class="card-text"><small class="text-muted">{{$noticia->created_at->format('H:i - d/m/Y')}}</small></p>
					<a class="btn btn-sm btn-outline-secondary" href="{{route('noticias')}}">Continuar lendo</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection

