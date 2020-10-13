create table cliente(
	id serial primary key,
	nome varchar(200),
	razaosocial varchar(200),
	cnpj varchar(50),
	responsavel varchar(200),
	cpf_responsavel varchar(50),
	descricao varchar(999),
	endereco varchar(300),
	telefone varchar(50),
	celular varchar(50),
	email varchar(200),
	facebook varchar(200),
	instagram varchar(200),
	twitter varchar(200),
	youtube varchar(200),
	googleplus varchar(200)
);

create table leads(
	id serial primary key,
	nome varchar(200),
	whatsapp varchar(100),
	profissao varchar(100),
	renda varchar(100),
	email varchar(200),
	newsletter varchar(50)
);

create table template(
	id serial primary key,
	logotipo varchar(200),
	resumo varchar(500),
	corprimaria varchar(100),
	corsecundaria varchar(100),
	corterciaria varchar(100),
	header varchar(100),
	sobre varchar(100)
);

create table servicos(
	id serial primary key,
	servico varchar(100),
	descricao varchar(300),
	imagem varchar(100)
);

create table portfolio(
	id serial primary key,
	titulo varchar(100),
	imagem varchar(200),
	categoria varchar(100)
);

create table produtos(
	id serial primary key,
	nome varchar(200),
	resumo varchar(200),
	descricao varchar(500),
	preco Double
);

create table categoria(
	id serial primary key,
	nome varchar(100)
);

create table post(
	id serial primary key,
	titulo varchar(200),
	resumo varchar(200),
	texto text,
	idcategoria int
);

create table questionario(
	id serial primary key,
	nome varchar(200),
	tiporesultado varchar(200),
	aprimario varchar(300),
	asecundario varchar(300),
	bprimario varchar(300),
	bsecundario varchar(300),
	cprimario varchar(300),
	csecundario varchar(300),
	dprimario varchar(300),
	dsecundario varchar(300)
);

create table pergunta(
	id serial primary key,
	titulo varchar(200),
	idquestionario int
);

create table resposta(
	id serial primary key,
	titulo varchar(200),
	tipo varchar(10),
	idpergunta int,
	ordem int
);