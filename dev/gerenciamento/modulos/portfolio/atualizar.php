<?php

    $id = (isset($_GET['id'])) ? $_GET['id'] : '';
    if($id==''){
        die("<script>window.location.href='./?modulo=portfolio&acao=listar';</script>");
    }

    $conexao = conectaBanco('local');
    $query = "SELECT * FROM portfolio WHERE id = ".$id;
    $portfolio = $conexao->prepare($query);
    $portfolio->execute();

    $item_port = $portfolio->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['atualizar'])){
    if(isset($_FILES['imagem'])){
        $imagem = upload($_FILES, "imagem");
        if($imagem){
            unlink("./uploads/".$item_port['imagem']);
            if(verificarArquivo($imagem)){
                $dado_imagem = array('imagem' => $imagem);
            }
        }
    }
    $dados = isset($dado_imagem) ? array_merge($_POST, $dado_imagem) : $_POST;
    unset($dados["atualizar"]);
    $sucesso = "./?modulo=portfolio&acao=listar";
    $falha = '
    <div
    class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Erro!</strong> Não foi possível gravar no banco de dados, atualize a página e tente novamente.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $atualizar = crud('alterar','portfolio', $dados, $sucesso, $falha, $id);
    echo $atualizar;
}
?>
<div class="jumbotron text-center padding-0">
	<h3>Portfólio</h3>
	<p>Edição dos trabalhos</p>
</div>
<div class="container">
	<hr>
	<form method="POST" action="./?modulo=portfolio&acao=atualizar&id=<?=$id?>" enctype="multipart/form-data">
		<input type="hidden" name="atualizar" value="sim">
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="titulo">Nome do item*</label>
				<input type="text" class="form-control" name="titulo" id="titulo" value="<?=$item_port['titulo']?>" required>
			</div>
			<div class="form-group col-md-4">
				<div class="form-group col-md-12">
					<label for="categoria">Categoria*</label>
                    <input type="text" class="form-control" name="categoria" id="categoria" value="<?=$item_port['categoria']?>" required>
				</div>
			</div>
			<div class="form-group col-md-4">
				<label for="imagem">Imagem</label>
                <div class="col-md-12 padding-0 mb-3">
                    <img src="./uploads/<?=$item_port['imagem']?>" class="img-fluid" style="height: 100px !important;">
                </div>
                <p class="small">Envie arquivo em PNG, 1:1, e de no máximo 100 kb</p>
                <p class="small" id="alterar-imagem">Alterar</p>
                <input type="file" name="imagem" id="imagem" required disabled>
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
    $("#alterar-imagem").click(function(){
        if($("#imagem").prop('disabled')){
            $("#imagem").prop('disabled', false);
        }else{
            $("#imagem").prop('disabled', true);

        }
    });
</script>