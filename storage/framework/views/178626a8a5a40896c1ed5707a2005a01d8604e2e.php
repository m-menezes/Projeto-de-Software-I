<?php $__env->startSection('conteudo'); ?>
<?php $titulo = "Produto: ".$produto->produto; ?>
<?php echo $__env->make('_includes.titulo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
	<div class="m-4">
		<div class="row">
			<!--Card-->
			<div class="card card-cascade wider reverse my-2 card-list-noticias">
				<?php if(isset($produto->imagem_path)): ?>
				<div class="view overlay">
					<img width="100%"; src="<?php echo e($produto->imagem_path); ?>" />
				</div>
				<?php endif; ?>
				<div class="card-body <?php echo (isset(Auth::user()->roles) == 0) ? 'pb-0' : ''; ?>">
					<h4 class="card-title text-center"><strong><?php echo e($produto->produto); ?></strong></h4>
					<span class="badge badge-primary">Tipo do produto: <?php echo e($produto->tipo); ?></span>
					<span class="badge badge-info">Data de Publicação: <?php echo e($produto->created_at); ?></span>
					<p class="card-text mt-3"><?php echo nl2br($produto->descricao); ?></p>
				</div>
			</div>
			<!--Card-->
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>