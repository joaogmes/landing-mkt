<?php

function checarInstalacao(){
    $conexao = $conexao = conectaBanco('local');

    $etapa='';

    $q_cliente = "SELECT * FROM cliente";
    $cliente = $conexao->prepare($q_cliente);
    $cliente->execute();



    $q_template = "SELECT * FROM template";
    $template = $conexao->prepare($q_template);
    $template->execute();

    if($template->rowCount() < 1){
        if($cliente->rowCount() < 1){
            $etapa='2';
        }else{
            $etapa='3';
        }
    }else{
        $etapa='completo';
    }

    return $etapa;

}

function checarLogin()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['usuario'])) {
        if ($_SESSION['usuario'] != "") {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function verificarUsuario($usuario, $senha)
{
    switch ($usuario) {
        case 'jotagomes':
        if ($senha == 'jotajota') {
            return true;
        } else {
            return false;
        }
        break;

        default:
        return false;
        break;
    }
}

function verificarConexao($banco)
{
    if (!(conectaBanco($banco))) {
        $status = "<span class='error'>offline</span>";
    } else {
        $status = "<span class='success'>online</span>";
    }
    return $status;
}

function get_endereco($cep)
{
// formatar o cep removendo caracteres nao numericos
    $cep = preg_replace("/[^0-9]/", "", $cep);
    $url = "http://viacep.com.br/ws/$cep/xml/";

    $xml = simplexml_load_file($url);
    return $xml;
}

function validaCPF($cpf)
{
// Extrai somente os números
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);
// Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }
// Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }
// Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}

function contar($tabela, $campo, $criterio)
{
    $conexao = conectaBanco('local');
    $qtd = 0;
    if ($campo != "" && $criterio != "") {
        $condicao = " WHERE " . $campo . " = " . $criterio;
    } else {
        $condicao = "";
    }
    $query =  "SELECT * FROM " . $tabela . $condicao;
    $contagem = $conexao->prepare($query);
    $contagem->execute();
    $qtd = $contagem->rowCount();
    return $qtd;
}

function crud($operacao, $tabela, $dados, $sucesso, $falha)
{
    $conexao = conectaBanco('local');
    switch ($operacao) {
        case 'listar':
        $query = "SELECT * FROM ".$tabela." ".$dados;
        $listar = $conexao->prepare($query);
        $listar->execute();
        $retorno = $listar->fetch(PDO::FETCH_ASSOC);
        return $retorno;
        break;

        case 'inserir':
        $campos = ' (';
        $valores = ') VALUES (';
        foreach ($dados as $chave => $valor) {
            if($chave == 'files'){

            }else{

            $campos .= " " . $chave . " ,";
            $valores .= " '" . $valor . "' ,";
            }
        }
        $campos = substr($campos, 0, -1);
        $valores = substr($valores, 0, -1);
        $query = "insert into " . $tabela . " " . $campos . " " . $valores . " )";
        $stmt = $conexao->prepare($query);
        if ($stmt->execute()) {
            $id = $conexao->lastInsertId();
            $retorno = header("Location: " . $sucesso);
        } else {
            $retorno = "<h3>".$falha."</h3>";
        }
        return $retorno;
        break;

        case 'alterar':
        $campos = '';
        $valores = '';
        foreach ($dados as $chave => $valor) {
            if($chave == 'files'){
            }else{
                $campos .= " " . $chave . " = '".$valor."',";
            }
        }
        $campos = substr($campos, 0, -1);
// $valores = substr($valores, 0, -1);
        $query = "UPDATE " . $tabela . " SET " . $campos . " WHERE id='1' ";
        $stmt = $conexao->prepare($query);
        if ($stmt->execute()) {
            $id = $conexao->lastInsertId();
            $retorno = "<script>window.location='./?modulo=".$tabela."&acao=atualizar';</script>";
        } else {
            $retorno = "<h3>Deu errado</h3>";
        }
        return $retorno;
        break;

        case 'excluir':
# code...
        break;

        default:
# code...
        break;
    }
}

function cadastrarpf($dados)
{
    if (isset($dados['status_cliente']) && $dados['status_cliente'] == "ativo") {
        $campos = ' (';
        $valores = ') VALUES (';
        foreach ($dados as $chave => $valor) {
            $campos .= " " . $chave . " ,";
            $valores .= " '" . $valor . "' ,";
        }
        $campos = substr($campos, 0, -1);
        $valores = substr($valores, 0, -1);
        $query = "insert into clientepf " . $campos . " " . $valores . " )";
        return $query;
    }
}

function upload($arquivo, $campo){
    $target_dir = "./uploads/";
    $numerador=strtotime('now').mt_rand();
    $arquivo= $numerador.str_replace(" ", "", basename($_FILES[$campo]["name"]));
    $target_file = $target_dir . $arquivo;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if ($_FILES[$campo]['size'] == 0)
    {
// return "Nenhum arquivo selecionado";
        return false;
    }

    $check = getimagesize($_FILES[$campo]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
// return "Arquivo inválido.";
        return false;
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
// return "Arquivo já enviado.";
// return $_FILES[$campo]["name"];
        return false;
        $uploadOk = 0;
    }

    if ($_FILES[$campo]["size"] > 5000000) {
// return "Arquivo muito grande.";
        return false;
        $uploadOk = 0;
    }

    if($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "svg") {
        return "Formato de imagem não permitido.";
// return false;
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
// return "Arquivo NÃO ENVIADO.";
        return false;
    } else {
        if (move_uploaded_file($_FILES[$campo]["tmp_name"], $target_file)) {
            return $arquivo;
        } else {
// return "Erro no upload.";
            return false;
        }
    }
}

function verificarArquivos($logotipo, $sobre, $header){
    $caminho = "./uploads/";

    if($logotipo && $sobre && $header){
        if(file_exists($caminho.$logotipo) && file_exists($caminho.$sobre) && file_exists($caminho.$header)){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function verificarArquivo($arquivo){
    $caminho = "./uploads/";

    if($arquivo){
        if(file_exists($caminho.$arquivo)){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}