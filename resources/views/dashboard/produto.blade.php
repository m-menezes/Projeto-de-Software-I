@extends('template.template')
@section('conteudo')
@if(Auth::user()->roles != 2)
<?php $titulo = "Sua lista de produtos cadastrados"; ?>
@else
<?php $titulo = "Produtos cadastrados"; ?>
@endif
@include('_includes.titulo')
<div class="container">
	<div class="my-4">
		@if(Auth::user()->roles != 2)
		<div class="mx-3 my-2">
			<a class="btn btn-outline-success" href="{{route('adicionar_produto')}}">Adicionar Novo</a>
		</div>
		@endif
		<div class="row">
			@include('dashboard.form_list_produtos')
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
<script type="text/javascript">
	$('.popover-dismiss').popover({
		trigger: 'focus'
	})
</script>
@endsection