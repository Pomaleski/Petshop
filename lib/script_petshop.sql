CREATE DATABASE petshop;
USE petshop;

CREATE TABLE cidade (
    cod int auto_increment not null PRIMARY KEY,
    nome varchar(50),
    uf char(2)
);

CREATE TABLE usuario (
    cod int auto_increment not null PRIMARY KEY,
    nome varchar(100) not null,
    email varchar(255) not null UNIQUE,
    senha varchar(100) not null,
    data_nascimento date not null,
    cpf int not null UNIQUE,
    telefone varchar(15),
    cep int,
    logradouro varchar(50),
    numero_residencia int,
    complemento varchar(50),
    bairro varchar(50),
    fk_cod_cidade int,
    perfil enum('a','f','c') not null default 'c',
    data_desativacao date,
    foto text
);
 
ALTER TABLE usuario ADD CONSTRAINT FK_usuario_3
    FOREIGN KEY (fk_cod_cidade)
    REFERENCES cidade (cod);

CREATE TABLE especie (
    cod int auto_increment not null PRIMARY KEY,
    nome varchar(30) not null UNIQUE
);

CREATE TABLE vacina (
    cod int auto_increment not null PRIMARY KEY,
    nome varchar(30) not null UNIQUE
);

CREATE TABLE pet (
    cod int auto_increment not null PRIMARY KEY,
    nome varchar(100) not null,
    fk_cod_especie int not null,
    genero enum('m','f') not null,
    raca varchar(30),
    alergia text,
    descricao text,
    foto text,
    fk_cod_usuario int not null
);
 
ALTER TABLE pet ADD CONSTRAINT FK_pet_2
    FOREIGN KEY (fk_cod_especie)
    REFERENCES especie (cod);
 
ALTER TABLE pet ADD CONSTRAINT FK_pet_3
    FOREIGN KEY (fk_cod_usuario)
    REFERENCES usuario (cod);

CREATE TABLE vacina_pet (
    fk_cod_vacina int not null,
    fk_cod_pet int not null
);
 
ALTER TABLE vacina_pet ADD CONSTRAINT FK_vacina_pet_1
    FOREIGN KEY (fk_cod_vacina)
    REFERENCES vacina (cod);
 
ALTER TABLE vacina_pet ADD CONSTRAINT FK_vacina_pet_2
    FOREIGN KEY (fk_cod_pet)
    REFERENCES pet (cod);

CREATE TABLE especialidade (
    cod int auto_increment not null PRIMARY KEY,
    nome varchar(30) not null UNIQUE
);

CREATE TABLE funcionario (
    cod int auto_increment not null PRIMARY KEY,
    registro text not null,
    fk_cod_especialidade int not null,
    fk_cod_usuario int not null
);
 
ALTER TABLE funcionario ADD CONSTRAINT FK_funcionario_3
    FOREIGN KEY (fk_cod_especialidade)
    REFERENCES especialidade (cod);
 
ALTER TABLE funcionario ADD CONSTRAINT FK_funcionario_4
    FOREIGN KEY (fk_cod_usuario)
    REFERENCES usuario (cod);

CREATE TABLE procedimento (
    cod int auto_increment not null PRIMARY KEY,
    nome varchar(30) not null UNIQUE,
    foto text
);

CREATE TABLE agendamento (
    cod int auto_increment not null PRIMARY KEY,
    fk_cod_pet int not null,
    fk_cod_procedimento int not null,
    fk_cod_funcionario int not null,
    data_hora datetime not null,
    descricao text,
    data_cancelamento datetime,
    motivo_cancelamento text,
    busca_entrega boolean not null default false
);
 
ALTER TABLE agendamento ADD CONSTRAINT FK_consulta_2
    FOREIGN KEY (fk_cod_procedimento)
    REFERENCES procedimento (cod);
 
ALTER TABLE agendamento ADD CONSTRAINT FK_consulta_3
    FOREIGN KEY (fk_cod_pet)
    REFERENCES pet (cod);
 
ALTER TABLE agendamento ADD CONSTRAINT FK_consulta_4
    FOREIGN KEY (fk_cod_funcionario)
    REFERENCES funcionario (cod);