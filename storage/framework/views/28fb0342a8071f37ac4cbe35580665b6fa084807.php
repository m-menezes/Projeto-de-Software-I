<?php $__env->startSection('conteudo'); ?>
<?php $titulo = "Editar Conta"; ?>
<?php echo $__env->make('_includes.titulo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
    <div class="my-4">
        <div class="accordion" id="accordionAccount">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseDados" aria-expanded="true" aria-controls="collapseDados">Editar dados</button>
                    </h5>
                </div>
                <div id="collapseDados" class="collapse" aria-labelledby="headingOne" data-parent="#accordionAccount">
                    <div class="card-body">
                        <form method="GET" action="<?php echo e(route('update_conta', $account->id)); ?>">
                            <?php echo e(csrf_field()); ?>

                            <?php if(Auth::user()->roles == 2): ?>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <input name="name" required type="text" class="form-control" id="name" placeholder="Razão social"  value="<?php echo (isset($account->name)) ? $account->name : ''; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <input name="cnpj" required type="text" class="form-control" id="cnpj" placeholder="CNPJ"  value="<?php echo (isset($account->cnpj)) ? $account->cnpj : ''; ?>">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <input name="telefone" type="text" class="form-control" id="telefone" placeholder="Telefone"  value="<?php echo (isset($account->telefone)) ? $account->telefone : ''; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input name="endereco" type="text" class="form-control" id="endereco" placeholder="Endereço"  value="<?php echo (isset($account->endereco)) ? $account->endereco : ''; ?>">
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <input name="name" type="text" class="form-control" id="nome" required placeholder="Nome" value="<?php echo (isset($account->name)) ? $account->name : ''; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <input name="endereco" type="text" class="form-control" id="endereco" placeholder="Endereço" value="<?php echo (isset($account->endereco)) ? $account->endereco : ''; ?>">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <input name="telefone" type="text" class="form-control" id="telefone" placeholder="Telefone" value="<?php echo (isset($account->telefone)) ? $account->telefone : ''; ?>">
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <button type="submit" class="btn btn-outline-success w-100">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSenha" aria-expanded="true" aria-controls="collapseSenha">Editar Senha ou Email</button>
                    </h5>
                </div>
                <div id="collapseSenha" class="collapse" aria-labelledby="headingOne" data-parent="#accordionAccount">
                    <div class="card-body">
                        <form method="GET" action="<?php echo e(route('update_senha', $account->id)); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <input name="email" type="email" class="form-control" id="email" required placeholder="Email" value="<?php echo (isset($account->email)) ? $account->email : ''; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <input name="password" type="password" class="form-control" id="password" required placeholder="Senha">
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <input name="repassword" type="password" class="form-control" id="repassword" required placeholder="Repita Senha">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <button type="submit" class="btn btn-outline-success w-100">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseDelete" aria-expanded="true" aria-controls="collapseDelete">Deletar Conta</button>
                    </h5>
                </div>
                <div id="collapseDelete" class="collapse" aria-labelledby="headingOne" data-parent="#accordionAccount">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-12 my-2 mx-4">
                                <input class="form-check-input" type="checkbox" value="" id="checkDelete">
                                <label class="form-check-label" for="checkDelete">Para deletar sua conta marque aqui.</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <a href="<?php echo e(route('delete_conta', $account->users_id)); ?>" class="btn btn-outline-danger w-100 disabled" id="deleteButton">Deletar Conta</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
</div>
<script>
    $(document).on('change', '#checkDelete', function() {
        if(this.checked) {
            $('#deleteButton').removeClass("disabled");
        }
        else{
            $('#deleteButton').addClass("disabled");
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>