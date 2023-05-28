-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: autos
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `colores`
--

DROP TABLE IF EXISTS `colores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colores` (
  `id_color` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(20) NOT NULL,
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colores`
--

LOCK TABLES `colores` WRITE;
/*!40000 ALTER TABLE `colores` DISABLE KEYS */;
INSERT INTO `colores` VALUES (1,'Azul'),(2,'Rojo'),(3,'Verde'),(4,'Café'),(5,'Plateado'),(6,'Negro'),(7,'Blanco');
/*!40000 ALTER TABLE `colores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `combustible`
--

DROP TABLE IF EXISTS `combustible`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `combustible` (
  `id_combustible` int(11) NOT NULL AUTO_INCREMENT,
  `combustible` varchar(40) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_combustible`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `combustible`
--

LOCK TABLES `combustible` WRITE;
/*!40000 ALTER TABLE `combustible` DISABLE KEYS */;
INSERT INTO `combustible` VALUES (1,'Gasolina',NULL),(2,'Diesel',NULL);
/*!40000 ALTER TABLE `combustible` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos_autos`
--

DROP TABLE IF EXISTS `fotos_autos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos_autos` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `id_vehiculo` int(11) NOT NULL,
  `ubicacion` varchar(200) NOT NULL,
  PRIMARY KEY (`correlativo`),
  KEY `id_vehiculo` (`id_vehiculo`),
  CONSTRAINT `fotos_autos_ibfk_1` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`correlativo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos_autos`
--

LOCK TABLES `fotos_autos` WRITE;
/*!40000 ALTER TABLE `fotos_autos` DISABLE KEYS */;
INSERT INTO `fotos_autos` VALUES (1,6,'img/fotosPrueba/hiundayTucsonfrontal.jpg'),(2,6,'img/fotosPrueba/hiundayTucsontrasera.jpg'),(3,7,'img/fotosPrueba/toyotalado.jpg'),(5,9,'img/fotosPrueba/hiundayTucsontrasera.jpg'),(7,12,'img/fotosPrueba/rand.jpg'),(8,13,'img/fotosPrueba/subaru1.jpg'),(9,13,'img/fotosPrueba/subaru2.jpg'),(10,16,'img/fotosPrueba/totoyata2.jpg'),(11,16,'img/fotosPrueba/totoyota3.jpg'),(12,16,'img/fotosPrueba/toyota1.jpg'),(13,16,'img/fotosPrueba/toyota4.jpg'),(14,16,'img/fotosPrueba/toyota5.jpg');
/*!40000 ALTER TABLE `fotos_autos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marcas`
--

DROP TABLE IF EXISTS `marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marcas` (
  `id_marcar` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_marcar`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcas`
--

LOCK TABLES `marcas` WRITE;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` VALUES (1,'Toyota',NULL),(2,'Nissan',NULL),(3,'Mitsubishi',NULL),(4,'Honda',NULL),(5,'Suzuki',NULL),(6,'Hyundai',NULL),(7,'Mazda',NULL);
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_vehiculo`
--

DROP TABLE IF EXISTS `tipo_vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_vehiculo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_vehiculo`
--

LOCK TABLES `tipo_vehiculo` WRITE;
/*!40000 ALTER TABLE `tipo_vehiculo` DISABLE KEYS */;
INSERT INTO `tipo_vehiculo` VALUES (1,'Sedán',NULL),(2,'Hatchback',NULL),(3,'Camioneta',NULL),(4,'Pick-up',NULL),(5,'Panel',NULL);
/*!40000 ALTER TABLE `tipo_vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `traccion`
--

DROP TABLE IF EXISTS `traccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `traccion` (
  `id_traccion` int(11) NOT NULL AUTO_INCREMENT,
  `traccion` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_traccion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traccion`
--

LOCK TABLES `traccion` WRITE;
/*!40000 ALTER TABLE `traccion` DISABLE KEYS */;
INSERT INTO `traccion` VALUES (1,'4x4',NULL),(2,'4x2',NULL);
/*!40000 ALTER TABLE `traccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transmision`
--

DROP TABLE IF EXISTS `transmision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transmision` (
  `id_transmicion` int(11) NOT NULL AUTO_INCREMENT,
  `transmision` varchar(20) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_transmicion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transmision`
--

LOCK TABLES `transmision` WRITE;
/*!40000 ALTER TABLE `transmision` DISABLE KEYS */;
INSERT INTO `transmision` VALUES (1,'Mecanica',NULL),(2,'Automatica',NULL),(3,'Triptonic',NULL);
/*!40000 ALTER TABLE `transmision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (10,'eduardo morales','eduardo','$2y$10$eL8a6iVSLo4Xld5sVAnSquSDT/M5w5PYAh8sIVPfNKiFy/P5KiGeq'),(11,'eduardo morales','eduardo2','$2y$10$eoIU5xo6x3rNILxfKccF3u.KQVt0U38wjhFFBpSgphw5nUzwUqeGq'),(12,'usuario','usuario','$2y$10$odvbE3rg2iIcqC.CvfBjpuqtYDcAzbI22qotgEAcD00ykrYbGFP9m');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculos` (
  `correlativo` int(11) NOT NULL AUTO_INCREMENT,
  `marca` int(11) NOT NULL,
  `linea` varchar(100) NOT NULL,
  `tipo` int(11) NOT NULL,
  `transmision` int(11) NOT NULL,
  `modelo` varchar(4) NOT NULL,
  `km` int(11) NOT NULL,
  `traccion` int(11) NOT NULL,
  `combustible` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `aniosMinimoCredito` int(11) NOT NULL,
  `mensualidadAprox` int(11) NOT NULL,
  `cantidad_puertas` int(11) NOT NULL,
  PRIMARY KEY (`correlativo`),
  KEY `marca` (`marca`),
  KEY `tipo` (`tipo`),
  KEY `transmision` (`transmision`),
  KEY `traccion` (`traccion`),
  KEY `combustible` (`combustible`),
  KEY `color` (`color`),
  CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`marca`) REFERENCES `marcas` (`id_marcar`) ON UPDATE CASCADE,
  CONSTRAINT `vehiculos_ibfk_2` FOREIGN KEY (`tipo`) REFERENCES `tipo_vehiculo` (`id_tipo`) ON UPDATE CASCADE,
  CONSTRAINT `vehiculos_ibfk_3` FOREIGN KEY (`transmision`) REFERENCES `transmision` (`id_transmicion`) ON UPDATE CASCADE,
  CONSTRAINT `vehiculos_ibfk_4` FOREIGN KEY (`traccion`) REFERENCES `traccion` (`id_traccion`) ON UPDATE CASCADE,
  CONSTRAINT `vehiculos_ibfk_5` FOREIGN KEY (`combustible`) REFERENCES `combustible` (`id_combustible`) ON UPDATE CASCADE,
  CONSTRAINT `vehiculos_ibfk_6` FOREIGN KEY (`color`) REFERENCES `colores` (`id_color`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculos`
--

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
INSERT INTO `vehiculos` VALUES (6,7,'corola',2,2,'2010',30000,1,1,1,80000,8,1367,4),(7,4,'suburban',1,2,'2022',5000,1,1,1,72000,3,2480,4),(9,5,'corola',1,2,'2017',12000,1,1,1,42000,3,1447,4),(12,4,'rand',3,3,'2018',6000,1,1,1,52000,6,1069,4),(13,5,'subaru',5,3,'2017',2500,1,1,7,46000,5,1073,4),(14,1,'katiu',4,2,'2017',2500,1,1,4,18000,8,308,4),(16,1,'katiu',4,2,'2017',2500,1,1,4,18000,8,308,4);
/*!40000 ALTER TABLE `vehiculos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-27 23:13:36
