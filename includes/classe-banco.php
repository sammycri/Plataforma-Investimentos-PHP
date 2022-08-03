<?php
Class Banco
{
    private $pdo;

    public function __construct($dbname, $host, $usuario, $senha)
    {
        try
        {
            $this->pdo = new PDO("mysql:dbname=". $dbname .";host=".$host, $usuario, $senha);
        }
        catch (PDOException $e)
        {
            echo "Erro relacionado ao banco de dados ". $e;
            exit();
        }
        catch (Exception $e)
        {
            echo "Erro genérico ". $e;
            exit();
        }
    }
    //FUNCAO PARA BUSCAR DADOS 
    public function buscarDados()
    {        
        $cusuario = $_SESSION['user'];
        $res = array();
        $cmd = $this->pdo->query("SELECT * FROM dados_financeiro WHERE cusuario = '$cusuario'");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } 
        
    public function excluirBanco($id)
    {
        $cmd = $this->pdo->prepare("DELETE FROM dados_financeiro WHERE id = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
    }

    public function buscarDadosBanco($id)
    {        
        $receber = array();
        $cmd = $this->pdo->prepare("SELECT * FROM dados_financeiro WHERE id = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        $receber = $cmd->fetch(PDO::FETCH_ASSOC);//fetch_assoc para economia de memoria
        return $receber;
    }
    
    public function atualizarDados($id_upd, $banconome, $tipoconta, $saldo)
    {        
        $cmd = $this->pdo->prepare("UPDATE dados_financeiro SET nomebanco = :nb, tipoconta = :tc, saldo = :sd WHERE id = :id");
        $cmd->bindValue(":nb", $banconome);
        $cmd->bindValue(":tc", $tipoconta);
        $cmd->bindValue(":sd", $saldo); 
        $cmd->bindValue(":id", $id_upd);
        $cmd->execute();
    }
    public function cadastrarBanco($cusuario, $banconome, $tipoconta, $saldo)
    {
        //ANTES DE CADASTRAR VERIFICAR SE USUARIO JÁ ESTA CADASTRADO
        $cmd = $this->pdo->prepare("SELECT id FROM dados_financeiro WHERE nomebanco = :n");
        $cmd->bindValue(":n", $banconome);
        $cmd->execute();
        if($cmd->rowCount() > 0) //O BANCO JA EXISTE?
        {
            return false;
        }
        else//nao esta cadastrado o banco
        {
              $cmd = $this->pdo->prepare("INSERT INTO dados_financeiro (cusuario, nomebanco, tipoconta, saldo) VALUE (:user, :n, :t, :s)");
              $cmd->bindValue(":user", $cusuario);
              $cmd->bindValue(":n", $banconome);
              $cmd->bindValue(":t", $tipoconta);
              $cmd->bindValue(":s", $saldo);
              $cmd->execute();
              return true;
        }

    }   


}



?>