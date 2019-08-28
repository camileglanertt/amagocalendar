<?php

class Agendamento implements IBaseModelo {

    private $conn;
    private $stmt;
    private $titulo;
    private $start;
    private $end;
    private $cpf;
    private $telefone;
    private $email;
    private $profissional;
    private $code;

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getStart() {
        return $this->start;
    }

    public function setStart($start) {
        $this->start = $start;
    }

    public function getEnd() {
        return $this->end;
    }

    public function setEnd($end) {
        $this->end = $end;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getProfissional() {
        return $this->profissional;
    }

    public function setProfissional($profissional) {
        $this->profissional = $profissional;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function getCode() {
        return $this->code;
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
            $this->stmt = $this->conn->prepare("INSERT INTO calendario (profissional, start, end, title, cpfCliente, telefoneCliente, emailCliente) values (
                '$this->profissional', '$this->start', '$this->end', '$this->titulo', '$this->cpf', '$this->telefone', '$this->email'
            );");
            $this->stmt->execute();
            $r = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $r;
        } catch (PDOException $e) {
            // echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
            return null;
        }
    }

    public function alterar() {
        try {
            $this->stmt = $this->conn->prepare("DELETE FROM calendario WHERE id = '$this->code'");
            $this->stmt->execute();
            $r = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $r;
        } catch (PDOException $e) {
            // echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
            return null;
        }
    }

    public function listarTodos($id) {
        
    }

    public function listarUnico($param, $id) {
        try {
            $this->stmt = $this->conn->prepare("SELECT * FROM calendario where profissional = '$id'");
            $this->stmt->execute();
            $r = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $r;
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
            return null;
        }
    }
}