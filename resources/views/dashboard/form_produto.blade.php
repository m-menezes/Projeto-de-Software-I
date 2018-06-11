<div class="row">
	<div class="form-group col-6">
		<input name="produto" type="text" required class="form-control" id="produto" placeholder="Produto" value="<?php echo (isset($registro->produto)) ? $registro->produto : ''; ?>">
	</div>
	<div class="form-group col-6">
		<select name="tipo" class="form-control" id="tipo">
			<option disabled <?php echo (isset($registro->tipo)) ? '' : 'selected'; ?>>Tipo de Produto</option>
			<option value="Plastico" <?php echo (isset($registro->tipo) && $registro->tipo == "Plastico") ? 'selected' : ''; ?>>Plástico</option>
			<option value="Metal" <?php echo (isset($registro->tipo) && $registro->tipo == "Metal") ? 'selected' : ''; ?>>Metal</option>
			<option value="Papel" <?php echo (isset($registro->tipo) && $registro->tipo == "Papel") ? 'selected' : ''; ?>>Papel</option>
			<option value="Vidro" <?php echo (isset($registro->tipo) && $registro->tipo == "Vidro") ? 'selected' : ''; ?>>Vidro</option>
			<option value="Tecido" <?php echo (isset($registro->tipo) && $registro->tipo == "Tecido") ? 'selected' : ''; ?>>Tecido</option>
			<option value="Eletronico" <?php echo (isset($registro->tipo) && $registro->tipo == "Eletronico") ? 'selected' : ''; ?>>Eletrónico</option>
			<option value="Outro" <?php echo (isset($registro->tipo) && $registro->tipo == "Outro") ? 'selected' : ''; ?>>Outro</option>
		</select>
	</div>
</div>
<div class="row">
	<div class="form-group col-12">
		<textarea name="descricao" type"text" class="form-control" id="descricao" placeholder="Particularidades da coleta  [peso, tamanho]" rows="5"><?php echo (isset($registro->descricao)) ? $registro->descricao : ''; ?></textarea>
	</div>
</div>
<!-- LOCALIZACAO -->
<h5 class="col-12 weight-300">LOCALIZAÇÃO</h5>
<div class="row">
	<div class="form-group col-3">
		<input name="cep" type="number" required class="form-control" id="cep" placeholder="CEP" value="<?php echo (isset($registro->cep)) ? $registro->cep : ''; ?>">
	</div>
	<div class="form-group col-7">
		<input name="endereco" type="text" required class="form-control" id="endereco" placeholder="Endereço" value="<?php echo (isset($registro->endereco)) ? $registro->endereco : ''; ?>">
	</div>
	<div class="form-group col-2">
		<input name="numero" type="number" required class="form-control" id="numero" placeholder="Nº" value="<?php echo (isset($registro->numero)) ? $registro->numero : ''; ?>">
	</div>
</div>
<div class="row">
	<div class="form-group col-6">
		<input name="bairro" type="text" required class="form-control" id="bairro" placeholder="Bairro" value="<?php echo (isset($registro->bairro)) ? $registro->bairro : ''; ?>">
	</div>
	<div class="form-group col-6">
		<input name="complemento" type="text" class="form-control" id="complemento" placeholder="Complemento" value="<?php echo (isset($registro->complemento)) ? $registro->complemento : ''; ?>">
	</div>
</div>
<h5 class="col-12 weight-300">FOTO</h5>
<div class="row">
	<div class="form-group col-12">
		@if(isset($registro->foto))
		<img src="{{$registro->foto}}" width="200px">
		<a class="btn btn-outline-danger" href="{{route('foto_produto', $registro->id)}}">Remover Imagem</a>
		@else
		<input class="form-control-file" type="file" name="foto" id="foto" accept="image/*">
		@endif
	</div>
</div>