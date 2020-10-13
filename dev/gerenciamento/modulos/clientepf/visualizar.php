<?php
$id = $_GET['id'];
$query = "select * from clientepf where id=" . $id;
$retorno = crud('listar', $modulo, $query);
$retorno->execute();
$cliente = $retorno->fetch(PDO::FETCH_ASSOC);
extract($cliente);
$qtd_ordens = contar('ordemservico', 'idcliente', $id);
echo $qtd_ordens;
?>
<div class="container padding-0">
    <div class="row">
        <div class="col-md-5">
            <h3>Perfil do Cliente (PF)</h3>
            <p>Visualização do Cliente</p>

        </div>
        <div class="col-md-7">
            <a class="btn btn-outline-info btn-lg" href="?modulo=clientepf&acao=listar" role="button"><i class="fa fa-user"></i> Listar Clientes</a>
            <a class="btn btn-outline-info btn-lg" href="?modulo=clientepf&acao=cadastrar" role="button"><i class="fa fa-user-plus"></i> Adicionar Cliente</a>

        </div>
    </div>
    <hr>
    <div class="row mb-8">
        <div class="col-md-12">
        <div class="col-md-9 pull-right profile-right-section">
                <div class="row profile-right-section-row">
                    <div class="col-md-12 profile-header">
                        <div class="row">
                            <div class="col-md-8 profile-header-section1 pull-left">
                                <h5><?= $nome ?></h5>
                            </div>
                            <div class="col-md-4 profile-header-section1 text-right pull-rigth">
                                <a href="./?modulo=clientepf&acao=editar&id=<?= $id ?>" class="btn btn-primary btn-block">Editar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fa fa-user-circle"></i> Informações</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><i class="fa fa-info-circle"></i> Registros</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade show active" id="profile">
                                        <?php
                                        foreach ($cliente as $campo => $valor) {
                                            if ($valor != "" && $campo != "status_cliente") {
                                        ?>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label><?= strtoupper($campo) ?></label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?= $valor ?></p>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="buzz">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Your Bio</label>
                                                <br />
                                                <p>Your detail description</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 user-profil-part pull-left">
                <div class="row ">
                    <div class="col-md-12 mt-3">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-header"><?=$qtd_ordens?></div>
                            <div class="card-body">
                                <h5 class="card-title">Ordens de Serviço</h5>
                                <p class="card-text"><a href="./?modulo=ordenservico&acao=visualizar&tipo=pf&id=<?=$id?>"><i class="fa fa-arrow-right"></i> Acessar</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Ordem de Serviço</div>
                <div class="card-body">
                    <h5 class="card-title">Primary card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>