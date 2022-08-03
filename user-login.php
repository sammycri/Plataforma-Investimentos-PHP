<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Projeto</title>
    <link rel="stylesheet" href="css/estilo.css"/>    
    <link rel="stylesheet" href="css/caixa-estilo.css"/> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />  
    
</head>

<body id='corpo'>    
    <?php include_once "menu-lateral.php";
    require_once 'includes/banco.php';
    require_once 'includes/login.php';
    require_once 'includes/funcoes.php';
     ?>
    <div class='conteudo'>
    <?php
        $u = $_POST['usuario'] ?? null;
        $s = $_POST['senha'] ?? null;
        if(is_null($u) || is_null($s))
        {
            require 'user-login-form.php';
        }
        else
        {
            $q = "SELECT usuario, nome, senha FROM usuarios where usuario = '$u' LIMIT 1"; //variavel que carrega o comando que será enviado ao banco de dados
            $busca = $banco->query($q);
            if(!$busca)//test de acesso ao banco de dados
            {
                echo msg_erro("Falha ao acessar o banco de dados!");
            }
            else
            {
                if($busca->num_rows > 0)//checando informações de login
                {
                    $reg = $busca->fetch_object();
                    if(testarHash($s, $reg->senha))//testando a senha cryptografada e com hash
                    {                        
                        $_SESSION['user'] = $reg->usuario;
                        $_SESSION['nome'] = $reg->nome;
                        ?>
                        <script>//redirecionamento automatico
                            setTimeout(function() {
                                window.location.href = "index.php";
                            }, 1000);
                        </script>                        
                        <?php
                    }
                    else
                    {
                        echo msg_erro("Senha inválida, tente novamente!");
                        ?>
                        <script>//redirecionamento automatico
                            setTimeout(function() {
                                window.location.href = "user-login.php";
                            }, 2000);
                        </script>                        
                        <?php
                        
                    }
                }
                else//caso o usuario nao esteja cadastrado ainda
                {
                    echo msg_aviso("Usuário não encontrado, cadastre-se ou tente novamente!");
                    ?>
                        <script>//redirecionamento automatico
                            setTimeout(function() {
                                window.location.href = "user-login.php";
                            }, 2000);
                        </script>                        
                    <?php
                }
            }
        }


    ?>
    </div>
</body>
</html>