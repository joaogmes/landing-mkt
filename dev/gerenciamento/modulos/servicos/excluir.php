<?php

$id = (isset($_GET['id'])) ? $_GET['id'] : '';
if($id==''){
    die("<script>window.location.href='./?modulo=servicos&acao=listar';</script>");
}

    $conexao = conectaBanco('local');
    $query = "SELECT * FROM servicos WHERE id = ".$id;
    $servicos = $conexao->prepare($query);
    $servicos->execute();

    $servico = $servicos->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['deletar'])){
    if(!verificarArquivo($servico['imagem'])){
        unlink("./uploads/".$servico['imagem']);
    }

    $sucesso = "./?modulo=servicos&acao=listar";
    $falha = '
    <div
    class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Erro!</strong> Não foi possível excluir do banco de dados, atualize a página e tente novamente.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $excluir = crud('excluir','servicos', '', $sucesso, $falha, $id);
    echo $excluir;
}
?>
<div class="jumbotron text-center padding-0">
    <h3>Serviços</h3>
    <p>Exclusão do serviço</p>
</div>
<div class="container">
    <hr>
    <form action="./?modulo=servicos&acao=excluir&id=<?=$id?>" method="POST">
        <input type="hidden" name="deletar" value="sim">
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="alert alert-warning fade show" role="alert">
            <strong>Deseja excluir o serviço '<?=$servico['servico']?>'?</strong><br>
            Os dados serão perdidos permanentemente, sem chance de recuperação.
        </div>
        <div class="text-center">
            <button class="btn btn-warning btn-lg"><i class="fa fa-times-circle"></i> Prosseguir</button>
            <a href="./?modulo=servicos&acao=listar" class="btn btn-default btn-lg"><i class="fa fa-angle-double-left"></i> Cancelar</a>
        </div>
    </div>
</form>
</div>