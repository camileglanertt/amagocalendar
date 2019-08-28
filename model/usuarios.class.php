<?php

class Usuarios implements IBaseModelo {

    private $conn;
    private $stmt;
    private $usuario;
    private $senha;
    private $razao;
    private $cnpj;
    private $cpf;
    private $cep;
    private $estado;
    private $cidade;
    private $endereco;
    private $telefone;
    private $profissao;
    private $avaliacao;
    private $calendario;
    private $comentario;
    private $nome;
    private $preco;
    private $site;
    private $biografia;
    private $expediente;
    private $duracao_atendimento;
    private $duracao_expediente;
    private $inicio;
    private $fim;

    function getUsuario() {
        return $this->usuario;
    }

    function getSenha() {
        return $this->senha;
    }

    function getRazao() {
        return $this->razao;
    }

    function getCnpj() {
        return $this->cnpj;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getCep() {
        return $this->cep;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getProfissao() {
        return $this->profissao;
    }

    function getAvaliacao() {
        return $this->avaliacao;
    }

    function getCalendario() {
        return $this->calendario;
    }

    function getComentario() {
        return $this->comentario;
    }

    function getNome() {
        return $this->nome;
    }

    function getPreco() {
        return $this->preco;
    }

    function getSite() {
        return $this->site;
    }

    function getBiografia() {
        return $this->biografia;
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

    function setBiografia($biografia) {
        $this->biografia = $biografia;
    }

    function setSite($site) {
        $this->site = $site;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setRazao($razao) {
        $this->razao = $razao;
    }

    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setProfissao($profissao) {
        $this->profissao = $profissao;
    }

    function setAvaliacao($avaliacao) {
        $this->avaliacao = $avaliacao;
    }

    function setCalendario($calendario) {
        $this->calendario = $calendario;
    }

    function setComentario($comentario) {
        $this->comentario = $comentario;
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
            $this->stmt = $this->conn->prepare("INSERT INTO pessoa (email, senha, cep, estado, cidade, endereco, telefone, profissao, quer_calendario,  quer_avaliacao, quer_comentario, cpf, cnpj, razaosocial, nome, preco, dias_trabalhados, duracao_atendimento, biografia, site, duracao_expediente, inicio_expediente, fim_expediente)
            VALUES ('$this->usuario', '$this->senha', '$this->cep',  '$this->estado', '$this->cidade', '$this->endereco', '$this->telefone', '$this->profissao', '$this->calendario', '$this->avaliacao', '$this->comentario',  '$this->cpf', '$this->cnpj', '$this->razao', '$this->nome', '$this->preco',  '$this->expediente', '$this->duracao_atendimento', '$this->biografia', '$this->site', '$this->duracao_expediente', '$this->inicio', '$this->fim');");
            $this->stmt->execute();
            return $this->stmt;
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
            return $this->stmt;
        }
    }

    public function alterar() {
        try {
            $x = "UPDATE pessoa SET biografia = '$this->biografia', site = '$this->site', cep = '$this->cep', estado = '$this->estado', cidade = '$this->cidade', endereco = '$this->endereco', telefone = '$this->telefone', profissao = '$this->profissao', razaosocial = '$this->razao', nome = '$this->nome', preco = '$this->preco' WHERE ";
            if ($this->cpf){
                $x .= "cpf = '$this->cpf'";
            }else if ($this->cnpj){
                $x .= "cnpj = '$this->cnpj'";
            }
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
            $this->stmt = $this->conn->prepare("SELECT * FROM pessoa WHERE email =  '$this->usuario' AND senha = '$this->senha'");
            $this->stmt->execute();
            $r = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $r;
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
            return null;
        }
    }
}