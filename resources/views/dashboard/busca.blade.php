@extends('template.template')
@section('conteudo')
<div class="jumbotron w-100 mb-3">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form role="form">
					<input type="text" class="searchTerm" placeholder="  Informe o que deseja buscar. Ex.: Produto" name="busca" 
					value="<?php if(isset($_GET['busca'])){echo $_GET['busca'];}?>" autocomplete="off">
					<select class="searchSelect" name="tipo">
							<option value="Todos" <?php if(isset($_GET['tipo']) && $_GET['tipo'] == 'Todos'){echo 'selected';}?> >Tipo de Produto</option>
							<option value="Plastico" <?php if(isset($_GET['tipo']) && $_GET['tipo'] == 'Plastico'){echo 'selected';}?>>Plastico</option>
							<option value="Metal" <?php if(isset($_GET['tipo']) && $_GET['tipo'] == 'Metal'){echo 'selected';}?>>Metal</option>
							<option value="Papel" <?php if(isset($_GET['tipo']) && $_GET['tipo'] == 'Papel'){echo 'selected';}?>>Papel</option>
							<option value="Vidro" <?php if(isset($_GET['tipo']) && $_GET['tipo'] == 'Vidro'){echo 'selected';}?>>Vidro</option>
							<option value="Tecido" <?php if(isset($_GET['tipo']) && $_GET['tipo'] == 'Tecido'){echo 'selected';}?>>Tecido</option>
							<option value="Eletronico" <?php if(isset($_GET['tipo']) && $_GET['tipo'] == 'Eletronico'){echo 'selected';}?>>Eletronico</option>
							<option value="Outro" <?php if(isset($_GET['tipo']) && $_GET['tipo'] == 'Outro'){echo 'selected';}?>>Outro</option>
					</select>
					<button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
					<small class="form-text text-muted">Digite a busca e pressione <i>enter</i><span class="float-right">Você pode filtrar por tipo selecionando o tipo desejado ao clicar em tipo</span></small>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- FIM INPUT BUSCA -->
<?php if(isset($_GET['busca'])) : ?>
	<div class="container">
		<div class="row">
			<?php if(count($registros) > 0) : ?>
				<div class="col-md-12">
					<h5 class="weight-300">Foram encontrados 
						<b><i><?php echo count($registros); ?></i></b>
						 resultados para  <?php echo ($_GET['busca'] && !isset($busca_personalizada)) ? 'esta palavra' : 'este tipo'; ?> 
						<b><i><?php echo ($_GET['busca'] && !isset($busca_personalizada)) ? $_GET['busca'] : $_GET['tipo']; ?></i></b>
					</h5>
					<small class="form-text text-muted"><?php if(isset($busca_personalizada)) echo $busca_personalizada; ?></small>
				</div>
				@include('dashboard.form_list_produtos')
				<?php else: ?>
					<div class="col-md-12">
						<h5 class="weight-300">Não foram encontrados produtos para a palavra <b><i><?php echo $_GET['busca']; ?></i></b></h5>
						<div class="link_produtos">
							<a class="btn btn-secondary" href="#">Visualizar a lista de todos produtos.</a>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
	@endsection