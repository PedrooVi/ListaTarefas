CREATE DATABASE  IF NOT EXISTS `listabd` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `listabd`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: listabd
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.10-MariaDB

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
-- Table structure for table `tarefas`
--

DROP TABLE IF EXISTS `tarefas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text CHARACTER SET latin1,
  `estado` int(11) DEFAULT '0',
  `usuarios_idusuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_tarefa` (`usuarios_idusuario`),
  CONSTRAINT `fk_usuario_tarefa` FOREIGN KEY (`usuarios_idusuario`) REFERENCES `usuarios` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarefas`
--

LOCK TABLES `tarefas` WRITE;
/*!40000 ALTER TABLE `tarefas` DISABLE KEYS */;
INSERT INTO `tarefas` VALUES (1,'terminar o site',0,5),(2,'terminar o backend',0,5),(4,'primeira tarefa',1,18),(5,'segunda tarefa',1,18),(6,'segunda tarefa',0,18),(7,'12345',0,21),(8,'12345678',0,21),(9,'terminar o site denovo denoboooo',0,21),(10,'Primeira Tarefa Ismael',0,25),(11,'nova tarefinha',0,18),(12,'ismael',0,18),(13,'ismael',0,18),(14,'ismael',0,18),(15,'ismael',0,18),(16,'213123',1,18),(17,'awd',0,18),(18,'asdwd',0,18),(19,'asdwd',0,18),(20,'asdwd',0,18),(21,'asdwd',0,18),(22,'asdwd',0,18),(23,'nova tarefinha',0,18),(24,'213123',0,18),(25,'primeira tarefa',0,28),(26,'nova tarefinha',0,28),(27,'ponte',0,28),(28,'ponte',0,28),(29,'testando hipoteses',1,18),(30,'terminar o filtro',0,18),(31,'terminando o filtro',0,18),(32,'123',0,18),(33,'123',0,18),(34,'1234',0,18),(35,'Terminar de sentir no dente',0,29);
/*!40000 ALTER TABLE `tarefas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `numerotelefone` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `senha` varchar(16) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (5,'123','isaac','123123','isaac'),(6,'2123','isaac','123','isaac'),(7,'2123','isaac','123','isaac'),(8,'123','isaac','123','isaac'),(9,'nome','register_email','telefone','password_confirm'),(10,'isaac@teste.funciona','isaacromero@gmgmgmg.com','1234','12345678'),(11,'isaacromerinho','isaacromerinho@gmail.com','12345','12345678'),(12,'isaacromerinho','isaacromerinho@gmail.com','12345','12345678'),(13,'pedro teste','pedrovivivi@ogogogo','123546987','12345678'),(14,'pedro teste','pedrovivivi@ogogogo','123546987','12345678'),(15,'pedro teste','pedrovivivi@ogogogo','123546987','12345678'),(16,'teste2','teste@teste.teste','4012','12345678'),(17,'teste3','teste@teste.teste','8922','12345678'),(18,'Isaac Romero','is4acromro@gmail.com','98888888','12345678'),(19,'nome teste','nometeste@gmail.com','123123123','123456789'),(20,'Teste Teste','testando@gmail.com','40028922','12345678'),(21,'carlos','carlos@eu.com','123','12345678'),(22,'carlos','carlos@eu.com','123','12345678'),(23,'isaac','enzo@enzo.enzo','666','12345678'),(24,'Testizinho de sexta','testiziho@gmail.com','123456784423123','12345678'),(25,'Ismael Ramires','xit9ramiresz@hotmial.com','','1234561234'),(26,'1234','1234555555','55555555','55555555'),(27,'tesstando','tesstando@gmail.com','','12345678'),(28,'Isaac Romero','is4acromro@gmail.com1111','131231231231231','12345678'),(29,'Layane Gomes','layanegomes@gmail.com','319888888888','12345678');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-18 10:25:20
