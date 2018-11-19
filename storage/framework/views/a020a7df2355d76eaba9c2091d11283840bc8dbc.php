<div class="col-md-12">
	<?php $__currentLoopData = $registros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php if($registro->datareserva != NULL && (Auth::user()->roles == 2  && $registro->idorganizacao != Auth::user()->idroles)) {
		continue;
	} ?>
	<?php $cor = ($registro->status == 'Reservado') ? 'danger' : 'info'; ?>
	<div class="card my-2 w-100" id="card-<?php echo e($registro->id); ?>" style="border-color: <?php echo ($registro->datareserva == NULL) ? '#28a745' : 'red'; ?>;">
		<div class="card-body pb-0 ">
			<?php if($registro->idorganizacao != NULL): ?>
			<div class="<?php echo e($cor); ?>-ribbon">Reservado</div>
			<?php else: ?>
			<div class="blue-ribbon">Disponivel</div>
			<?php endif; ?>
			<div class="row">
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-7 text-sm-center text-md-left px-0">
							<h4 class="d-inline card-title"><a class="weight-600 text-dark" href="<?php echo e(route('view_produto', $registro->id)); ?>"><?php echo e($registro->produto); ?></a></h4>
						</div>
						<div class="col-md-5 text-sm-center text-md-right pt-2">
							<?php if(isset($registro->tipo)): ?>
							<span tabindex="0" class="m-1 text-<?php echo e($cor); ?>" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Tipo: <?php echo e($registro->tipo); ?>">
								<i class="fas fa-recycle"></i>
							</span>
							<?php endif; ?>
							<?php if(Auth::user()->idroles == $registro->idorganizacao || (Auth::user()->idroles == $registro->idpessoa && Auth::user()->roles != 2)): ?>
							<span tabindex="0" class="m-1 text-<?php echo e($cor); ?>" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Usuário: <?php echo e(ucfirst($registro->user_name)); ?>">
								<i class="far fa-user"></i>
							</span>
							<span tabindex="0" class="m-1 text-<?php echo e($cor); ?>" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Email: <?php echo e($registro->user_email); ?>">
								<i class="far fa-envelope"></i>
							</span>
							<?php endif; ?>
							<span tabindex="0" class="m-1 text-<?php echo e($cor); ?>" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Data de Registro: <?php echo e($registro->created_at->format('H:i - d/m/Y')); ?>">
								<i class="far fa-calendar-alt"></i>
							</span>
							<span tabindex="0" class="m-1 text-<?php echo e($cor); ?>" id="datareserva<?php echo e($registro->id); ?>" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Data de Reserva: <?php echo e(isset($registro->datareserva) ? $registro->datareserva : ''); ?>" <?php if($registro->datareserva == NULL) { echo 'style="display:none"';} ?>>
								<i class="far fa-clock"></i>
							</span>
							<span tabindex="0" class="m-1 text-<?php echo e($cor); ?>" id="idorganizacao<?php echo e($registro->org_name); ?>" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Reservado por: <?php echo e($registro->org_name); ?>" <?php if($registro->org_name == NULL) { echo 'style="display:none"';} ?>>
								<i class="fas fa-warehouse"></i>
							</span>
							<span tabindex="0" class="m-1 text-<?php echo e($cor); ?>" id="idorganizacao<?php echo e($registro->org_telefone); ?>" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Telefone da empresa: <?php echo e($registro->org_telefone); ?>" <?php if($registro->org_telefone == NULL) { echo 'style="display:none"';} ?>>
								<i class="fas fa-phone"></i>
							</span>
						</div>
					</div>
					<div class="row my-2">
						<p><?php echo e(str_limit($registro->descricao, 350, $end = ' [...]')); ?></p>
						<?php if((Auth::user()->idroles == $registro->idorganizacao) || (Auth::user()->idroles == $registro->idpessoa && Auth::user()->roles != 2)): ?>
						<p class="m-0"><strong>Contato do Usuário: </strong><?php echo e($registro->user_email); ?></p>
						<?php endif; ?>
						<?php if($registro->idorganizacao && Auth::user()->idroles == $registro->idpessoa && Auth::user()->roles != 2): ?>
						<p class="m-0"><strong>Contato da empresa: </strong><?php echo e($registro->org_telefone); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-md-5">
					<p>
						<strong>Endereço: </strong><?php echo e($registro->endereco); ?><br>
						<strong>Nº: </strong><?php echo e($registro->numero); ?><br>
						<strong>Bairro: </strong><?php echo e($registro->bairro); ?><br>
						<?php if($registro->complemento): ?>
						<strong>Complemento: </strong><?php echo e($registro->complemento); ?><br>
						<?php endif; ?>
						<strong>CEP: </strong><?php echo e($registro->cep); ?><br>
					</p>
					
				</div>
			</div>
			<div class="card-footer bg-transparent border-<?php echo e($cor); ?>">
				<?php if(Auth::user()->roles != 2 && (Auth::user()->roles == 0 || $registro->idpessoa == Auth::user()->idroles) ): ?>
				<a href="#"	class="text-danger mr-3 p-3 btnExcluir" data-id="<?php echo e($registro->id); ?>" data-tipo="produto">Deletar</a>
				<?php if($registro->status == 'Disponivel'): ?>
				<a class="mr-3 p-3 text-secondary" href="<?php echo e(route('editar_produto', $registro->id)); ?>">Editar Produto</a>
				<?php else: ?>
				<a class="mr-3 p-3 text-<?php echo e($cor); ?>" id="status<?php echo e($registro->id); ?>" href="<?php echo e(route('status_produto', $registro->id)); ?>"><?php echo ($registro->status == 'Reservado') ? 'Cancelar Reserva' : 'Reservar' ?></a>
				<?php endif; ?>
				<?php endif; ?>
				<?php if(Auth::user()->roles == 2): ?>
				<a class="text-<?php echo e($cor); ?> mr-3 p-3" id="status<?php echo e($registro->id); ?>" href="<?php echo e(route('status_produto', $registro->id)); ?>"><?php echo ($registro->status == 'Reservado') ? 'Cancelar Reserva' : 'Reservar' ?></a>
				<?php endif; ?>
				<?php if(isset($registro->imagem_path)): ?>
				<a class="text-info mr-3 p-3" data-toggle="collapse" href="#collapsefoto-<?php echo e($registro->id); ?>" role="button" aria-expanded="false" aria-controls="collapsefoto-<?php echo e($registro->id); ?>">Foto</a>
				<?php endif; ?>
				<?php if(($registro->datareserva != NULL && Auth::user()->idroles == $registro->idpessoa) || ($registro->datareserva != NULL && Auth::user()->roles == 2 && Auth::user()->idroles == $registro->idorganizacao)): ?>
				<a class="text-success mr-3 p-3" id="chat<?php echo e($registro->id); ?>" href="<?php echo e(route('chat_produto', $registro->idchat)); ?>">Enviar Mensagem</a>
				<?php endif; ?>
			</div>
			<div class="collapse" id="collapsefoto-<?php echo e($registro->id); ?>">
				<div class="mb-4" style="text-align: center;">
					<img src="<?php echo e($registro->imagem_path); ?>" width="100%">
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>