<?php
session_start();

if(!isset($_SESSION['user']))
{
    $_SESSION['user'] = "";
    $_SESSION['nome'] = "";
}

function cripto($senha)
{
    $character ='';
    for($pos = 0; $pos < strlen($senha); $pos++)
    {
        $letra = ord($senha[$pos]) + 1;
        $character .= chr($letra);
    }
    return $character;
}

function gerarHash($senha)
{
    $txt = cripto($senha);
    $hash = password_hash($txt, PASSWORD_DEFAULT);
    return $hash;
}

function testarHash($senha, $hash)
{
    $ok = password_verify(cripto($senha), $hash);
    return $ok;
}
function is_logado()
{
    if(empty($_SESSION['user']))
    {
        return false;
    }
    else
    {
        return true;
    }
}
