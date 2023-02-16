<?php

/**
 * [Description cidadeModel]
 * Classe para interagir com a tabela de cidade
 */
class cidadeModel
{
    // Atributos
    private $cod; // int(11) AI PK 
    private $nome; // varchar(50) 
    private $uf; // char(2)

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
     * Get the value of uf
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set the value of uf
     *
     * @return  self
     */
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }

    // Métodos
    /**
     * Função construtora da classe
     * @param mixed $dados
     */
    public function __construct($dados)
    {
        $this->fill($dados);
    }

    /**
     * Função para inserir dados
     * @return [type]
     */
    public function insert()
    {
    }

    /**
     * Função para atualizar dados
     * @return [type]
     */
    public function update()
    {
    }

    /**
     * Função para deletar dados
     * @return [type]
     */
    public function delete()
    {
    }

    /**
     * Função para ler dados
     * @return [type]
     */
    public function read()
    {
        global $pdo;

        $statement = $pdo->prepare("SELECT * FROM cidade WHERE cod = {$this->cod}");
        $statement->execute();

        return $statement->fetchAll();
    }

    /**
     * Função para listar dados
     * @return [type]
     */
    public function list()
    {
        global $pdo;

        $statement = $pdo->prepare("SELECT * FROM cidade ORDER BY uf");
        $statement->execute();

        return $statement->fetchAll();;
    }

    /**
     * Função para validar dados
     * @return [type]
     */
    public function validate()
    {
    }

    /**
     * Função para preencher dados
     * @param mixed $dados
     * 
     * @return [type]
     */
    public function fill($dados)
    {
        $this->cod = $dados['cod'];
        $this->nome = $dados['nome'];
        $this->uf = $dados['uf'];
    }
}
