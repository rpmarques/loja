<?php

class Conexao {
   //Atributo estático para instância do PDO   
   private static $pdo;
   // Escondendo o construtor da classe      
   private function __construct() {
      //   
   }

   public static function getInstance() {
      if (!isset(self::$pdo)) {
         try {
            //   $servername="sql100.epizy.com";
            //   $database="epiz_30797690_loja";
            //   $charset="utf8";
            //   $username="epiz_30797690";
            //   $password="DBETWmMZBAtv";

             $servername="localhost";
             $database="loja";
             $charset="utf8";
             $username="root";
             $password="";

            //self::$pdo = new PDO("pgsql:host=localhost;port=5432;dbname=gen_market ;user=postgres;password=genesys");
            self::$pdo = new  PDO("mysql:host=$servername;dbname=$database", $username, $password);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         } catch (PDOException $e) {
            print "Erro: " . $e->getMessage();
         }
      }
      return self::$pdo;
   }
}

?>