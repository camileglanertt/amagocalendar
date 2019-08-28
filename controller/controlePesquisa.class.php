<?php

class ControlePesquisa extends ControleBase {

    private $visao;
    private $pesquisa;

    public function getVisao() {
        return $this->visao;
    }

    public function setVisao($visao) {
        $this->visao = $visao;
    }

    public function __construct() {
        //Cria uma instância da classe pesquisaEquipe
        $this->pesquisa = new Pesquisa();
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
        $this->pesquisa->setProfissao((isset($this->visao["profissao"]) && $this->visao["profissao"] != null) ? $this->visao["profissao"] : "");
        $this->pesquisa->setCidade((isset($this->visao["cidade"]) && $this->visao["cidade"] != null) ? $this->visao["cidade"] : "");
    }

    protected function inserir() {
        // Passa dados do formulário para a classe MinhaEquipe
        $this->preencheDados();
        //Chama o método para inserir os dados no banco de dados
        return $this->pesquisa->inserir();
    }

    protected function alterar() {
        
    }

    protected function listarTodos($param = null) {
        //Chama o método para listar uma pesquisa específico do banco de dados
        return $this->pesquisa->listarTodos($param);
    }

    protected function listarUnico($param, $id) {

        //Chama o método para inserir os dados no banco de dados
        return $this->pesquisa->listarUnico($param,$id);
    }
    
}