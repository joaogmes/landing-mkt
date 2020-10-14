<div class="jumbotron text-center">
    <h3>Template</h3>
    <p>Elementos visuais da sua empresa</p>
</div>
<div class="container">
<?php
if(isset($_POST['enviar'])){
   echo "Status Logotipo: ".upload($_FILES, "logotipo");
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
                <p class="small">Envie arquivo em PNG, de fundo transparente, proporção 3:1 e de no máximo 1MB</p class="small">
                    <input type="file" name="logotipo" id="logotipo">
                </div>
            </div>

            <div class="text-center">
                <button class="btn btn-primary btn-lg"><i class="fa fa-angle-double-right"></i> Prosseguir</button>
            </div>
        </form>
    </div>