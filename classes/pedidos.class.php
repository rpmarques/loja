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
            LoggerSQL('Usuario:[' . $_SESSION['login'] . '] FUNÇÃO:[pedidos.criaPedido]- Tentando executar comandoSQL:[' . $rSql . ']');
            if ($stm) {
                LoggerSQL('Usuario:[' . $_SESSION['login'] . '] - CRIOU PEDIDO CHAVE:[' . $rChave . ']');
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
            LoggerCarrinho('Vamos procurar o produto');

            if ($produto = $objProdutos->pegaProduto($rCodPro)) {
                LoggerCarrinho('Achamos o produto, vamos adicionar no carrinho_itens');
                $rSql = "INSERT INTO pedidos_itens (chave,produto_id,datac,qtde,valor_unitario,nome_produto) VALUES (:chave,:produto_id,:datac,:qtde,:valor_unitario,:nome_produto);";
                $stm = $this->pdo->prepare($rSql);
                $stm->bindValue(':chave', $rChave);
                $stm->bindValue(':datac', date('Y-m-d'));
                $stm->bindValue(':produto_id', $rCodPro);
                $stm->bindValue(':valor_unitario', $produto->preco_ven);
                $stm->bindValue(':qtde', $rQtde);
                $stm->bindValue(':nome_produto', $produto->nome);
                $stm->execute();
                if ($stm) {
                    LoggerSQL('Usuario:[' . $_SESSION['login'] . '] - tentando executar sql:[' . $rSql . ']');
                }
                LoggerSQL($rSql);
                return $stm;
            }
        } catch (PDOException $erro) {
            LoggerSQL('NOME DO ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function pegaCabecaCarrinho($rChave)
    {
        try {
            $rSql = "SELECT * FROM pedidos_itens  WHERE chave='$rChave'";
            $stm = $this->pdo->prepare($rSql);
            $stm->execute();
            $dados = $stm->fetchall(PDO::FETCH_OBJ);
            LoggerSQL($rSql);
            return $dados;
        } catch (PDOException $erro) {
            LoggerSQL('NOME DO ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function pegaItemCarrinho($rChave, $rProdutoID)
    {
        //SE EU NÃO INFORMAR PRODUTO, TRAZ TODOS OS PRODUTOS DO CARRINHO
        try {
            if (empty($rProdutoID)) {
                $rSql = "SELECT * from pedidos_itens WHERE chave='$rChave' ";
            } else {
                $rSql = "SELECT * from pedidos_itens WHERE chave='$rChave' AND produto_id='$rProdutoID'";
            }
            $stm = $this->pdo->prepare($rSql);
            $stm->execute();
            if (empty($rProdutoID)) {
                $dados = $stm->fetchall(PDO::FETCH_OBJ);
            } else {
                $dados = $stm->fetch(PDO::FETCH_OBJ);
            }
            LoggerSQL($rSql);
            return $dados;
        } catch (PDOException $erro) {
            LoggerSQL('NOME DO ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function atualizaQTDE($rID, $rQtde)
    {
        try {
            $rSql = "UPDATE pedidos_itens SET qtde=:qtde WHERE id=:id";
            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':id', intval($rID));
            $stm->bindValue(':qtde', $rQtde);
            $stm->execute();
            if ($stm) {
                LoggerSQL('Usuario:[' . $_SESSION['login'] . '] - ALTEROU QTDE CARRINHO - ID:[' . $rID . '] QTDE NOVA:[' . $rQtde . ']');
            }
            LoggerSQL($rSql);
            return $stm;
        } catch (PDOException $erro) {
            $this->pdo->rollBack();
            LoggerSQL('NOME DO ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function atualziaCliente($rClienteID, $rChave)
    {
        try {
            $rSql = "UPDATE pedidos set cliente_id=:cliente_id WHERE chave=:chave";
            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':cliente_id', $rClienteID);
            $stm->bindValue(':chave', $rChave);
            $stm->execute();
            if ($stm) {
                LoggerSQL('Usuario:[' . $_SESSION['login'] . '] - SETOU CLIENTE NO CARRINHO - ID:[' . $rChave . '] ');
            }
            LoggerSQL($rSql);
        } catch (PDOException $erro) {
            LoggerSQL('NOME DO ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
        }
    }

    public function somaTotais($rChave)
    {
        try {
            $rSql = "UPDATE pedidos SET pedidos.total_produtos = (SELECT SUM(pedidos_itens.qtde * pedidos_itens.valor_unitario) FROM pedidos_itens WHERE pedidos_itens.chave=pedidos.chave) WHERE pedidos.chave=:chave;";
            $rSql = $rSql . " UPDATE pedidos SET pedidos.total_pedido = (SELECT SUM(pedidos_itens.qtde * pedidos_itens.valor_unitario) FROM pedidos_itens WHERE pedidos_itens.chave=pedidos.chave) WHERE pedidos.chave=:chave;";
            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':chave', $rChave);
            $stm->execute();
            if ($stm) {
                Logger('Usuario:[' . $_SESSION['login'] . '] - CALCULOU TOTAIS DO PEDIDO ID:[' . $rChave . '] ');
            }
            LoggerSQL($rSql);
        } catch (PDOException $erro) {
            LoggerSQL('NOME DO ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
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
