<nav class="navbar navbar-expand-lg navbar-dark w-100 ">
	<a class="navbar-brand" href="/"><i class="fas fa-recycle"></i> <?php echo e(config('app.name')); ?></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-<?php echo e(config('app.name')); ?>" aria-controls="navbar-<?php echo e(config('app.name')); ?>" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbar-<?php echo e(config('app.name')); ?>">
		<div class="navbar-nav">
			<?php if(\Route::current()->getName() == 'home'): ?>
			<a class="nav-item nav-link" href="#sobre">Sobre</a>
			<a class="nav-item nav-link" href="#documentacao">Documentação</a>
			<?php else: ?>
			<a class="nav-item nav-link" href="\#sobre">Sobre</a>
			<a class="nav-item nav-link" href="\#documentacao">Documentação</a>
			<?php endif; ?>
			<a class="nav-item nav-link" href="<?php echo e(route('noticias')); ?>">Notícias</a>
			<?php if(auth()->guard()->guest()): ?>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Cadastro</a>
				<div class="dropdown-menu rounded-0 mt-2 border-dark" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?php echo e(route('register_user')); ?>">Usuário</a>
					<a class="dropdown-item" href="<?php echo e(route('register_org')); ?>">Organização</a>
				</div>
			<?php else: ?>
				<a class="nav-item nav-link" href="<?php echo e(route('produto')); ?>">Produtos</a>
				<?php if(Auth::user()->roles == 0): ?>
				<!-- MENU DE SUPERADMIN -->
				<a class="nav-item nav-link" href="<?php echo e(route('lista_users')); ?>">Lista de Usuarios</a>
				<?php endif; ?>
				<!-- LOGOUT PARA MOBILE -->
				<a class="nav-item link-login nav-link" href="<?php echo e(route('logout')); ?>">Logout</a>
			<?php endif; ?>
			</li>
		</div>
	</div>
	<?php if(auth()->guard()->guest()): ?>
	<div class="navbar-nav">
		<form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo e(route('doLogin')); ?>" >
			<?php echo e(csrf_field()); ?>

			<input name="email-user" type="email" class="form-control mr-sm-2" id="email-user" placeholder="Email" required>
			<input name="password-user" type="password" class="form-control mr-sm-2" id="password-user" placeholder="Senha" required>
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Entrar</button>
		</form>
		<?php else: ?>
		<div class="dropdown badge-user">
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(Auth::user()->email); ?></button>
			<div class="dropdown-menu" aria-labelledby="dropdown_user">
				<li><a class="dropdown-item" href="<?php echo e(route('editar_conta', Auth::user()->id)); ?>">Editar Conta</a></li>
				<li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>">Logout</a></li>
			</div>
		</div>
	</div>
	<?php endif; ?>
</nav>
