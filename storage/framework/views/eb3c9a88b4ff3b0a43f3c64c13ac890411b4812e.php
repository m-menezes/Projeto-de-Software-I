<?php $__env->startSection('conteudo'); ?>
<?php $titulo = "Cadastro de Organização"; ?>
<?php echo $__env->make('_includes.titulo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
    <div class="my-4">
        <form method="POST" action="<?php echo e(route('create_org')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="form-group col-sm-12">
                    <input name="name" required type="text" class="form-control" id="name" placeholder="Razão social*">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <input name="email" required type="email" class="form-control" id="email" placeholder="Email*">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <input name="cnpj" required type="text" class="form-control" id="cnpj" placeholder="CNPJ*">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <input name="endereco" type="text" class="form-control" id="endereco" placeholder="Endereço">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <input name="telefone" type="text" class="form-control" id="telefone" placeholder="Telefone">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <input name="password" required type="password" class="form-control" id="password" placeholder="Senha*">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <input name="repassword" required type="password" class="form-control" id="repassword" placeholder="Repita Senha*">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
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