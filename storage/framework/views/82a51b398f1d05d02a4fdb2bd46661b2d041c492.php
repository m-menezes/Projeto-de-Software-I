<?php $__env->startSection('conteudo'); ?>
<?php $titulo = "Cadastro de produto"; ?>
<?php echo $__env->make('_includes.titulo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
	<div class="m-4">
		<form class="m-3" method="POST" action="<?php echo e(route('create_produto')); ?>" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>

			<!-- PRODUTO -->
			<h5 class="col-12 weight-300">PRODUTO</h5>
			<?php echo $__env->make('dashboard.form_produto', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<div class="row">
				<div class="form-group col-12">
					<button type="submit" class="btn btn-outline-success w-100">Cadastrar</button>
				</div>
			</div>
			<?php if($errors->any()): ?>
			<div class="alert alert-danger">
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
			<?php endif; ?>
		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>