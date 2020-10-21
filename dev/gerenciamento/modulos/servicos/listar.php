<div class="jumbotron text-center padding-0">
	<h3>Serviços</h3>
	<p>Informe os serviços que o cliente presta</p>
</div>
<div class="container">
		<ul class="list-inline">
			<li class="list-inline-item"><a href="./?modulo=servicos&acao=cadastrar"><i class="fa fa-plus"></i> Adicionar serviço<a></li>
		</ul>
</div>
<div class="container">
	<hr>
	<h5 class="mb-3"># Serviços Cadastrados</h5>
	<?php
	$conexao = conectaBanco('local');
	$query = "SELECT * FROM servicos ORDER BY id DESC";
	$servicos = $conexao->prepare($query);
	$servicos->execute();

	while($servico = $servicos->fetch(PDO::FETCH_ASSOC)){
		?>
		<ul class="list-inline">
			<li class="list-inline-item"><img class="" src="./uploads/<?=$servico['imagem']?>"  width="50"></li>
			<li class="list-inline-item">#<?=$servico['id']?> -</li>
			<li class="list-inline-item"><?=$servico['servico']?> -</li>
			<li class="list-inline-item"><?=$servico['descricao']?> -</li>
			<li class="list-inline-item"><a href="./?modulo=servicos&acao=atualizar&id=<?=$servico['id']?>"><i class="far fa-edit"></i> Editar</a> -</li>
			<li class="list-inline-item"><a href="./?modulo=servicos&acao=excluir&id=<?=$servico['id']?>"><i class="fa fa-times"></i> Excluir</a></li>
		</ul>
		<?php
	}
	?>
</div>