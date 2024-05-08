 CREATE SCHEMA IF NOT EXISTS `lmsvolks`;
 use lmsvolks;
 create table IF NOT EXISTS processos(
	id int not null auto_increment,
    nome varchar(100) not null,
    pessoa_id int not null,
    unidade_id int not null,
    status_process varchar(15) not null,
    created_at datetime not null,
    updated_at datetime,
    primary key (id)
 );

create table unidades(
    id int not null auto_increment,
    nome_unidade varchar(50) not null,
    primary key (id)
);

create table pessoa(
    id int not null auto_increment,
    nome_pessoa varchar(50) not null,
    primary key (id)
);

insert into pessoa (nome_pessoa) values('Maria Fernando Almeida');
insert into pessoa (nome_pessoa) values('Luiz Alberto');
insert into pessoa (nome_pessoa) values('Luciana Almeida');
insert into pessoa (nome_pessoa) values('Joao Fernando Santos');
insert into pessoa (nome_pessoa) values('Victor Souza');
insert into pessoa (nome_pessoa) values('Ana Maria Fernandes');
insert into pessoa (nome_pessoa) values('Fernando odrigues');

insert into unidades (nome_unidade) values('Unidade São Paulo');
insert into unidades (nome_unidade) values('Unidade Rio de JAneiro');
insert into unidades (nome_unidade) values('Unidade Brasilia');
insert into unidades (nome_unidade) values('Unidade Bahia');
insert into unidades (nome_unidade) values('Unidade Porto Alegre');
insert into unidades (nome_unidade) values('Unidade Campinas');
insert into unidades (nome_unidade) values('Unidade São José dos campos');