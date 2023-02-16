<?php

/**
 * [Description funcionarioModel]
 * Classe para interagir com a tabela de funcionario
 */
class funcionarioModel
{
    // Atributos
    private $cod; // int(11) AI PK 
    private $registro; // text 
    private $fk_cod_especialidade; // int(11) 
    private $fk_cod_usuario; // int(11)

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
     * Get the value of registro
     */
    public function getRegistro()
    {
        return $this->registro;
    }

    /**
     * Set the value of registro
     *
     * @return  self
     */
    public function setRegistro($registro)
    {
        $this->registro = $registro;

        return $this;
    }

    /**
     * Get the value of fk_cod_especialidade
     */
    public function getFk_cod_especialidade()
    {
        return $this->fk_cod_especialidade;
    }

    /**
     * Set the value of fk_cod_especialidade
     *
     * @return  self
     */
    public function setFk_cod_especialidade($fk_cod_especialidade)
    {
        $this->fk_cod_especialidade = $fk_cod_especialidade;

        return $this;
    }

    /**
     * Get the value of fk_cod_usuario
     */
    public function getFk_cod_usuario()
    {
        return $this->fk_cod_usuario;
    }

    /**
     * Set the value of fk_cod_usuario
     *
     * @return  self
     */
    public function setFk_cod_usuario($fk_cod_usuario)
    {
        $this->fk_cod_usuario = $fk_cod_usuario;

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
                "INSERT INTO funcionario (
                    fk_cod_usuario,
                    registro,
                    fk_cod_especialidade
                ) VALUES (
                    :fk_cod_usuario,
                    :registro,
                    :fk_cod_especialidade
                )"
            );

            $statement->bindParam(':fk_cod_usuario', $this->fk_cod_usuario, PDO::PARAM_INT);
            $statement->bindParam(':registro', $this->registro, PDO::PARAM_STR);
            $statement->bindParam(':fk_cod_especialidade', $this->fk_cod_especialidade, PDO::PARAM_INT);

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
                "UPDATE funcionario SET
                    fk_cod_usuario = :fk_cod_usuario,
                    registro = :registro,
                    fk_cod_especialiade = :fk_cod_especialidade
                WHERE cod = :cod"
            );


            
            $statement->bindParam(':fk_cod_usuario', $this->fk_cod_usuario, PDO::PARAM_INT);
            $statement->bindParam(':registro', $this->registro, PDO::PARAM_STR);
            $statement->bindParam(':fk_cod_especialidade', $this->fk_cod_especialidade, PDO::PARAM_INT);

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
                "DELETE FROM funcionario WHERE cod = :cod"
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
                "SELECT * FROM funcionario WHERE cod = :cod"
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
                "SELECT * FROM funcionario ORDER BY registro"
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
                "SELECT * FROM funcionario WHERE " . $where
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
        if ($this->fk_cod_usuario == '') {
            $arrErro[] = 'fk_cod_usuario';
        }
        if ($this->registro == '') {
            $arrErro[] = 'registro';
        }
        if ($this->fk_cod_especialidade == '') {
            $arrErro[] = 'fk_cod_especialidade';
        }
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
        $this->registro = $dados['registro'];
        $this->fk_cod_especialidade = $dados['fk_cod_especialidade'];
        $this->fk_cod_usuario = $dados['fk_cod_usuario'];
    }
}
