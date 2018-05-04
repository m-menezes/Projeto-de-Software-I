@extends('template.template')
@section('conteudo')
<?php $titulo = "Sua lista de produtos cadastrados"; ?>
@include('_includes.titulo')
<div class="container">
	<div class="m-4">
		<div class="mx-3 my-2">
			<a class="btn btn-outline-success" href="{{route('adicionar_produto')}}">Adicionar Novo</a>
		</div>
		<div class="row mx-3">
			@foreach($registros as $registro)
			<div class="card my-2 w-100">
				<div class="card-body">
					<div class="row">
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-7 text-sm-center text-md-left px-0">
									<h5 class="d-inline weight-300 card-title">{{$registro->produto}}</h5>
								</div>
								<div class="col-md-5 text-sm-center text-md-right pt-2">
									<span tabindex="0" class="m-1 text-info" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Tipo: {{$registro->tipo}}">
										<i class="fas fa-recycle"></i>
									</span>
									<span tabindex="0" class="m-1 text-info" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Usuário: {{ucfirst($registro->name)}}">
										<i class="far fa-user"></i>
									</span>
									<span tabindex="0" class="m-1 text-info" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Email: {{$registro->email}}">
										<i class="far fa-envelope"></i>
									</span>
									<span tabindex="0" class="m-1 text-info" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Data de Registro: {{$registro->created_at->format('H:i - d/m/Y')}}">
										<i class="far fa-calendar-alt"></i>
									</span>
									<span tabindex="0" class="m-1 text-info" id="datareserva{{$registro->id}}" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Data de Reserva: {{ isset($registro->datareserva) ? $registro->datareserva : ''}}" <?php if($registro->datareserva == NULL) { echo 'style="display:none"';} ?>>
										<i class="far fa-clock"></i>
									</span>
									<span tabindex="0" class="m-1 text-info" id="idorganizacao{{$registro->id}}" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Reservado por: {{$registro->idorganizacao}}" <?php if($registro->idorganizacao == NULL) { echo 'style="display:none"';} ?>>
										<i class="fas fa-warehouse"></i>
									</span>
								</div>
							</div>
							<div class="row">
								<p>{{str_limit($registro->descricao, 350, $end = ' [...]')}}</p>
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
								<a class="btn btn-outline-danger btnExcluir" data-id="{{$registro->id}}">Deletar</a>
								<a class="btn btn-outline-secondary" href="{{route('editar_produto', $registro->id)}}">Editar</a>
								@endif
								@if(Auth::user()->roles == 2)
								<a class="btn btn-outline-info" id="status{{$registro->id}}" href="javascript:altera_status({{$registro->id}})">{{$registro->status}}</a>
								@endif
							</div>

						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="modalExcluir">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title weight-300">Deletar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<a class="btn btn-outline-danger col-6" id="btnConfirmar">Sim</a>
				<a class="btn btn-secondary col-6" data-dismiss="modal">Não</a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')


$('.popover-dismiss').popover({
	trigger: 'focus'
})

$('.btnExcluir').click(function(){
	var id = $(this).attr('data-id');
	var par_url = "<?php echo url('/produto/deletar').'/'; ?>" + id;
	$('#modalExcluir').modal('show');
	$('#btnConfirmar').attr('href', par_url);
});

<!-- FUNÇÕES BOTÃO RESERVAR -->
function altera_status(idProduto){
	$.ajax({
		type:"GET",
		url:"{{route('status_produto')}}",
		data: {id : idProduto},
		success: function(retorno) {
			$("#status"+idProduto).empty();
			if(retorno.status=='Reservado'){ 
			console.log(retorno);
				$("#idorganizacao"+idProduto).attr('data-content', 'Reservado por: '+retorno.idorganizacao).toggle();
				$("#datareserva"+idProduto).attr('data-content', 'Data de Reserva: '+retorno.datareserva).toggle();
				$("#status"+idProduto).append('Reservado');
			}
			else{
				$("#status"+idProduto).append('Disponivel');
				$("#idorganizacao"+idProduto).toggle();
				$("#datareserva"+idProduto).toggle();
			}  		          
		},
		error: function(retorno){
		},
	});
}
@endsection