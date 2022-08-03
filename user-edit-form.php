<?php
    $q = "select usuario, nome, senha from usuarios where usuario='" . $_SESSION['user'] . "'";
    $busca = $banco->query($q);
    $reg = $busca->fetch_object();
?>

<div class="login-page">
<div class="form">
<form class="register-form acrylic">
    
  </form>
  <form name="edit" action="user-edit.php" method="POST" class=" login-form acrylic">    
  <span>Editar dados de usuário</span>
        <input type="text" name="usuario" id="usuario" value="<?php echo $reg->usuario ?> " readonly>
        <td><input type="text" name="nome" id="nome" value="<?php echo $reg->nome ?>">
        <input type="password" name="senha1" id="senha1" placeholder="Senha"/>
        <input type="password" name="senha2" id="senha2" placeholder="Confirme a Senha"/>
        <button type="submit">Salvar alterações</button>
        
  </form>
</div>