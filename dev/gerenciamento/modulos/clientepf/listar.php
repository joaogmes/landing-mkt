<?php
$filtro = (isset($_POST['filtro']) && $_POST['filtro'] != "") ? $_POST['filtro'] : "";
$valor = (isset($_POST['valor']) && $_POST['valor'] != "") ? $_POST['valor'] : "";

if ($filtro != "" && $valor != "") {
    $query = "SELECT * FROM " . $modulo . " WHERE '" . $filtro . "' LIKE '%" . $valor . "%' ORDER BY id desc";
} else {
    $query = "SELECT * FROM " . $modulo . " ORDER BY id desc";
}
$retorno = crud($acao, $modulo, $query);
$retorno->execute();
?>
<div class="container padding-0">
    <div class="row">
        <div class="col-md-5">
            <h3>Clientes (PF)</h3>
            <p>Listagem das pessoas físicas cadastradas</p>

        </div>
        <div class="col-md-7">
            <a class="btn btn-outline-info btn-lg" href="?modulo=clientepf&acao=listar" role="button"><i class="fa fa-user"></i> Listar Clientes</a>
            <a class="btn btn-outline-info btn-lg" href="?modulo=clientepf&acao=cadastrar" role="button"><i class="fa fa-user-plus"></i> Adicionar Cliente</a>

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 pesquisa">
            <form class="form-inline my-2 my-lg-0" action="./?modulo=clientepf&acao=listar" method="POST">
                <label>Pesquisar por:&nbsp;&nbsp;&nbsp;</label>
                <select class="form-control mr-sm-2" name="filtro">
                    <option value="id">Código</option>
                    <option value="nome">Nome</option>
                    <option value="telefone">Telefone</option>
                    <option value="cpf">CPF</option>
                </select>
                <input class="form-control mr-sm-2" name="valor" type="search" placeholder="Termo" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Cód.</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($resultado = $retorno->fetch(PDO::FETCH_ASSOC)) {
                        extract($resultado);
                    ?>
                        <tr>
                            <th scope="row"><?= $id ?></th>
                            <td><?= $nome ?></td>
                            <td><?= $cpf ?></td>
                            <td><?= $celular ?></td>
                            <td><?= $telefone ?></td>
                            <td><?= $email ?></td>
                            <td><a href="./?modulo=clientepf&acao=visualizar&id=<?= $id ?>"><i class="fa fa-eye"></i></a></td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>