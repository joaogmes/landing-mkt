<div class="jumbotron text-center">
    <h3>Template</h3>
    <p>Configuração dos elementos visuais do site</p>
</div>
<div class="container">
    <?php
    if(isset($_POST['enviar'])){
        $logotipo = upload($_FILES, "logotipo");
        $header = upload($_FILES, "header");
        $sobre = upload($_FILES, "sobre");

        if(verificarArquivos($logotipo, $sobre, $header)){
            $imagens = array(
                'logotipo' => $logotipo,
                'header' => $header,
                'sobre' => $sobre
            );
            $dados = array_merge($_POST, $imagens);
            echo var_dump($dados);
        }else{
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Erro!</strong> Revise os campos de upload e tente novamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }

// $sucesso = "./?modulo=instalacao&acao=install&etapa=3";
// $falha = "Erro ao inserir dados";
// $cadastro = crud('inserir','cliente', $_POST, $sucesso, $falha);
// echo $cadastro;
    }
    ?>
    <hr>
    <form method="POST" action="./?modulo=instalacao&acao=install&etapa=3" enctype="multipart/form-data">
        <input type="hidden" name="enviar" value="sim">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="logotipo">Logotipo</label>
                <p class="small">Envie arquivo em PNG, 3:1, e de no máximo 500 kb</p>
                <input type="file" name="logotipo" id="logotipo" required>
            </div>
            <div class="form-group col-md-4">
                <label for="header">Banner Header</label>
                <p class="small">Envie arquivo em JPG, 1920x1270, e de no máximo 300 kb</p>
                <input type="file" name="header" id="header" required>
            </div>
            <div class="form-group col-md-4">
                <label for="sobre">Foto destaque</label>
                <p class="small">Envie arquivo em JPG, 600x600, e de no máximo 100 kb</p>
                <input type="file" name="sobre" id="sobre" required>
            </div>
            <hr>
        </div>
        <hr>
        <div class="form-row">
            <hr>
            <div class="form-group col-md-3">
                <label for="resumo">Resumo da empresa</label>
                <p class="small">Descreva os principais serviços e produtos em até 200 caracteres</p>
                <textarea class="form-control" name="resumo" id="resumo" required></textarea>
                <!-- <input type="file" name="resumo" id="resumo" required> -->
            </div>
            <div class="form-group col-md-3">
                <label for="corprimaria">Cor primária</label>
                <p class="small">Selecione a cor de maior destaque. a que é mais presente na identidade visual</p>
                <input type="color" class="form-control" style="height:3em" name="corprimaria" id="corprimaria" required>
            </div>
            <div class="form-group col-md-3">
                <label for="corsecundaria">Cor secundária</label>
                <p class="small">Selecione uma cor para contrastar com a cor principal.</p>
                <input type="color" class="form-control" style="height:3em" name="corsecundaria" id="corsecundaria" required>
            </div>
            <div class="form-group col-md-3">
                <label for="corterciaria">Cor terciaria</label>
                <p class="small">Selecione uma cor neutra que combine com a primária e secundária</p>
                <input type="color" class="form-control" style="height:3em" name="corterciaria" id="corterciaria" required>
            </div>
        </div>

        <div class="text-center">
            <button class="btn btn-primary btn-lg"><i class="fa fa-angle-double-right"></i> Prosseguir</button>
        </div>
    </form>
</div>