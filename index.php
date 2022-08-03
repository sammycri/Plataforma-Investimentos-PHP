<!DOCTYPE html>
<?php
require_once "includes/banco.php";
require_once "includes/login.php";
require_once "includes/funcoes.php";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Projeto</title>
    <link rel="stylesheet" href="css/estilo.css"/>  
    <link rel="stylesheet" href="css/caixa-estilo.css"/>  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>

<body id="corpo">    
    <?php require "menu-lateral.php"; ?>
    <div class="index-page">
    <div class="index-form">
        <form class="register-form acrylic">
        </form>
        <form class=" login-form acrylic">    
        <span>Apresentação do Projeto CRUD em PHP</span> 
        <td><p>Trata-se de uma plataforma onde é possível criar uma conta pessoal com seus dados e senha, tais dados são armazenados em um banco de dados do tipo SQL (MySQL). </p></td>
        <td><p>Visando a segurança do usuário a plataforma conta com <b>"proteção dupla" de senha.</b> A senha cadastrada pelo usuário é transformada em <b>Hash</b> e logo em seguida <b>Criptografada</b> para evitar que ataques ao banco de dados cause vazamento das senhas.</p> </td> 
        <td><p>Após efetuar o seu cadastro informando "usuário", "nome" e "senha", em seguida o usuário poderá efetuar login com sua conta e começar a usuafluir das ferramentas da plataforma.</p> </td>                 
        <td><p>Umas das ferramentas é a <b>edição dos dados de cadastro</b>, na barra lateral esquerda é possível acessar a página de edição clickando em <b>"Seus Dados"</b> o usuário pode alterar seu "nome" e "senha" caso queira.</p> </td>
        <td><p>A principal ferramenta é o registro das finanças, onde o usuário pode cadastrar os <b>Bancos e Corretoras</b> que possuí investimentos ou dinheiro guardado, informando assim a quantia de dinheiro em cada qual, para que este gerencie facilmente suas finanças.</p> </td>
        <td><p>A sigla <b>CRUD </b>significa as iniciais das operações create (criação), read (leitura), update (atualização) e delete (exclusão). manipulações em tabelas.</p></td>
        <td><p><strong>O intuíto do projeto é demonstrar a qualidade de código do programador "Sammy Cristino de Oliveira" e seu conhecimento nas linguagens de programação PHP e linguagem SQL de manipulação de banco de dados!</p></td>
        <td><p>A plataforma possuí um visual simples, tendo em vista que o foco é a sua funcionalidade e não a beleza!</p></td>
        </form>
    </div>
</body>
</html>