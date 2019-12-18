CREATE DATABASE  IF NOT EXISTS `combustivel` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `combustivel`;

--
-- Table structure for table `pesquisa`
--

DROP TABLE IF EXISTS `pesquisa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pesquisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_posto` int(11) DEFAULT NULL,  
  `metodo_coleta` varchar(25) COLLATE utf8_unicode_ci,
  `numero_nota_fiscal` int(22) NOT NULL,
  `produto` varchar(25) NOT NULL COLLATE utf8_unicode_ci,
  `data_de_compra` timestamp NULL,
  `preco_de_compra` decimal(7,4) NOT NULL,
  `data_da_venda_coleta` timestamp NULL,
  `preco_de_venda` decimal(7,4) NOT NULL,
  `margem_reais` decimal(7,4),
  `variacao` decimal(3,2),
  `f_de_abastecimento` varchar(20) COLLATE utf8_unicode_ci,
  `media_mensal_litro` decimal(7,3) COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


