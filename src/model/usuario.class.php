<?php

/**
 * [Description usuarioModel]
 * Classe para interagir com a tabela de usuario
 */
class usuarioModel
{
    // Atributos
    private $cod; // int(11) AI PK 
    private $nome; // varchar(100) 
    private $email; // varchar(255) 
    private $senha; // varchar(100) 
    private $data_nascimento; // date 
    private $cpf; // bigint(20) 
    private $telefone; // varchar(15) 
    private $cep; // int(11) 
    private $logradouro; // varchar(50) 
    private $numero_residencia; // int(11) 
    private $complemento; // varchar(50) 
    private $bairro; // varchar(50) 
    private $fk_cod_cidade; // int(11) 
    private $perfil; // enum('a','f','c') 
    private $data_desativacao; // date 
    private $foto; // text

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
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of senha
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of data_nascimento
     */
    public function getData_nascimento()
    {
        return $this->data_nascimento;
    }

    /**
     * Set the value of data_nascimento
     *
     * @return  self
     */
    public function setData_nascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;

        return $this;
    }

    /**
     * Get the value of cpf
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @return  self
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of telefone
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     *
     * @return  self
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of cep
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     *
     * @return  self
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get the value of logradouro
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * Set the value of logradouro
     *
     * @return  self
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    /**
     * Get the value of numero_residencia
     */
    public function getNumero_residencia()
    {
        return $this->numero_residencia;
    }

    /**
     * Set the value of numero_residencia
     *
     * @return  self
     */
    public function setNumero_residencia($numero_residencia)
    {
        $this->numero_residencia = $numero_residencia;

        return $this;
    }

    /**
     * Get the value of complemento
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set the value of complemento
     *
     * @return  self
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get the value of bairro
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set the value of bairro
     *
     * @return  self
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get the value of fk_cod_cidade
     */
    public function getFk_cod_cidade()
    {
        return $this->fk_cod_cidade;
    }

    /**
     * Set the value of fk_cod_cidade
     *
     * @return  self
     */
    public function setFk_cod_cidade($fk_cod_cidade)
    {
        $this->fk_cod_cidade = $fk_cod_cidade;

        return $this;
    }

    /**
     * Get the value of perfil
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * Set the value of perfil
     *
     * @return  self
     */
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;

        return $this;
    }

    /**
     * Get the value of data_desativacao
     */
    public function getData_desativacao()
    {
        return $this->data_desativacao;
    }

    /**
     * Set the value of data_desativacao
     *
     * @return  self
     */
    public function setData_desativacao($data_desativacao)
    {
        $this->data_desativacao = $data_desativacao;

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
                "INSERT INTO usuario (
                    nome,
                    email,
                    senha,
                    data_nascimento,
                    cpf,
                    telefone,
                    cep,
                    logradouro,
                    numero_residencia,
                    complemento,
                    bairro,
                    fk_cod_cidade
                ) VALUES ( 
                    :nome,
                    :email,
                    :senha,
                    :data_nascimento,
                    :cpf,
                    :telefone,
                    :cep,
                    :logradouro,
                    :numero_residencia,
                    :complemento,
                    :bairro,
                    :fk_cod_cidade
                )"
            );

            $statement->bindParam(':nome', $this->nome, PDO::PARAM_STR);
            $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
            $statement->bindParam(':senha', $this->senha, PDO::PARAM_STR);
            $statement->bindParam(':data_nascimento', $this->data_nascimento, PDO::PARAM_STR);
            $statement->bindParam(':cpf', $this->cpf, PDO::PARAM_INT);
            $statement->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);

            $this->cep == null ? $statement->bindParam(':cep', $this->cep, PDO::PARAM_NULL) : $statement->bindParam(':cep', $this->cep, PDO::PARAM_INT);
            $this->logradouro == null ? $statement->bindParam(':logradouro', $this->logradouro, PDO::PARAM_NULL) : $statement->bindParam(':logradouro', $this->logradouro, PDO::PARAM_STR);
            $this->numero_residencia == null ? $statement->bindParam(':numero_residencia', $this->numero_residencia, PDO::PARAM_NULL) : $statement->bindParam(':numero_residencia', $this->numero_resisdencia, PDO::PARAM_INT);
            $this->complemento == null ? $statement->bindParam(':complemento', $this->complemento, PDO::PARAM_NULL) : $statement->bindParam(':complemento', $this->complemento, PDO::PARAM_STR);
            $this->bairro == null ? $statement->bindParam(':bairro', $this->bairro, PDO::PARAM_NULL) : $statement->bindParam(':bairro', $this->bairro, PDO::PARAM_STR);
            $this->fk_cod_cidade == null ? $statement->bindParam(':fk_cod_cidade', $this->fk_cod_cidade, PDO::PARAM_NULL) : $statement->bindParam(':fk_cod_cidade', $this->fk_cod_cidade, PDO::PARAM_INT);
            
            if ($statement->execute()) {
                return true;
            } else {
                return false;
            }
        } catch(PDOException $e) {
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
                "UPDATE usuario SET
                    nome = :nome,
                    email = :email,
                    data_nascimento = :data_nascimento,
                    cpf = :cpf,
                    telefone = :telefone,
                    cep = :cep,
                    logradouro = :logradouro,
                    numero_residencia = :numero_residencia,
                    complemento = :complemento,
                    bairro = :bairro,
                    fk_cod_cidade = :fk_cod_cidade,
                    foto = :foto
                WHERE
                    cod = :cod"
            );

            $statement->bindParam(':nome', $this->nome, PDO::PARAM_STR);
            $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
            $statement->bindParam(':data_nascimento', $this->data_nascimento, PDO::PARAM_STR);
            $statement->bindParam(':cpf', $this->cpf, PDO::PARAM_INT);
            $statement->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
            
            $this->cep == null ? $statement->bindParam(':cep', $this->cep, PDO::PARAM_NULL) : $statement->bindParam(':cep', $this->cep, PDO::PARAM_INT);
            $this->logradouro == null ? $statement->bindParam(':logradouro', $this->logradouro, PDO::PARAM_NULL) : $statement->bindParam(':logradouro', $this->logradouro, PDO::PARAM_STR);
            $this->numero_residencia == null ? $statement->bindParam(':numero_residencia', $this->numero_residencia, PDO::PARAM_NULL) : $statement->bindParam(':numero_residencia', $this->numero_residencia, PDO::PARAM_INT);
            $this->complemento == null ? $statement->bindParam(':complemento', $this->complemento, PDO::PARAM_NULL) : $statement->bindParam(':complemento', $this->complemento, PDO::PARAM_STR);
            $this->bairro == null ? $statement->bindParam(':bairro', $this->bairro, PDO::PARAM_NULL) : $statement->bindParam(':bairro', $this->bairro, PDO::PARAM_STR);
            $this->fk_cod_cidade == null ? $statement->bindParam(':fk_cod_cidade', $this->fk_cod_cidade, PDO::PARAM_NULL) : $statement->bindParam(':fk_cod_cidade', $this->fk_cod_cidade, PDO::PARAM_INT);
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
                "DELETE FROM usuario WHERE cod = :cod"
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
                "SELECT * FROM usuario WHERE cod = :cod"
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
                "SELECT * FROM usuario ORDER BY nome"
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
                "SELECT * FROM usuario WHERE " . $where
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
        if ($this->email == '') {
            $arrErro[] = 'email';
        }
        if ($this->senha == '') {
            $arrErro[] = 'senha';
        }
        if ($this->data_nascimento == '') {
            $arrErro[] = 'data_nascimento';
        }
        if ($this->cpf == '') {
            $arrErro[] = 'cpf';
        }
        if ($this->telefone == '') {
            $arrErro[] = 'telefone';
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $arrErro[] = 'email inválido';
        }
        if (!validaCPF($this->cpf)) {
            $arrErro[] = 'cpf inválido';
        }

        // Verificação de campos null

        if ($this->cep == '') $this->cep = null; 
        if ($this->logradouro == '') $this->logradouro = null; 
        if ($this->numero_residencia == '') $this->numero_residencia = null; 
        if ($this->complemento == '') $this->complemento = null; 
        if ($this->bairro == '') $this->bairro = null; 
        if ($this->fk_cod_cidade == '') $this->fk_cod_cidade = null; 
        if ($this->perfil == '') $this->perfil = null; 
        if ($this->data_desativacao == '') $this->data_desativacao = null; 
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
        $this->email = $dados['email'];
        $this->senha = $dados['senha'];
        $this->data_nascimento = $dados['data_nascimento'];
        $this->cpf = $dados['cpf'];
        $this->telefone = $dados['telefone'];
        $this->cep = $dados['cep'];
        $this->logradouro = $dados['logradouro'];
        $this->numero_residencia = $dados['numero_residencia'];
        $this->complemento = $dados['complemento'];
        $this->bairro = $dados['bairro'];
        $this->fk_cod_cidade = $dados['fk_cod_cidade'];
        $this->perfil = $dados['perfil'];
        $this->data_desativacao = $dados['data_desativacao'];
        $this->foto = $dados['foto'];
    }

    public function validaLogin()
    {
        global $pdo;

        try {
            $statement = $pdo->prepare(
                "SELECT COUNT(*) FROM usuario
                WHERE email = :email AND senha = :senha"
            );

            $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
            $statement->bindParam(':senha', $this->senha, PDO::PARAM_STR);

            $statement->execute();
            
            if ($statement->fetchColumn() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function searchEmail()
    {
        global $pdo;

        try {
            $statement = $pdo->prepare(
                "SELECT * FROM usuario WHERE email = :email"
            );

            $statement->bindParam(':email', $this->email, PDO::PARAM_STR);

            $statement->execute();

            return ($statement->fetchAll())[0];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function apagarFoto() {
        global $pdo;

        try {
            $statement = $pdo->prepare(
                "UPDATE usuario SET
                    foto = null
                WHERE cod = :cod"
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
}
