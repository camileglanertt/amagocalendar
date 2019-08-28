<?php

class Profile implements IBaseModelo {

    private $conn;
    private $stmt;
 
    private $preco;
    private $expediente;
    private $duracao_atendimento;
    private $duracao_expediente;
    private $inicio;
    private $fim;
    private $usuario;

    function getPreco() {
        return $this->preco;
    }

    function getExpediente() {
        return $this->expediente;
    }

    function getDuracao_atendimento() {
        return $this->duracao_atendimento;
    }

    function getDuracao_expediente() {
        return $this->duracao_expediente;
    }

    function getInicio() {
        return $this->inicio;
    }

    function getFim() {
        return $this->fim;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setFim($fim) {
        $this->fim = $fim;
    }

    function setInicio($inicio) {
        $this->inicio = $inicio;
    }

    function setDuracao_expediente($duracao_expediente) {
        $this->duracao_expediente = $duracao_expediente;
    }

    function setDuracao_atendimento($duracao_atendimento) {
        $this->duracao_atendimento = $duracao_atendimento;
    }

    function setExpediente($expediente) {
        $this->expediente = $expediente;
    }

    function setPreco($preco) {
        $this->preco = $preco;
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
            $x = "UPDATE pessoa SET preco = '$this->preco', duracao_expediente = '$this->duracao_expediente', inicio_expediente = '$this->inicio', fim_expediente = '$this->fim', duracao_atendimento = '$this->duracao_atendimento', dias_trabalhados= '$this->expediente' WHERE email = '$this->usuario'";
            $this->stmt = $this->conn->prepare($x);
            $this->stmt->execute();
            return $this->stmt;
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
            return null;
        }  
    }

    public function listarTodos($id) {
        
    }

    public function listarUnico($param, $id) {
        try {
            $this->stmt = $this->conn->prepare("SELECT * FROM pessoa WHERE id = '$id'");
            $this->stmt->execute();
            $r = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $r;
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
            return null;
        }
    }
}