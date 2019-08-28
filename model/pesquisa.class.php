<?php

class Pesquisa implements IBaseModelo {

    private $conn;
    private $stmt;

    private $profissao;
    private $cidade;

    function getProfissao() {
        return $this->profissao;
    }

    function setProfissao($profissao) {
        $this->profissao = $profissao;
    }

    function getCidade() {
        return $this->cidade;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
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
            $this->stmt = $this->conn->prepare("SELECT * FROM pessoa WHERE cidade = '$this->cidade' AND profissao = '$this->profissao'");
            $this->stmt->execute();
            $r = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $r;
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
            return null;
        }
    }

    public function alterar() {
        
    }

    public function listarTodos($id) {
        try {
            $this->stmt = $this->conn->prepare("SELECT cidade FROM pessoa GROUP BY cidade");
            $this->stmt->execute();
            $r = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $r;
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
            return null;
        }
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