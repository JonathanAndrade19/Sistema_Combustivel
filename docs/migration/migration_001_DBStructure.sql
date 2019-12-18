use combustivel;

--
-- Índices de tabela `estado`
--
-- ALTER TABLE `combustivel`.`estado`
--   ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cidade`
--
ALTER TABLE `combustivel`.`cidade`
  -- ADD PRIMARY KEY (`id`),
  ADD CONSTRAINT `fk_Cidade_estado` FOREIGN KEY ( `estado` ) REFERENCES `combustivel`.`estado` ( `id` );  


--
-- Índices de tabela `posto`
--
-- ALTER TABLE `combustivel`.`posto`
--   ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pesquisa`
--
ALTER TABLE `combustivel`.`pesquisa`
  -- ADD PRIMARY KEY (`id`),
  ADD CONSTRAINT `fk_posto_pesquisa` FOREIGN KEY ( `id_posto` ) REFERENCES `combustivel`.`posto` ( `id` );  




-- ALTER TABLE `combustivel`.`cidade`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5565;

--
-- AUTO_INCREMENT de tabela `estado`
--
-- ALTER TABLE `combustivel`.`estado`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;


