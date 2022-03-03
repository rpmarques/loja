<?php

class Clientes
{

    // Atributo para conexão com o banco de dados   
    private $pdo = null;
    // Atributo estático para instância da própria classe    
    private static $cliente = null;
    private function __construct($conexao)
    {
        $this->pdo = $conexao;
    }
    public static function getInstance($conexao)
    {
        if (!isset(self::$cliente)) :
            self::$cliente = new Clientes($conexao);
        endif;
        return self::$cliente;
    }

    public function criaConta($rNome, $rEmail, $rSenha)
    {
        try {
            $rSql = "INSERT INTO cliente (nome,email,senha) VALUES (:nome,:email,:senha);";
            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':nome', $rNome);
            $stm->bindValue(':senha', md5($rSenha));
            $stm->bindValue(':email', strtolower($rEmail));

            $stm->execute();
            if ($stm) {
                Logger('USUARIO:[' . $_SESSION['login'] . '] - CRIOU CONTA DE CLIENTE');
            }
            return $stm;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function pegaLogin($rEmail, $rSenha)
    {
        try {
            $rSql = "SELECT id,email,senha,nome FROM cliente WHERE email='" . strtolower(trim($rEmail)) . "' AND senha='" . md5($rSenha) . "'";
            $stm = $this->pdo->prepare($rSql);
            $stm->execute();
            $dados = $stm->fetch(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - SQL:[' . $rSql . ']');
        }
    }

    public function pegaCliente($rID)
    {
        try {
            $rSql = "SELECT * FROM cliente WHERE id='" . $rID . "'";
            $stm = $this->pdo->prepare($rSql);
            $stm->execute();
            $dados = $stm->fetch(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - SQL:[' . $rSql . ']');
        }
    }

    public function atualizaSenha($rSenha, $rId)
    {
        try {
            $sql = "UPDATE cliente SET  senha=:senha WHERE id=:id ;";

            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':senha', md5($rSenha));
            $stm->bindValue(':id', $rId);
            $stm->execute();
            if ($stm) {
                Logger('Usuario:[' . $_SESSION['login'] . '] - ALTEROU SENHA DO CLIENTE - ID:[' . $rId . ']');
            }
            return $stm;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - SQL:[' . $sql . ']');
        }
    }

    public function atualizaCliente($rNome, $rEmail, $rEndereco, $rCEP, $rBairro, $rCgc, $rNumero, $rCidade, $rUF, $rFone1, $rId)
    {
        try {
            $sql = "UPDATE cliente SET 
                        nome=:nome,
                        email=:email,
                        endereco=:endereco,
                        cep=:cep,
                        bairro=:bairro,
                        numero=:numero,
                        cidade=:cidade,
                        uf=:uf,
                        fone1=:fone1,
                        cgc=:cgc           
                    WHERE id=:id ;";

            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':nome', $rNome);
            $stm->bindValue(':email', strtolower($rEmail));
            $stm->bindValue(':endereco', $rEndereco);
            $stm->bindValue(':cep', $rCEP);
            $stm->bindValue(':bairro', $rBairro);
            $stm->bindValue(':cgc', $rCgc);
            $stm->bindValue(':numero', $rNumero);
            $stm->bindValue(':cidade', $rCidade);
            $stm->bindValue(':uf', $rUF);
            $stm->bindValue(':fone1', $rFone1);
            $stm->bindValue(':id', $rId);
            $stm->execute();
            if ($stm) {
                Logger('Usuario:[' . $_SESSION['login'] . '] - ALTEROU CLIENTE - ID:[' . $rId . ']');
            }
            return $stm;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - SQL:[' . $sql . ']');
        }
    }

    public function insert($rNome, $rCnpj, $rFone1, $rFone2, $rEmail, $rContato)
    {
        try {
            $rSql = "INSERT INTO fornecedores (nome,cnpj,fone1,fone2,email,contato ) VALUES (:nome,:cnpj,:fone1,:fone2,:email,:contato);";
            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':nome', $rNome);
            $stm->bindValue(':cnpj', $rCnpj);
            $stm->bindValue(':fone1', $rFone1);
            $stm->bindValue(':fone2', $rFone2);
            $stm->bindValue(':email', strtolower($rEmail));
            $stm->bindValue(':contato', $rContato);

            $stm->execute();
            if ($stm) {
                Logger('USUARIO:[' . $_SESSION['login'] . '] - INSERIU FORNECEDOR');
            }
            return $stm;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function delete($rId)
    {
        if (!empty($rId)) :
            try {
                $sql = "DELETE FROM fornecedores WHERE id=:id";
                $stm = $this->pdo->prepare($sql);
                $stm->bindValue(':id', $rId);
                $stm->execute();
                if ($stm) {
                    Logger('Usuario:[' . $_SESSION['login'] . '] - EXCLUIU FORNECEDOR - ID:[' . $rId . ']');
                }
                return $stm;
            } catch (PDOException $erro) {
                Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
            }
        endif;
    }

    public function update($rNome, $rCnpj, $rFone1, $rFone2, $rEmail, $rContato, $rId)
    {
        try {
            $sql = "UPDATE fornecedores SET nome=:nome,cnpj=:cnpj,fone1=:fone1,fone2=:fone2,email=:email, contato=:contato
          WHERE id=:id;";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':nome', $rNome);
            $stm->bindValue(':cnpj', $rCnpj);
            $stm->bindValue(':fone1', $rFone1);
            $stm->bindValue(':fone2', $rFone2);
            $stm->bindValue(':email', strtolower($rEmail));
            $stm->bindValue(':contato', $rContato);
            $stm->bindValue(':id', $rId);
            $stm->execute();
            if ($stm) {
                Logger('Usuario:[' . $_SESSION['login'] . '] - ALTEROU FORNECEDOR - ID:[' . $rId . ']');
            }
            return $stm;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - SQL:[' . $sql . ']');
        }
    }

    public function selectUM($rWhere)
    {
        try {
            echo $sql = "SELECT * FROM fornecedores " . $rWhere;
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $dados = $stm->fetch(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - SQL:[' . $sql . ']');
        }
    }


    public function select($rWhere = '')
    {
        try {
            $sql = "SELECT * FROM cliente " . $rWhere;
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function montaSelect($rNome = 'fornecedor_id', $rSelecionado = null)
    {
        try {
            $objFornecedores = Fornecedores::getInstance(Conexao::getInstance());
            $dados = $objFornecedores->select(" ORDER BY nome");
            $select = '';
            $select = '<select class="select2" name="' . $rNome . '" id="' . $rNome . '" data-placeholder="Selecione um fornecedor..." style="width: 100%;">'
                . '<option value="">&nbsp;</option>';
            foreach ($dados as $linhaDB) {
                if (!empty($rSelecionado) && $rSelecionado === $linhaDB->id) {
                    $sAdd = 'selected';
                } else {
                    $sAdd = '';
                }
                $select .= '<option value="' . $linhaDB->id . '"' . $sAdd . '>' . $linhaDB->id . ' - ' . $linhaDB->nome . '</option>';
            }
            $select .= '</select>';
            return $select;
        } catch (PDOException $erro) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
        }
    }

    public function contaClientes($rCondicao = '')
    {
        try {
            $rSql = "SELECT COUNT(id) AS total FROM cliente ";
            if ($rCondicao) {
                $rSql .= " WHERE $rCondicao";
            }
            $rSql = "SELECT COUNT(id) AS total FROM cliente " . $rCondicao;
            $stm = $this->pdo->prepare($rSql);
            $stm->execute();
            $dados = $stm->fetch(PDO::FETCH_OBJ);
            return $dados->total;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }
}
