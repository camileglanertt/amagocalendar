<?php

class ControleUsuarios extends ControleBase {

    private $visao;
    private $usuario;

    public function getVisao() {
        return $this->visao;
    }

    public function setVisao($visao) {
        $this->visao = $visao;
    }

    public function __construct() {
        //Cria uma instância da classe usuarioEquipe
        $this->usuario = new Usuarios();
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

    private function preencheModelo(){
        $this->usuario->setUsuario((isset($this->visao["usuario"]) && $this->visao["usuario"] != null) ? $this->visao["usuario"] : "");
        $this->usuario->setSenha((isset($this->visao["senha"]) && $this->visao["senha"] != null) ? $this->visao["senha"] : "");
    }



    private function preencheDados() {
        // Passa dados do formulário para a classe MinhaEquipe
        $this->usuario->setRazao((isset($this->visao["razaoSocial"]) && $this->visao["razaoSocial"] != null) ? $this->visao["razaoSocial"] : "");
        $this->usuario->setNome((isset($this->visao["nome"]) && $this->visao["nome"] != null) ? $this->visao["nome"] : "");
        $this->usuario->setCnpj((isset($this->visao["cnpj"]) && $this->visao["cnpj"] != null) ? $this->visao["cnpj"] : "");
        $this->usuario->setCpf((isset($this->visao["cpf"]) && $this->visao["cpf"] != null) ? $this->visao["cpf"] : "");
        $this->usuario->setUsuario((isset($this->visao["usuario"]) && $this->visao["usuario"] != null) ? $this->visao["usuario"] : "");
        $this->usuario->setSenha((isset($this->visao["senha"]) && $this->visao["senha"] != null) ? $this->visao["senha"] : "");
        $this->usuario->setCep((isset($this->visao["cep"]) && $this->visao["cep"] != null) ? $this->visao["cep"] : "");
        $this->usuario->setEstado((isset($this->visao["estado"]) && $this->visao["estado"] != null) ? $this->visao["estado"] : "");
        $this->usuario->setCidade((isset($this->visao["cidade"]) && $this->visao["cidade"] != null) ? $this->visao["cidade"] : "");
        $this->usuario->setEndereco((isset($this->visao["endereco"]) && $this->visao["endereco"] != null) ? $this->visao["endereco"] : "");
        $this->usuario->setTelefone((isset($this->visao["telefone"]) && $this->visao["telefone"] != null) ? $this->visao["telefone"] : "");
        $this->usuario->setProfissao((isset($this->visao["profissao"]) && $this->visao["profissao"] != null) ? $this->visao["profissao"] : "");
        $this->usuario->setAvaliacao((isset($this->visao["quer_avaliacao"]) && $this->visao["quer_avaliacao"] != null) ? $this->visao["quer_avaliacao"] : "");
        $this->usuario->setCalendario((isset($this->visao["quer_calendario"]) && $this->visao["quer_calendario"] != null) ? $this->visao["quer_calendario"] : "");
        $this->usuario->setComentario((isset($this->visao["quer_comentario"]) && $this->visao["quer_comentario"] != null) ? $this->visao["quer_comentario"] : "");
        $this->usuario->setPreco((isset($this->visao["preco"]) && $this->visao["preco"] != null) ? $this->visao["preco"] : "");
        $this->usuario->setSite((isset($this->visao["site"]) && $this->visao["site"] != null) ? $this->visao["site"] : "");
        $this->usuario->setExpediente((isset($this->visao["expediente"]) && $this->visao["expediente"] != null) ? $this->visao["expediente"] : "");
        $this->usuario->setDuracao_atendimento((isset($this->visao["duracao_atendimento"]) && $this->visao["duracao_atendimento"] != null) ? $this->visao["duracao_atendimento"] : "");
        $this->usuario->setDuracao_expediente((isset($this->visao["duracao_expediente"]) && $this->visao["duracao_expediente"] != null) ? $this->visao["duracao_expediente"] : "");
        $this->usuario->setBiografia((isset($this->visao["biografia"]) && $this->visao["biografia"] != null) ? $this->visao["biografia"] : "");
        $this->usuario->setInicio((isset($this->visao["inicio"]) && $this->visao["inicio"] != null) ? $this->visao["inicio"] : "");
        $this->usuario->setFim((isset($this->visao["fim"]) && $this->visao["fim"] != null) ? $this->visao["fim"] : "");
    }

    protected function inserir() {
        // utilizado em seguranca.php para inserir novo profissional 
        $this->preencheDados();
        return $this->usuario->inserir();
    }

    protected function alterar() {
        //utilizado em editarPerfil.php para alterar informacoes do usuario
        $this->preencheDados();
        return $this->usuario->alterar();
    }

    protected function listarTodos($param = null) {
        
    }

    protected function listarUnico($param, $id) {
        // utilizado em seguranca.php para session, calendario.php, configuracoes.php, user.php e em editarPerfil.php para listar informações do usuario
        $this->preencheModelo();
        return $this->usuario->listarUnico($param,$id);
    }
}