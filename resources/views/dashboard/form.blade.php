
<div class="row">
	<div class="form-group col-12">
		<input name="titulo" type="text" required class="form-control" id="titulo" placeholder="Titulo" value="{{isset($registro->titulo) ? $registro->titulo : ''}}">
	</div>
</div>
<div class="row">
	<div class="form-group col-12">
		<textarea name="descricao" type"text" required class="form-control" id="descricao" placeholder="Descrição" rows="10">{{ isset($registro->descricao) ? $registro->descricao : ''}}</textarea>
	</div>
</div>
<div class="row">
	<div class="form-group col-12">
		<div class="file-loading">
			<input name="imagem" id="input-pt-br" type="file">
		</div>
	</div>
</div>