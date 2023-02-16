<?php

/**
 * [Description agendamentoModel]
 * Classe para interagir com a tabela de agendamento
 */
class agendamentoModel
{
    // Atributos
    private $cod; // int(11) AI PK 
    private $fk_cod_pet; // int(11) 
    private $fk_cod_procedimento; // int(11) 
    private $fk_cod_funcionario; // int(11) 
    private $data_hora; // datetime 
    private $descricao; // text 
    private $data_cancelamento; // datetime 
    private $motivo_cancelamento; // text 
    private $busca_entrega; // tinyint(1)

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
     * Get the value of fk_cod_procedimento
     */
    public function getFk_cod_procedimento()
    {
        return $this->fk_cod_procedimento;
    }

    /**
     * Set the value of fk_cod_procedimento
     *
     * @return  self
     */
    public function setFk_cod_procedimento($fk_cod_procedimento)
    {
        $this->fk_cod_procedimento = $fk_cod_procedimento;

        return $this;
    }

    /**
     * Get the value of fk_cod_funcionario
     */
    public function getFk_cod_funcionario()
    {
        return $this->fk_cod_funcionario;
    }

    /**
     * Set the value of fk_cod_funcionario
     *
     * @return  self
     */
    public function setFk_cod_funcionario($fk_cod_funcionario)
    {
        $this->fk_cod_funcionario = $fk_cod_funcionario;

        return $this;
    }

    /**
     * Get the value of data_hora
     */
    public function getData_hora()
    {
        return $this->data_hora;
    }

    /**
     * Set the value of data_hora
     *
     * @return  self
     */
    public function setData_hora($data_hora)
    {
        $this->data_hora = $data_hora;

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
     * Get the value of data_cancelamento
     */
    public function getData_cancelamento()
    {
        return $this->data_cancelamento;
    }

    /**
     * Set the value of data_cancelamento
     *
     * @return  self
     */
    public function setData_cancelamento($data_cancelamento)
    {
        $this->data_cancelamento = $data_cancelamento;

        return $this;
    }

    /**
     * Get the value of motivo_cancelamento
     */
    public function getMotivo_cancelamento()
    {
        return $this->motivo_cancelamento;
    }

    /**
     * Set the value of motivo_cancelamento
     *
     * @return  self
     */
    public function setMotivo_cancelamento($motivo_cancelamento)
    {
        $this->motivo_cancelamento = $motivo_cancelamento;

        return $this;
    }

    /**
     * Get the value of busca_entrega
     */
    public function getBusca_entrega()
    {
        return $this->busca_entrega;
    }

    /**
     * Set the value of busca_entrega
     *
     * @return  self
     */
    public function setBusca_entrega($busca_entrega)
    {
        $this->busca_entrega = $busca_entrega;

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
        global $pdo;

        try {
            $statement = $pdo->prepare(
                "INSERT INTO agendamento (
                    fk_cod_pet,
                    fk_cod_procedimento,
                    fk_cod_funcionario,
                    data_hora,
                    descricao,
                    data_cancelamento,
                    motivo_cancelamento,
                    busca_entrega
                ) VALUES (
                    :fk_cod_pet,
                    :fk_cod_procedimento,
                    :fk_cod_funcionario,
                    :data_hora,
                    :descricao,
                    :data_cancelamento,
                    :motivo_cancelamento,
                    :busca_entrega
                )"
            );

            $statement->bindParam(':fk_cod_pet', $this->fk_cod_pet, PDO::PARAM_INT);
            $statement->bindParam(':fk_cod_procedimento', $this->fk_cod_procedimento, PDO::PARAM_INT);
            $statement->bindParam(':fk_cod_funcionario', $this->fk_cod_funcionario, PDO::PARAM_INT);
            $statement->bindParam(':data_hora', $this->data_hora, PDO::PARAM_STR);

            $this->descricao == null ? $statement->bindParam(':descricao', $this->descricao, PDO::PARAM_NULL) : $statement->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
            $this->data_cancelamento == null ? $statement->bindParam(':data_cancelamento', $this->data_cancelamento, PDO::PARAM_NULL) : $statement->bindParam(':data_cancelamento', $this->data_cancelamento, PDO::PARAM_STR);
            $this->motivo_cancelamento == null ? $statement->bindParam(':motivo_cancelamento', $this->motivo_cancelamento, PDO::PARAM_NULL) : $statement->bindParam(':motivo_cancelamento', $this->motivo_cancelamento, PDO::PARAM_STR);

            $statement->bindParam(':busca_entrega', $this->busca_entrega, PDO::PARAM_BOOL);

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
                "UPDATE agendamento SET
                    fk_cod_pet = :fk_cod_pet,
                    fk_cod_procedimento = :fk_cod_procedimento,
                    fk_cod_funcionario = :fk_cod_funcionario,
                    data_hora = :data_hora,
                    descricao = :descricao,
                    data_cancelamento = :data_cancelamento,
                    motivo_cancelamento = :motivo_cancelamento,
                    busca_entrega = :busca_entrega
                WHERE cod = :cod"
            );

            $statement->bindParam(':fk_cod_pet', $this->fk_cod_pet, PDO::PARAM_INT);
            $statement->bindParam(':fk_cod_procedimento', $this->fk_cod_procedimento, PDO::PARAM_INT);
            $statement->bindParam(':fk_cod_funcionario', $this->fk_cod_funcionario, PDO::PARAM_INT);
            $statement->bindParam(':data_hora', $this->data_hora, PDO::PARAM_STR);

            
            $this->descricao == null ? $statement->bindParam(':descricao', $this->descricao. PDO::PARAM_NULL) : $statement->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
            $this->data_cancelamento == null ? $statement->bindParam(':data_cancelamento', $this->data_cancelamento. PDO::PARAM_NULL) : $statement->bindParam(':data_cancelamento', $this->data_cancelamento, PDO::PARAM_STR);
            $this->motivo_cancelamento == null ? $statement->bindParam(':motivo_cancelamento', $this->motivo_cancelamento. PDO::PARAM_NULL) : $statement->bindParam(':motivo_cancelamento', $this->motivo_cancelamento, PDO::PARAM_STR);
            
            $statement->bindParam(':busca_entrega', $this->busca_entrega, PDO::PARAM_BOOL);

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
                "DELETE FROM agendamento WHERE cod = :cod"
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
                "SELECT * FROM agendamento WHERE cod = :cod"
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
                "SELECT * FROM agendamento ORDER BY nome"
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
                "SELECT * FROM agendamento WHERE " . $where
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
        if ($this->fk_cod_pet == '') {
            $arrErro[] = 'fk_cod_pet';
        }
        if ($this->fk_cod_procedimento == '') {
            $arrErro[] = 'fk_cod_procedimento';
        }
        if ($this->fk_cod_funcionario == '') {
            $arrErro[] = 'fk_cod_funcionario';
        }
        if ($this->data_hora == '') {
            $arrErro[] = 'data_hora';
        }

        if ($this->descricao == '') $this->descricao = null;
        if ($this->data_cancelamento == '') $this->data_cancelamento = null;
        if ($this->motivo_cancelamento == '') $this->motivo_cancelamento = null;
        if ($this->busca_entrega == '') $this->busca_entrega = false;

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
        $this->fk_cod_pet = $dados['fk_cod_pet'];
        $this->fk_cod_procedimento = $dados['fk_cod_procedimento'];
        $this->fk_cod_funcionario = $dados['fk_cod_funcionario'];
        $this->data_hora = $dados['data_hora'];
        $this->descricao = $dados['descricao'];
        $this->data_cancelamento = $dados['data_cancelamento'];
        $this->motivo_cancelamento = $dados['motivo_cancelamento'];
        $this->busca_entrega = $dados['busca_entrega'];
    }
}
