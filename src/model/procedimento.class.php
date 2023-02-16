<?php

/**
 * [Description procedimentoModel]
 * Classe para interagir com a tabela de procedimento
 */
class procedimentoModel
{
    // Atributos
    private $cod; // int(11) AI PK 
    private $nome; // varchar(30)
    private $foto; // text

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

    /**
     * Get the value of foto
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set the value of foto
     *
     * @return  self
     */
    public function setfoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    // Métoddos
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
        global $pdo;

        try {
            $statement = $pdo->prepare(
                "INSERT INTO procedimento (
                    nome,
                    foto
                ) VALUES (
                    :nome,
                    :foto
                )"
            );

            $statement->bindParam(':nome', $this->nome, PDO::PARAM_STR);

            $this->foto == null ? $statement->bindParam(':foto', $this->foto, PDO::PARAM_NULL) : $statement->bindParam(':foto'. $this->foto, PDO::PARAM_STR);

            if ($statement->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Função para atualizar dados
     * @return [type]
     */
    public function update()
    {
        global $pdo;

        try {
            $statement = $pdo->prepare(
                "UPDATE procedimento SET
                    nome = :nome
                WHERE cod = :cod"
            );

            $statement->bindParam(':nome', $this->nome, PDO::PARAM_STR);

            $statement->bindParam(':cod', $this->cod, PDO::PARAM_INT);

            if ($statement->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function updateFoto()
    {
        global $pdo;

        try {
            $statement = $pdo->prepare(
                "UPDATE procedimento SET
                    foto = :foto
                WHERE cod = :cod"
            );

            $statement->bindParam(':foto'. $this->foto, PDO::PARAM_STR);

            $statement->bindParam(':cod', $this->cod, PDO::PARAM_INT);

            if ($statement->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Função para deletar dados
     * @return [type]
     */
    public function delete()
    {
        global $pdo;
        
        try {
            $statement = $pdo->prepare(
                "DELETE FROM procedimento WHERE cod = :cod"
            );

            $statement->bindParam(':cod', $this->cod, PDO::PARAM_INT);

            if ($statement->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Função para ler dados
     * @return [type]
     */
    public function read()
    {
        global $pdo;
        
        try {
            $statement = $pdo->prepare(
                "SELECT * FROM procedimento WHERE cod = :cod"
            );

            $statement->bindParam(':cod', $this->cod, PDO::PARAM_INT);
            
            $statement->execute();

            return $statement->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Função para listar dados
     * @return [type]
     */
    public function list()
    {
        global $pdo;
        
        try {
            $statement = $pdo->prepare(
                "SELECT * FROM procedimento ORDER BY nome"
            );

            $statement->execute();

            return $statement->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Função para pesquisar dados
     * @param mixed $where
     * 
     * @return [type]
     */
    public function search($where)
    {
        global $pdo;

        try {
            $statement = $pdo->prepare(
                "SELECT * FROM procedimento WHERE " . $where
            );

            $statement->execute();

            return $statement->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Função para validar dados
     * @return [type]
     */
    public function validate()
    {
        $arrErro = [];
        if ($this->nome == '') {
            $arrErro[] = 'nome';
        }

        if ($this->foto == '') $this->foto = null; 

        return $arrErro;
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
        $this->foto = $dados['foto'];
    }
}
