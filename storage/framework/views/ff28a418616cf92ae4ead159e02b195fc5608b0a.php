<!-- BUSCA -->
<div class="jumbotron w-100" style="border-bottom: 1px dashed #5d5d5d;">
	<div class="container">
		<div class="my-5">
			<div class="row">
				<div class="col-md-12">
					<h1 class="block-title mb-4 weight-300">Busca de Produto</h1>
				</div>
				<div class="col-md-12">
					<form role="form" method="get" action="<?php echo e(route('busca_produto')); ?>">
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
</div>
<!-- BUSCA -->