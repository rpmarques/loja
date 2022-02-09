-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: localhost    Database: loja
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.17-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `loja`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `loja` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `loja`;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Informática'),(2,'Beleza'),(7,'Roupas'),(8,'Casa');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidade`
--

DROP TABLE IF EXISTS `cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidade` (
  `id` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `ibge` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidade`
--

LOCK TABLES `cidade` WRITE;
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
INSERT INTO `cidade` VALUES (1,'Santana do Livramento','RS','4317103');
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `fone1` varchar(15) DEFAULT NULL,
  `cgc` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (10,'Ricardo','ricardo80@gmail.com','202cb962ac59075b964b07152d234b70','Rua Manduca Rodrigues','97573-560','Centro','432','Santana do Livramento','RS','(55)-99729-0002','809.987.390-47');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `id` int(11) DEFAULT NULL,
  `nome_fantasia` varchar(50) DEFAULT NULL,
  `razao_social` varchar(100) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `fone1` varchar(20) DEFAULT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `pais` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cidade_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedor` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lista_desejo`
--

DROP TABLE IF EXISTS `lista_desejo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lista_desejo` (
  `id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `datac` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lista_desejo`
--

LOCK TABLES `lista_desejo` WRITE;
/*!40000 ALTER TABLE `lista_desejo` DISABLE KEYS */;
INSERT INTO `lista_desejo` VALUES (4,10,2,'2021-12-30'),(5,10,3,'2021-12-30'),(6,10,6,'2021-12-30');
/*!40000 ALTER TABLE `lista_desejo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `id` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (1,'LG'),(2,'Hidramais'),(3,'Hering'),(4,'Britania'),(5,'C3 Tech');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos_itens`
--

DROP TABLE IF EXISTS `pedidos_itens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos_itens` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos_itens`
--

LOCK TABLES `pedidos_itens` WRITE;
/*!40000 ALTER TABLE `pedidos_itens` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos_itens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `id` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `descricao` longblob DEFAULT NULL,
  `preco_ven` double DEFAULT NULL,
  `preco_antigo` double DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `marca_id` int(11) DEFAULT NULL,
  `mais_vendido` int(11) DEFAULT NULL,
  `novidade` int(11) DEFAULT NULL,
  `promocao` int(11) DEFAULT NULL,
  `sub_categoria_id` int(11) DEFAULT NULL,
  `palavra_chave` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (4,'Calça Jeans',NULL,65,0,7,2,0,0,0,10,NULL),(5,'Cafeteira',NULL,65.99,79.99,8,4,0,0,1,14,NULL),(3,'Água de Rosas',NULL,42.5,75.22,2,2,1,0,0,13,NULL),(6,'Teclado USB',0x45737465207465636C61646F20C3A920696465616C20706172612070726F706F7263696F6E617220616C7461207175616C69646164652C20707261746963696461646520652073696D706C6963696461646520616F20736575206469612D612D6469612E20436F6D207465636E6F6C6F67696120646520636F6E6578C3A36F20506C7567206520506C61792C20636F6E65637465206120656E747261646120555342206520636F6D656365206120757361722E204F207465636C61646F20706F7373756920726573697374C3AA6E636961206120C3A16775612C20616CC3A96D206465207465636C6173206D616369617320652073696C656E63696F7361732070617261206D61696F7220636F6E666F72746F2E0D0A0D0A496D6167656E73204D6572616D656E746520496C757374726174697661732E,15,16.3,1,5,0,0,0,15,'informática'),(7,'Memória DDR1',0x4361726163746572C3AD73746963617320646F2070726F6475746F3A0D0A0D0A4361706163696461646520746F74616C3A20342047420D0AC3892067616D65723A204EC3A36F0D0A466F726D61746F3A205244494D4D0D0A5465636E6F6C6F6769613A2044445220534452414D0D0A56656C6F6369646164653A20333333204D487A0D0A41706C696361C3A7C3A36F3A205365727669646F726573,54,NULL,1,NULL,1,1,1,12,'informática, memória'),(1,'Monitor 21\'\'',NULL,129.9,154.5,1,1,1,1,1,1,'informática, monitor'),(2,'Mouse sem fio',NULL,10,321.3,1,5,1,1,0,2,'informática, mouse');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto_click`
--

DROP TABLE IF EXISTS `produto_click`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto_click` (
  `id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `datac` date DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `click` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto_click`
--

LOCK TABLES `produto_click` WRITE;
/*!40000 ALTER TABLE `produto_click` DISABLE KEYS */;
INSERT INTO `produto_click` VALUES (13,7,'2021-12-13',NULL,7),(10,4,'2021-12-21',NULL,3),(11,5,'2021-12-21',NULL,4),(7,1,'2021-12-30',NULL,23),(8,2,'2021-12-30',NULL,9),(9,3,'2021-12-30',NULL,10),(12,6,'2022-01-05',NULL,81);
/*!40000 ALTER TABLE `produto_click` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto_foto`
--

DROP TABLE IF EXISTS `produto_foto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto_foto` (
  `id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `foto_1` varchar(100) DEFAULT NULL,
  `foto_2` varchar(100) DEFAULT NULL,
  `foto_3` varchar(100) DEFAULT NULL,
  `foto_4` varchar(100) DEFAULT NULL,
  `foto_5` varchar(100) DEFAULT NULL,
  `foto_6` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto_foto`
--

LOCK TABLES `produto_foto` WRITE;
/*!40000 ALTER TABLE `produto_foto` DISABLE KEYS */;
INSERT INTO `produto_foto` VALUES (1,6,'teclado_1.jpg','teclado_2.jpg','teclado_3.jpg',NULL,NULL,NULL),(2,2,'mouse_1.jpg','mouse_2.jpg','mouse_3.jpg','mouse_4.png','mouse_5.png','mouse_6.jpg'),(3,1,'monitor_1.jpg','monitor_2.jpg','monitor_3.jpg',NULL,NULL,NULL),(4,7,'memoria_1.jpg','memoria_2.jpg','memoria_3.jpg','memoria_4.jpg',NULL,NULL),(5,5,'cafeteira_1.jpg','cafeteira_2.jpg','cafeteira_3.jpg',NULL,NULL,NULL),(6,4,'calca_1.jpg','calca_2.jog','calca_3.jpg',NULL,NULL,NULL),(7,3,'perfume_1.jpg','perfume_2.jpg','perfume_3.jpg',NULL,NULL,NULL);
/*!40000 ALTER TABLE `produto_foto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_categoria`
--

DROP TABLE IF EXISTS `sub_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_categoria` (
  `id` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_categoria`
--

LOCK TABLES `sub_categoria` WRITE;
/*!40000 ALTER TABLE `sub_categoria` DISABLE KEYS */;
INSERT INTO `sub_categoria` VALUES (1,'Monitor',1),(2,'Mouse',1),(4,'HDs',1),(8,'Cremes',2),(9,'Óleos',2),(10,'Calças',7),(11,'Camisetas',7),(12,'Memórias',1),(13,'Perfumes',2),(14,'Cozinha',8),(15,'Teclados',1);
/*!40000 ALTER TABLE `sub_categoria` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-12 18:03:41
