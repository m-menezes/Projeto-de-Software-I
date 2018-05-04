<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{config('app.name')}}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--Imports CSS-->
	<link href="/css/bootstrap.css?ver=1.1" rel="stylesheet" >
	<link href="/css/glyph.css" rel="stylesheet" >
	<link href="/css/app.css?ver=2.01" rel="stylesheet">
	<link href="/css/fileinput.css?ver=1.04" media="all" rel="stylesheet" type="text/css"/>
	<link href="/themes/explorer-fa/theme.css" media="all" rel="stylesheet" type="text/css"/>
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,300,500,600" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
	<!--Import JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<!-- Files/Imagens-->
	<script src="/js/plugins/sortable.js" type="text/javascript"></script>
	<script src="/js/fileinput.js" type="text/javascript"></script>
	<script src="/js/locales/pt-BR.js"></script>
	<script src="/themes/gly/theme.js" type="text/javascript"></script>
	<script src="/themes/explorer-fa/theme.js" type="text/javascript"></script>
	<!-- Files/Imagens-->
	<!--End Imports-->
	<link rel="shortcut icon" href="/favicon.ico">
</head>
<body>
	<div class="navbar p-0 bg-dark">
		<div class="container">
			@include('_includes.nav')
		</div>
	</div>
	<div class="row pb-5">
		@yield('conteudo')
	</div>
	<a href="#" id="button_topo" title="Ir para o topo"><i class="fa fa-3x fa-chevron-circle-up" aria-hidden="true"></i></a>
	<footer>
		<div class="container">
			<div class="row"> 
				<div class="col-md-6 copyright copyright-left">
					<small class="m-0">Marcelo || Zalem || Fabio || Laiser</small>
				</div>
				<div class="col-md-6 copyright copyright-right">
					<small class="m-0"><i class="fas fa-recycle"></i> {{config('app.name')}}</small>
				</div>
			</div>
		</div>
	</footer>

	<script type="text/javascript">
		$('[data-toggle="popover"]').popover();
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				document.getElementById("button_topo").style.display = "block";
			} else {
				document.getElementById("button_topo").style.display = "none";
			}
		}

		$('#button_topo').click(function(){
			$('html, body').animate({scrollTop : 0},500);
			return false;
		});
		@yield('script')
	</script>
</body>
</html>

