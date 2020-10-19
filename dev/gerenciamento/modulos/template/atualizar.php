<div class="jumbotron text-center padding-0">
	<h3>Template</h3>
	<p>Configuração dos elementos visuais do site</p>
</div>
<div class="container">
	<?php
	if(isset($_POST['enviar'])){
//RECEBE OS DADOS

		if(isset($_FILES['logotipo'])){
			$logotipo = upload($_FILES, "logotipo");
			if($logotipo){
				unlink("./uploads/".$template['logotipo']);
				if(verificarArquivo($logotipo)){
					$dado_logotipo = array('logotipo' => $logotipo);
// echo var_dump($dado_logotipo);
				}
			}
		}
		if(isset($_FILES['header'])){
			$header = upload($_FILES, "header");
			if($header){
				unlink("./uploads/".$template['header']);
				if(verificarArquivo($header)){
					$dado_header = array('header' => $header);
// echo var_dump($dado_header);
				}
			}
		}
		if(isset($_FILES['sobre'])){
			$sobre = upload($_FILES, "sobre");
			if($sobre){
				unlink("./uploads/".$template['sobre']);
				if(verificarArquivo($sobre)){
					$dado_sobre = array('sobre' => $sobre);
// echo var_dump($dado_sobre);
				}
			}
		}

// die(var_dump($_POST));
		$imagens = array();
		if(isset($dado_logotipo)){
			$imagens = array_merge($imagens, $dado_logotipo);
		}
		if(isset($dado_header)){
			$imagens = array_merge($imagens, $dado_header);
		}
		if(isset($dado_sobre)){
			$imagens = array_merge($imagens, $dado_sobre);
		}

		$dados = array_merge($_POST, $imagens);
		unset($dados["enviar"]);
		$sucesso = "./?modulo=template&acao=atualizar";
		$falha = '<div
		class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Erro!</strong> Não foi possível gravar no banco de dados, atualize a página e tente novamente.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		$atualizar = crud('alterar','template', $dados, $sucesso, $falha);
		echo $atualizar;
	}else{
	}
	?>
	<hr>
	<form method="POST" action="./?modulo=template&acao=atualizar" enctype="multipart/form-data">
		<input type="hidden" name="enviar" value="sim">
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="logotipo">Logotipo</label>
				<div class="col-md-12 padding-0 mb-3">
					<img src="./uploads/<?=$template['logotipo']?>" class="img-fluid" style="height: 100px !important;">
				</div>
				<p class="small">Envie arquivo em PNG, 3:1, e de no máximo 500 kb</p>
				<p class="small" id="alterar-logo">Alterar</p>
				<input type="file" name="logotipo" id="logotipo" required disabled>
			</div>
			<div class="form-group col-md-4">
				<label for="header">Banner Header</label>
				<div class="col-md-12 padding-0 mb-3">
					<img src="./uploads/<?=$template['header']?>" class="img-fluid" style="height: 100px !important;">
				</div>
				<p class="small">Envie arquivo em JPG, 1920x1270, e de no máximo 300 kb</p>
				<p class="small" id="alterar-header">Alterar</p>
				<input type="file" name="header" id="header" required disabled>
			</div>
			<div class="form-group col-md-4">
				<label for="sobre">Foto destaque</label>
				<div class="col-md-12 padding-0 mb-3">
					<img src="./uploads/<?=$template['sobre']?>" class="img-fluid" style="height: 100px !important;">
				</div>
				<p class="small">Envie arquivo em JPG, 600x600, e de no máximo 100 kb</p>
				<p class="small" id="alterar-sobre">Alterar</p>
				<input type="file" name="sobre" id="sobre" required disabled>
			</div>
			<hr>
		</div>
		<hr>
		<div class="form-row">
			<hr>
			<div class="form-group col-md-3">
				<label for="resumo">Resumo da empresa</label>
				<p class="small">Descreva os principais serviços e produtos em até 200 caracteres</p>
				<textarea class="form-control" name="resumo" id="resumo" required><?=$template['resumo']?></textarea>
			</div>
			<div class="form-group col-md-3">
				<label for="corprimaria">Cor primária</label>
				<p class="small">Selecione a cor de maior destaque. a que é mais presente na identidade visual</p>
				<input type="color" class="form-control" style="height:3em" name="corprimaria" value="<?=$template['corprimaria']?>" id="corprimaria" required>
			</div>
			<div class="form-group col-md-3">
				<label for="corsecundaria">Cor secundária</label>
				<p class="small">Selecione uma cor para contrastar com a cor principal.</p>
				<input type="color" class="form-control" style="height:3em" name="corsecundaria" value="<?=$template['corsecundaria']?>" id="corsecundaria" required>
			</div>
			<div class="form-group col-md-3">
				<label for="corterciaria">Cor terciaria</label>
				<p class="small">Selecione uma cor neutra que combine com a primária e secundária</p>
				<input type="color" class="form-control" style="height:3em" name="corterciaria" value="<?=$template['corterciaria']?>" id="corterciaria" required>
			</div>
		</div>

		<div class="text-center">
			<button class="btn btn-primary btn-lg"><i class="fa fa-angle-double-right"></i> Prosseguir</button>
		</div>
	</form>
</div>

<script type="text/javascript">
	$("#alterar-logo").click(function(){
		if($("#logotipo").prop('disabled')){
			$("#logotipo").prop('disabled', false);
		}else{
			$("#logotipo").prop('disabled', true);

		}
	});
	$("#alterar-sobre").click(function(){
		if($("#sobre").prop('disabled')){
			$("#sobre").prop('disabled', false);
		}else{
			$("#sobre").prop('disabled', true);

		}
	});
	$("#alterar-header").click(function(){
		if($("#header").prop('disabled')){
			$("#header").prop('disabled', false);
		}else{
			$("#header").prop('disabled', true);

		}
	});
</script>