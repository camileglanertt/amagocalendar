<?php

class ControleComentarios extends ControleBase {

    private $visao;
    private $comentarios;

    public function getVisao() {
        return $this->visao;
    }

    public function setVisao($visao) {
        $this->visao = $visao;
    }

    public function __construct() {
        //Cria uma instância da classe Comentarios
        $this->comentarios = new Comentarios();
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
        $this->comentarios->setCodigoComentario((isset($this->visao["codigoComentario"]) && $this->visao["codigoComentario"] != null) ? $this->visao["codigoComentario"] : "");
    }

    private function preencheInforma() {
        $this->comentarios->setProf((isset($this->visao["prof"]) && $this->visao["prof"] != null) ? $this->visao["prof"] : "");
        $this->comentarios->setComentario((isset($this->visao["comentario"]) && $this->visao["comentario"] != null) ? $this->visao["comentario"] : "");
        $this->comentarios->setNome((isset($this->visao["nome"]) && $this->visao["nome"] != null) ? $this->visao["nome"] : "");
    }

    protected function inserir() {
        //em profile.php para inserir novo comentario
        $this->preencheInforma();
        return $this->comentarios->inserir();
    }

    protected function alterar() {
        //utilizado em verInteracoes para excluir comentario
        $this->preencheDados();
        return $this->comentarios->alterar();
    }

    protected function listarTodos($param = null) {

    }

    protected function listarUnico($param, $id) {
        //utilizado em verInterações para listar os comentarios
        return $this->comentarios->listarUnico($param, $id);
    }
    
}