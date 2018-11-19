<?php $titulo = "Sobre nós"; ?>
<?php echo $__env->make('_includes.titulo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div id="sobre"></div>
<div class="container" style="text-indent: 4%; line-height: 35px;">
	<div class="m-4 mt-5 text-justify">
		<div class="row">
			<p>O projeto <strong><i><?php echo e(ucfirst(config('app.name'))); ?></i></strong> tem como objetivo principal otimizar e gerenciar a da coleta de materiais recicláveis, facilitando o contato entre entidades de recebimento e interessados.</p>
		</div>
		<div class="row">
			<p>
				Mundialmente vivenciamos o problema de acúmulo de materiais em nossas residências, isso ocorre por consequência do crescimento populacional e do consumismo em grande escala. Grande parte desses materiais podem ser reaproveitados, colaborando assim para a economia local e para o meio ambiente como um todo. Hoje no brasil apenas 3% do montante de 76 milhões de toneladas de lixo produzido é reciclado, sendo que pelo menos 30% poderia ser reaproveitado. Um fator que dificulta o correto direcionamento desse material é falta de conhecimento por grande parte da população sobre empresas ou organizações que fazem o recolhimento ou aquisição de determinado tipo de material para que possa ser reciclado ou ter o seu devido descarte.
			</p>
			<p>
				A ideia principal do sistema SmartRecycle é ajudar pessoas e organizações com interesses em comum, o usuário  informa no sistema através de postagens que possui determinado material disponível para coleta ou descarte, por sua vez as empresas cadastradas realizam uma busca por materiais nas postagem de todos os usuários do podendo também filtrar por tipo de material marcando as postagem que lhe interessam, após isso ambos podem combinar a melhor forma de realizarem a entrega ou busca do material. O Sistema foi desenvolvido em Laravel um framework em PHP livre e open-source cujo o principal objetivo é de desenvolver de forma rápida e estruturada, outra ferramenta utilizada é o bootstrap um framework front-end que tem como objetivo facilitar e agilizar o trabalho, oferecendo padrões para HTML, JavaScript e CSS.
			</p>
			<p>
				Como banco de dados os sistema utilizará SQLite que trata-se de uma biblioteca (open source) desenvolvida na linguagem C que permite a disponibilização de um pequeno banco de dados na própria aplicação, sem a necessidade de acesso a um SGDB(Software gerenciador de banco de dados) separado. O sistema pode ser acessado de qualquer dispositivo que possua um navegador e acesso a internet.
			</p>
		</div>
	</div>
</div>
