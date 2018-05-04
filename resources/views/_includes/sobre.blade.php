<?php $titulo = "Sobre nós"; ?>
@include('_includes.titulo')
<div id="sobre"></div>
<div class="container">
	<div class="m-4 mt-5 text-justify ">
		<div class="row">
			 <p><i>{{ucfirst(config('app.name'))}}</i> é um projeto para disciplina <strong>[ELC1073] - Projeto de Software I</strong></p>
		</div>
		<div class="row">
			<h5 class="w-100 weight-600">Problema:</h5>
			<p>Atualmente os moradores da cidade de Santa Maria vivenciam um problema grave em relação ao descarte de materiais recicláveis ou reaproveitáveis. Afinal não é de conhecimento da população em geral os contatos de quem faz esse recolhimento. Como impacto direto desse problema está o acúmulo de resíduos e a má separação dos mesmos, pois acabam por ser descartados em lixeiras comuns. Prejudicando tanto o ambiente da cidade como também prejudicando a vida financeira dos indivíduos que vivem da reciclagem deste material.</p>

		</div>
		<div class="row">
			<h5 class="w-100 weight-600">Objetivo:</h5>
			<p>Otimizar e gerenciar a coleta de materiais recicláveis, facilitando o contato entre entidades de recebimento e interessados. Tudo em um sistema web totalmente responsivo de fácil cadastro e acesso</p>
		</div>
		<div class="row">
			<h5 class="w-100 weight-600">Equipe</h5>
			<ul>
				<li><cite>Fabio Gomes</cite></li>
				<li><cite>Laiser Mello</cite></li>
				<li><cite>Marcelo Menezes</cite></li>
				<li><cite>Matuzalem Borges</cite></li>
			</ul>
		</div>
	</div>
</div>
