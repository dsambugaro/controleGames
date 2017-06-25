-- -----------------------------------------------------
-- APS Banco de Dados 1 | UTFPR-CM 2017/1
-- Prof.º André Luis Schwerz
-- Alunos: Danilo Sambugaro | Rafael Soratto
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema controleGames_APS_BD
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `controleGames_APS_BD` ;


-- -----------------------------------------------------
-- Schema controleGames_APS_BD
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `controleGames_APS_BD` DEFAULT CHARACTER SET utf8 ;
USE `controleGames_APS_BD` ;


-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`PESSOA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`PESSOA` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`PESSOA` (
  `CPF` CHAR(11) NOT NULL,
  `nome_pessoa` VARCHAR(255) NOT NULL,
  `data_nasc_pessoa` DATE NOT NULL,
  PRIMARY KEY (`CPF`));


-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`ESTADO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`ESTADO` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`ESTADO` (
  `ID` INT AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  UNIQUE(`nome`),
  PRIMARY KEY (`ID`));


-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`CIDADE`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`CIDADE` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`CIDADE` (
  `ID` INT AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `ESTADO_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `fk_CIDADE_ESTADO1`
    FOREIGN KEY (`ESTADO_ID`)
    REFERENCES `controleGames_APS_BD`.`ESTADO` (`ID`));


-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`ENDERECO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`ENDERECO` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`ENDERECO` (
  `PESSOA_CPF` CHAR(11) NOT NULL,
  `logradouro` VARCHAR(255) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `numero` INT NOT NULL,
  `bairro` VARCHAR(255) NOT NULL,
  `CEP` INT NOT NULL,
  `CIDADE_ID` INT NOT NULL,
  PRIMARY KEY (`PESSOA_CPF`),
  CONSTRAINT `fk_ENDERECO_PESSOA`
    FOREIGN KEY (`PESSOA_CPF`)
    REFERENCES `controleGames_APS_BD`.`PESSOA` (`CPF`) ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT `fk_ENDERECO_CIDADE1`
    FOREIGN KEY (`CIDADE_ID`)
    REFERENCES `controleGames_APS_BD`.`CIDADE` (`ID`));


-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`USUARIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`USUARIO` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`USUARIO` (
  `ID` INT AUTO_INCREMENT,
  `user` VARCHAR(20) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  UNIQUE(`user`),
  PRIMARY KEY (`ID`));


-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`CLIENTE`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`CLIENTE` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`CLIENTE` (
  `PESSOA_CPF` CHAR(11) NOT NULL,
  `usuario` INT NOT NULL,
  `ultima_compra` DATE NULL,
  `email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`PESSOA_CPF`),
  UNIQUE(`usuario`),
  CONSTRAINT `fk_CLIENTE_PESSOA1`
    FOREIGN KEY (`PESSOA_CPF`)
    REFERENCES `controleGames_APS_BD`.`PESSOA` (`CPF`) ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT `fk_CLIENTE_USUARIO`
    FOREIGN KEY (`usuario`)
    REFERENCES `controleGames_APS_BD`.`USUARIO` (`ID`));

-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`FUNCIONARIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`FUNCIONARIO` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`FUNCIONARIO` (
  `cracha` INT NOT NULL AUTO_INCREMENT,
  `PESSOA_CPF` CHAR(11) NOT NULL,
  `telefone` CHAR(11),
  PRIMARY KEY (`PESSOA_CPF`),
  UNIQUE (`cracha`),
  CONSTRAINT `fk_FUNCIONARIO_PESSOA1`
    FOREIGN KEY (`PESSOA_CPF`)
    REFERENCES `controleGames_APS_BD`.`PESSOA` (`CPF`) ON UPDATE CASCADE ON DELETE CASCADE);


-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`SUPERVISOR`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`SUPERVISOR` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`SUPERVISOR` (
  `usuario` INT NOT NULL,
  `FUNCIONARIO_PESSOA_CPF` CHAR(11) NOT NULL,
  PRIMARY KEY (`FUNCIONARIO_PESSOA_CPF`),
  UNIQUE(`usuario`),
  CONSTRAINT `fk_SUPERVISOR_FUNCIONARIO1`
    FOREIGN KEY (`FUNCIONARIO_PESSOA_CPF`)
    REFERENCES `controleGames_APS_BD`.`FUNCIONARIO` (`PESSOA_CPF`) ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT `fk_SUPERVISOR_USUARIO`
    FOREIGN KEY (`usuario`)
    REFERENCES `controleGames_APS_BD`.`USUARIO` (`ID`));



-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`FISCALIZADO_POR`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`FISCALIZADO_POR` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`FISCALIZADO_POR` (
  `FUNCIONARIO_PESSOA_CPF` CHAR(11) NOT NULL,
  `SUPERVISOR_FUNCIONARIO_PESSOA_CPF` CHAR(11),
  PRIMARY KEY (`FUNCIONARIO_PESSOA_CPF`),
  CONSTRAINT `fk_FISCALIZADO_POR_FUNCIONARIO1`
    FOREIGN KEY (`FUNCIONARIO_PESSOA_CPF`)
    REFERENCES `controleGames_APS_BD`.`FUNCIONARIO` (`PESSOA_CPF`) ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT `fk_FISCALIZADO_POR_SUPERVISOR1`
    FOREIGN KEY (`SUPERVISOR_FUNCIONARIO_PESSOA_CPF`)
    REFERENCES `controleGames_APS_BD`.`SUPERVISOR` (`FUNCIONARIO_PESSOA_CPF`) ON UPDATE CASCADE ON DELETE SET NULL);



-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`EMPRESA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`EMPRESA` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`EMPRESA` (
  `CNPJ` CHAR(14) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `telefone` CHAR(11) NULL,
  PRIMARY KEY (`CNPJ`));


-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`COMPRA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`COMPRA` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`COMPRA` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `preco_total` DECIMAL(10,2) NULL,
  `data` DATE NOT NULL,
  `EMPRESA_CNPJ` CHAR(14) NOT NULL,
  `SUPERVISOR_FUNCIONARIO_PESSOA_CPF` CHAR(11) NOT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `fk_COMPRA_EMPRESA1`
    FOREIGN KEY (`EMPRESA_CNPJ`)
    REFERENCES `controleGames_APS_BD`.`EMPRESA` (`CNPJ`) ON UPDATE CASCADE,
  CONSTRAINT `fk_COMPRA_SUPERVISOR1`
    FOREIGN KEY (`SUPERVISOR_FUNCIONARIO_PESSOA_CPF`)
    REFERENCES `controleGames_APS_BD`.`SUPERVISOR` (`FUNCIONARIO_PESSOA_CPF`) ON UPDATE CASCADE);



-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`PLATAFORMA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`PLATAFORMA` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`PLATAFORMA` (
  `ID` INT AUTO_INCREMENT,
  `nome` VARCHAR(20) NOT NULL,
  UNIQUE(`nome`),
  PRIMARY KEY (`ID`));




-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`GENERO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`GENERO` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`GENERO` (
  `ID` INT AUTO_INCREMENT,
  `nome` VARCHAR(20) NOT NULL,
  UNIQUE(`nome`),
  PRIMARY KEY (`ID`));




-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`JOGO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`JOGO` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`JOGO` (
  `codigo` INT NOT NULL,
  `titulo` VARCHAR(255) NOT NULL,
  `genero` INT NOT NULL,
  `plataforma` INT NOT NULL,
  `sinopse` LONGTEXT NULL,
  `lancamento` DATE NOT NULL,
  `faixa_etaria` INT NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `qtd_estoque` INT NOT NULL,
  `EMPRESA_CNPJ` CHAR(14) NOT NULL,
  PRIMARY KEY (`codigo`),
  CONSTRAINT `fk_JOGO_EMPRESA1`
    FOREIGN KEY (`EMPRESA_CNPJ`)
    REFERENCES `controleGames_APS_BD`.`EMPRESA` (`CNPJ`) ON UPDATE CASCADE,
  CONSTRAINT `fk_JOGO_PLATAFORMA`
    FOREIGN KEY (`plataforma`)
    REFERENCES `controleGames_APS_BD`.`PLATAFORMA` (`ID`),
  CONSTRAINT `fk_JOGO_GENERO`
    FOREIGN KEY (`genero`)
    REFERENCES `controleGames_APS_BD`.`GENERO` (`ID`)
    );
    
    
    
    
-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`COMPRA_CONTEM`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`COMPRA_CONTEM` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`COMPRA_CONTEM` (
  `JOGO_codigo` INT NOT NULL,
  `COMPRA_ID` INT NOT NULL,
  `quantidade` INT NOT NULL,
  `preco_unit` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`JOGO_codigo`, `COMPRA_ID`),
  CONSTRAINT `fk_JOGO_has_COMPRA_JOGO1`
    FOREIGN KEY (`JOGO_codigo`)
    REFERENCES `controleGames_APS_BD`.`JOGO` (`codigo`) ON UPDATE CASCADE,
  CONSTRAINT `fk_JOGO_has_COMPRA_COMPRA1`
    FOREIGN KEY (`COMPRA_ID`)
    REFERENCES `controleGames_APS_BD`.`COMPRA` (`ID`) ON DELETE CASCADE);




-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`CLIENTE_AVALIACAO_JOGO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`CLIENTE_AVALIACAO_JOGO` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`CLIENTE_AVALIACAO_JOGO` (
  `CLIENTE_PESSOA_CPF` CHAR(11) NOT NULL,
  `JOGO_codigo` INT NOT NULL,
  `nota` INT NOT NULL,
  PRIMARY KEY (`CLIENTE_PESSOA_CPF`, `JOGO_codigo`),
  CONSTRAINT `fk_CLIENTE_has_JOGO_CLIENTE1`
    FOREIGN KEY (`CLIENTE_PESSOA_CPF`)
    REFERENCES `controleGames_APS_BD`.`CLIENTE` (`PESSOA_CPF`) ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT `fk_CLIENTE_has_JOGO_JOGO1`
    FOREIGN KEY (`JOGO_codigo`)
    REFERENCES `controleGames_APS_BD`.`JOGO` (`codigo`) ON UPDATE CASCADE ON DELETE CASCADE);




-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`METODO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`METODO` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`METODO` (
  `ID` INT AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  UNIQUE(`nome`),
  PRIMARY KEY (`ID`));



-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`PEDIDO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`PEDIDO` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`PEDIDO` (
  `ID` INT AUTO_INCREMENT,
  `frete` DECIMAL(10,2) NULL,
  `data` DATE NOT NULL,
  `valor_total` DECIMAL(10,2) NOT NULL,
  `metodo_pagamento` INT NOT NULL,
  `CLIENTE_PESSOA_CPF` CHAR(11) NOT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `fk_PEDIDO_CLIENTE1`
    FOREIGN KEY (`CLIENTE_PESSOA_CPF`)
    REFERENCES `controleGames_APS_BD`.`CLIENTE` (`PESSOA_CPF`),
  CONSTRAINT `fk_PEDIDO_METODO`
    FOREIGN KEY (`metodo_pagamento`)
    REFERENCES `controleGames_APS_BD`.`METODO` (`ID`));



-- -----------------------------------------------------
-- Table `controleGames_APS_BD`.`PEDIDO_CONTEM`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controleGames_APS_BD`.`PEDIDO_CONTEM` ;

CREATE TABLE IF NOT EXISTS `controleGames_APS_BD`.`PEDIDO_CONTEM` (
  `PEDIDO_ID` INT NOT NULL,
  `JOGO_codigo` INT NOT NULL,
  `quantidade` INT NOT NULL,
  PRIMARY KEY (`PEDIDO_ID`, `JOGO_codigo`),
  CONSTRAINT `fk_PEDIDO_has_JOGO_PEDIDO1`
    FOREIGN KEY (`PEDIDO_ID`)
    REFERENCES `controleGames_APS_BD`.`PEDIDO` (`ID`) ON DELETE CASCADE,
  CONSTRAINT `fk_PEDIDO_has_JOGO_JOGO1`
    FOREIGN KEY (`JOGO_codigo`)
    REFERENCES `controleGames_APS_BD`.`JOGO` (`codigo`) ON UPDATE CASCADE);


DELIMITER //

CREATE TRIGGER USER_REMOVE_CLIENTE AFTER DELETE
ON CLIENTE FOR EACH ROW
BEGIN
	DELETE FROM USUARIO WHERE ID = OLD.usuario;
END//

CREATE TRIGGER USER_REMOVE_SUPERVISOR AFTER DELETE
ON SUPERVISOR FOR EACH ROW
BEGIN
	DELETE FROM USUARIO WHERE ID = OLD.usuario;
END//

DELIMITER ;
-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`PESSOA`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`PESSOA` (`CPF`, `nome_pessoa`, `data_nasc_pessoa`) VALUES ('78234536494', 'Jurema Romana', '1997-02-15');
INSERT INTO `controleGames_APS_BD`.`PESSOA` (`CPF`, `nome_pessoa`, `data_nasc_pessoa`) VALUES ('11736653660', 'João Camara', '1990-12-07');
INSERT INTO `controleGames_APS_BD`.`PESSOA` (`CPF`, `nome_pessoa`, `data_nasc_pessoa`) VALUES ('52867465435', 'Antonio Fernandes', '1999-03-17');
INSERT INTO `controleGames_APS_BD`.`PESSOA` (`CPF`, `nome_pessoa`, `data_nasc_pessoa`) VALUES ('73314993510', 'Mairieli Wessel', '1995-06-02');
INSERT INTO `controleGames_APS_BD`.`PESSOA` (`CPF`, `nome_pessoa`, `data_nasc_pessoa`) VALUES ('12345567898', 'Marcos Antonio Godoy', '1995-06-02');
INSERT INTO `controleGames_APS_BD`.`PESSOA` (`CPF`, `nome_pessoa`, `data_nasc_pessoa`) VALUES ('56380781188', 'Bruno Mendes Souza', '1996-05-15');
INSERT INTO `controleGames_APS_BD`.`PESSOA` (`CPF`, `nome_pessoa`, `data_nasc_pessoa`) VALUES ('54560161330', 'Darlan Felipe', '1998-09-11');
INSERT INTO `controleGames_APS_BD`.`PESSOA` (`CPF`, `nome_pessoa`, `data_nasc_pessoa`) VALUES ('54651643108', 'Lucas Henrique', '1989-08-30');
INSERT INTO `controleGames_APS_BD`.`PESSOA` (`CPF`, `nome_pessoa`, `data_nasc_pessoa`) VALUES ('12490072323', 'Michel Gomes', '2000-02-28');
INSERT INTO `controleGames_APS_BD`.`PESSOA` (`CPF`, `nome_pessoa`, `data_nasc_pessoa`) VALUES ('90146845170', 'Mohammed Lee', '1995-01-18');




-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`ESTADO`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`ESTADO` (`nome`) VALUES ('Parana');
INSERT INTO `controleGames_APS_BD`.`ESTADO` (`nome`) VALUES ('Santa Catarina');
INSERT INTO `controleGames_APS_BD`.`ESTADO` (`nome`) VALUES ('Sao Paulo');



-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`CIDADE`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`CIDADE` (`nome`, `ESTADO_ID`) VALUES ('Campo Mourao', 1);
INSERT INTO `controleGames_APS_BD`.`CIDADE` (`nome`, `ESTADO_ID`) VALUES ('Maringa', 1);
INSERT INTO `controleGames_APS_BD`.`CIDADE` (`nome`, `ESTADO_ID`) VALUES ('Jundiai', 3);
INSERT INTO `controleGames_APS_BD`.`CIDADE` (`nome`, `ESTADO_ID`) VALUES ('Florianopolis', 2);



-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`ENDERECO`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`ENDERECO` (`PESSOA_CPF`, `logradouro`, `nome`, `numero`, `bairro`, `CEP`, `CIDADE_ID`) VALUES ('78234536494', 'Rua', 'Palmeira', 59, 'Arvoredo', 98765400, 1);
INSERT INTO `controleGames_APS_BD`.`ENDERECO` (`PESSOA_CPF`, `logradouro`, `nome`, `numero`, `bairro`, `CEP`, `CIDADE_ID`) VALUES ('11736653660', 'Avenida', 'Capitao Indio Bandeira', 829, 'Centro', 87359005, 1);
INSERT INTO `controleGames_APS_BD`.`ENDERECO` (`PESSOA_CPF`, `logradouro`, `nome`, `numero`, `bairro`, `CEP`, `CIDADE_ID`) VALUES ('52867465435', 'Praca', 'Constantinopla', 42, 'Prometheus', 78694200, 2);
INSERT INTO `controleGames_APS_BD`.`ENDERECO` (`PESSOA_CPF`, `logradouro`, `nome`, `numero`, `bairro`, `CEP`, `CIDADE_ID`) VALUES ('73314993510', 'Rua', 'Capoeira', 489, 'Centro', 87298489, 3);
INSERT INTO `controleGames_APS_BD`.`ENDERECO` (`PESSOA_CPF`, `logradouro`, `nome`, `numero`, `bairro`, `CEP`, `CIDADE_ID`) VALUES ('12345567898', 'Avenida', '29 de Novembro', 1580, 'Centro', 87260278, 4);
INSERT INTO `controleGames_APS_BD`.`ENDERECO` (`PESSOA_CPF`, `logradouro`, `nome`, `numero`, `bairro`, `CEP`, `CIDADE_ID`) VALUES ('56380781188', 'Rua', 'Pombo', 125, 'Floriano das Neves', 12978942, 3);
INSERT INTO `controleGames_APS_BD`.`ENDERECO` (`PESSOA_CPF`, `logradouro`, `nome`, `numero`, `bairro`, `CEP`, `CIDADE_ID`) VALUES ('54651643108', 'Praca', 'João Alvarez', 1470, 'Centro', 12345678, 4);
INSERT INTO `controleGames_APS_BD`.`ENDERECO` (`PESSOA_CPF`, `logradouro`, `nome`, `numero`, `bairro`, `CEP`, `CIDADE_ID`) VALUES ('12490072323', 'Avenida', 'Iamar J. Santos', 375, 'Ocarina', 78945612, 2);
INSERT INTO `controleGames_APS_BD`.`ENDERECO` (`PESSOA_CPF`, `logradouro`, `nome`, `numero`, `bairro`, `CEP`, `CIDADE_ID`) VALUES ('90146845170', 'Rua', 'José Borges', 441, 'Centro', 35715982, 1);


-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`USUARIO`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`USUARIO` (`user`, `senha`) VALUES ('romana', '53e6086284353cb73d4979f08537d950');
INSERT INTO `controleGames_APS_BD`.`USUARIO` (`user`, `senha`) VALUES ('camaraJose', '5527af1a9848339f9d78e74b4b7472c3');
INSERT INTO `controleGames_APS_BD`.`USUARIO` (`user`, `senha`) VALUES ('demonioDaGaroa', 'bbc667e139476e37b5f5bd3d35b6ec6b');
INSERT INTO `controleGames_APS_BD`.`USUARIO` (`user`, `senha`) VALUES ('mWessel', '908d3f20d1d1473fb16bd7599cf47928');
INSERT INTO `controleGames_APS_BD`.`USUARIO` (`user`, `senha`) VALUES ('Godoy', '54ad4196220b983a194b7a22d9f68b23');
INSERT INTO `controleGames_APS_BD`.`USUARIO` (`user`, `senha`) VALUES ('mlee', 'cb17bd2285f26466a477579632350588');
INSERT INTO `controleGames_APS_BD`.`USUARIO` (`user`, `senha`) VALUES ('sup42', 'cb17bd2285f26466a477579632350588');


-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`CLIENTE`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`CLIENTE` (`PESSOA_CPF`, `usuario`, `ultima_compra`, `email`) VALUES ('78234536494', 1, '2017-02-15', 'jurema@romana.com');
INSERT INTO `controleGames_APS_BD`.`CLIENTE` (`PESSOA_CPF`, `usuario`, `ultima_compra`, `email`) VALUES ('11736653660', 2,'2015-10-07', 'jose@camara.com');
INSERT INTO `controleGames_APS_BD`.`CLIENTE` (`PESSOA_CPF`, `usuario`, `ultima_compra`, `email`) VALUES ('52867465435', 3,'2017-01-20', 'fernandes@gmail.com');
INSERT INTO `controleGames_APS_BD`.`CLIENTE` (`PESSOA_CPF`, `usuario`, `ultima_compra`, `email`) VALUES ('73314993510', 4, '2010-05-15', 'mwessel@gmail.com');
INSERT INTO `controleGames_APS_BD`.`CLIENTE` (`PESSOA_CPF`, `usuario`, `ultima_compra`, `email`) VALUES ('12345567898', 5, '2016-12-02', 'godoy2017@hotmail.com');



-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`FUNCIONARIO`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`FUNCIONARIO` (`cracha`, `PESSOA_CPF`) VALUES (12, '56380781188');
INSERT INTO `controleGames_APS_BD`.`FUNCIONARIO` (`cracha`, `PESSOA_CPF`) VALUES (23, '54560161330');
INSERT INTO `controleGames_APS_BD`.`FUNCIONARIO` (`cracha`, `PESSOA_CPF`) VALUES (34, '54651643108');
INSERT INTO `controleGames_APS_BD`.`FUNCIONARIO` (`cracha`, `PESSOA_CPF`) VALUES (45, '12490072323');
INSERT INTO `controleGames_APS_BD`.`FUNCIONARIO` (`cracha`, `PESSOA_CPF`) VALUES (56, '90146845170');



-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`SUPERVISOR`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`SUPERVISOR` (`usuario`, `FUNCIONARIO_PESSOA_CPF`) VALUES (6, '90146845170');
INSERT INTO `controleGames_APS_BD`.`SUPERVISOR` (`usuario`, `FUNCIONARIO_PESSOA_CPF`) VALUES (7, '12490072323');




-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`FISCALIZADO_POR`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`FISCALIZADO_POR` (`FUNCIONARIO_PESSOA_CPF`,`SUPERVISOR_FUNCIONARIO_PESSOA_CPF`) VALUES ('56380781188','90146845170');
INSERT INTO `controleGames_APS_BD`.`FISCALIZADO_POR` (`FUNCIONARIO_PESSOA_CPF`,`SUPERVISOR_FUNCIONARIO_PESSOA_CPF`) VALUES ('54560161330','12490072323');
INSERT INTO `controleGames_APS_BD`.`FISCALIZADO_POR` (`FUNCIONARIO_PESSOA_CPF`,`SUPERVISOR_FUNCIONARIO_PESSOA_CPF`) VALUES ('54651643108','12490072323');
INSERT INTO `controleGames_APS_BD`.`FISCALIZADO_POR` (`FUNCIONARIO_PESSOA_CPF`,`SUPERVISOR_FUNCIONARIO_PESSOA_CPF`) VALUES ('12490072323','90146845170');
INSERT INTO `controleGames_APS_BD`.`FISCALIZADO_POR` (`FUNCIONARIO_PESSOA_CPF`,`SUPERVISOR_FUNCIONARIO_PESSOA_CPF`) VALUES ('90146845170', NULL);




-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`EMPRESA`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`EMPRESA` (`CNPJ`, `nome`, `telefone`) VALUES ('27082686000163', 'RockStar', '55121345678');
INSERT INTO `controleGames_APS_BD`.`EMPRESA` (`CNPJ`, `nome`, `telefone`) VALUES ('93111580000175', 'Activision  Blizzard', '11258369458');
INSERT INTO `controleGames_APS_BD`.`EMPRESA` (`CNPJ`, `nome`, `telefone`) VALUES ('38644428000140', 'Ubisoft', '99123789654');
INSERT INTO `controleGames_APS_BD`.`EMPRESA` (`CNPJ`, `nome`, `telefone`) VALUES ('47462545000183', 'Nintendo', '21258741369');
INSERT INTO `controleGames_APS_BD`.`EMPRESA` (`CNPJ`, `nome`, `telefone`) VALUES ('62313357000187', 'Eletronic Arts', '12365478955');




-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`COMPRA`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`COMPRA` (`preco_total`, `data`, `EMPRESA_CNPJ`, `SUPERVISOR_FUNCIONARIO_PESSOA_CPF`) VALUES (613.9, '2016-11-25', '47462545000183', '90146845170');
INSERT INTO `controleGames_APS_BD`.`COMPRA` (`preco_total`, `data`, `EMPRESA_CNPJ`, `SUPERVISOR_FUNCIONARIO_PESSOA_CPF`) VALUES (1513.5, '2016-12-29', '38644428000140', '90146845170');
INSERT INTO `controleGames_APS_BD`.`COMPRA` (`preco_total`, `data`, `EMPRESA_CNPJ`, `SUPERVISOR_FUNCIONARIO_PESSOA_CPF`) VALUES (300.0, '2017-01-25', '62313357000187', '90146845170');
INSERT INTO `controleGames_APS_BD`.`COMPRA` (`preco_total`, `data`, `EMPRESA_CNPJ`, `SUPERVISOR_FUNCIONARIO_PESSOA_CPF`) VALUES (329.5, '2017-02-17', '93111580000175', '90146845170');




-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`PLATAFORMA`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`PLATAFORMA` (`nome`) VALUES ('Wii');
INSERT INTO `controleGames_APS_BD`.`PLATAFORMA` (`nome`) VALUES ('Xbox');
INSERT INTO `controleGames_APS_BD`.`PLATAFORMA` (`nome`) VALUES ('PC');




-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`METODO`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`METODO` (`nome`) VALUES ('Boleto');
INSERT INTO `controleGames_APS_BD`.`METODO` (`nome`) VALUES ('Depósito Bancário');
INSERT INTO `controleGames_APS_BD`.`METODO` (`nome`) VALUES ('Cartão de Crédito');






-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`GENERO`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`GENERO` (`nome`) VALUES ('Plataforma');
INSERT INTO `controleGames_APS_BD`.`GENERO` (`nome`) VALUES ('FPS');
INSERT INTO `controleGames_APS_BD`.`GENERO` (`nome`) VALUES ('Corrida');
INSERT INTO `controleGames_APS_BD`.`GENERO` (`nome`) VALUES ('Ação');
INSERT INTO `controleGames_APS_BD`.`GENERO` (`nome`) VALUES ('Aventura');





-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`JOGO`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`JOGO` (`codigo`, `titulo`, `genero`, `plataforma`, `sinopse`, `lancamento`, `faixa_etaria`, `preco`, `qtd_estoque`, `EMPRESA_CNPJ`) VALUES (4589, 'Super Mario', 1, 1, 'Super Mario Bros. é um jogo eletrônico lançado pela Nintendo em 1985. Considerado um clássico, Super Mario Bros. foi um dos primeiros JOGO de plataforma com rolagem lateral, recurso conhecido em inglês como side-scrolling', '2006-12-25', 0, 60.0, 0, '47462545000183');
INSERT INTO `controleGames_APS_BD`.`JOGO` (`codigo`, `titulo`, `genero`, `plataforma`, `sinopse`, `lancamento`, `faixa_etaria`, `preco`, `qtd_estoque`, `EMPRESA_CNPJ`) VALUES (7894, 'Call of Duty: Infite Warface', 2, 2, 'Call of Duty (frequentemente abreviado como CoD) é uma série de videoJOGO na primeira pessoa. A série começou no PC, mais tarde expandindo-se para os vários tipos de consolas. Também foram lançados vários JOGO spin-off. ', '2003-11-04', 16, 95.9, 5, '93111580000175');
INSERT INTO `controleGames_APS_BD`.`JOGO` (`codigo`, `titulo`, `genero`, `plataforma`, `sinopse`, `lancamento`, `faixa_etaria`, `preco`, `qtd_estoque`, `EMPRESA_CNPJ`) VALUES (1549, 'Need For Speed', 3, 3, 'Need for Speed é um jogo eletrônico de corrida que foi produzido pelo estúdio Ghost Games e lançado pela Electronic Arts para as plataformas PlayStation 4, Xbox One e para Microsoft Windows. O game, que possui uma jogabilidade não linear dá ao jogador a liberdade de explorar totalmente os cenários, é o vigésimo primeiro da franquia Need for Speed, sendo, porém, um reboot a esta popular série.', '2015-11-03', 12, 90.0, 2, '62313357000187');
INSERT INTO `controleGames_APS_BD`.`JOGO` (`codigo`, `titulo`, `genero`, `plataforma`, `sinopse`, `lancamento`, `faixa_etaria`, `preco`, `qtd_estoque`, `EMPRESA_CNPJ`) VALUES (1548, 'Far Cry Primal', 4, 3, 'Far Cry Primal é um videojogo de ação-aventura na primeira pessoa desenvolvido pela Ubisoft Montreal com a assistência de Ubisoft Toronto, Ubisoft Kiev e Ubisoft Shanghai e publicado pela Ubisoft.', '2016-03-01', 18, 165.0, 1, '38644428000140');




-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`COMPRA_CONTEM`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`COMPRA_CONTEM` (`JOGO_codigo`, `COMPRA_ID`, `quantidade`, `preco_unit`) VALUES (4589, 1, 15, 40.9);
INSERT INTO `controleGames_APS_BD`.`COMPRA_CONTEM` (`JOGO_codigo`, `COMPRA_ID`, `quantidade`, `preco_unit`) VALUES (1548, 2, 15, 120.9);
INSERT INTO `controleGames_APS_BD`.`COMPRA_CONTEM` (`JOGO_codigo`, `COMPRA_ID`, `quantidade`, `preco_unit`) VALUES (1549, 3, 5, 60);
INSERT INTO `controleGames_APS_BD`.`COMPRA_CONTEM` (`JOGO_codigo`, `COMPRA_ID`, `quantidade`, `preco_unit`) VALUES (7894, 4, 5, 65.9);


-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`CLIENTE_AVALIACAO_JOGO`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`CLIENTE_AVALIACAO_JOGO` (`CLIENTE_PESSOA_CPF`, `JOGO_codigo`, `nota`) VALUES ('78234536494', 1548, 5);
INSERT INTO `controleGames_APS_BD`.`CLIENTE_AVALIACAO_JOGO` (`CLIENTE_PESSOA_CPF`, `JOGO_codigo`, `nota`) VALUES ('73314993510', 4589, 3);




-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`PEDIDO`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`PEDIDO` (`frete`, `data`, `valor_total`, `metodo_pagamento`, `CLIENTE_PESSOA_CPF`) VALUES (12.90, '2017-01-25', 72.90, 1, '73314993510');
INSERT INTO `controleGames_APS_BD`.`PEDIDO` (`frete`, `data`, `valor_total`, `metodo_pagamento`, `CLIENTE_PESSOA_CPF`) VALUES (15.60, '2016-12-11', 345.60, 2, '52867465435');




-- -----------------------------------------------------
-- Data for table `controleGames_APS_BD`.`PEDIDO_CONTEM`
-- -----------------------------------------------------
INSERT INTO `controleGames_APS_BD`.`PEDIDO_CONTEM` (`PEDIDO_ID`, `JOGO_codigo`, `quantidade`) VALUES (1, 4589, 1);
INSERT INTO `controleGames_APS_BD`.`PEDIDO_CONTEM` (`PEDIDO_ID`, `JOGO_codigo`, `quantidade`) VALUES (2, 1548, 2);
