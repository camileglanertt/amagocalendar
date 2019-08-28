<?php

class ControleTrabalhador extends ControleBase {

    private $visao;
    private $trabalhador;

    public function getVisao() {
        return $this->visao;
    }

    public function setVisao($visao) {
        $this->visao = $visao;
    }

    public function __construct() {
        //Cria uma instância da classe trabalhadorEquipe
        $this->trabalhador = new Trabalhador();
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

    private function preencheQuer(){
        $this->trabalhador->setUsuario((isset($this->visao["usuario"]) && $this->visao["usuario"] != null) ? $this->visao["usuario"] : "");
        $this->trabalhador->setCalendario((isset($this->visao["calendario"]) && $this->visao["calendario"] != null) ? $this->visao["calendario"] : "");
        $this->trabalhador->setComentarios((isset($this->visao["comentarios"]) && $this->visao["comentarios"] != null) ? $this->visao["comentarios"] : "");
        $this->trabalhador->setAvaliacao((isset($this->visao["avaliacao"]) && $this->visao["avaliacao"] != null) ? $this->visao["avaliacao"] : "");
    }

    private function preencheDados() {
        $this->trabalhador->setProfissao((isset($this->visao["profissao"]) && $this->visao["profissao"] != null) ? $this->visao["profissao"] : "");
        $this->trabalhador->setCidade((isset($this->visao["cidade"]) && $this->visao["cidade"] != null) ? $this->visao["cidade"] : "");
    }

    private function preencheModelo(){
        $this->trabalhador->setItemPesquisa((isset($this->visao["itemPesquisa"]) && $this->visao["itemPesquisa"] != null) ? $this->visao["itemPesquisa"] : "");
        $this->trabalhador->setTipoPesquisa((isset($this->visao["tipoPesquisa"]) && $this->visao["tipoPesquisa"] != null) ? $this->visao["tipoPesquisa"] : "");
        $this->trabalhador->setCidade((isset($this->visao["cidade"]) && $this->visao["cidade"] != null) ? $this->visao["cidade"] : "");
    }

    protected function inserir() {
    }

    protected function alterar() {
        //utilizado em configuracoes.php para alterar os quer
        $this->preencheQuer();
        return $this->trabalhador->alterar();
    }

    protected function listarTodos($param = null) {
        // utilizado em navegar.php para listar informacoes dos profissionais de acordo com filtro, cidade e profissao
        $this->preencheModelo();
        return $this->trabalhador->listarTodos($param);
    }

    protected function listarUnico($param, $id) {
        // utilizado em navegar2.php para listar informacoes dos profissionais de acordo com cidade e profissao
        $this->preencheDados();
        return $this->trabalhador->listarUnico($param,$id);
    }
}