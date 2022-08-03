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
                if(!isset($_POST['usuario']))
                {
                    require "user-new-form.php";
                }
                else
                {
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;
                    $q = "SELECT usuario FROM usuarios where usuario = '$usuario' LIMIT 1"; //variavel que carrega o comando que será enviado ao banco de dados
                    $busca = $banco->query($q);
                    if($busca->num_rows < 1)   //checa se o login já não esta sendo usado                 
                    {
                        if ($senha1 === $senha2)
                        {
                            if(empty($usuario) || empty($nome) || empty($senha1) || empty($senha2))
                            {
                                echo msg_erro("Todos os dados são obrigatórios, tente novamente!");
                                ?>
                                <script>//redirecionamento automatico
                                    setTimeout(function() 
                                    {
                                        window.location.href = "user-new.php";
                                    }, 3000);
                                </script>                        
                                <?php
                            }
                            else
                            {
                                $senha = gerarHash($senha1); //cryptografando a senha com funcao pre definida
                                $q = "INSERT INTO usuarios (usuario, nome, senha) VALUES ('$usuario', '$nome', '$senha')";
                                if($banco->query($q))
                                {
                                    echo msg_sucesso("Usuário $nome cadastrado com sucesso!");
                                    ?>
                                    <script>//redirecionamento automatico
                                        setTimeout(function() 
                                        {
                                            window.location.href = "user-login.php";
                                        }, 2000);
                                    </script>                        
                                    <?php
                                }                            
                                else //caso aconteça algum erro não previsto
                                {
                                    echo msg_erro("Não foi possível criar o usuário $usuario. Talvez o login já esteja sendo usado.");
                                    ?>
                                    <script>//redirecionamento automatico
                                        setTimeout(function() 
                                        {
                                            window.location.href = "user-login.php";
                                        }, 3000);
                                    </script>                        
                                    <?php
                                }
                            }
                        }
                        else // caso as senhas tenham sido digitadas diferentes
                        {
                            echo msg_erro("As senhas não conferem. Tente novamente!");
                            ?>
                                <script>//redirecionamento automatico
                                    setTimeout(function() 
                                    {
                                        window.location.href = "user-new.php";
                                    }, 3000);
                                </script>                        
                            <?php
                        }
                    }
                    else //caso o usuario já esteja em uso
                    {
                        echo msg_erro("Não foi possível criar o usuário $usuario. Talvez o login já esteja sendo usado.");
                        ?>
                        <script>//redirecionamento automatico
                        setTimeout(function() 
                        {
                            window.location.href = "user-login.php";
                        }, 3000);
                        </script>                        
                        <?php
                    }
                    
                }           
            ?>

    </div>
</body>
</html>