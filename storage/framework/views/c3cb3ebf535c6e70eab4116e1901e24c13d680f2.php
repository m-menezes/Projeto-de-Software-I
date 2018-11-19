<?php $__env->startSection('conteudo'); ?>
<div class="container">
	<div class="row h-100">
		<div class="table-cell cadastro">
			<form method="POST" action="<?php echo e(route('doLogin')); ?>"  class="login-form">
				<?php echo e(csrf_field()); ?>

				<div class="icone-cadastro">
					<i class="far fa-5x fa-user"></i>
					<h3 class="weight-300">Login</h3>
				</div>
				<div class="form-group">
					<input name="email-user" type="email" class="form-control" id="email-user" placeholder="Email">
				</div>
				<div class="form-group">
					<input name="password-user" type="password" class="form-control" id="password-user" placeholder="Senha">
				</div>
				<button type="submit" class="btn btn-outline-success w-100">LOGIN</button>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>