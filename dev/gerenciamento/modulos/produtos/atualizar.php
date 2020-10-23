<?php

    $id = (isset($_GET['id'])) ? $_GET['id'] : '';
    if($id==''){
        die("<script>window.location.href='./?modulo=produtos&acao=listar';</script>");
    }

    $conexao = conectaBanco('local');
    $query = "SELECT * FROM produtos WHERE id = ".$id;
    $produtos = $conexao->prepare($query);
    $produtos->execute();

    $produto = $produtos->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['atualizar'])){
    if(isset($_FILES['resumo'])){
        $resumo = upload($_FILES, "resumo");
        if($resumo){
            unlink("./uploads/".$produto['resumo']);
            if(verificarArquivo($resumo)){
                $dado_resumo = array('resumo' => $resumo);
            }
        }
    }
    $dados = isset($dado_resumo) ? array_merge($_POST, $dado_resumo) : $_POST;
    unset($dados["atualizar"]);
    $sucesso = "./?modulo=produtos&acao=listar";
    $falha = '
    <div
    class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Erro!</strong> Não foi possível gravar no banco de dados, atualize a página e tente novamente.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $atualizar = crud('alterar','produtos', $dados, $sucesso, $falha, $id);
    echo $atualizar;
}
?>
<div class="jumbotron text-center padding-0">
	<h3>Serviços</h3>
	<p>Cadastro dos serviços prestados</p>
</div>
<div class="container">
	<hr>
	<form method="POST" action="./?modulo=produtos&acao=atualizar&id=<?=$id?>" enctype="multipart/form-data">
		<input type="hidden" name="atualizar" value="sim">
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="nome">Nome do produto*</label>
				<input type="text" class="form-control" name="nome" id="nome" value="<?=$produto['nome']?>" required>
			</div>
			<div class="form-group col-md-4">
				<div class="form-group col-md-12">
					<label for="descricao">Descrição*</label>
					<textarea class="form-control" name="descricao" id="descricao" placeholder="" required><?=$produto['descricao']?></textarea>
				</div>
			</div>
			<div class="form-group col-md-4">
				<label for="resumo">resumo</label>
                <div class="col-md-12 padding-0 mb-3">
                    <img src="./uploads/<?=$produto['resumo']?>" class="img-fluid" style="height: 100px !important;">
                </div>
                <p class="small">Envie arquivo em PNG, 1:1, e de no máximo 100 kb</p>
                <p class="small" id="alterar-resumo">Alterar</p>
                <input type="file" name="resumo" id="resumo" required disabled>
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
    $("#alterar-resumo").click(function(){
        if($("#resumo").prop('disabled')){
            $("#resumo").prop('disabled', false);
        }else{
            $("#resumo").prop('disabled', true);

        }
    });
</script>