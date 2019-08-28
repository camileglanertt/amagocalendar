<?php

class ControleAgendamentos extends ControleBase {

    private $agendamento;
    private $visao;

    public function getVisao() {
        return $this->visao;
    }

    public function setVisao($visao) {
        $this->visao = $visao;
    }

    public function __construct() {
        //Cria uma instância da classe Agendamento
        $this->agendamento = new Agendamento();
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
        $this->agendamento->setProfissional((isset($this->visao["profissional"]) && $this->visao["profissional"] != null) ? $this->visao["profissional"] : "");
        $this->agendamento->setTitulo((isset($this->visao["titulo"]) && $this->visao["titulo"] != null) ? $this->visao["titulo"] : "");
        $this->agendamento->setStart((isset($this->visao["start"]) && $this->visao["start"] != null) ? $this->visao["start"] : "");
        $this->agendamento->setEnd((isset($this->visao["end"]) && $this->visao["end"] != null) ? $this->visao["end"] : "");
        $this->agendamento->setCpf((isset($this->visao["cpf"]) && $this->visao["cpf"] != null) ? $this->visao["cpf"] : "");
        $this->agendamento->setTelefone((isset($this->visao["telefone"]) && $this->visao["telefone"] != null) ? $this->visao["telefone"] : "");
        $this->agendamento->setEmail((isset($this->visao["email"]) && $this->visao["email"] != null) ? $this->visao["email"] : "");
    }

    private function preencheDelete() {
        $this->agendamento->setCode((isset($this->visao["code"]) && $this->visao["code"] != null) ? $this->visao["code"] : "");
    }

    protected function inserir() {
        $this->preencheInforma();
        return $this->agendamento->inserir();
    }

    protected function alterar() {
        $this->preencheDelete();
        return $this->agendamento->alterar();
    }

    protected function listarTodos($param = null) {

    }

    protected function listarUnico($param, $id) {
        //utilizado em agendamento.php para listar os agendamentos do profissional em especifico
        return $this->agendamento->listarUnico($param, $id);
    }
    
}