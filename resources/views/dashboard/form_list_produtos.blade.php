<div class="col-md-12">
	@foreach($registros as $registro)
	<?php if($registro->datareserva != NULL && (Auth::user()->roles == 2  && $registro->idorganizacao != Auth::user()->idroles)) {
		continue;
	} ?>
	<?php $cor = ($registro->status == 'Reservado') ? 'danger' : 'info'; ?>
	<div class="card my-2 w-100" id="card-{{$registro->id}}" style="border-color: <?php echo ($registro->datareserva == NULL) ? '#28a745' : 'red'; ?>;">
		<div class="card-body pb-0 ">
			@if($registro->idorganizacao != NULL)
			<div class="{{$cor}}-ribbon">Reservado</div>
			@else
			<div class="blue-ribbon">Disponivel</div>
			@endif
			<div class="row">
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-7 text-sm-center text-md-left px-0">
							<h4 class="d-inline card-title"><a class="weight-600 text-dark" href="{{route('view_produto', $registro->id)}}">{{$registro->produto}}</a></h4>
						</div>
						<div class="col-md-5 text-sm-center text-md-right pt-2">
							@if(isset($registro->tipo))
							<span tabindex="0" class="m-1 text-{{$cor}}" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Tipo: {{$registro->tipo}}">
								<i class="fas fa-recycle"></i>
							</span>
							@endif
							@if(Auth::user()->idroles == $registro->idorganizacao || (Auth::user()->idroles == $registro->idpessoa && Auth::user()->roles != 2))
							<span tabindex="0" class="m-1 text-{{$cor}}" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Usuário: {{ucfirst($registro->user_name)}}">
								<i class="far fa-user"></i>
							</span>
							<span tabindex="0" class="m-1 text-{{$cor}}" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Email: {{$registro->user_email}}">
								<i class="far fa-envelope"></i>
							</span>
							@endif
							<span tabindex="0" class="m-1 text-{{$cor}}" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Data de Registro: {{$registro->created_at->format('H:i - d/m/Y')}}">
								<i class="far fa-calendar-alt"></i>
							</span>
							<span tabindex="0" class="m-1 text-{{$cor}}" id="datareserva{{$registro->id}}" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Data de Reserva: {{ isset($registro->datareserva) ? $registro->datareserva : ''}}" <?php if($registro->datareserva == NULL) { echo 'style="display:none"';} ?>>
								<i class="far fa-clock"></i>
							</span>
							<span tabindex="0" class="m-1 text-{{$cor}}" id="idorganizacao{{$registro->org_name}}" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Reservado por: {{$registro->org_name}}" <?php if($registro->org_name == NULL) { echo 'style="display:none"';} ?>>
								<i class="fas fa-warehouse"></i>
							</span>
							<span tabindex="0" class="m-1 text-{{$cor}}" id="idorganizacao{{$registro->org_telefone}}" role="button" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="Telefone da empresa: {{$registro->org_telefone}}" <?php if($registro->org_telefone == NULL) { echo 'style="display:none"';} ?>>
								<i class="fas fa-phone"></i>
							</span>
						</div>
					</div>
					<div class="row my-2">
						<p>{{str_limit($registro->descricao, 350, $end = ' [...]')}}</p>
						@if((Auth::user()->idroles == $registro->idorganizacao) || (Auth::user()->idroles == $registro->idpessoa && Auth::user()->roles != 2))
						<p class="m-0"><strong>Contato do Usuário: </strong>{{$registro->user_email}}</p>
						@endif
						@if($registro->idorganizacao && Auth::user()->idroles == $registro->idpessoa && Auth::user()->roles != 2)
						<p class="m-0"><strong>Contato da empresa: </strong>{{$registro->org_telefone}}</p>
						@endif
					</div>
				</div>
				<div class="col-md-5">
					<p>
						<strong>Endereço: </strong>{{$registro->endereco}}<br>
						<strong>Nº: </strong>{{$registro->numero}}<br>
						<strong>Bairro: </strong>{{$registro->bairro}}<br>
						@if($registro->complemento)
						<strong>Complemento: </strong>{{$registro->complemento}}<br>
						@endif
						<strong>CEP: </strong>{{$registro->cep}}<br>
					</p>
					
				</div>
			</div>
			<div class="card-footer bg-transparent border-{{$cor}}">
				@if(Auth::user()->roles != 2 && (Auth::user()->roles == 0 || $registro->idpessoa == Auth::user()->idroles) )
				<a href="#"	class="text-danger mr-3 p-3 btnExcluir" data-id="{{$registro->id}}" data-tipo="produto">Deletar</a>
				@if($registro->status == 'Disponivel')
				<a class="mr-3 p-3 text-secondary" href="{{route('editar_produto', $registro->id)}}">Editar Produto</a>
				@else
				<a class="mr-3 p-3 text-{{$cor}}" id="status{{$registro->id}}" href="{{route('status_produto', $registro->id)}}"><?php echo ($registro->status == 'Reservado') ? 'Cancelar Reserva' : 'Reservar' ?></a>
				@endif
				@endif
				@if(Auth::user()->roles == 2)
				<a class="text-{{$cor}} mr-3 p-3" id="status{{$registro->id}}" href="{{route('status_produto', $registro->id)}}"><?php echo ($registro->status == 'Reservado') ? 'Cancelar Reserva' : 'Reservar' ?></a>
				@endif
				@if(isset($registro->imagem_path))
				<a class="text-info mr-3 p-3" data-toggle="collapse" href="#collapsefoto-{{$registro->id}}" role="button" aria-expanded="false" aria-controls="collapsefoto-{{$registro->id}}">Foto</a>
				@endif
				@if(($registro->datareserva != NULL && Auth::user()->idroles == $registro->idpessoa) || ($registro->datareserva != NULL && Auth::user()->roles == 2 && Auth::user()->idroles == $registro->idorganizacao))
				<a class="text-success mr-3 p-3" id="chat{{$registro->id}}" href="{{route('chat_produto', $registro->idchat)}}">Enviar Mensagem</a>
				@endif
			</div>
			<div class="collapse" id="collapsefoto-{{$registro->id}}">
				<div class="mb-4" style="text-align: center;">
					<img src="{{$registro->imagem_path}}" width="100%">
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>