<?php

class ControleAvaliacao extends ControleBase {

    private $visao;
    private $avaliacao;

    public function getVisao() {
        return $this->visao;
    }

    public function setVisao($visao) {
        $this->visao = $visao;
    }

    public function __construct() {
        //Cria uma instância da classe Avaliacao
        $this->avaliacao = new Avaliacao();
    }

    public function controleAcao($acao, $param = null) {
        switch ($acao) {
             //Permite adição de ações que não estão no ControleBase
            default:
                //Senão, utiliza os que estão no ControleBase
                return parent::controleAcao($acao, $param);
                break;
        }
    }

    private function preencheInforma() {
        $this->avaliacao->setProf((isset($this->visao["prof"]) && $this->visao["prof"] != null) ? $this->visao["prof"] : "");
        $this->avaliacao->setEstrela((isset($this->visao["estrela"]) && $this->visao["estrela"] != null) ? $this->visao["estrela"] : "");
    }
    private function preencheDados() {
        $this->avaliacao->setCpf((isset($this->visao["cpf"]) && $this->visao["cpf"] != null) ? $this->visao["cpf"] : "");
        $this->avaliacao->setNome((isset($this->visao["nome"]) && $this->visao["nome"] != null) ? $this->visao["nome"] : "");
    }

    protected function inserir() {
        //em profile.php para inserir nova estrela
        $this->preencheInforma();
        return $this->avaliacao->inserir();
    }

    protected function alterar() {
        $this-> preencheDados();
        return $this->avaliacao->alterar();
        
    }

    protected function listarTodos($param = null) {

    }

    protected function listarUnico($param, $id) {
        //utilizado em home.php para listar as avaliacaos dos profissionais em geral
        return $this->avaliacao->listarUnico($param, $id);
    }
    
}