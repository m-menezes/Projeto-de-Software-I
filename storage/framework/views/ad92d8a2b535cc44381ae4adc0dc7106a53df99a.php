<?php $__env->startSection('conteudo'); ?>
<?php $titulo = "Notícias"; ?>
<?php echo $__env->make('_includes.titulo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
	<div class="m-4">
		<?php if(auth()->guard()->check()): ?>
		<?php if(Auth::user()->roles == 0): ?>
		<div class="mx-3 my-2">
			<a class="btn btn-outline-success" href="<?php echo e(route('adicionar_noticia')); ?>">Adicionar Nova</a>
		</div>
		<?php endif; ?>
		<?php endif; ?>
		<div class="row">
			<?php $__currentLoopData = $registros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<!--Card-->
			<div class="card card-cascade wider reverse my-2 card-list-noticias">
				<?php if($registro->imagem_path): ?>
				<div class="view overlay">
					<img width="100%"; src="<?php echo e($registro->imagem_path); ?>" />
				</div>
				<?php endif; ?>
				<div class="card-body <?php echo (isset(Auth::user()->roles) == 0) ? 'pb-0' : ''; ?>">
					<h4 class="card-title text-center"><strong><?php echo e($registro->titulo); ?></strong></h4>
					<h6 class="indigo-text weight-300">Data de Publicação: <?php echo e($registro->created_at); ?></h6>
					<p class="card-text"><?php echo nl2br($registro->descricao); ?></p>
				</div>
				<?php if(auth()->guard()->check()): ?>
				<?php if(Auth::user()->roles == 0 && $registro->id > 5): ?>
				<div class="card-action text-right m-3 mt-0 pt-3 border-top">
					<a class="btn btn-outline-danger btn-small pl-5 pr-5 btnExcluir" data-id="<?php echo e($registro->id); ?>" data-tipo="noticias">Deletar</a>
					<a class="btn btn-outline-secondary btn-small pl-5 pr-5" href="<?php echo e(route('editar_noticia', $registro->id)); ?>">Editar</a>
				</div>
				<?php endif; ?>
				<?php else: ?>
				<div class="m-3"></div>
				<?php endif; ?>
			</div>
			<!--Card-->
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="modalExcluir">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title weight-300">Deletar Notícia</h5>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>