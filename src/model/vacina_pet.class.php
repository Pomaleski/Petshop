<?php

/**
 * [Description vacina_petModel]
 * Classe para interagir com a tabela de vacina_pet
 */
class vacina_petModel {
    // Atributos
    private $cod; // int(11) PK 
    private $fk_cod_pet; // int(11) 
    private $fk_cod_vacina; // int(11) 
    private $data_vacina; // date

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

    /**
     * Get the value of fk_cod_pet
     */ 
    public function getFk_cod_pet()
    {
        return $this->fk_cod_pet;
    }

    /**
     * Set the value of fk_cod_pet
     *
     * @return  self
     */ 
    public function setFk_cod_pet($fk_cod_pet)
    {
        $this->fk_cod_pet = $fk_cod_pet;

        return $this;
    }

    /**
     * Get the value of fk_cod_vacina
     */ 
    public function getFk_cod_vacina()
    {
        return $this->fk_cod_vacina;
    }

    /**
     * Set the value of fk_cod_vacina
     *
     * @return  self
     */ 
    public function setFk_cod_vacina($fk_cod_vacina)
    {
        $this->fk_cod_vacina = $fk_cod_vacina;

        return $this;
    }

    /**
     * Get the value of data_vacina
     */ 
    public function getData_vacina()
    {
        return $this->data_vacina;
    }

    /**
     * Set the value of data_vacina
     *
     * @return  self
     */ 
    public function setData_vacina($data_vacina)
    {
        $this->data_vacina = $data_vacina;

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
        $this->fk_cod_pet = $dados['fk_cod_pet'];
        $this->fk_cod_vacina = $dados['fk_cod_vacina'];
        $this->data_vacina = $dados['data_vacina'];
    }
}