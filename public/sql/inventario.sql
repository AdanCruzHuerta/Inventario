CREATE DATABASE  IF NOT EXISTS `Inventario` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `Inventario`;
-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: Inventario
-- ------------------------------------------------------
-- Server version	5.7.11

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
-- Table structure for table `accesorio`
--

DROP TABLE IF EXISTS `accesorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accesorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `serie` varchar(45) DEFAULT NULL,
  `precio` double NOT NULL,
  `caracteristica` text COMMENT 'Caracteristicas adicionales que ayuden a identificar el accesorio',
  `estatus` varchar(45) NOT NULL COMMENT '1.- Asignada\n2.- No funciona\n3.- Partes\n4.- En reparación\n5.- En garantía\n6.- Baja\n7.- Almacenada',
  `fecha_asignacion` date DEFAULT NULL,
  `fecha_compra` date NOT NULL,
  `equipo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_accesorio_equipo1_idx` (`equipo_id`),
  CONSTRAINT `fk_accesorio_equipo1` FOREIGN KEY (`equipo_id`) REFERENCES `equipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accesorio`
--

LOCK TABLES `accesorio` WRITE;
/*!40000 ALTER TABLE `accesorio` DISABLE KEYS */;
INSERT INTO `accesorio` VALUES (1,'Teclado ','Acteck','T100','T100ABC',350,'Sin observaciones','1','2016-07-05','2016-07-01',2);
/*!40000 ALTER TABLE `accesorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'Sistemas'),(2,'Recursos humanos'),(3,'Telemarketing'),(4,'Almacén 1'),(5,'Compras'),(6,'Credito y Cobranza'),(8,'Surtido'),(9,'Embarques'),(10,'Intendencia'),(11,'Mantenimiento'),(12,'Seguridad'),(13,'Contabilidad'),(14,'Almacén 2');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento_has_impresora`
--

DROP TABLE IF EXISTS `departamento_has_impresora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento_has_impresora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departamento_id` int(11) NOT NULL,
  `impresora_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`departamento_id`,`impresora_id`),
  KEY `fk_departamento_has_impresora_impresora1_idx` (`impresora_id`),
  KEY `fk_departamento_has_impresora_departamento1_idx` (`departamento_id`),
  CONSTRAINT `fk_departamento_has_impresora_departamento1` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_departamento_has_impresora_impresora1` FOREIGN KEY (`impresora_id`) REFERENCES `impresora` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento_has_impresora`
--

LOCK TABLES `departamento_has_impresora` WRITE;
/*!40000 ALTER TABLE `departamento_has_impresora` DISABLE KEYS */;
INSERT INTO `departamento_has_impresora` VALUES (1,2,1),(2,1,1),(3,3,1);
/*!40000 ALTER TABLE `departamento_has_impresora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `Departamento_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Empleado_Departamento_idx` (`Departamento_id`),
  CONSTRAINT `fk_Empleado_Departamento` FOREIGN KEY (`Departamento_id`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (1,'Adán Cruz Huerta',1),(3,'Christian Magallon',1);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipo`
--

DROP TABLE IF EXISTS `equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `precio` double NOT NULL,
  `memoria` varchar(45) DEFAULT NULL,
  `procesador` varchar(45) DEFAULT NULL,
  `caracteristica` text,
  `estatus` varchar(45) NOT NULL COMMENT '1.- Asignada\n2.- No funciona\n3.- Partes\n4.- En reparación\n5.- En garantía\n6.- Baja\n7.- Almacenada',
  `tipo` varchar(45) DEFAULT NULL COMMENT '1.-Laptop\n2.-Computadora de Escritorio\n',
  `fecha_instalacion` date DEFAULT NULL,
  `fecha_compra` date NOT NULL,
  `Empleado_id` int(11) DEFAULT NULL,
  `sap_instalado` int(11) DEFAULT NULL COMMENT '1 - Si\n2 - No',
  `fecha_ultimo_mantenimiento` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Equipo_Empleado1_idx` (`Empleado_id`),
  CONSTRAINT `fk_Equipo_Empleado1` FOREIGN KEY (`Empleado_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo`
--

LOCK TABLES `equipo` WRITE;
/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
INSERT INTO `equipo` VALUES (2,'Laptop','Lenovo','Pavilion dv4','GSTYYTABSJSD',12321,'4','i7','Ninguna','1',NULL,'2016-07-04','2016-07-01',NULL,2,'2016-07-06');
/*!40000 ALTER TABLE `equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `impresora`
--

DROP TABLE IF EXISTS `impresora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `impresora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `precio` varchar(45) NOT NULL,
  `caracteristica` text COMMENT 'Caracteristicas adicionales que ayuden a identificar mejor la impresora',
  `estatus` varchar(45) NOT NULL COMMENT '1.- Asignada\n2.- No funciona\n3.- Partes\n4.- En reparación\n5.- En garantía\n6.- Baja\n7.- Almacenada',
  `tipo` varchar(45) DEFAULT NULL COMMENT '1.- Impresoras Laser\n2.-Inyeccion de tinta',
  `fecha_instalacion` datetime DEFAULT NULL,
  `fecha_compra` datetime NOT NULL,
  `fecha_ultimo_mantenimiento` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `impresora`
--

LOCK TABLES `impresora` WRITE;
/*!40000 ALTER TABLE `impresora` DISABLE KEYS */;
INSERT INTO `impresora` VALUES (1,'Lexmark','Lexmark','LXM100','GSTYYTABSJSD','7500','','1','Inyección de Tinta','2016-07-04 00:00:00','2016-07-01 00:00:00','2016-07-06 00:00:00');
/*!40000 ALTER TABLE `impresora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mantenimiento`
--

DROP TABLE IF EXISTS `mantenimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mantenimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `estatus` varchar(45) NOT NULL COMMENT 'define el tipo de mantenimiento que se efectuo\n\n1.- Preventivo\n2.- Correctivo',
  `fecha_mantenimiento` date NOT NULL,
  `descripcion` text COMMENT 'se coloca el motivo o que fue lo que se le hizo de mantenimiento',
  `impresora_id` int(11) DEFAULT NULL,
  `Equipo_id` int(11) DEFAULT NULL,
  `tipo_mantenimiento` int(11) DEFAULT NULL COMMENT '1 Correctivo\n2 Preventivo',
  `accesorio_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mantenimiento_impresora1_idx` (`impresora_id`),
  KEY `fk_mantenimiento_Equipo1_idx` (`Equipo_id`),
  KEY `fk_mantenimiento_accesorio_idx` (`accesorio_id`),
  CONSTRAINT `fk_mantenimiento_Equipo1` FOREIGN KEY (`Equipo_id`) REFERENCES `equipo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_mantenimiento_accesorio` FOREIGN KEY (`accesorio_id`) REFERENCES `accesorio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_mantenimiento_impresora1` FOREIGN KEY (`impresora_id`) REFERENCES `impresora` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mantenimiento`
--

LOCK TABLES `mantenimiento` WRITE;
/*!40000 ALTER TABLE `mantenimiento` DISABLE KEYS */;
INSERT INTO `mantenimiento` VALUES (1,'Primer mantenimiento','2','2016-07-08','Ninguno',NULL,2,NULL,NULL);
/*!40000 ALTER TABLE `mantenimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(80) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'christian1350@hotmail.com','$2y$10$kD9/0UQIOphwTw5g3GbHRunTmcsrF061rigp3R5XZEePi33U2ZxjO','2016-07-02 14:43:18','2016-07-08 23:06:06','6vj3vQSeH19Ma4qcUKswbBC5UkqBOnQh9KIocbcbo8jWifopOXn692FCoYUl');
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

-- Dump completed on 2016-07-08 18:12:45
