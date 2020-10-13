<?php

function checarInstalacao(){
    $conexao = $conexao = conectaBanco('local');
    $query = "SELECT * FROM cliente";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    if($stmt->rowCount() < 1){
        $msg = "Não tem cliente";
    }else{
        $msg = "Tem cliente";
    }

    return $msg;
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

function crud($operacao, $tabela, $dados)
{
    $conexao = conectaBanco('local');
    switch ($operacao) {
        case 'listar':
            $listar = $conexao->prepare($dados);
            return $listar;
            break;

        case 'inserir':
            $campos = ' (';
            $valores = ') VALUES (';
            foreach ($dados as $chave => $valor) {
                $campos .= " " . $chave . " ,";
                $valores .= " '" . $valor . "' ,";
            }
            $campos = substr($campos, 0, -1);
            $valores = substr($valores, 0, -1);
            $query = "insert into " . $tabela . " " . $campos . " " . $valores . " )";
            $stmt = $conexao->prepare($query);
            if ($stmt->execute()) {
                $id = $conexao->lastInsertId();
                $caminho = "./?modulo=clientepf&acao=visualizar&id=" . $id;
                $retorno = header("Location: " . $caminho);
            } else {
                $retorno = "Falha";
            }
            return $retorno;
            break;

        case 'alterar':
            # code...
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
