<?php $__env->startSection('conteudo'); ?>
<?php if(Auth::user()->roles != 2): ?>
<?php $titulo = "Sua lista de produtos cadastrados"; ?>
<?php else: ?>
<?php $titulo = "Produtos cadastrados"; ?>
<?php endif; ?>
<?php echo $__env->make('_includes.titulo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
	<div class="my-4">
		<?php if(Auth::user()->roles != 2): ?>
		<div class="mx-3 my-2">
			<a class="btn btn-outline-success" href="<?php echo e(route('adicionar_produto')); ?>">Adicionar Novo</a>
		</div>
		<?php endif; ?>
		<div class="row">
			<?php echo $__env->make('dashboard.form_list_produtos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>