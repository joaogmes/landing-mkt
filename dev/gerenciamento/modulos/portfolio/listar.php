<div class="jumbotron text-center padding-0">
	<h3>Portfólio</h3>
	<p>Mostre seu trabalho ou sua empresa</p>
</div>
<div class="container">
	<ul class="list-inline">
		<li class="list-inline-item"><a href="./?modulo=portfolio&acao=inserir"><i class="fa fa-plus"></i> Adicionar Itens<a></li>
		</ul>
	</div>
	<div class="container">
		<hr>
		<h5 class="mb-3"># Itens Cadastrados</h5>
		<div class="row">

			<?php
			$conexao = conectaBanco('local');
			$query = "SELECT * FROM portfolio ORDER BY id DESC";
			$portfolio = $conexao->prepare($query);
			$portfolio->execute();

			while($port = $portfolio->fetch(PDO::FETCH_ASSOC)){
				?>
				<div class="col-md-2">
					<img src="./uploads/<?=$port['imagem']?>" class="mr-3 img-thumbnail" alt="...">
					<h5 class="mt-0 mb-1"><?=$port['titulo']?></h5>
					<p><?=$port['categoria']?></p>
					<p><a href="./?modulo=portfolio&acao=atualizar&id=<?=$port['id']?>"><i class="far fa-edit"></i> Editar</a></p> 
					<p><a href="./?modulo=portfolio&acao=excluir&id=<?=$port['id']?>"><i class="fa fa-times"></i> Excluir</a></p>
				</div>
				<?php
			}
			?>
		</div>
	</div>
