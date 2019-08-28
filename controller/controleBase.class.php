<?php

abstract class ControleBase {

    public function controleAcao($param, $id) {
        switch ($param) {
            case "inserir":
                return $this->inserir();
             
            case "alterar":
                return $this->alterar();
            
            case "listarTodos":
                return $this->listarTodos($id);
                
            case "listarUnico":
                return $this->listarUnico($param, $id);
                
            default:
                  return "Sem função";
        }
    }

    abstract protected function inserir();

    abstract protected function alterar();

    abstract protected function listarTodos($id);

    abstract protected function listarUnico($param, $id);

}