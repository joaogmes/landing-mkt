<style type="text/css">
    .jumbotron{
        padding: 20px !important;
    }
</style>
<?php
$etapa_funcao = $etapa;
$etapa_url = isset($_GET['etapa']) ? $_GET['etapa'] : '1';
if($etapa_funcao=='2' && $etapa_url=='1'|| $etapa_url=='2'){
    $etapa = $etapa_url;
}else{
    $etapa = $etapa_funcao;
}
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
include('./modulos/instalacao/etapas/'.$etapa_url.'.php');
?>
