<?php $__env->startSection('conteudo'); ?>
<?php if(!Auth::check() || Auth::user()->roles != 2 ): ?>
<div class="bg-topo w-100">
	<?php echo $__env->make('_includes.index-topo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<?php else: ?>
	<?php echo $__env->make('_includes.busca-org', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php if(count($registros) > 0): ?>
		<?php $titulo = "Últimos produtos disponíveis"; ?>
		<?php echo $__env->make('_includes.titulo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<div class="container">
			<div class="row">
				<?php echo $__env->make('dashboard.form_list_produtos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>
<div class="jumbotron w-100">
	<div class="container">
		<h1 class="block-title weight-300">Notícias</h1>
	</div>
</div>
<div class="container p-0 my-5">
	<div class="row">
		<div class="card-columns">
			<?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="card m-0">
				<?php if($noticia->imagem_path): ?>
					<img class="card-img-top" src="<?php echo e($noticia->imagem_path); ?>" alt="<?php echo e($noticia->titulo); ?>">
				<?php endif; ?>
				<div class="card-body">
					<h5 class="card-title"><a class="d-inline-block mb-2 text-success weight-300" href="<?php echo e(route('noticias')); ?>"><?php echo e($noticia->titulo); ?></a></h5>
					<p class="card-text"><?php echo e(str_limit($noticia->descricao, 200, $end = ' [...]')); ?></p>
					<p class="card-text"><small class="text-muted"><?php echo e($noticia->created_at->format('H:i - d/m/Y')); ?></small></p>
					<a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('noticias')); ?>">Continuar lendo</a>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
</div>
<?php echo $__env->make('_includes.sobre', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('_includes.documentacao', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>