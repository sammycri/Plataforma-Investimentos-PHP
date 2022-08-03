<div class="login-page">
    <div class="form">        
        <?php
        if(isset($_GET['id_up']))
        {
            $id_update = addslashes($_GET['id_up']);
            $receber = $b->buscarDadosBanco($id_update);
        }
        ?>
        <form action="investimentos.php" method="POST"  class="register-form acrylic">
        </form>
        <form method="POST" class=" login-form acrylic">  
                <input type="text" name="banconome" id="banconome" placeholder="Nome do Banco/Corretora" value="<?php
            if(isset($receber))
            {
                echo $receber['nomebanco'];
            } 
            ?>">
                <input type="text" name="tipoconta" id="tipoconta" placeholder="Tipo da conta" value="<?php
            if(isset($receber))
            {
                echo $receber['tipoconta'];
            } 
            ?>">
                <input type="money_format" name="saldo" id="saldo" placeholder="Saldo da conta" value="<?php
            if(isset($receber))
            {
                echo $receber['saldo'];
            } 
            ?>">
                <button id="submit">Guardar informações</button>        
        </form>   
    </div>
    </div>

    <div class="right-login-page">
    <div class="right-form">       
        <form class="register-form acrylic">
        </form>
        <form class=" login-form acrylic">          
            <table>
                <tr id="titulo">
                    <td><p>Banco/Corretora</td>
                    <td>Tipo da conta</td>
                    <td colspan="2">Saldo</td>          
                </tr><?php
                $saldototal = 0;
                $dados = $b->buscarDados();
                $cusuario = $_SESSION['user'];
                $q = "SELECT nomebanco FROM dados_financeiro WHERE cusuario = '$cusuario' LIMIT 1";
                $busca = $banco->query($q);
                if(count($dados) > 0)
                {
                    for ($i=0; $i < count($dados); $i++)
                    {
                        echo "<tr>";
                        foreach($dados[$i] as $key => $value)
                        {                    
                            
                            if($key != "id" && $key != "cusuario")
                            {
                                if($key === "saldo")
                                {
                                    echo "<td> R$ ". $value . "</td>";
                                    $saldototal = $saldototal + $value;
                                }
                                else
                                {
                                    echo "<td>". $value . "</td>";
                                }
                            }                    
                        }
                    ?>
                    <td><a class="branco" href="investimentos.php?id_up=<?php echo $dados[$i]['id'];?>">Editar </a> <a class="branco" href="investimentos.php?id=<?php echo $dados[$i]['id'];?>"> Excluir</a></td>
                    <?php
                    echo "</tr>";
                }
            
                }
                else
                {
                    echo "Ainda não há bancos cadastrados!";
                }
                
                ?>                     
            </table>
        </form>
        
        <td> Saldo em contas total: <strong><?php echo "R$ ". $saldototal; ?></strong> </>
    </div>
    </div>