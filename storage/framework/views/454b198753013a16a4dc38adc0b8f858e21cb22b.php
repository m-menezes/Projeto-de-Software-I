<?php $__env->startSection('conteudo'); ?>
<?php $titulo = "Lista de Usuários"; ?>
<?php echo $__env->make('_includes.titulo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
				<?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($usuario->id); ?></td>
					<td><?php echo e($usuario->name); ?></td>
					<?php if($usuario->id != 1): ?>
					<td>
						<div class="input-group">
							<select class="custom-select" id="userroles" data-id="<?php echo e($usuario->users_id); ?>">
								<option value="0" <?php echo ($usuario->roles == 0) ? "selected" : ""; ?>>SuperAdmin</option>
								<option value="1" <?php echo ($usuario->roles == 1) ? "selected" : ""; ?>>Usuário</option>
							</select>
						</div>
					</td>
					<?php else: ?>
					<td>SuperAdmin</td>
					<?php endif; ?>
					<td><?php echo e($usuario->email); ?></td>
					<td><?php echo e($usuario->endereco); ?></td>
					<td><?php echo e($usuario->telefone); ?></td>
					<td><?php echo e($usuario->created_at->format('H:i - d/m/Y')); ?></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
				<?php $__currentLoopData = $organizacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organizacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
					<td><?php echo e($organizacao->id); ?></td>
					<td><?php echo e($organizacao->name); ?></td>
					<td><?php echo e($nivel); ?></td>
					<td><?php echo e($organizacao->cnpj); ?></td>
					<td><?php echo e($organizacao->email); ?></td>
					<td><?php echo e($organizacao->endereco); ?></td>
					<td><?php echo e($organizacao->telefone); ?></td>
					<td><?php echo e($organizacao->created_at->format('H:i - d/m/Y')); ?></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
			url:"<?php echo e(route('roles_users')); ?>",
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>