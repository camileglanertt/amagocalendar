<?php

class Avaliacao implements IBaseModelo {

    private $conn;
    private $stmt;

    private $prof;
    private $estrela;
    private $cpf;
    private $nome;

    function getProf() {
        return $this->prof;
    }

    function setProf($prof) {
        $this->prof = $prof;
    }
    
    function getCpf() {
        return $this->cpf;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function getEstrela() {
        return $this->estrela;
    }

    function setEstrela($estrela) {
        $this->estrela = $estrela;
    }
    
    public function __construct() {
        //Cria conexão com o banco
        $this->conn = Database::conectar();
    }

    public function __destruct() {
        //Fecha a conexão
        Database::desconectar();
    }

    public function inserir() {
        try {
            $this->stmt = $this->conn->prepare("INSERT INTO avaliacao (avaliacao, idPessoa) VALUES ('$this->estrela', '$this->prof')");
            
            $this->stmt->execute();
            $r = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return true;
        } catch (PDOException $e) {
            
            return $this->stmt;
        }
    }

    public function alterar() {
        try {
            $this->stmt = $this->conn->prepare("UPDATE pessoa SET senha = '$this->senha'123 WHERE cpf = '$this->cpf'");
            $this->stmt->execute();
            $r = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return true;
        } catch (PDOException $e) {
            
            return $this->stmt;
        }
    }

    public function listarTodos($id) {
        
    }

    public function listarUnico($param, $id) {
        try {
            $this->stmt = $this->conn->prepare("SELECT avaliacao FROM avaliacao INNER JOIN pessoa where  pessoa.email = '$id' AND avaliacao.idPessoa = pessoa.id");
            $this->stmt->execute();
            $r = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $r;
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
            return null;
        }
    }
}