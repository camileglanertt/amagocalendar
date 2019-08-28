<?php

class ControleProfile extends ControleBase {

    private $profile;
    private $visao;

    public function getVisao() {
        return $this->visao;
    }

    public function setVisao($visao) {
        $this->visao = $visao;
    }

    public function __construct() {
        //Cria uma instância da classe Profile
        $this->profile = new Profile();
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

    private function preencheDados() {
        $this->profile->setUsuario((isset($this->visao["usuario"]) && $this->visao["usuario"] != null) ? $this->visao["usuario"] : "");
        $this->profile->setPreco((isset($this->visao["preco"]) && $this->visao["preco"] != null) ? $this->visao["preco"] : "");
        $this->profile->setExpediente((isset($this->visao["expediente"]) && $this->visao["expediente"] != null) ? $this->visao["expediente"] : "");
        $this->profile->setDuracao_atendimento((isset($this->visao["duracao_atendimento"]) && $this->visao["duracao_atendimento"] != null) ? $this->visao["duracao_atendimento"] : "");
        $this->profile->setDuracao_expediente((isset($this->visao["duracao_expediente"]) && $this->visao["duracao_expediente"] != null) ? $this->visao["duracao_expediente"] : "");
        $this->profile->setInicio((isset($this->visao["inicio"]) && $this->visao["inicio"] != null) ? $this->visao["inicio"] : "");
        $this->profile->setFim((isset($this->visao["fim"]) && $this->visao["fim"] != null) ? $this->visao["fim"] : "");
    }

    protected function inserir() {

    }

    protected function alterar() {
        $this->preencheDados();
        return $this->profile->alterar();
    }

    protected function listarTodos($param = null) {

    }

    protected function listarUnico($param, $id) {
        //utilizado em profile.php para listar informacoes de um profissional especifico
        return $this->profile->listarUnico($param,$id);
    }
    
}