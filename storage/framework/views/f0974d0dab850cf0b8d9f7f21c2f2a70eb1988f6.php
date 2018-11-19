<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo e(config('app.name')); ?></title>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<!--Imports CSS-->
	<link href="/css/bootstrap.css?ver=1.2" rel="stylesheet" >
	<link href="/css/glyph.css" rel="stylesheet" >
	<link href="/css/app.css?ver=<?php echo time(); ?>"rel="stylesheet">
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
			<?php echo $__env->make('_includes.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
	<div class="row pb-5">
		<?php echo $__env->yieldContent('conteudo'); ?>
	</div>
	<a href="#" id="button_topo" title="Ir para o topo"><i class="fa fa-3x fa-chevron-circle-up" aria-hidden="true"></i></a>
	<footer>
		<div class="container">
			<div class="row"> 
				<div class="col-md-6 copyright copyright-left">
					<!-- <small class="m-0">Marcelo || Zalem || Fabio || Laiser</small> -->
				</div>
				<div class="col-md-6 copyright copyright-right">
					<small class="m-0"><i class="fas fa-recycle"></i> <?php echo e(config('app.name')); ?></small>
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
		$('.popover-dismiss').popover({
			trigger: 'focus'
		})

		$('.btnExcluir').click(function(){
			var id = $(this).attr('data-id');
			var tipo = $(this).attr('data-tipo');
			var par_url = "<?php echo  url('/').'/'; ?>" + tipo +  "<?php echo '/deletar'.'/'; ?>" + id;
			$('#modalExcluir').modal('show');
			$('#btnConfirmar').attr('href', par_url);
		});
		<?php echo $__env->yieldContent('script'); ?>
	</script>
</body>
</html>

