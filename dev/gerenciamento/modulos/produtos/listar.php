<div class="jumbotron text-center padding-0">
	<h3>Produtos</h3>
	<p>Informe os Produtos que o cliente presta</p>
</div>
<div class="container">
		<ul class="list-inline">
			<li class="list-inline-item"><a href="./?modulo=produtos&acao=cadastrar"><i class="fa fa-plus"></i> Adicionar produto<a></li>
		</ul>
</div>
<div class="container">
	<hr>
	<h5 class="mb-3"># Produtos Cadastrados</h5>
	<div class="row">
	<?php
	$conexao = conectaBanco('local');
	$query = "SELECT * FROM produtos ORDER BY id DESC";
	$produtos = $conexao->prepare($query);
	$produtos->execute();
	while($produto = $produtos->fetch(PDO::FETCH_ASSOC)){
		?>
		<div class="col-md-3">
			<img class="img-thumbnail" src="./uploads/<?=$produto['resumo']?>">
			<h5 class=""><?=$produto['nome']?></h5>
			<p class=""><?=$produto['descricao']?></p>
			<p class=""><a href="./?modulo=produtos&acao=atualizar&id=<?=$produto['id']?>"><i class="far fa-edit"></i> Editar</a></p>
			<p class=""><a href="./?modulo=produtos&acao=excluir&id=<?=$produto['id']?>"><i class="fa fa-times"></i> Excluir</a></p>
		</div>
		<?php
	}
	?>
	</div>
</div>