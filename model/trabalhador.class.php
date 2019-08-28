<?php

class Trabalhador implements IBaseModelo {

    private $conn;
    private $stmt;

    private $itemPesquisa;
    private $tipoPesquisa;
    private $cidade;
    private $profissao;

    private $usuario;
    private $calendario;
    private $comentarios;
    private $avaliacao;

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setCalendario($calendario) {
        $this->calendario = $calendario;
    }

    function getCalendario() {
        return $this->calendario;
    }

    function setComentarios($comentarios) {
        $this->comentarios = $comentarios;
    }

    function getComentarios() {
        return $this->comentarios;
    }

    function setAvaliacao($avaliacao) {
        $this->avaliacao = $avaliacao;
    }

    function getAvaliacao() {
        return $this->avaliacao;
    }

    function getItemPesquisa() {
        return $this->itemPesquisa;
    }

    function setItemPesquisa($itemPesquisa) {
        $this->itemPesquisa = $itemPesquisa;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getProfissao() {
        return $this->profissao;
    }

    function setProfissao($profissao) {
        $this->profissao = $profissao;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function getTipoPesquisa() {
        return $this->tipoPesquisa;
    }

    function setTipoPesquisa($tipoPesquisa) {
        $this->tipoPesquisa = $tipoPesquisa;
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
            $this->stmt = $this->conn->prepare("UPDATE pessoa SET quer_calendario = '$this->calendario', quer_avaliacao = '$this->avaliacao', quer_comentario = '$this->comentarios' where email = '$this->usuario'");
            $this->stmt->execute();
            $r = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $r;
        } catch (PDOException $e) {
            // echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
            return $this->stmt;
        }
    }

    public function listarTodos($id) {
        try {
            $this->stmt = $this->conn->prepare("SELECT * FROM pessoa WHERE $this->tipoPesquisa = '$this->itemPesquisa' AND cidade = '$this->cidade' ORDER BY preco ASC");
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
            $this->stmt = $this->conn->prepare("SELECT * FROM pessoa WHERE cidade = '$this->cidade' AND profissao = '$this->profissao' ORDER BY preco ASC" );
            $this->stmt->execute();
            $r = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $r;
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
            return null;
        }
    }
}