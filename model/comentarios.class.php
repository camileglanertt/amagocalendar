<?php

class Comentarios implements IBaseModelo {

    private $conn;
    private $stmt;

    private $prof;
    private $comentario;
    private $nome;

    function getProf() {
        return $this->prof;
    }

    function setProf($prof) {
        $this->prof = $prof;
    }

    function getComentario() {
        return $this->comentario;
    }

    function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    private $codigoComentario;

    function getCodigoComentario() {
        return $this->codigoComentario;
    }

    function setCodigoComentario($codigoComentario) {
        $this->codigoComentario = $codigoComentario;
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

            $this->stmt = $this->conn->prepare("INSERT INTO comentarios (nome, comentario, idPessoa) VALUES ('$this->nome', '$this->comentario', '$this->prof')");
           
            $this->stmt->execute();
            $r = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return true;
        } catch (PDOException $e) {
            
            return $this->stmt;
        }
    }

    public function alterar() {
        try {
            $this->stmt = $this->conn->prepare("DELETE FROM comentarios WHERE id = $this->codigoComentario");
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
            $this->stmt = $this->conn->prepare("SELECT comentarios.id, comentarios.comentario, comentarios.nome as comentarista FROM comentarios INNER JOIN pessoa ON comentarios.idPessoa = pessoa.id WHERE pessoa.email = '$id'");
            $this->stmt->execute();
            $r = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $r;
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
            return $this->stmt;
        }
    }
}