<?php

$id = (isset($_GET['id'])) ? $_GET['id'] : '';
if($id==''){
    die("<script>window.location.href='./?modulo=portfolio&acao=listar';</script>");
}

$conexao = conectaBanco('local');
$query = "SELECT * FROM portfolio WHERE id = ".$id;
$portfolio = $conexao->prepare($query);
$portfolio->execute();

$port = $portfolio->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['deletar'])){
    if(verificarArquivo($port['imagem'])){
        unlink("./uploads/".$port['imagem']);
    }

    $sucesso = "./?modulo=portfolio&acao=listar";
    $falha = '
    <div
    class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Erro!</strong> Não foi possível excluir do banco de dados, atualize a página e tente novamente.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $excluir = crud('excluir','portfolio', '', $sucesso, $falha, $id);
    echo $excluir;
}
?>
<div class="jumbotron text-center padding-0">
    <h3>Portifólio</h3>
    <p>Exclusão do itens</p>
</div>
<div class="container">
    <hr>
    <form action="./?modulo=portfolio&acao=excluir&id=<?=$id?>" method="POST">
        <input type="hidden" name="deletar" value="sim">
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="alert alert-warning fade show" role="alert">
            <strong>Deseja excluir o item '<?=$port['titulo']?>'?</strong><br>
            Os dados serão perdidos permanentemente, sem chance de recuperação.
        </div>
        <div class="text-center">
            <button class="btn btn-warning btn-lg"><i class="fa fa-times-circle"></i> Prosseguir</button>
            <a href="./?modulo=portfolio&acao=listar" class="btn btn-default btn-lg"><i class="fa fa-angle-double-left"></i> Cancelar</a>
        </div>
    </div>
</form>
</div>