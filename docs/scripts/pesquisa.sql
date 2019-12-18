/*
-- Query: SELECT * FROM combustivel.pesquisa
LIMIT 0, 1000

-- Date: 2019-02-06 16:06
*/
INSERT INTO `pesquisa` (`razao_social`,`cnpj`,`municipio`,`bandeira`,`distribuidora`,`origem`,`metodo_coleta`,`numero_nota_fiscal`,`produto`,`data_de_compra`,`preco_de_compra`,`data_da_venda_coleta`,`preco_de_venda`,`margem_reais`,`variacao`,`f_de_abastecimento`,`media_mensal_litro`) VALUES ('Posto Bandeirantes','02803686000184','Alagoinha',NULL,NULL,NULL,NULL,68040,'Diesel S10',NULL,3.6156,NULL,3.9900,NULL,NULL,NULL,NULL);
INSERT INTO `pesquisa` (`razao_social`,`cnpj`,`municipio`,`bandeira`,`distribuidora`,`origem`,`metodo_coleta`,`numero_nota_fiscal`,`produto`,`data_de_compra`,`preco_de_compra`,`data_da_venda_coleta`,`preco_de_venda`,`margem_reais`,`variacao`,`f_de_abastecimento`,`media_mensal_litro`) VALUES ('Posto Bandeirantes','02803686000184','Alagoinha',NULL,NULL,NULL,NULL,68934,'Gasolina',NULL,3.6758,NULL,3.8790,NULL,NULL,NULL,NULL);
INSERT INTO `pesquisa` (`razao_social`,`cnpj`,`municipio`,`bandeira`,`distribuidora`,`origem`,`metodo_coleta`,`numero_nota_fiscal`,`produto`,`data_de_compra`,`preco_de_compra`,`data_da_venda_coleta`,`preco_de_venda`,`margem_reais`,`variacao`,`f_de_abastecimento`,`media_mensal_litro`) VALUES ('Posto Bandeirantes','02803686000184','Alagoinha',NULL,NULL,NULL,NULL,67944,'Diesel S10',NULL,3.6158,NULL,3.9500,NULL,NULL,NULL,NULL);
INSERT INTO `pesquisa` (`razao_social`,`cnpj`,`municipio`,`bandeira`,`distribuidora`,`origem`,`metodo_coleta`,`numero_nota_fiscal`,`produto`,`data_de_compra`,`preco_de_compra`,`data_da_venda_coleta`,`preco_de_venda`,`margem_reais`,`variacao`,`f_de_abastecimento`,`media_mensal_litro`) VALUES ('Posto Bandeirantes','20152486000184','João Pessoa',NULL,NULL,NULL,NULL,45004,'Gasolina',NULL,3.7758,NULL,3.9990,NULL,NULL,NULL,NULL);
INSERT INTO `pesquisa` (`razao_social`,`cnpj`,`municipio`,`bandeira`,`distribuidora`,`origem`,`metodo_coleta`,`numero_nota_fiscal`,`produto`,`data_de_compra`,`preco_de_compra`,`data_da_venda_coleta`,`preco_de_venda`,`margem_reais`,`variacao`,`f_de_abastecimento`,`media_mensal_litro`) VALUES ('Posto Santa María','01011023000122','João Pessoa','branca','BR','Cabedelo','Notificação',22326,'álcool','2019-02-06 03:00:00',3.5000,'2019-02-06 03:00:00',3.9900,NULL,NULL,NULL,NULL);

SELECT id,
    razao_social,
    cnpj,
    municipio,
    bandeira,
    distribuidora,
    origem,
    metodo_coleta,
    numero_nota_fiscal,
    produto,
    data_de_compra,
    preco_de_compra,
    data_da_venda_coleta,
    preco_de_venda,
    margem_reais,
    variacao,
    f_de_abastecimento,
    media_mensal_litro
FROM `combustivel`.`pesquisa`;
