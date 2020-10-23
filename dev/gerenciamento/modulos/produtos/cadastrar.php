<?php
    if(isset($_POST['enviar'])){
        $resumo = upload($_FILES, "resumo");
        if(verificarArquivo($resumo)){
            $imagens = array(
                'resumo' => $resumo
            );
            $dados = array_merge($_POST, $imagens);
            unset($dados["enviar"]);
            $sucesso = "./?modulo=produtos&acao=listar";
            $falha = '<div
            // class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro!</strong> Não foi possível gravar no banco de dados, atualize a página e tente novamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            echo crud('inserir', 'produtos', $dados, $sucesso, $falha, '');
        }else{
            $caminho = "./uploads/";
            $del_resumo = (!$resumo) ? '' : unlink($caminho.$resumo); 
            echo '<div
            // class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Erro!</strong> Revise os campos de upload e tente novamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
    }
    ?>
<div class="jumbotron text-center padding-0">
	<h3>Produtos</h3>
	<p>Cadastro dos produtos comercializados</p>
</div>
<div class="container">
	<hr>
	<form method="POST" action="./?modulo=produtos&acao=cadastrar" enctype="multipart/form-data">
		<input type="hidden" name="enviar" value="sim">
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="nome">Nome do produto*</label>
				<input type="text" class="form-control" name="nome" id="nome" required>
			</div>
			<div class="form-group col-md-4">
				<div class="form-group col-md-12">
					<label for="descricao">Descrição*</label>
					<textarea class="form-control" name="descricao" id="descricao" placeholder="" required></textarea>
				</div>
			</div>
			<div class="form-group col-md-4">
				<label for="resumo">Imagem</label>
                <p class="small">Envie arquivo em PNG, 1:1, e de no máximo 100 kb</p>
                <input type="file" name="resumo" id="resumo" required>
			</div>
		</div>
		<div class="text-center">
			<button class="btn btn-primary btn-lg"><i class="fa fa-angle-double-right"></i> Prosseguir</button>
		</div>
	</form>
</div>
<script>
	$('.summernote').summernote({
		placeholder: 'Hello Bootstrap 4',
		tabsize: 2,
		height: 300
	});
</script>