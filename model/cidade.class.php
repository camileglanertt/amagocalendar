<?php

class Cidade implements IBaseModelo {

    private $conn;
    private $stmt;
    
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
        
    }

    public function listarTodos($id) {
        
    }

    public function listarUnico($param, $id) {
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
}