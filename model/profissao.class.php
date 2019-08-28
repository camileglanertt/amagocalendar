<?php

class Profissao implements IBaseModelo {

    private $conn;
    private $stmt;

    private $senha;
    private $usuario;

    function getSenha() {
        return $this->senha;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
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
    
    }

    public function alterar() {
        try {
            
            $this->stmt = $this->conn->prepare("UPDATE pessoa SET senha = '$this->senha' WHERE email='$this->usuario'");
            $this->stmt->execute();
            $r = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $this->stmt;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function listarTodos($id) {
       
    }

    public function listarUnico($param, $id) {
        try {
            $this->stmt = $this->conn->prepare("SELECT profissao FROM pessoa GROUP BY profissao");
            $this->stmt->execute();
            $r = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $r;
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
            return null;
        }
    }
}