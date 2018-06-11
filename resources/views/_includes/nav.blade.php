<nav class="navbar navbar-expand-lg navbar-dark w-100 ">
	<a class="navbar-brand" href="/"><i class="fas fa-recycle"></i> {{config('app.name')}}</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-{{config('app.name')}}" aria-controls="navbar-{{config('app.name')}}" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbar-{{config('app.name')}}">
		<div class="navbar-nav">
			@if (\Route::current()->getName() == 'home')
			<a class="nav-item nav-link" href="#sobre">Sobre</a>
			<a class="nav-item nav-link" href="#documentacao">Documentação</a>
			@endif
			<a class="nav-item nav-link" href="{{route('noticias')}}">Notícias</a>
			@guest
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Cadastro</a>
				<div class="dropdown-menu rounded-0 mt-2 border-dark" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="{{route('register_user')}}">Usuário</a>
					<a class="dropdown-item" href="{{route('register_org')}}">Organização</a>
				</div>
			@else
				<a class="nav-item nav-link" href="{{route('produto')}}">Produtos</a>
				@if (Auth::user()->roles == 0)
				<!-- MENU DE SUPERADMIN -->
				<a class="nav-item nav-link" href="{{route('lista_users')}}">Lista de Usuarios</a>
				@endif
				<!-- LOGOUT PARA MOBILE -->
				<a class="nav-item link-login nav-link" href="{{route('logout')}}">Logout</a>
			@endguest
			</li>
		</div>
	</div>
	@guest
	<div class="navbar-nav">
		<form class="form-inline my-2 my-lg-0" method="POST" action="{{route('doLogin')}}" >
			{{ csrf_field() }}
			<input name="email-user" type="email" class="form-control mr-sm-2" id="email-user" placeholder="Email">
			<input name="password-user" type="password" class="form-control mr-sm-2" id="password-user" placeholder="Senha">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Entrar</button>
		</form>
		@else
		<div class="dropdown badge-user">
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->email}}</button>
			<div class="dropdown-menu" aria-labelledby="dropdown_user">
				<li><a class="dropdown-item" href="{{route('editar_conta', Auth::user()->id)}}">Editar Conta</a></li>
				<li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
			</div>
		</div>
	</div>
	@endguest
</nav>
