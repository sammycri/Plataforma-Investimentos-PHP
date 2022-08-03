<!DOCTYPE html>
<?php
require_once "includes/banco.php";
require_once "includes/login.php";
require_once "includes/funcoes.php";
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/estilo.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <title>Deslogando</title>
        <style>
        div#corpo
        {
            width: 1275px;
            height: 100%;
            margin: auto;
            padding: 20px;           
        }

    </style>
    </head>
    <body class='corpo'>
        <?php include_once "menu-lateral.php"; ?>
        <div id="corpo" width="100%">
        <?php
            echo msg_aviso('Você foi deslogado');            
            if(isset($_SESSION['user']))
            {
                $_SESSION['user'] = "";
                $_SESSION['nome'] = "";
            }
        ?>
        <script>//redirecionamento automatico para pagina inicial
            setTimeout(function() {
                window.location.href = "index.php";
            }, 1000);
        </script>            
        </div>        
    </body>
</html>