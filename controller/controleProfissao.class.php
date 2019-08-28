<?php

class ControleProfissao extends ControleBase {

    private $visao;
    private $profissao;

    public function getVisao() {
        return $this->visao;
    }

    public function setVisao($visao) {
        $this->visao = $visao;
    }

    public function __construct() {
        //Cria uma instância da classe Profissao
        $this->profissao = new Profissao();
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
        $this->profissao->setSenha((isset($this->visao["senha"]) && $this->visao["senha"] != null) ? $this->visao["senha"] : "");
        $this->profissao->setUsuario((isset($this->visao["usuario"]) && $this->visao["usuario"] != null) ? $this->visao["usuario"] : "");
    }

    protected function inserir() {

    }

    protected function alterar() {
        //utilizado em configuracoes.php para alterar a senha
        $this->preencheDados();
        return $this->profissao->alterar();
    }

    protected function listarTodos($param = null) {
        
    }

    protected function listarUnico($param, $id) {
        //utilizado em home.php para listar as profissoes dos profissionais em geral
        return $this->profissao->listarUnico($param,$id);
    }
}