CREATE DATABASE  IF NOT EXISTS `combustivel` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `combustivel`;

--
-- Table structure for table `posto`
--

DROP TABLE IF EXISTS `posto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(20) NOT NULL COLLATE utf8_unicode_ci ,
  `razao_social` varchar(100) NOT NULL COLLATE utf8_unicode_ci,  
  `endereco` varchar(250) NOT NULL COLLATE utf8_unicode_ci,
  `bairro` varchar(35) NOT NULL COLLATE utf8_unicode_ci,
  `municipio` varchar(35) NOT NULL COLLATE utf8_unicode_ci,
  `uf` varchar(2) NOT NULL COLLATE utf8_unicode_ci,
  `cep` varchar(9) COLLATE utf8_unicode_ci,
  `bandeira` varchar(25) COLLATE utf8_unicode_ci,
  `distribuidora` varchar(25) COLLATE utf8_unicode_ci,
  `origem` varchar(25) CHARACTER SET utf32 COLLATE utf32_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


