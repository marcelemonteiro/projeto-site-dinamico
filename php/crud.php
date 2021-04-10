<?php
require_once('conexao.php');


/* --------------------------------
    FUNÇÕES - LISTAR 
------------------------------------*/
function listarUsuario($login, $senha)
{
    $link = getConnection();

    $query = "select * from tb_usuario where login = '{$login}' and senha = md5('{$senha}')";

    $resultado = mysqli_query($link, $query); 

    mysqli_close($link);

    return mysqli_fetch_assoc($resultado);
}

// echo listarUsuario('@fulano', '123');

function listarFilmes()
{
    $link = getConnection();

    $query = "select * from tb_filmes";

    $rs = mysqli_query($link, $query);

    $filmes = array();

    while ($row = mysqli_fetch_assoc($rs)) {
        array_push($filmes, $row);
    }

    return $filmes;
}

function listaFilmesPorId($id)
{
    $link = getConnection();

    $query = "select * from tb_filmes where id_filme = {$id}";

    $rs = mysqli_query($link, $query);

    $filmes = array();

    while ($row = mysqli_fetch_assoc($rs)) {
        array_push($filmes, $row);
    }

    return $filmes;
}

function listarComentarioPorIdFilme($id)
{
    $link = getConnection();

    $query = "select * from tb_comentario where fk_filme_id = {$id}";

    $rs = mysqli_query($link, $query);

    $comentarios = array();
    while ($row = mysqli_fetch_assoc($rs)) {
        array_push($comentarios, $row);
    }

    return $comentarios;
}

function listarComentarioPorLogin($login)
{
    $link = getConnection();

    $query = "select * from tb_comentario where fk_usuario_login = '{$login}'";

    $rs = mysqli_query($link, $query);

    $comentarios = array();
    while ($row = mysqli_fetch_assoc($rs)) {
        array_push($comentarios, $row);
    }

    return $comentarios;
}

function listarQueroVer($idUsuario)
{
    $link = getConnection();

    $query = "select fk_filme_id from tb_quero_ver where fk_usuario_id = {$idUsuario}";

    $result = mysqli_query($link, $query);

    $queroVer = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($queroVer, $row);
    }

    return $queroVer;
}


function listarJaAssisti($idUsuario)
{
    $link = getConnection();

    $query = "select fk_filme_id from tb_ja_assisti where fk_usuario_id = {$idUsuario}";

    $result = mysqli_query($link, $query);

    $jaAssisti = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($jaAssisti, $row);
    }

    return $jaAssisti;
}

function listarFilmesRecentes()
{
    $link = getConnection();

    $query = "SELECT * FROM tb_filmes order by id_filme desc LIMIT 5;";

    $rs = mysqli_query($link, $query);

    $filmes = array();

    while ($row = mysqli_fetch_assoc($rs)) {
        array_push($filmes, $row);
    }

    return $filmes;
}


/* --------------------------------
    FUNÇÕES - INSERIR 
------------------------------------*/
function inserirUsuario($nome, $email, $login, $senha) 
{
    $link = getConnection();

    $query = "insert into tb_usuario (nome, email, login, senha) values ('{$nome}', '{$email}', '{$login}', md5('{$senha}'));";

    if (!mysqli_query($link, $query)) {
        throw new \Exception("Erro ao gravar", 1);
        return false;
    }
    return true;
}


function inserirComentarioPorId($comentario, $idFilme, $loginUsuario)
{
    $link = getConnection();

    $query = "insert into tb_comentario (comentario, fk_usuario_login, fk_filme_id) VALUES ('{$comentario}', '{$loginUsuario}', {$idFilme});";

    if (!mysqli_query($link, $query)) {
        throw new \Exception("Erro ao gravar", 1);
        return false;
    }
    return true;
}


function inserirQueroVer($idFilme, $idUsuario)
{
    $link = getConnection();
    
    $query = "insert into tb_quero_ver (fk_filme_id, fk_usuario_id) values ({$idFilme}, {$idUsuario});";

    if (!mysqli_query($link, $query)) {
        throw new \Exception("Erro ao gravar", 1);
        return false;
    }
    return true;
}

function inserirJaAssisti($idFilme, $idUsuario)
{
    $link = getConnection();
    
    $query = "insert into tb_ja_assisti (fk_filme_id, fk_usuario_id) values ({$idFilme}, {$idUsuario});";

    if (!mysqli_query($link, $query)) {
        throw new \Exception("Erro ao gravar", 1);
        return false;
    }
    return true;
}

/* --------------------------------
    FUNÇÕES - Excluir 
------------------------------------*/

function excluirJaAssisti($idFilme)
{
    $link = getConnection();

    $query = "DELETE FROM tb_ja_assisti WHERE fk_filme_id = {$idFilme}";
    
    if(!mysqli_query($link, $query)) {
        throw new \Exception("Erro ao excluir registro", 1);
        return false;
    }
    return true;
}

function excluirQueroVer($idFilme)
{
    $link = getConnection();

    $query = "DELETE FROM tb_quero_ver WHERE fk_filme_id = {$idFilme}";
    
    if(!mysqli_query($link, $query)) {
        throw new \Exception("Erro ao excluir registro", 1);
        return false;
    }
    return true;
}


/* -------------------------------------
    FUNÇÃO PESQUISAR
--------------------------------------------*/

function pesquisar($filme) 
{
    $link = getConnection();

    $query = "select id_filme from tb_filmes where nome = '{$filme}'";

    $result = mysqli_query($link, $query);

    $pesquisa = array();

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($pesquisa, $row);
    }

    return $pesquisa;
}


