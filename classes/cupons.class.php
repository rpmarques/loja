<?php

class Cupons
{
   // Atributo para conexão com o banco de dados
   private $pdo = null;
   // Atributo estático para instância da própria classe
   private static $cupons = null;

   private function __construct($conexao)
   {
      $this->pdo = $conexao;
   }

   public static function getInstance($conexao)
   {
      if (!isset(self::$cupons)) :
         self::$cupons = new Cupons($conexao);
      endif;
      return self::$cupons;
   }

   public function insereProduto($rNome, $rCodigo, $rPrateleira, $rPrecoVen, $rCustoUlt)
   {
      try {
         $rSql = "INSERT INTO produtos (nome,codigo,prateleira,preco_ven,custo_ult) VALUES (:nome,:codigo,:prateleira,:preco_ven,:custo_ult);";
         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':nome', $rNome);
         $stm->bindValue(':codigo', $rCodigo);
         $stm->bindValue(':prateleira', $rPrateleira);
         $stm->bindValue(':preco_ven', gravaMoeda($rPrecoVen) ? gravaMoeda($rPrecoVen) : '0');
         $stm->bindValue(':custo_ult', gravaMoeda($rCustoUlt) ? gravaMoeda($rCustoUlt) : '0');
         $stm->execute();
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - INSERIU PRODUTO');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
      }
   }

   public function atualizaProduto($rNome, $rCodigo, $rPrateleira, $rPrecoVen, $rCustoUlt, $rID)
   {
      try {
         $rSql = "UPDATE produtos SET nome=:nome,codigo=:codigo,prateleira=:prateleira,preco_ven=:preco_ven,custo_ult=:custo_ult WHERE id=:id;";
         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':nome', $rNome);
         $stm->bindValue(':codigo', $rCodigo);
         $stm->bindValue(':prateleira', $rPrateleira);
         $stm->bindValue(':preco_ven', gravaMoeda($rPrecoVen));
         $stm->bindValue(':custo_ult', gravaMoeda($rCustoUlt));
         $stm->bindValue(':id', intval($rID));
         $stm->execute();
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - ALTEROU PRODUTO - ID:[' . $rID . ']');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - MENSAGEM:[' . $erro->getMessage() . ']');
      }
   }
   public function deleteProduto($rID)
   {
      if (!empty($rID)) :
         try {
            $rSql = "DELETE FROM produtos WHERE id=:id";
            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':id', $rID);
            $stm->execute();
            if ($stm) {
               Logger('Usuario:[' . $_SESSION['login'] . '] - EXCLUIU PRODUTO - ID:[' . $rID . ']');
            }
            return $stm;
         } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
         }
      endif;
   }
   public function selectProduto($rCampos = "", $rWhere = "", $rLimit = "", $rLeft = "", $rOrderBy = "", $rGroupBy = "")
   {
      try {

         if (empty($rCampos)) {
            $rCampos = "*";
         }
         if (empty($rLeft)) {
            $rLeft = "";
         }
         if (!empty($rOrderBy)) {
            $rOrderBy = " ORDER BY $rOrderBy ";
         }
         if (!empty($rGroupBy)) {
            $rGroupBy = " GROUP BY $rGroupBy";
         }
         if (!empty($rWhere)) {
            $rWhere = " WHERE $rWhere";
         }
         if (!empty($rLimit)) {
            $rLimit = " LIMIT $rLimit";
         }

         $rSql = " SELECT $rCampos FROM produto $rLeft $rWhere $rGroupBy $rOrderBy $rLimit ";
         LoggerSQL($rSql);
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetchAll(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }
   public function selectUmProduto($rWhere)
   {
      try {
         $rSql = "SELECT * FROM produtos " . $rWhere;
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }

   public function montaSelectProduto($rNome = 'produto_id', $rSelecionado = null)
   {
      try {
         $objProdutos = Produtos::getInstance(Conexao::getInstance());
         $dados = $objProdutos->select(" ORDER BY nome");
         $select = '';
         $select = '<select class="select2" name="' . $rNome . '" id="' . $rNome . '" data-placeholder="Selecione um produto..." style="width: 100%;">'
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

   public function geraMov($rNroNF, $rSerie, $rDataC, $rQtdeMov, $rTipoMovimento, $rProdutoID, $rClienteID, $rFornecedorID)
   {
      try {
         switch ($rTipoMovimento) {
            case 'E': //ENTRADA
               $auxTpMov = 'ENTRADA';
               $auxOP = '+';
               break;
            case 'S':
               $auxTpMov = 'SAIDA';
               $auxOP = '-';
               break;
         }


         $rSql = "INSERT INTO produto_movimentos (nronf,serie,datac,qtde,tipo_movimento,produto_id,cliente_id,fornecedor_id)
          VALUES (:nronf,:serie,:datac,:qtde,:tipo_movimento,:produto_id,:cliente_id,:fornecedor_id);";

         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':nronf', $rNroNF);
         $stm->bindValue(':serie', $rSerie);
         $stm->bindValue(':datac', $rDataC);
         $stm->bindValue(':qtde', gravaMoeda($rQtdeMov));
         $stm->bindValue(':tipo_movimento', $rTipoMovimento);
         $stm->bindValue(':produto_id', $rProdutoID);
         if ($rClienteID == '0') {
            $stm->bindValue(':cliente_id', null);
         } else {
            $stm->bindValue(':cliente_id', $rClienteID);
         }
         if ($rFornecedorID == '0') {
            $stm->bindValue(':fornecedor_id', null);
         } else {
            $stm->bindValue(':fornecedor_id', $rFornecedorID);
         }


         $stm->execute();
         if ($stm) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - MOVIMENTOU PRODUTO ID[:' . $rProdutoID . '] - TIPO DE MOVIMENTO:[' . $auxTpMov . ']');
            //ALTERA A QTDE DO PRODUTO
            $objProdutos = Produtos::getInstance(Conexao::getInstance());
            $retQTDE = $objProdutos->alteraQtde($rProdutoID, $auxOP, $rQtdeMov);
            if (!$retQTDE) {
               Logger('USUARIO:[' . $_SESSION['login'] . '] - ERRO AO MOVIMENTAR PRODUTO');
            }
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - rSql:[' . $rSql . ']');
      }
   }

   public function alteraQtde($rProdutoID, $rOperacao, $rQtde)
   {
      try {
         $rSql = "UPDATE produtos SET qtde=qtde $rOperacao :qtde WHERE id=:produto_id";
         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':qtde', gravaMoeda($rQtde));
         $stm->bindValue(':produto_id', $rProdutoID);
         $stm->execute();
         if ($stm) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ALTEROU QTDE PRODUTO ID:[' . $rProdutoID . '] - QTDE:+ [' . $rQtde . '] - OPERAÇÃO:[' . $rOperacao . ']');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - rSql:[' . $rSql . ']');
      }
   }

   public function insert($rNome, $rCodigo, $rPrateleira, $rPrecoVen, $rCustoUlt)
   {
      try {
         $rSql = "INSERT INTO produtos (nome,codigo,prateleira,preco_ven,custo_ult) VALUES (:nome,:codigo,:prateleira,:preco_ven,:custo_ult);";
         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':nome', $rNome);
         $stm->bindValue(':codigo', $rCodigo);
         $stm->bindValue(':prateleira', $rPrateleira);
         $stm->bindValue(':preco_ven', $rPrecoVen);
         $stm->bindValue(':custo_ult', $rCustoUlt);
         $stm->execute();
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - INSERIU PRODUTO');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
      }
   }
   public function update($rNome, $rID)
   {
      try {
         $rSql = "UPDATE base_categoria SET nome=:nome WHERE id = :id;";
         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':nome', $rNome);
         $stm->bindValue(':id', $rID);
         $stm->execute();
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - ALTEROU CATEGORIA - ID:[' . $rID . ']');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - MENSAGEM:[' . $erro->getMessage() . ']');
      }
   }
   public function delete($rId)
   {
      if (!empty($rId)) :
         try {
            $rSql = "DELETE FROM base_categoria WHERE id=:id";
            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':id', $rId);
            $stm->execute();
            if ($stm) {
               Logger('Usuario:[' . $_SESSION['login'] . '] - EXCLUIU CATEGORIA - ID:[' . $rId . ']');
            }
            return $stm;
         } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
         }
      endif;
   }

   public function pegaCupom($rCupom)
   {
      try {
         $rSql = "SELECT * FROM cupom_desconto WHERE TRIM(cupom)='$rCupom' ";
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }

   public function pegaCupomPorID($rCupomID)
   {
      try {
         $rSql = "SELECT * FROM cupom_desconto WHERE id=$rCupomID ";
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }
}
