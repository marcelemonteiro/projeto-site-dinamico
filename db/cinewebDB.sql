create database cinewebDB;	

drop database cinewebDB;

use cinewebDB;

 /* ----------------------
 |    Tabela de usuario   |
 ------------------------*/
create table tb_usuario(
    id_usuario int primary key auto_increment,
    nome varchar(100) not null,
    email varchar(100) not null,
    login varchar(50) not null unique,
    senha varchar(50) not null
);

 /* ----------------------
 |    Tabela de Filmes    |
 ------------------------*/
create table tb_filmes(
	id_filme int primary key auto_increment,
    nome varchar(150) not null,
    imagem varchar(255) not null,
    categoria varchar(100) not null,
    tempo_de_duracao varchar(50) not null,
    nota_imdb varchar (10) null,
    sinopse text not null,
    data_lancamento varchar(50) not null,
    trailer_src varchar(255) not null
);

/* ------------------------------------
 |    Tabela de Atividades Usuário    |
 -------------------------------------*/
create table tb_ja_assisti (
    id int primary key auto_increment,
    fk_filme_id int,
    fk_usuario_id int,
    foreign key (fk_filme_id) references tb_filmes(id_filme),
    foreign key (fk_usuario_id) references tb_usuario(id_usuario)
);


create table tb_quero_ver(
    id int primary key auto_increment,
    fk_filme_id int,
    fk_usuario_id int,
    foreign key (fk_filme_id) references tb_filmes(id_filme),
    foreign key (fk_usuario_id) references tb_usuario(id_usuario)
);

 /* ----------------------
 |  Tabela de comentário  |
 ------------------------*/
create table tb_comentario(
	id_comentario int primary key auto_increment,
    comentario text null,
    data_comentario TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    fk_usuario_login varchar(100) not null,
    fk_filme_id int not null,
    foreign key (fk_usuario_login) references tb_usuario(login),
    foreign key (fk_filme_id) references tb_filmes(id_filme)
);
    
 /* ----------------------
 |    Insert tb_usuario   | 
 ------------------------*/
INSERT INTO tb_usuario (nome, email, login, senha) VALUES
    ('Pedro', 'pedrinho@gmail.com', 'pedrinhoMatador', md5('abc123'));   
    
INSERT INTO tb_usuario (nome, email, login, senha) VALUES
	('Fulano', 'fulano@gmail.com','@fulano', md5('123'));
  

 /* ----------------------
 |  Insert tb_comentario  | 
 ------------------------*/
INSERT INTO tb_comentario (comentario, fk_usuario_login, fk_filme_id) VALUES ('Hello world', 'pedrinhoMatador', 1);
insert into tb_comentario (comentario, fk_usuario_login, fk_filme_id) VALUES ('Adorei!', '@fulano', 2);


SELECT * FROM tb_usuario;
SELECT * FROM tb_filmes;
SELECT * FROM tb_comentario;






    