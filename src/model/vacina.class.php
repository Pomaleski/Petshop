<?php

/**
 * [Description vacinaModel]
 * Classe para interagir com a tabela de vacina
 */
class vacinaModel {
    // Atributos
    private $cod; // int(11) AI PK 
    private $nome; // varchar(30)

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of cod
     */ 
    public function getCod()
    {
        return $this->cod;
    }

    /**
     * Set the value of cod
     *
     * @return  self
     */ 
    public function setCod($cod)
    {
        $this->cod = $cod;

        return $this;
    }

    // Métoddos
    /**
     * Função construtora da classe
     * @param mixed $dados
     */
    public function __construct($dados) {
        $this->fill($dados);
    }

    /**
     * Função para inserir dados
     * @return [type]
     */
    public function insert() {

    }

    /**
     * Função para atualizar dados
     * @return [type]
     */
    public function update() {

    }

    /**
     * Função para deletar dados
     * @return [type]
     */
    public function delete() {

    }

    /**
     * Função para ler dados
     * @return [type]
     */
    public function read() {

    }

    /**
     * Função para listar dados
     * @return [type]
     */
    public function list() {

    }

    /**
     * Função para validar dados
     * @return [type]
     */
    public function validate() {

    }

    /**
     * Função para preencher dados
     * @param mixed $dados
     * 
     * @return [type]
     */
    public function fill($dados) {
        $this->cod = $dados['cod'];
        $this->nome = $dados['nome'];
    }
}