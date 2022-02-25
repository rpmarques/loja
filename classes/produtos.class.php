<?php

class Produtos
{
   // Atributo para conexão com o banco de dados
   private $pdo = null;
   // Atributo estático para instância da própria classe
   private static $produtos = null;

   private function __construct($conexao)
   {
      $this->pdo = $conexao;
   }

   public static function getInstance($conexao)
   {
      if (!isset(self::$produtos)) :
         self::$produtos = new Produtos($conexao);
      endif;
      return self::$produtos;
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

   public function selectCategorias($rCampos = "", $rWhere = "", $rLimit = "", $rLeft = "", $rOrderBy = "", $rGroupBy = "")
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

         $rSql = "SELECT $rCampos FROM categoria $rLeft $rWhere $rGroupBy $rOrderBy $rLimit";
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetchAll(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }

   public function selectSubCategorias($rCampos = "", $rWhere = "", $rLimit = "", $rLeft = "", $rOrderBy = "", $rGroupBy = "")
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


         $rSql = "SELECT $rCampos FROM sub_categoria $rLeft $rWhere $rGroupBy $rOrderBy $rLimit";
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetchAll(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }

   public function selectMarcas($rCampos = "", $rWhere = "", $rLimit = "", $rLeft = "", $rOrderBy = "", $rGroupBy = "")
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

         $rSql = "SELECT $rCampos FROM marca $rLeft $rWhere $rGroupBy $rOrderBy $rLimit";
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetchAll(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }

   
   public function pegaProduto($rID)
   {
      try {
         $rSql = "SELECT * FROM produto WHERE id=$rID ";
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }

   public function montaSelect($rNome = 'categoria_id', $rSelecionado = null)
   {
      try {
         $objCategorias = Categorias::getInstance(Conexao::getInstance());
         $dados = $objCategorias->select();
         $select = '';
         $select = '<select class="select2" name="' . $rNome . '" id="' . $rNome . '" data-placeholder="Escolha uma categoria..."  style="width: 100%;">'
            . '<option value="">&nbsp;</option>';
         foreach ($dados as $linhaDB) {
            if (!empty($rSelecionado) && $rSelecionado === $linhaDB->id) {
               $sAdd = 'selected';
            } else {
               $sAdd = '';
            }
            $select .= '<option value="' . $linhaDB->id . '"' . $sAdd . '>' . $linhaDB->nome . '</option>';
         }
         $select .= '</select>';
         return $select;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }
   public function montaSelect2($rNome = 'categoria_id', $rSelecionado = null)
   {
      try {
         $objCategorias = Categorias::getInstance(Conexao::getInstance());
         $dados = $objCategorias->select(" ORDER BY nome");
         $select = '';
         $select = '<select class="select2" name="' . $rNome . '" id="' . $rNome . '" data-placeholder="Escolha uma categoria..." style="width: 100%;">'
            . '<option value="">&nbsp;</option>';
         foreach ($dados as $linhaDB) {
            if (!empty($rSelecionado) && $rSelecionado === $linhaDB->id) {
               $sAdd = 'selected';
            } else {
               $sAdd = '';
            }
            $select .= '<option value="' . $linhaDB->id . '"' . $sAdd . '>' . $linhaDB->nome . '</option>';
         }
         $select .= '</select>';
         return $select;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }

   public function contaProduto($rCondicao)
   {
      try {
         if (!empty($rCondicao)) {
            $rSql = "SELECT COUNT(produto.id) AS total FROM produto WHERE  " . $rCondicao;
         } else {
            $rSql = "SELECT count(id) AS total FROM produto ";
         }

         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         return $dados->total;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
      }
   }
   public function criaClick($rProdutoID)
   {
      try {
         $rSql = "INSERT INTO produto_click (produto_id) VALUES (:produto_id);";
         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':produto_id', $rProdutoID);
         $stm->execute();
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - GEROU REGISTRO INICIAL DO CLICK');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
      }
   }

   public function somaClick($rProdutoID)
   {
      try {
         $rSql = "UPDATE produto_click  SET click=click+1,datac=now() WHERE produto_id=:produto_id";
         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':produto_id', $rProdutoID);
         $stm->execute();
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - SOMOU CLICK produto:[' . $rProdutoID . ']');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
      }
   }

   public function pegaFotos($rID, $PrimeiraFoto = "")
   {
      try {
         if ($PrimeiraFoto) {
            $rSql = "SELECT foto_1 FROM produto_foto WHERE produto_id=$rID ";
         } else {
            $rSql = "SELECT * FROM produto_foto WHERE produto_id=$rID ";
         }

         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }

   public function insereListaDesejos($rClienteId, $rProdutoID)
   {
      try {
         $rSql = "INSERT INTO lista_desejo (cliente_id,produto_id,datac) VALUES (:cliente_id,:produto_id,:datac);";
         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':cliente_id', $rClienteId);
         $stm->bindValue(':produto_id', $rProdutoID);
         $stm->bindValue(':datac', date('d/m/Y'));
         $stm->execute();
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - INSERIU LISTA DE DESEJO ');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
      }
   }

   public function pegaListaDesejo($rClienteId, $rProdutoID)
   {
      try {
         $rSql = "SELECT * FROM lista_desejo WHERE cliente_id=$rClienteId AND produto_id=$rProdutoID ";
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }

   public function removeListaDesejo($rClienteId, $rProdutoID)
   {
      try {
         $rSql = "DELETE FROM lista_desejo WHERE cliente_id=:cliente_id AND produto_id=:produto_id;";
         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':cliente_id', $rClienteId);
         $stm->bindValue(':produto_id', $rProdutoID);
         $stm->execute();
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - REMOVEU DAS LISTA DE DESEJO ');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
      }
   }
   //**   MARCAS **/
   public function insereMarca($rNome)
   {
      try {
         $rSql = "INSERT INTO marca (nome) VALUES (:nome);";
         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':nome', $rNome);
         $stm->execute();
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - INSERIU MARCA ');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
      }
   }

   public function listaMarcas()
   {
      try {
         $rSql = "SELECT * FROM marca;";
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetchAll(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }

   public function atualizaMarca($rNome, $rId)
   {
      try {
         $sql = "UPDATE marca SET nome=:nome WHERE id=:id;";
         $stm = $this->pdo->prepare($sql);
         $stm->bindValue(':nome', $rNome);
         $stm->bindValue(':id', $rId);
         $stm->execute();
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - ALTEROU MARCA DE PRODUTO - ID:[' . $rId . ']');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - SQL:[' . $sql . ']');
      }
   }

   public function pegaMarca($rID)
   {
      try {
         $rSql = "SELECT * FROM marca WHERE id=$rID ;";
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }

   public function apagaMarca($rId)
   {
      if (!empty($rId)) :
         try {
            $rSql = "DELETE FROM marca WHERE id=:id";
            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':id', $rId);
            $stm->execute();
            if ($stm) {
               Logger('Usuario:[' . $_SESSION['login'] . '] - EXCLUIU MARCA - ID:[' . $rId . ']');
            }
            return $stm;
         } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
         }
      endif;
   }
   //**  FIM MARCAS **/

   //**   CATEGORIAS **/
   public function insereCategoria($rNome)
   {
      try {
         $rSql = "INSERT INTO categoria (nome) VALUES (:nome);";
         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':nome', $rNome);
         $stm->execute();
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - INSERIU CATEGORIA ');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
      }
   }

   public function listaCategorias()
   {
      try {
         $rSql = "SELECT * FROM categoria;";
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetchAll(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }

   public function atualizaCategoria($rNome, $rId)
   {
      try {
         $sql = "UPDATE categoria SET nome=:nome WHERE id=:id;";
         $stm = $this->pdo->prepare($sql);
         $stm->bindValue(':nome', $rNome);
         $stm->bindValue(':id', $rId);
         $stm->execute();
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - ALTEROU CATEGORIA DE PRODUTO - ID:[' . $rId . ']');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - SQL:[' . $sql . ']');
      }
   }

   public function pegaCategoria($rId)
   {
      try {
         $rSql = "SELECT * FROM categoria WHERE id=$rId ;";
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }

   public function apagaCategoria($rId)
   {
      if (!empty($rId)) :
         try {
            $rSql = "DELETE FROM categoria WHERE id=:id";
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
   //**  FIM CATEGORIAS **/

   //**   SUB-CATEGORIAS **/
   public function insereSubCategoria($rNome)
   {
      try {
         $rSql = "INSERT INTO sub_categoria (nome) VALUES (:nome);";
         $stm = $this->pdo->prepare($rSql);
         $stm->bindValue(':nome', $rNome);
         $stm->execute();
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - INSERIU SUB-CATEGORIA ');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
      }
   }


   public function listaSubCategorias($rCampos = "", $rWhere = "", $rLimit = "", $rLeft = "", $rOrderBy = "", $rGroupBy = "")
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

         $rSql = "SELECT $rCampos FROM sub_categoria $rLeft $rWhere $rGroupBy $rOrderBy $rLimit";
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetchAll(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }



   public function listaSubCategorias1()
   {
      try {
         $rSql = "SELECT * FROM sub_categoria;";
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetchAll(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }

   public function atualizaSubCategoria($rNome, $rId)
   {
      try {
         $sql = "UPDATE sub_categoria SET nome=:nome WHERE id=:id;";
         $stm = $this->pdo->prepare($sql);
         $stm->bindValue(':nome', $rNome);
         $stm->bindValue(':id', $rId);
         $stm->execute();
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - ALTEROU SUB-CATEGORIA - ID:[' . $rId . ']');
         }
         return $stm;
      } catch (PDOException $erro) {
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . '] - SQL:[' . $sql . ']');
      }
   }

   public function pegaSubCategoria($rId)
   {
      try {
         $rSql = "SELECT * FROM sub_categoria WHERE id=$rId ;";
         $stm = $this->pdo->prepare($rSql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }

   public function apagaSubCategoria($rId)
   {
      if (!empty($rId)) :
         try {
            $rSql = "DELETE FROM sub_categoria WHERE id=:id";
            $stm = $this->pdo->prepare($rSql);
            $stm->bindValue(':id', $rId);
            $stm->execute();
            if ($stm) {
               Logger('Usuario:[' . $_SESSION['login'] . '] - EXCLUIU SUB-CATEGORIA - ID:[' . $rId . ']');
            }
            return $stm;
         } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:[' . $erro->getFile() . '] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage() . ']');
         }
      endif;
   }
   //**  FIM CATEGORIAS **/
}
