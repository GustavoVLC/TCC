<?php

Class Usuario
{

    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $msgErro;
        global $pdo;
        $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        try 
        {
            $pdo = new PDO("mysql:dbname=".
            $nome.";host=".$host,$usuario,$senha);
        } catch (PDOException $e){
            $msgErro = $e->getMessage();
           
        }
    }

    public function cadastrar($nome, $telefone, $email)
    {

        global $msgErro;
        global $pdo;

        //verificar se ja exixste email cadastrado
        $sql = $pdo-> prepare("SELECT id_usuario FROM  usuario WHERE email = :e");

        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount()> 0)
        {
            return false; //ja esra cadastrada
        }
        else
        {
            //caso nao, cadastrar

            $sql = $pdo->prepare("INSERT INTO usuario (nome,telefone,email) VALUES (:n, :t , :e, )" );
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
           
            $sql->execute();
            return true;//cadastrado com sucesso
        }
    }

}

   
?>