@extends('template.template')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('conteudo')
<?php $titulo = "Chat"; 
$usuario = Auth::user()->id;?>
@include('_includes.titulo')
<div class="container">
	<div class="col-sm-12 frame mt-5">
		<ul id="msg-list"></ul>
		<div>
			<form class="mb-0" method="GET" action="{{route('chat_update', $id)}}">
				<div class="msj-rta macro">                        
					<div class="text text-r" style="background:whitesmoke !important">
						<input class="mytext" name="message" placeholder="Digite uma mensagem" autocomplete="off" />
					</div> 
					<button type="submit" class="btn-msg"><span class="glyphicon glyphicon-share-alt"></span></button>
				</div>
			</form>
		</div>
	</div>    
</div>

<script type="text/javascript">
	function loadchat(){
		$.ajax({
			type:"GET",
			url:"{{route('chat_get')}}", 
			data: {id : <?php echo $id; ?>},  
			success: function(data) {
				var mensagens = JSON.parse(data.texto);
				if (mensagens.length > 0) {
					$('#msg-list').empty();
					for (var i = 0; i < mensagens.length; i++) {
						var classe = (mensagens[i].usuario == <?php echo $usuario; ?>) ? "-rta" : "";
						$('#msg-list').append(
							'<li style="width:100%"><div class="msg msj'+classe+' macro"><div class="text text-'+classe+'">'+
							'<p>'+mensagens[i]['mensagem']+'</p><p><small>'+mensagens[i]['hora']+'</small></p>'+
							'</div></div></li>');
					}
				}
				var objDiv = document.getElementById("msg-list");
				objDiv.scrollTop = objDiv.scrollHeight;
			},
			error: function(data){
				console.log('Erro ao receber mensagens');
			},
		});
	};
	var intervalo = setInterval(loadchat, 1000);
</script>
<style>
.btn-msg{
	background: transparent;
	border: 0;
	padding: 10px 30px;
}
.frame form{
	width: 100% !important;
}
.glyphicon {
	top: 5px !important;
}
.mytext{
	border:0;padding:10px;background:whitesmoke;
}
.text{
	width:100%;display:flex;flex-direction:column;
}
.text > p:first-of-type{
	width:100%;margin-top:0;margin-bottom:auto;line-height: 13px;font-size: 14px;
}
.text > p:last-of-type{
	width:100%;text-align:right;color:silver;margin-bottom:-7px;margin-top:auto;
}
.text-l{
	text-align: left;
	float:left;padding-right:10px;
}        
.text-r{
	text-align: right;
	float:right;padding-left:10px;
}
.mytext::placeholder{
	color: black;
}
.macro{
	margin-top:5px;width:100%;border-radius:5px;padding:5px;display:flex;
}
.msj-rta{
	float:right;background:whitesmoke;
}
.msj{
	float:left;background:white;
}
.msg{
	width: 75% !important;
}
.frame{
	background:#e0e0de;
	height:450px;
	overflow:hidden;
	padding:0;
}
.frame > div:last-of-type{
	position:absolute;bottom:0;width:100%;display:flex;
}

ul {
	width:100%;
	list-style-type: none;
	padding:18px;
	position:absolute;
	bottom:47px;
	display:flex;
	flex-direction: column;
	top:0;
	overflow-y:scroll;
}
.msj:before{
	width: 0;
	height: 0;
	content:"";
	top:-5px;
	left:-14px;
	position:relative;
	border-style: solid;
	border-width: 0 13px 13px 0;
	border-color: transparent #ffffff transparent transparent;            
}
.msj-rta:after{
	width: 0;
	height: 0;
	content:"";
	top:-5px;
	left:14px;
	position:relative;
	border-style: solid;
	border-width: 13px 13px 0 0;
	border-color: whitesmoke transparent transparent transparent;           
}  
input:focus{
	outline: none;
}        
::-webkit-input-placeholder { /* Chrome/Opera/Safari */
	color: #d4d4d4;
}
::-moz-placeholder { /* Firefox 19+ */
	color: #d4d4d4;
}
:-ms-input-placeholder { /* IE 10+ */
	color: #d4d4d4;
}
:-moz-placeholder { /* Firefox 18- */
	color: #d4d4d4;
}  
</style>
@endsection