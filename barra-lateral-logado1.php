<?php //topo da pagina index antes e depois do login
    if(empty($_SESSION['user']))
    {
        echo  "<li>
        <a href='investimentos.php'>
          <i class='material-symbols-outlined'>
          login</i>
          <a href= 'user-login.php'> Fazer login</a>";
    }
    else
    {         
        echo "<li>
        <a href='user-edit.php'>
        <i class='material-symbols-outlined'>
        app_registration
        </i> Seus dados
        </a>
        </li>";

       echo"<li>
        <a href='investimentos.php'>
        <i class='material-symbols-outlined'>
        savings
        </i> Gerencie suas finanças
        </a>
      </li>";        
    }