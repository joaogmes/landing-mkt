<?php

    include_once('../cfg/conexao.php');
    include_once('../modulos/cfg/funcoes.php');

if(!empty($_FILES)){

$target_dir = "uploads/";
$target_file = time().basename($_FILES["file"]["name"]);
$titulo = substr($_FILES['file']['name'], 0, -4);
$ext = substr($_FILES['file']['name'], -4);
$ext_permitidas = array('.png'. '.jpg', 'jpeg', '.gif', '.bmp');
if($ext == '.png' || $ext == '.jpg' || $ext == 'jpeg'|| $ext == '.gif' || $ext == '.bmp'){
	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$target_file)) {
		// $status = 1;
		$dados= array(
			'titulo' => $titulo, 
			'imagem' => $target_file, 
			'categoria' => '' 
		);
		$status = crud('inserir', 'portfolio', $dados, 'DEU CERTO', 'AZEDOU', '');
		echo $status;
	}
}

}else{
	echo "<script>window.location.href='./?modulo=portfolio&acao=listar';</script>";
}

?>