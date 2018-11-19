<?php $__env->startSection('conteudo'); ?>
<?php $titulo = "Edição de notícias"; ?>
<?php echo $__env->make('_includes.titulo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
	<div class="m-4">
		<form class="m-3" method="POST" action="<?php echo e(route('update_noticia', $registro->id)); ?>" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>

			<?php echo $__env->make('dashboard.form_noticia', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<div class="row">
				<div class="form-group col-12">
					<button type="submit" class="btn btn-outline-success w-100">Salvar</button>
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
<script>
	$(document).ready(function () {
		$("#input-pt-br").fileinput({
			language: "pt-BR",
			showUpload: false,
			showRemove: false,
			allowedFileExtensions: ["jpg", "png"],
			overwriteInitial: false,
			initialPreviewAsData: true,
			// deleteUrl: 'deleteUrl',
			initialPreview: [
				"<?php if(isset($registro->imagem_path)){echo $registro->imagem_path; }?>",
			],
			initialPreviewConfig: [{
				caption: "<?php if(isset($registro->imagem_name)){echo $registro->imagem_name; }?>",
			}],
		});
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>