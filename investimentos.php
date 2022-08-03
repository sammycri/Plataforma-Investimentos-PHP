<!DOCTYPE html>
<?php
require_once "includes/banco.php";
require_once "includes/login.php";
require_once "includes/funcoes.php";
require_once "includes/classe-banco.php";
$b = new Banco("bd_projeto_financeiro", "localhost", "root", "");

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Projeto</title>
    <link rel="stylesheet" href="css/estilo.css"/> 
    <link rel="stylesheet" href="css/caixa-estilo.css"/>   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
    table
    {
        background-color: rgba(0, 0, 0, .2);
        width: 100%;
        margin-bottom: 10px;    
    }
    tr
    {
        line-height: 30px;
    }
    tr#titulo
    {
        font-weight: bold;
        background-color: rgba(0, 0, 0, .6);
        color: white;
    }
    td
    {
        padding: 0px 5px;
    }
    a.branco
    {
        background-color: white;
        color: black;
        padding: 5px;
        margin: 0px 5px;
        text-decoration: none;
        cursor: pointer;
    }
        </style>

</head>

<body id=corpo>    
    <?php include_once "menu-lateral.php"; 
    include_once "investimentos-form.php";
    if(!is_logado())
        {
    ?>      <script>//redirecionamento automatico
            setTimeout(function() 
            {
                window.location.href = "user-login.php";
            }, 10);</script> 
    <?php
        }
    else
    {
        if(isset($_POST['banconome']))        
        {
            if(isset($_GET['id_up']) && !empty($_GET['id_up']))
            {
                $id_upd = addslashes($_GET['id_up']);
                $banconome = addslashes($_POST['banconome']);
                $tipoconta = addslashes($_POST['tipoconta']);
                $saldo = addslashes($_POST['saldo']);
                if(!empty($banconome) && !empty($tipoconta) && !empty($saldo))
                {
                    $q = "UPDATE dados_financeiro SET nomebanco = '$banconome', tipoconta = '$tipoconta', saldo = '$saldo' WHERE id = '$id_upd'"; //atualizando/editando banco de dados
                    if($banco->query($q))
                    {
                        ?>
                        <script>
                            alert("I am an alert box!");
                        </script>  
                        <?php                                  
                    }                            
                    else //caso aconteça algum erro não previsto
                    {
                        echo msg_erro("Não foi possível salvar os dados, tente novamente.");                                    
                    }
                }
            }
            else
            {                       
                $cusuario = $_SESSION['user'];
                $banconome = $_POST['banconome'] ?? null;
                $tipoconta = $_POST['tipoconta'] ?? null;
                $saldo = $_POST['saldo'] ?? null;        
                if(empty($banconome) || empty($tipoconta) || empty($saldo))
                {
                    echo msg_erro("Todos os dados são obrigatórios, tente novamente!");                               
                }
                else
                {                        
                    if($busca->num_rows > 1)
                    {
                        echo msg_erro("Banco já cadastrado para o usuario1111111111111111111111111111");
                    }  
                    else
                    {                                     
                        $q = "INSERT INTO dados_financeiro (cusuario, nomebanco, tipoconta, saldo) VALUES ('$cusuario', '$banconome', '$tipoconta', '$saldo')"; //variavel que carrega o comando que será enviado ao banco de dados
                        if($banco->query($q))
                        {
                             ?>
                            <script>
                                alert("I am an alert box!");
                            </script>
                            <?php                                 
                        }                            
                        else //caso aconteça algum erro não previsto
                        {
                            echo msg_erro("Não foi possível salvar os dados, tente novamente.");                                    
                        }
                    }
                }
            }            
            
        }
    }

    ?>
</body>
</html>
<?php
if(isset($_GET['id']))
{
    $id_banco = addslashes($_GET['id']);
    $b->excluirBanco($id_banco);
    header("location: investimentos.php");
}
?>