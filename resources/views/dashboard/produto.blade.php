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
							<h2 class="d-inline weight-300">{{$registro->produto}}</h2>
							<div class="row">
								<p>{{str_limit($registro->descricao, 200, $end = ' [...]')}}</p>
							</div>
						</div>
						<div class="col-md-4">
							<p>
								<strong>Endereço:</strong>{{$registro->endereco}}<br>
								<strong>Nº:</strong>{{$registro->numero}}<br>
								<strong>Bairro:</strong>{{$registro->bairro}}<br>
								<strong>Complemento:</strong>{{$registro->complemento}}<br>
								<strong>CEP:</strong>{{$registro->cep}}<br>
							</p>

						</div>
					</div>
					<div class="row info">
						<div class="col-md-8">
							<small class="badge badge-secondary">Data de Registro:{{$registro->created_at->format('H:i - d/m/Y')}}</small>
							<small class="badge badge-success mx-2">Usuário:{{ucfirst($registro->name)}}</small>
							<small class="badge badge-success">Email:{{$registro->email}}</small>
						</div>
						<div class="col-md-4">
							<a class="btn btn-outline-danger btnExcluir" data-id="{{$registro->id}}">Deletar</a>
							<a class="btn btn-outline-secondary">Editar</a>
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
	$('.btnExcluir').click(function(){
	var id = $(this).attr('data-id');
	var par_url = "<?php echo url('/produto/deletar').'/'; ?>" + id;
	$('#modalExcluir').modal('show');
	$('#btnConfirmar').attr('href', par_url);
});
@endsection
<!-- <?php 
function doNewColor(){
	$color = dechex(rand(0x000000, 0xFFFFFF));
	return $color;
}
?> -->