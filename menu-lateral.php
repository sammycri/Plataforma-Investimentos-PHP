<?php
echo "
    <style>
    .material-symbols-outlined {
      font-variation-settings:
      'FILL' 0,
      'wght' 400,
      'GRAD' 0,
      'opsz' 48
    }
    </style>

<div class='menu-navegacao'>
  <div class='logo'>"; 
  include_once "barra-lateral-logado2.php";
  echo "</div>
    <div class='menu-lateral'>
  
            <ul id='menu-content' class='menu-content collapse out'>
                <li>
                  <a href='index.php'>
                  <i class='material-symbols-outlined'>home
                  </i>
                  Página Inicial
                  </a>
                </li>";
                   include_once "barra-lateral-logado1.php";
                   echo "
                </li>
            </ul>
     </div>
     
</div> 
"; 
?>
