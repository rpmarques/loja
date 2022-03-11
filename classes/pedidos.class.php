<?php

class Pedidos
{

    // Atributo para conexão com o banco de dados   
    private $pdo = null;
    // Atributo estático para instância da própria classe    
    private static $pedidos = null;
    private function __construct($conexao)
    {
        $this->pdo = $conexao;
    }
    public static function getInstance($conexao)
    {
        if (!isset(self::$pedidos)) :
            self::$pedidos = new Pedidos($conexao);
        endif;
        return self::$pedidos;
    }

    public function criaPedido($rChave)
    {
        try {
            $rSql = "INSERT INTO pedidos (datac,chave)  VALUES ( :datac,:chave);";
            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':chave', $rChave);
            $stm->bindValue(':datac', date('Y-m-d'));
            $stm->execute();
            LoggerSQL('Usuario:[' . LOGIN . '] FUNÇÃO:[pedidos.criaPedido]- Tentando executar comandoSQL:[' . $rSql . ']');
            if ($stm) {
                LoggerSQL('Usuario:[' . LOGIN . '] - CRIOU PEDIDO CHAVE:[' . $rChave . ']');
            }
            LoggerSQL($rSql);
            return $stm;
        } catch (PDOException $erro) {
            LoggerSQL('NOME DO ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function insertItemPedido($rChave, $rCodPro, $rQtde)
    {
        try {
            //PEGA O CÓDIGO DO PRODUTO E ACHA O PRODUTO
            $objProdutos = Produtos::getInstance(Conexao::getInstance());
            Logger('Vamos procurar o produto');

            if ($produto = $objProdutos->pegaProduto($rCodPro)) {
                Logger('Achamos o produto, vamos adicionar no carrinho_itens');
                $rSql = "INSERT INTO carrinho_itens (chave,produto_id,datac,qtde,valor_bruto,nome_pro) VALUES (:chave,:produto_id,:datac,:qtde,:valor_bruto,:nome_pro);";
                $stm = $this->pdo->prepare($rSql);
                $stm->bindValue(':chave', $rChave);
                $stm->bindValue(':datac', date('Y-m-d'));
                $stm->bindValue(':produto_id', $rCodPro);
                $stm->bindValue(':valor_bruto', $produto->preco);
                $stm->bindValue(':qtde', $rQtde);
                $stm->bindValue(':nome_pro', $produto->nome);
                $stm->execute();
                if ($stm) {
                    LoggerSQL('Usuario:[' . LOGIN . '] - tentando executar sql:[' . $rSql . ']');
                }
                LoggerSQL($rSql);
                return $stm;
            }
        } catch (PDOException $erro) {
            LoggerSQL('NOME DO ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
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
            $sql = "SELECT * FROM fornecedores " . $rWhere;
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
}
