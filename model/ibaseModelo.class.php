<?php

interface IBaseModelo {

    public function inserir();

    public function alterar();

    public function listarTodos($id);

    public function listarUnico($param, $id);
    
}