/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;


CREATE DATABASE `ecommerce`;
USE `ecommerce`;
CREATE TABLE `categorias` (
  `cod_categoria` int(10) unsigned NOT NULL auto_increment,
  `descricao` varchar(100) default NULL,
  PRIMARY KEY  (`cod_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `categorias` VALUES (1,'Informática');
INSERT INTO `categorias` VALUES (2,'Eletrônicos');
INSERT INTO `categorias` VALUES (3,'Ferragens');
INSERT INTO `categorias` VALUES (4,'Cases');
CREATE TABLE `fotos_produtos` (
  `cod_foto` int(10) unsigned NOT NULL auto_increment,
  `cod_produto` int(10) unsigned default NULL,
  `descricao` varchar(100) default NULL,
  `extensao` varchar(30) default NULL,
  PRIMARY KEY  (`cod_foto`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

INSERT INTO `fotos_produtos` VALUES (9,4,'Frente','jpg');
INSERT INTO `fotos_produtos` VALUES (10,1,'Frente','jpg');
INSERT INTO `fotos_produtos` VALUES (11,2,'Frente','jpg');
INSERT INTO `fotos_produtos` VALUES (13,4,'abc','jpg');
INSERT INTO `fotos_produtos` VALUES (14,4,'asfd','jpg');
INSERT INTO `fotos_produtos` VALUES (15,4,'sdfasfd','jpg');
INSERT INTO `fotos_produtos` VALUES (16,5,'1','jpg');
INSERT INTO `fotos_produtos` VALUES (17,5,'2','jpg');
INSERT INTO `fotos_produtos` VALUES (18,5,'3','jpg');
INSERT INTO `fotos_produtos` VALUES (19,5,'4','jpg');
INSERT INTO `fotos_produtos` VALUES (20,5,'5','jpg');
INSERT INTO `fotos_produtos` VALUES (21,1,'2','jpg');
INSERT INTO `fotos_produtos` VALUES (22,2,'2','jpg');
INSERT INTO `fotos_produtos` VALUES (23,2,'3','jpg');
INSERT INTO `fotos_produtos` VALUES (24,6,'1','jpg');
INSERT INTO `fotos_produtos` VALUES (25,7,'1','jpg');
INSERT INTO `fotos_produtos` VALUES (26,3,'2','jpg');
INSERT INTO `fotos_produtos` VALUES (27,3,'3','jpg');
INSERT INTO `fotos_produtos` VALUES (28,3,'4','jpg');
INSERT INTO `fotos_produtos` VALUES (30,3,'5','jpg');
CREATE TABLE `marcas` (
  `cod_marca` int(10) unsigned NOT NULL auto_increment,
  `descricao` varchar(100) default NULL,
  PRIMARY KEY  (`cod_marca`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `marcas` VALUES (1,'Acer');
INSERT INTO `marcas` VALUES (2,'Itautec');
INSERT INTO `marcas` VALUES (3,'Philco');
INSERT INTO `marcas` VALUES (4,'Sony');
INSERT INTO `marcas` VALUES (5,'LG');
INSERT INTO `marcas` VALUES (6,'AMG Cases');
INSERT INTO `marcas` VALUES (7,'Bright');
INSERT INTO `marcas` VALUES (8,'Kingston');
CREATE TABLE `produtos` (
  `cod_produto` int(10) unsigned NOT NULL auto_increment,
  `descricao` varchar(100) default NULL,
  `unidade` varchar(50) default NULL,
  `valor_unitario` float default NULL,
  `qde_estoque` float default NULL,
  `destaque` char(1) default 'N',
  `cod_marca` int(10) unsigned default NULL,
  `cod_categoria` int(10) unsigned default NULL,
  `descricao_detalhada` text,
  PRIMARY KEY  (`cod_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `produtos` VALUES (1,'Notebook Dual Core','Pc',1799.58,5,'S',1,1,'Notebook Dual Core\r\n1 GB RAM\r\n40 GB HD');
INSERT INTO `produtos` VALUES (2,'Pentium Core 2 Duo','Pc',1345.99,10,'S',2,1,'Pentium Core 2 Duo 1GB RAM, 160GB HD\r\nMonitor LCD 19\"');
INSERT INTO `produtos` VALUES (3,'TV LCD 42\"','Pc',2850.1,7,'S',5,2,'TV 42\" LCD Full HD Scarlet - 42LG64FR - (1.920 x 1.080 pixels) - 3 entradas HDMI, Entrada USB - LG <p>\r\nTV LCD 42\" possui Full HD que garante a máxima qualidade de imagem. <br>\r\nCom design exclusivo, sofisticado e cheio de personalidade, este produto<br> \r\npossui entrada USB Plus para fotos, vídeos e músicas. Intelligent sensor, <br>\r\numa tecnologia que ajusta automaticamente a imagem da TV conforme <br>\r\na luz do ambiente, além disso, 3 conexões digitais HDMI para que <br>\r\nvocê possa conectar seus aparelhos, tais como, home theather, <br>\r\nDVD players e assitir a seus filmes favoritos com excelente resolução <br>\r\nde imagem. Inspire-se!\r\n');
INSERT INTO `produtos` VALUES (4,'Micro-System 300w','Pc',499.99,20,'S',3,2,'Curta músicas MP3/WMA diretamente de dispositivos USB portáteis<br>\r\nReproduza CDs de MP3/WMA, CD e CD-RW<br>\r\nMP3 Link para reprodução de músicas portáteis. <br>\r\nIncredible Surround - garante um som da melhor qualidade<br>\r\nControle de som digital para configurações otimizadas de estilo de música<br>\r\nReforço dinâmico de graves para sons profundos e dinâmicos<br>\r\nCurta 300 watts de potência de saída<br>\r\nTimer desp./deslig. automático<br>\r\nUnidade lógica de toca-fitas <br>');
INSERT INTO `produtos` VALUES (5,'Case Retangular para Jazz Bass','Pc',350,2,'N',6,4,'Case para Contra Baixo modelo Jazz Bass 4 Cordas <br>\r\nFeito em madeira compensada e revestido com couro sintético <br>\r\nInterior revestido por pelúcia.');
INSERT INTO `produtos` VALUES (6,'Mouse Óptico','Pc',12.5,50,'N',7,1,'Mouse Óptico <br>\r\nUSB');
INSERT INTO `produtos` VALUES (7,'Pendrive 4GB','Pc',49.8,14,'N',8,1,'Pendrive Kingston <br>\r\nCapacidade de armazenamento: 4GB <br>\r\nGarantia de 6 meses');

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
