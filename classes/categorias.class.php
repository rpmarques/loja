<?php

class Categorias {
   // Atributo para conexão com o banco de dados   
   private $pdo = null;
   // Atributo estático para instância da própria classe    
   private static $categorias= null;

   private function __construct($conexao) {
      $this->pdo = $conexao;
   }
   
   public static function getInstance($conexao) {
      if (!isset(self::$categorias)):
         self::$categorias = new Categorias($conexao);
      endif;
      return self::$categorias;
   }

   public function insert($rNome,$rCodigo,$rPrateleira,$rPrecoVen,$rCustoUlt) {
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
         Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:['.$erro->getFile().'] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage().']');  
      }
   }
   public function update($rNome,$rID) {
      try {
         $sql = "UPDATE base_categoria SET nome=:nome WHERE id = :id;";
         $stm = $this->pdo->prepare($sql);
         $stm->bindValue(':nome', $rNome);
         $stm->bindValue(':id', $rID);
         $stm->execute();         
         if ($stm) {
            Logger('Usuario:[' . $_SESSION['login'] . '] - ALTEROU CATEGORIA - ID:[' . $rID . ']');
         }
         return $stm;
      } catch (PDOException $erro) {
      Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:['.$erro->getFile().'] - LINHA:[' . $erro->getLine() . '] - MENSAGEM:[' . $erro->getMessage().']');
      
      }
   }
   public function delete($rId) {
      if (!empty($rId)):
         try {
            $sql = "DELETE FROM base_categoria WHERE id=:id";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':id', $rId);
            $stm->execute();
            if ($stm) {
               Logger('Usuario:[' . $_SESSION['login'] . '] - EXCLUIU CATEGORIA - ID:[' . $rId . ']');
            }
            return $stm;
         } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:['.$erro->getFile().'] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage().']'); 
         }
      endif;
   }
   public function selectCategorias($rCampos="*",$rLeft="",$rWhere='',$rOrderBy="",$rGroupBy="") {
      try {

         if(empty($rCampos)){
            $rCampos="*";
         }
         if(empty($rLeft)){
            $rLeft="";
         }
         if(empty($rOrderBy)){
            $rOrderBy="";
         }
         if(empty($rGroupBy)){
            $rGroupBy="";
         }
         if(!empty($rWhere)){
            $rWhere = " WHERE ".$rWhere;
         }

         $sql = "SELECT $rCampos FROM categoria $rLeft $rWhere $rGroupBy $rOrderBy";
         $stm = $this->pdo->prepare($sql);
         $stm->execute();
         $dados = $stm->fetchAll(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }

   public function selectSubCategorias($rCampos="*",$rLeft="",$rWhere='',$rOrderBy="",$rGroupBy="") {
      try {

         if(empty($rCampos)){
            $rCampos="*";
         }
         if(empty($rLeft)){
            $rLeft="";
         }
         if(empty($rOrderBy)){
            $rOrderBy="";
         }
         if(empty($rGroupBy)){
            $rGroupBy="";
         }
         if(!empty($rWhere)){
            $rWhere = " WHERE ".$rWhere;
         }

         $sql = "SELECT $rCampos FROM sub_categoria $rLeft $rWhere $rGroupBy $rOrderBy";
         $stm = $this->pdo->prepare($sql);
         $stm->execute();
         $dados = $stm->fetchAll(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }

   public function selectUM($rWhere) {
      try {
         $sql = "SELECT * FROM base_categoria " . $rWhere;
         $stm = $this->pdo->prepare($sql);
         $stm->execute();
         $dados = $stm->fetch(PDO::FETCH_OBJ);
         return $dados;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }
   public function montaSelect($rNome = 'categoria_id', $rSelecionado = null) {
      try {
         $objCategorias = Categorias::getInstance(Conexao::getInstance());
         $dados = $objCategorias ->select();
         $select = '';
         $select = '<select class="select2" name="' . $rNome . '" id="' . $rNome . '" data-placeholder="Escolha uma categoria..."  style="width: 100%;">'
                 . '<option value="">&nbsp;</option>';
         foreach ($dados as $linhaDB) {
            if (!empty($rSelecionado) && $rSelecionado === $linhaDB->id) {$sAdd = 'selected';} else {$sAdd = '';}
            $select.='<option value="' . $linhaDB->id . '"' . $sAdd . '>' . $linhaDB->nome. '</option>';
         }
         $select.= '</select>';
         return $select;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }
   public function montaSelect2($rNome = 'categoria_id', $rSelecionado = null) {
      try {
         $objCategorias = Categorias::getInstance(Conexao::getInstance());
         $dados = $objCategorias ->select(" ORDER BY nome");
         $select = '';
         $select = '<select class="select2" name="' . $rNome . '" id="' . $rNome . '" data-placeholder="Escolha uma categoria..." style="width: 100%;">'
                 . '<option value="">&nbsp;</option>';
         foreach ($dados as $linhaDB) {
            if (!empty($rSelecionado) && $rSelecionado === $linhaDB->id) {$sAdd = 'selected';} else {$sAdd = '';}
            $select.='<option value="' . $linhaDB->id . '"' . $sAdd . '>' . $linhaDB->nome. '</option>';
         }
         $select.= '</select>';
         return $select;
      } catch (PDOException $erro) {
         Logger('Usuario:[' . $_SESSION['login'] . '] - Arquivo:' . $erro->getFile() . ' Erro na linha:' . $erro->getLine() . ' - Mensagem:' . $erro->getMessage());
      }
   }
      public function contaCategoria($rCondicao) {
       try {
            $sql = "SELECT count(id) AS total FROM base_categoria " . $rCondicao;
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $dados = $stm->fetch(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            Logger('USUARIO:[' . $_SESSION['login'] . '] - ARQUIVO:['.$erro->getFile().'] - LINHA:[' . $erro->getLine() . '] - Mensagem:[' . $erro->getMessage().']');  
      }
   }
}

?>