DROP DATABASE IF EXISTS CURSO;

CREATE DATABASE CURSO

DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE CURSO;

CREATE TABLE Aluno(
	idAluno smallint primary key auto_increment,
	nomeAluno varchar(100),
	idade smallint,
	dataNascimento date,
	endereco varchar(100),
	estatus varchar(10),
	matricula varchar(11)
);

CREATE TABLE Professor(
	idProfessor smallint primary key auto_increment,
	nomeProf varchar(100),
	cpf varchar(11),
	siape varchar(10),
	idade smallint
);

CREATE TABLE Disciplina(
	idDisciplina smallint primary key auto_increment,
	disciplina varchar(80),
	ch char(3),
	semestre varchar(5),
	idProfessor smallint
);

