<?php //topo da pagina index antes e depois do login
    if(empty($_SESSION['user']))
    {
        echo "<a fontsize='15pt' href='https://github.com/sammycri'>github.com/sammycri<a/>";
    }
    else
    {
        echo "Olá, <strong>" . $_SESSION['nome'] . "</strong> - <a href= 'logout.php'> Sair</a>";;
    }
    