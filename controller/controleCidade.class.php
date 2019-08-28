<?php

class ControleCidade extends ControleBase {

    private $cidade;

    public function __construct() {
        //Cria uma instância da classe Cidade
        $this->cidade = new Cidade();
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

    protected function inserir() {

    }

    protected function alterar() {
        
    }

    protected function listarTodos($param = null) {

    }

    protected function listarUnico($param, $id) {
        //utilizado em home.php para listar as cidades dos profissionais em geral
        return $this->cidade->listarUnico($param, $id);
    }
    
}