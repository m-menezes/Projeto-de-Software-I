<nav class="navbar navbar-expand-lg w-100 navbar-dark bg-dark">
	<a class="navbar-brand" href="/"><i class="fas fa-recycle"></i> {{config('app.name')}}</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
			<a class="nav-item nav-link" href="{{route('noticias')}}">Notícias</a>
			<a class="nav-item nav-link" href="/sobre">Sobre</a>
			@guest
			<!-- GUEST -->
			<a class="nav-item nav-link" href="{{route('login')}}">Login</a>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Cadastro
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="{{route('register_user')}}">Usuário</a>
					<a class="dropdown-item" href="{{route('register_org')}}">Organização</a>
				</div>
			</li>
			<!-- GUEST -->
			@else
			<!-- USUARIO AUTENTICADO E SUPERADMIN -->
			@if (Auth::user()->roles == 0)
			<a class="nav-item nav-link" href="{{route('lista_users')}}">Lista de Usuarios</a>
			@endif
			<!-- USUARIO AUTENTICADO E SUPERADMIN -->
			<!-- USUARIO AUTENTICADO-->
			<a class="nav-item nav-link" href="{{route('produto')}}">Produto</a>
			<a class="nav-item link-login nav-link" href="{{route('logout')}}">Logout</a>
		</div>
		<!-- EMAIL NA DIREITA -->
		<div class="dropdown badge-user" style="position: absolute;right: 0;">
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				{{Auth::user()->email}}
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdown_user" style="right: 0; left: unset !important;">
				<a class="dropdown-item" href="{{route('logout')}}">Logout</a>
			</div>
		</div>
		<!-- USUARIO AUTENTICADO-->
		@endguest
	</div>
</nav>
