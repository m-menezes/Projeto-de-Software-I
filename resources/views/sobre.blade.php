@extends('template.template')
@section('conteudo')
<?php $titulo = "Sobre o sistema"; ?>
@include('_includes.titulo')
<div class="container">
	<div class="m-4">
		<div class="row">
			<p>
				{{ucfirst(config('app.name'))}} é um projeto para disciplina <strong>[ELC1073] - Projeto de Software I</strong>, com o objetivo de otimizar e gerenciar a da coleta de materiais recicláveis, facilitando o contato entre entidades de recebimento e interessados.
			</p>
		</div>
		<div class="row">
			<h5 class="weight-300 w-100">Equipe</h5>
			<ul>
				<li><cite>Fabio Gomes</cite></li>
				<li><cite>Laiser Mello</cite></li>
				<li><cite>Marcelo Menezes</cite></li>
				<li><cite>Matuzalem Borges</cite></li>
			</ul>
		</div>
		<div class="row">
			<h5 class="weight-300 w-100">Documentação do sistema</h5>
			<ul>
				<li>
					<a target="blank" href="https://docs.google.com/document/d/1yucG_zM8taIkwiGczdPCMCtFZ2lFa0HopXJjZEEbS5k/edit">Documento de visão</a>
				</li>
				<li>
					<a target="blank" href="https://drive.google.com/open?id=1VJxM8_fnynJpm_jBieufWc-e_6b6Xerp">Diagrama EER</a>
				</li>
				<li>
					<a target="blank" href="https://github.com/m-menezes/Projeto-de-Software-I">GitHub</a>
				</li>
				<li>
					<a target="blank" href="#">Documento DRS</a>
				</li>
				<li>
					<a target="blank" href="#">UML</a>
				</li>
				<li>
					<a target="blank" href="#">Diagrama de classes</a>
				</li>
				<li>
					<a target="blank" href="#">Diagrama de Sequências</a>
				</li>
				<li>
					<a target="blank" href="#">Modelagem de Estados</a>
				</li>
				<li>
					<a target="blank" href="#">Modelagem de Atividades</a>
				</li>
				<li>
					<a target="blank" href="#">Modelo de Implementação</a>
				</li>
				<li>
					<a target="blank" href="#">Modelo de Implantação</a>
				</li>
				<li>
					<a target="blank" href="#">Modelagem conceitual da base de dados</a>
				</li>
				<li>
					<a target="blank" href="#">Uso de técnicas para desenvolvimento de IHC com ferramentas de Prototipação de Interfaces</a>
				</li>
			</ul>
		</div>
	</div>
</div>
@endsection