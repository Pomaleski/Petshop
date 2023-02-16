<?php

/**
 * [Description petModel]
 * Classe para intaragir com a tabela de pet
 */
class petModel
{
    // Atributos
    private $cod; // int(11) AI PK 
    private $nome; // varchar(100) 
    private $fk_cod_especie; // int(11) 
    private $genero; // enum('m','f') 
    private $raca; // varchar(30) 
    private $alergia; // text 
    private $descricao; // text 
    private $foto; // text 
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
     * Get the value of fk_cod_especie
     */
    public function getFk_cod_especie()
    {
        return $this->fk_cod_especie;
    }

    /**
     * Set the value of fk_cod_especie
     *
     * @return  self
     */
    public function setFk_cod_especie($fk_cod_especie)
    {
        $this->fk_cod_especie = $fk_cod_especie;

        return $this;
    }

    /**
     * Get the value of genero
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     *
     * @return  self
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of raca
     */
    public function getRaca()
    {
        return $this->raca;
    }

    /**
     * Set the value of raca
     *
     * @return  self
     */
    public function setRaca($raca)
    {
        $this->raca = $raca;

        return $this;
    }

    /**
     * Get the value of alergia
     */
    public function getAlergia()
    {
        return $this->alergia;
    }

    /**
     * Set the value of alergia
     *
     * @return  self
     */
    public function setAlergia($alergia)
    {
        $this->alergia = $alergia;

        return $this;
    }

    /**
     * Get the value of descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

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
    public function setFoto($foto)
    {
        $this->foto = $foto;

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
                "INSERT INTO pet (
                    nome,
                    fk_cod_especie,
                    genero,
                    fk_cod_usuario,
                    raca,
                    alergia,
                    descricao,
                    foto
                ) VALUES (
                    :nome,
                    :fk_cod_especie,
                    :genero,
                    :fk_cod_usuario,
                    :raca,
                    :alergia,
                    :descricao,
                    :foto
                )"
            );

            $statement->bindParam(':nome', $this->nome, PDO::PARAM_STR);
            $statement->bindParam(':fk_cod_especie', $this->fk_cod_especie, PDO::PARAM_INT);
            $statement->bindParam(':genero', $this->genero, PDO::PARAM_STR);
            $statement->bindParam(':fk_cod_usuario', $this->fk_cod_especie, PDO::PARAM_INT);

            $this->raca == null ? $statement->bindParam(':raca', $this->raca, PDO::PARAM_NULL) : $statement->bindParam(':raca', $this->raca, PDO::PARAM_STR);
            $this->alergia == null ? $statement->bindParam(':alergia', $this->alergia, PDO::PARAM_NULL) : $statement->bindParam(':alergia', $this->alergia, PDO::PARAM_STR);
            $this->descricao == null ? $statement->bindParam(':descricao', $this->descricao, PDO::PARAM_NULL) : $statement->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
            $this->foto == null ? $statement->bindParam(':foto', $this->foto, PDO::PARAM_NULL) : $statement->bindParam(':foto', $this->foto, PDO::PARAM_STR);

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
                "UPDATE pet SET
                    nome = :nome,
                    fk_cod_especie = :fk_cod_especie,
                    genero = :genero,
                    fk_cod_usuario = :fk_cod_usuario,
                    raca = :raca,
                    alergia = :alergia,
                    descricao = :descricao,
                    foto = :foto
                WHERE
                    cod = :cod"
            );

            $statement->bindParam(':nome', $this->nome, PDO::PARAM_STR);
            $statement->bindParam(':fk_cod_especie', $this->fk_cod_especie, PDO::PARAM_INT);
            $statement->bindParam(':genero', $this->genero, PDO::PARAM_STR);
            $statement->bindParam(':fk_cod_usuario', $this->fk_cod_especie, PDO::PARAM_INT);

            $this->raca == null ? $statement->bindParam(':raca', $this->raca, PDO::PARAM_NULL) : $statement->bindParam(':raca', $this->raca, PDO::PARAM_STR);
            $this->alergia == null ? $statement->bindParam(':alergia', $this->alergia, PDO::PARAM_NULL) : $statement->bindParam(':alergia', $this->alergia, PDO::PARAM_STR);
            $this->descricao == null ? $statement->bindParam(':descricao', $this->descricao, PDO::PARAM_NULL) : $statement->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
            $this->foto == null ? $statement->bindParam(':foto', $this->foto, PDO::PARAM_NULL) : $statement->bindParam(':foto', $this->foto, PDO::PARAM_STR);

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
                "DELETE FROM pet WHERE cod = :cod"
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
                "SELECT * FROM pet WHERE cod = :cod"
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
                "SELECT * FROM pet ORDER BY nome"
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
                "SELECT * FROM pet WHERE " . $where
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
        if ($this->fk_cod_especie == '') {
            $arrErro[] = 'fk_cod_especie';
        }
        if ($this->genero == '') {
            $arrErro[] = 'genero';
        }
        if ($this->fk_cod_usuario == '') {
            $arrErro[] = 'fk_cod_usuario';
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
        $this->nome = $dados['nome'];
        $this->fk_cod_especie = $dados['fk_cod_especie'];
        $this->genero = $dados['genero'];
        $this->raca = $dados['raca'];
        $this->alergia = $dados['alergia'];
        $this->descricao = $dados['descricao'];
        $this->foto = $dados['foto'];
        $this->fk_cod_usuario = $dados['fk_cod_usuario'];
    }
}
