create database cinewebDB;	

-- drop database cinewebDB;

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
 |    Insert tb_filmes    | 
 ------------------------*/  
INSERT INTO tb_filmes (nome, imagem, categoria, tempo_de_duracao, nota_imdb, sinopse, data_lancamento, trailer_src) VALUES
    ('Chicago', 'chicago.png', 'Drama', '113min', '7.2', 'Velma, a sensação de um clube noturno, assassina seu marido mulherengo. Então Billy Flyn, o advogado mais esperto de Chicago, é o escolhido para defendê-la. A novata cantora Roxie também acaba na prisão por matar seu namorado, e Billy também pega seu caso, transformando tudo em um circo da mídia. Agora, elas disputam entre si pelo topo do estrelato.', '2003', '9EpaMmF9WVU');

INSERT INTO tb_filmes (nome, imagem, categoria, tempo_de_duracao, nota_imdb, sinopse, data_lancamento, trailer_src) VALUES              
	('Aves de Rapina', 'aves-de-rapina.jpg', 'Ação', '109min', '7.2', 'Em Aves de Rapina - Arlequina e sua Emancipação Fantabulosa, Arlequina (Margot Robbie), Canário Negro (Jurnee Smollett-Bell), Caçadora (Mary Elizabeth Winstead), Cassandra Cain e a policial Renée Montoya (Rosie Perez)
formam um grupo inusitado de heroínas. Quando um perigoso criminoso começa a causar destruição em Gotham, as cinco mulheres precisam se unir para defender a cidade.', '2020', 'M2LMRXkAZSY');

INSERT INTO tb_filmes (nome, imagem, categoria, tempo_de_duracao, nota_imdb, sinopse, data_lancamento, trailer_src) VALUES
	('Soul', 'soul.jpg', 'Animação', '100min', '8', 'Em Soul, duas perguntas se destacam: Você já se perguntou de onde vêm sua paixão, seus sonhos e seus interesses? O que é que faz de você... 
	Você? A Pixar Animation Studios nos leva a uma jornada pelas ruas da cidade de Nova York e aos reinos cósmicos para descobrir respostas às perguntas mais importantes da vida. 
	Dirigido por Pete Docter e produzido por Dana Murray.', '2020', 'hWBxoH4-4yw');

INSERT INTO tb_filmes (nome, imagem, categoria, tempo_de_duracao, nota_imdb, sinopse, data_lancamento, trailer_src) VALUES 
	('Dracula de Bram Stoker', 'dracula.jpg', 'Terror', '128min', '7.4', 'No século XV, um líder e guerreiro dos Cárpatos renega a Igreja quando esta se recusa a enterrar em solo sagrado a mulher que amava, pois ela se matou acreditando que ele estava morto. 
	Assim, perambula através dos séculos como um morto-vivo e, ao contratar um advogado, descobre que a noiva deste a reencarnação da sua amada. Deste modo, o deixa preso com suas noivas e vai para a Londres da Inglaterra vitoriana, no intuito de encontrar a mulher que sempre amou através dos séculos.',
	'1992', 'fgFPIh5mvNc');

INSERT INTO tb_filmes (nome, imagem, categoria, tempo_de_duracao, nota_imdb, sinopse, data_lancamento, trailer_src) VALUES
	('Bacurau', 'bacurau.jpeg', 'Drama', '130min', '8.1', 'Não recomendado para menores de 16 anos
	Pouco após a morte de dona Carmelita, aos 94 anos, os moradores de um pequeno povoado localizado no sertão brasileiro, chamado Bacurau, descobrem que a comunidade não consta mais em qualquer mapa.
	Aos poucos, percebem algo estranho na região: enquanto drones passeiam pelos céus, estrangeiros chegam à cidade pela primeira vez.
    Quando carros se tornam vítimas de tiros e cadáveres começam a aparecer, Teresa (Bárbara Colen), Domingas (Sônia Braga), Acácio (Thomas Aquino), Plínio (Wilson Rabelo), Lunga (Silvero Pereira) e outros habitantes chegam à conclusão de que estão sendo atacados.
    Falta identificar o inimigo e criar coletivamente um meio de defesa.
	', '2019', 'qlheaoLnewE');

INSERT INTO tb_filmes (nome, imagem, categoria, tempo_de_duracao, nota_imdb, sinopse, data_lancamento, trailer_src) VALUES 
	('Bruxa de Blair', 'bruxa-de-blair.jpeg', 'Terror', '84min', '6,5', 'Na tentativa de encontrar a irmã de um amigo que desapareceu misteriosamente, um grupo de universitários se aventura na floresta de Black Hills. Eles são surpreendidos por uma presença macabra e temem que a lenda da Bruxa de Blair seja mais real do que imaginavam.', '2016', 'zgPiiaLQD5Y');

INSERT INTO tb_filmes (nome, imagem, categoria, tempo_de_duracao, nota_imdb, sinopse, data_lancamento, trailer_src) VALUES 
	('Jogos Mortais: Jigsaw','jogos-mortais.jpeg','Terror', '87min', '5,8', 'Uma década após as últimas mortes, surgem evidências de que novos jogos estão sendo colocados em prática. Para a surpresa dos investigadores, as pistas levam a uma única pessoa: o próprio John Kramer (Tobin Bell), morto há anos. Resta à polícia correr contra o tempo para descobrir o que está acontecendo e salvar os novos participantes desse jogo mortal.', '2017', 'ogkm9co9IM4');

INSERT INTO tb_filmes (nome, imagem, categoria, tempo_de_duracao, nota_imdb, sinopse, data_lancamento, trailer_src) VALUES 
	('Velozes & Furiosos 7', 'velozes-e-furiosos7.jpeg', 'Ação', '131min', '7,1', 'A família de Toretto é ferozmente perseguida por um assassino que busca vingar a morte de seu irmão. Enquanto fogem alucinadamente, eles ainda precisam resgatar um gênio da computação que está na mira de terroristas, levando seus carros e suas vidas ao limite do perigo.', '2015', 'hujU0dw6Erk');

INSERT INTO tb_filmes (nome, imagem, categoria, tempo_de_duracao, nota_imdb, sinopse, data_lancamento, trailer_src) VALUES 
	('Os mercenários 3', 'os-mercenarios3.jpeg', 'Ação', '120min', '6,1', 'Barney (Sylvester Stallone) e seu time resgatam Doc, que estava preso. Depois de encontrarem com Caesar (Terry Crews), eles reencontram Conrad (Mel Gibson), co-fundador do grupo, que, com a ajuda de Trench (Arnold Schwarzenegger) ameaçam destruí-los. Barney contará com um membro da CIA (Harrison Ford) e um ex-militar da Espanha (Antonio Banderas) para completar a missão.', '2014', '2zu4AaVTyL8');

INSERT INTO tb_filmes (nome, imagem, categoria, tempo_de_duracao, nota_imdb, sinopse, data_lancamento, trailer_src) VALUES 
	('G.I. Joe: Retaliação', 'retaliacao.jpeg', 'Ação', '106min', '5,8', 'Além de lutarem contra o perigoso e conhecido inimigo Cobra, Roadblock (Dwayne Johnson) e os G.I. Joes enfrentarão o governo, que ameaça sua existência. Para isso, eles irão se aliar ao original G.I. Joe Joseph Colton (Bruce Willis), na tentativa de derrotar Cobra e seus aliados.', '2013', '7yVZEOz--x8');
    
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







    