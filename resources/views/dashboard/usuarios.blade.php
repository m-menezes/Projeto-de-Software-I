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
				<?php 
				switch ($usuario->roles) {
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
				<tr class="{{$class}}">
					<td>{{$usuario->id}}</td>
					<td>{{$usuario->name}}</td>
					<td>{{$nivel}}</td>
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
				<tr class="{{$class}}">
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
@endsection