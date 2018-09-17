@extends('template.template')
@section('conteudo')
<?php $titulo = "Lista de Usuários"; ?>
@include('_includes.titulo')
<div class="container">
	<div class="m-4">
		<h6 class="weight-300">Usuários [ <?php echo count($usuarios); ?> ]</h6>
		<table class="table table-responsive-sm table-bordered table-striped table-hover table-sm">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Nível de Acesso</th>
					<th>Email</th>
					<th>Endereço</th>
					<th>Telefone</th>
					<th>Data de registro</th>
				</tr>
			</thead>
			<tbody>
				@foreach($usuarios as $usuario)
				<tr>
					<td>{{$usuario->id}}</td>
					<td>{{$usuario->name}}</td>
					@if($usuario->id != 1)
					<td>
						<div class="input-group">
							<select class="custom-select" id="userroles" data-id="{{$usuario->users_id}}">
								<option value="0" <?php echo ($usuario->roles == 0) ? "selected" : ""; ?>>SuperAdmin</option>
								<option value="1" <?php echo ($usuario->roles == 1) ? "selected" : ""; ?>>Usuário</option>
							</select>
						</div>
					</td>
					@else
					<td>SuperAdmin</td>
					@endif
					<td>{{$usuario->email}}</td>
					<td>{{$usuario->endereco}}</td>
					<td>{{$usuario->telefone}}</td>
					<td>{{$usuario->created_at->format('H:i - d/m/Y')}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<h6 class="weight-300">Organizações [ <?php echo count($organizacoes); ?> ]</h6>
		<table class="table table-responsive-sm table-bordered table-striped table-hover table-sm">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Nível de Acesso</th>
					<th>CNPJ</th>
					<th>Email</th>
					<th>Endereço</th>
					<th>Telefone</th>
					<th>Data de registro</th>
				</tr>
			</thead>
			<tbody>
				@foreach($organizacoes as $organizacao)
				<?php 
				switch ($organizacao->roles) {
					case 0:
					$nivel = 'SuperAdmin';
					$class = 'table-warning';
					break;
					case 1:
					$nivel = 'Usuário';
					$class = '';
					break;
					case 2:
					$nivel = 'Organização';
					$class = '';
					break;
					default:
					$nivel = 'Error';
					$class = 'table-danger';
					break;
				}
				?>
				<tr>
					<td>{{$organizacao->id}}</td>
					<td>{{$organizacao->name}}</td>
					<td>{{$nivel}}</td>
					<td>{{$organizacao->cnpj}}</td>
					<td>{{$organizacao->email}}</td>
					<td>{{$organizacao->endereco}}</td>
					<td>{{$organizacao->telefone}}</td>
					<td>{{$organizacao->created_at->format('H:i - d/m/Y')}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<script>
	$(document).on('change', '#userroles', function() {
		altera_status( $(this).data('id') , $(this).val() );
	});
	function altera_status(id, value){
		$.ajax({
			type:"GET",
			url:"{{route('roles_users')}}",
			data: {
				id : id,
				value : value,
			},  
			success: function(retorno) {
				location.reload();
			},
			error: function(retorno){
				console.log(retorno);
			},
		});
	}
</script>
@endsection