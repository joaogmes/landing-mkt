<style type="text/css">
    .jumbotron{
        padding: 20px !important;
    }
</style>
<?php
$etapa = isset($_GET['etapa']) ? $_GET['etapa'] : '1';
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <a href="./">
                <img class="img-fluid mx-auto" src="./assets/img/AgênciaJotaGomes.png">
            </a>
        </div>
        <div class="col-md-9 text-center">
            <h1>Landing Page & Mkt Digital</h1>
        </div>
    </div>
    <hr>
</div>
<?php 
switch ($etapa) {
    case '1':
    ?>
    <div class="jumbotron text-center">
        <h3>Instalação</h3>
        <p>Parâmetros para confecção de landing page otimizada para marketing digital</p>
    </div>
    <div class="container">
        <hr>
        <h5>Os dados do cliente não foram informados!</h5>
        <p>Para a configuração e funcionamento adequado do projeto você deve informar os dados do cliente. Para prosseguir com o processo de instalação e confeccionar a landing page otimizada para marketing digital clique no botão abaixo</p>
        <hr>
        <div class="text-center">
            <a href="./?modulo=instalacao&acao=install&etapa=2" class="btn btn-primary btn-lg"><i class="fa fa-angle-double-right"></i> Prosseguir</a>
        </div>
    </div>
    <?php
    break;
    case '2':
    ?>
    <div class="jumbotron text-center">
        <h3>Cliente</h3>
        <p>Informe os dados cadastrais do cliente</p>
    </div>
    <div class="container">
        <hr>
        
        
        <form method="POST" action="./?modulo=instalacao&acao=install&etapa=2">
            <h5>Identificação</h5>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nome">Nome Fantasia*</label>
                    <input type="text" class="form-control" name="nome" id="nome" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="razaosocial">Razão Social</label>
                    <input type="text" class="form-control" name="razaosocial" id="razaosocial">
                </div>
                <div class="form-group col-md-4">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" name="cnpj" id="cnpj">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="responsavel">Nome do Responsável*</label>
                    <input type="text" class="form-control" name="responsavel" id="responsavel" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="cpf_responsavel">CPF do Responsável*</label>
                    <input type="text" class="form-control" name="cpf_responsavel" id="cpf_responsavel" required>
                </div>
            </div>
            <h5>Informações</h5>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="descricao">Sobre a empresa*</label>
                    <textarea class="form-control" name="descricao" id="descricao" placeholder="Apresente sua empresa para o cliente" required></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" name="endereco" id="endereco">
                </div>
                <div class="form-group col-md-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" name="telefone" id="telefone">
                </div>
            </div>
            <h5>Midias online</h5>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="celular">WhatsApp*</label>
                    <input type="text" class="form-control" name="celular" id="celular" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="email">E-mail*</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="facebook">Facebook</label>
                    <input type="text" class="form-control" name="facebook" id="facebook">
                </div>
                <div class="form-group col-md-3">
                    <label for="instagram">Instagram</label>
                    <input type="text" class="form-control" name="instagram" id="instagram">
                </div>
                <div class="form-group col-md-3">
                    <label for="twitter">Twitter</label>
                    <input type="text" class="form-control" name="twitter" id="twitter">
                </div>
                <div class="form-group col-md-3">
                    <label for="youtube">Youtube</label>
                    <input type="text" class="form-control" name="youtube" id="youtube">
                </div>
                <div class="form-group col-md-3">
                    <label for="googleplus">Google +</label>
                    <input type="text" class="form-control" name="googleplus" id="googleplus">
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary btn-lg"><i class="fa fa-angle-double-right"></i> Prosseguir</button>
            </div>
        </form>
    </div>
    <?php
    break;

    default:
# code...
    break;
}
?>
