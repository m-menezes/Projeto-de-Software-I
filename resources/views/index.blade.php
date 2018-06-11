@extends('template.template')
@section('conteudo')
@if (!Auth::check() || Auth::user()->roles != 2 )
<div class="bg-topo w-100">
	@include('_includes.index-topo')
</div>
@include('_includes.sobre')
@else
@if(count($registros) > 0)
<?php $titulo = "Últimos produtos disponíveis"; ?>
@include('_includes.titulo')
<div class="container">
	@foreach($registros as $registro)
	<?php $cor = ($registro->status == 'Reservado') ? 'danger' : 'info'; ?>
	<div class="card my-2 w-100" id="card-{{$registro->id}}" style="border-color: <?php echo ($registro->datareserva == NULL) ? '#17a2b8' : 'red'; ?>;">
		<div class="card-body">
			@if($registro->idorganizacao != NULL)
			<div class="{{$cor}}-ribbon">Reservado</div>
			@else
			<div class="blue-ribbon">Disponivel</div>
			@endif
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-7 text-sm-center text-md-left px-0">
							<h5 class="d-inline weight-300 card-title">{{$registro->produto}}</h5>
						</div>
						<div class="col-md-5 text-sm-center text-md-right pt-2">
							<span tabindex="0" class="m-1 text-{{$cor}}" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Tipo: {{$registro->tipo}}">
								<i class="fas fa-recycle"></i>
							</span>
							<span tabindex="0" class="m-1 text-{{$cor}}" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Data de Registro: {{$registro->created_at->format('H:i - d/m/Y')}}">
								<i class="far fa-calendar-alt"></i>
							</span>
							<span tabindex="0" class="m-1 text-{{$cor}}" id="datareserva{{$registro->id}}" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Data de Reserva: {{ isset($registro->datareserva) ? $registro->datareserva : ''}}" <?php if($registro->datareserva == NULL) { echo 'style="display:none"';} ?>>
								<i class="far fa-clock"></i>
							</span>
							<span tabindex="0" class="m-1 text-{{$cor}}" id="idorganizacao{{$registro->org_name}}" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Reservado por: {{$registro->org_name}}" <?php if($registro->org_name == NULL) { echo 'style="display:none"';} ?>>
								<i class="fas fa-warehouse"></i>
							</span>
							<span tabindex="0" class="m-1 text-{{$cor}}" id="idorganizacao{{$registro->org_telefone}}" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Telefone da empresa: {{$registro->org_telefone}}" <?php if($registro->org_telefone == NULL) { echo 'style="display:none"';} ?>>
								<i class="fas fa-phone"></i>
							</span>
						</div>
					</div>
					<div class="row">
						<p style="width: 100%;">{{str_limit($registro->descricao, 350, $end = ' [...]')}}</p>
					</div>
				</div>
				<div class="col-md-4">
					<p>
						<strong>Endereço: </strong>{{$registro->endereco}}<br>
						<strong>Nº: </strong>{{$registro->numero}}<br>
						<strong>Bairro: </strong>{{$registro->bairro}}<br>
						<strong>Complemento: </strong>{{$registro->complemento}}<br>
						<strong>CEP: </strong>{{$registro->cep}}<br>
					</p>
					<div class="row">
						@if(Auth::user()->roles != 2 && (Auth::user()->roles == 0 || $registro->idpessoa == Auth::user()->idroles) )
						<a class="btn btn-outline-danger mr-2 btnExcluir" data-id="{{$registro->id}}">Deletar</a>
						<a class="btn btn-outline-secondary" href="{{route('editar_produto', $registro->id)}}">Editar</a>
						@endif
						@if(Auth::user()->roles == 2)
						<a class="btn btn-outline-{{$cor}}" id="status{{$registro->id}}" href="{{route('status_produto', $registro->id)}}"><?php echo ($registro->status == 'Reservado') ? 'Cancelar Reserva' : 'Reservar' ?></a>
						@endif
					</div>

				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endif
@endif
<div class="jumbotron w-100">
	<div class="container">
		<h1 class="block-title weight-300">Notícias</h1>
	</div>
</div>
<div class="container p-0 mt-5">
	<div class="row">
		<div class="card-columns">
			@foreach($noticias as $noticia)
			<div class="card m-0">
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
@include('_includes.documentacao')
<script type="text/javascript">
	$('.popover-dismiss').popover({
		trigger: 'focus'
	})

	$('.btnExcluir').click(function(){
		var id = $(this).attr('data-id');
		var par_url = "<?php echo url('/produto/deletar').'/'; ?>" + id;
		$('#modalExcluir').modal('show');
		$('#btnConfirmar').attr('href', par_url);
	});
</script>
<style>
.blue-ribbon {
	background: #17a2b8;
	color: #FFF;
	padding: 7px 20px;
	position: absolute;
	bottom: 10px;
	right: -1px;
}
.blue-ribbon:before {
	position: absolute;
	right: 0;
	top: 0;
	bottom: 0;
	content: "";
	left: -12px;
	border-top: 19px solid transparent;
	border-right: 12px solid #17a2b8;
	border-bottom: 19px solid transparent;
	width: 0;
}
.danger-ribbon {
	background: #dc3545;
	color: #FFF;
	padding: 7px 20px;
	position: absolute;
	bottom: 10px;
	right: -1px;
}
.danger-ribbon:before {
	position: absolute;
	right: 0;
	top: 0;
	bottom: 0;
	content: "";
	left: -12px;
	border-top: 19px solid transparent;
	border-right: 12px solid #dc3545;
	border-bottom: 19px solid transparent;
	width: 0;
}
</style>
@endsection

