<?php

if(isset($_POST['nome']) && $_POST['nome']!=""){
	$sucesso = "./?modulo=instalacao&acao=install&etapa=3";
	$falha = "Erro ao inserir dados";
	$atualizar = crud('alterar','cliente', $_POST, $sucesso, $falha, '');
	echo $atualizar;
}
?>
<div class="jumbotron text-center padding-0">
	<h3>Cliente</h3>
	<p>Informe os dados cadastrais do cliente</p>
</div>
<div class="container">
	<hr>
	<form method="POST" action="./?modulo=cliente&acao=atualizar">
		<h5>Identificação</h5>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="nome">Nome Fantasia*</label>
				<input type="text" class="form-control" name="nome" id="nome" value="<?=$cliente['nome']?>" required>
			</div>
			<div class="form-group col-md-4">
				<label for="razaosocial">Razão Social</label>
				<input type="text" class="form-control" name="razaosocial" value="<?=$cliente['razaosocial']?>" id="razaosocial">
			</div>
			<div class="form-group col-md-4">
				<label for="cnpj">CNPJ</label>
				<input type="text" class="form-control" name="cnpj" value="<?=$cliente['cnpj']?>" id="cnpj">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="responsavel">Nome do Responsável*</label>
				<input type="text" class="form-control" name="responsavel" value="<?=$cliente['responsavel']?>" id="responsavel" required>
			</div>
			<div class="form-group col-md-6">
				<label for="cpf_responsavel">CPF do Responsável*</label>
				<input type="text" class="form-control" name="cpf_responsavel" value="<?=$cliente['cpf_responsavel']?>" id="cpf_responsavel" required>
			</div>
		</div>
		<div class="row">
			
		<div class="col-md-6">
			<h5>Informações</h5>
			<div class="form-row">
				<div class="form-group">
					<label for="descricao">Sobre a empresa*</label>
					<textarea class="form-control summernote" name="descricao" id="descricao" placeholder="Apresente sua empresa para o cliente" required><?=$cliente['descricao']?></textarea>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<h5>Midias online</h5>
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="endereco">Endereço</label>
					<input type="text" class="form-control" name="endereco" value="<?=$cliente['endereco']?>" id="endereco">
				</div>
				<div class="form-group col-md-6">
					<label for="telefone">Telefone</label>
					<input type="text" class="form-control" name="telefone" value="<?=$cliente['telefone']?>" id="telefone">
				</div>
				<div class="form-group col-md-6">
					<label for="celular">WhatsApp*</label>
					<input type="text" class="form-control" name="celular" value="<?=$cliente['celular']?>" id="celular" required>
				</div>
				<div class="form-group col-md-6">
					<label for="email">E-mail*</label>
					<input type="email" class="form-control" name="email" value="<?=$cliente['email']?>" id="email" required>
				</div>
				<div class="form-group col-md-6">
					<label for="facebook">Facebook</label>
					<input type="text" class="form-control" name="facebook" value="<?=$cliente['facebook']?>" id="facebook">
				</div>
				<div class="form-group col-md-6">
					<label for="instagram">Instagram</label>
					<input type="text" class="form-control" name="instagram" value="<?=$cliente['instagram']?>" id="instagram">
				</div>
				<div class="form-group col-md-6">
					<label for="twitter">Twitter</label>
					<input type="text" class="form-control" name="twitter" value="<?=$cliente['twitter']?>" id="twitter">
				</div>
				<div class="form-group col-md-6">
					<label for="youtube">Youtube</label>
					<input type="text" class="form-control" name="youtube" value="<?=$cliente['youtube']?>" id="youtube">
				</div>
				<div class="form-group col-md-6">
					<label for="googleplus">Google +</label>
					<input type="text" class="form-control" name="googleplus" value="<?=$cliente['googleplus']?>" id="googleplus">
				</div>
			</div>
		</div>
		</div>
		<div class="text-center">
			<button class="btn btn-primary btn-lg"><i class="fa fa-angle-double-right"></i> Salvar</button>
		</div>
	</form>
</div>

<script>
	$('.summernote').summernote({
		placeholder: 'Hello Bootstrap 4',
		tabsize: 2,
		height: 400
	});
</script>