<?php
    if(isset($_POST['nome']) && $_POST['nome']!=""){
        $sucesso = "./?modulo=instalacao&acao=install&etapa=3";
        $falha = "Erro ao inserir dados";
        $cadastro = crud('inserir','cliente', $_POST, $sucesso, $falha);
        echo $cadastro;
    }
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