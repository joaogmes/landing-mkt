<div class="jumbotron text-center padding-0">
	<h3>Serviços</h3>
	<p>Informe os serviços que o cpente presta</p>
</div>
<div class="container">
	<ul class="list-inline">
		<li class="list-inline-item"><a href="./?modulo=servicos&acao=cadastrar"><i class="fa fa-plus"></i> Adicionar serviços<a></li>
		</ul>
	</div>
	<div class="container">
		<hr>
		<h5 class="mb-3"># Serviços Cadastrados</h5>
		<div class="row">
			
			<?php
			$conexao = conectaBanco('local');
			$query = "SELECT * FROM servicos ORDER BY id DESC";
			$servicos = $conexao->prepare($query);
			$servicos->execute();

			while($servico = $servicos->fetch(PDO::FETCH_ASSOC)){
				?>
				<div class="col-md-2">
						<img class="img-thumbnail" src="./uploads/<?=$servico['imagem']?>">
						<h5 ><?=$servico['servico']?></h5>
						<p ><?=$servico['descricao']?></p>
						<p ><a href="./?modulo=servicos&acao=atuapzar&id=<?=$servico['id']?>"><i class="far fa-edit"></i> Editar</a></p>
						<p ><a href="./?modulo=servicos&acao=excluir&id=<?=$servico['id']?>"><i class="fa fa-times"></i> Excluir</a></p>
					</ul>
					<hr>
				</div>
				<?php
			}
			?>
		</div>
	</div>