-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: 144.217.100.77    Database: progastro
-- ------------------------------------------------------
-- Server version	5.7.33-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `sae_colonoscopia`
--

DROP TABLE IF EXISTS `sae_colonoscopia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sae_colonoscopia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_pac` varchar(45) DEFAULT NULL,
  `num_atd` varchar(45) DEFAULT NULL,
  `frasco1` varchar(10) DEFAULT NULL,
  `frasco2` varchar(10) DEFAULT NULL,
  `frasco3` varchar(10) DEFAULT NULL,
  `frasco4` varchar(10) DEFAULT NULL,
  `frasco5` varchar(10) DEFAULT NULL,
  `frasco6` varchar(10) DEFAULT NULL,
  `observacoes` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sae_colonoscopia`
--

LOCK TABLES `sae_colonoscopia` WRITE;
/*!40000 ALTER TABLE `sae_colonoscopia` DISABLE KEYS */;
INSERT INTO `sae_colonoscopia` VALUES (3,'','210800002','1','2','3','5','8','9','Yfuyvuyvug'),(4,'','210800002','1','2','3','5','8','9','Yfuyvuyvug');
/*!40000 ALTER TABLE `sae_colonoscopia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sae_diagnostico`
--

DROP TABLE IF EXISTS `sae_diagnostico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sae_diagnostico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_pac` varchar(45) DEFAULT NULL,
  `num_atd` varchar(45) DEFAULT NULL,
  `risco_hipoglicemia` int(11) DEFAULT NULL,
  `risco_desequilibrio` int(11) DEFAULT NULL,
  `diarreia` int(11) DEFAULT NULL,
  `risco_sangramento` int(11) DEFAULT NULL,
  `confusao` int(11) DEFAULT NULL,
  `comunicacao_verbal` int(11) DEFAULT NULL,
  `risco_infeccao` int(11) DEFAULT NULL,
  `risco_quedas` int(11) DEFAULT NULL,
  `dor` int(11) DEFAULT NULL,
  `nutricao_alterada` int(11) DEFAULT NULL,
  `padrao_respiratorio` int(11) DEFAULT NULL,
  `mobilidade_fisica` int(11) DEFAULT NULL,
  `assinatura` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sae_diagnostico`
--

LOCK TABLES `sae_diagnostico` WRITE;
/*!40000 ALTER TABLE `sae_diagnostico` DISABLE KEYS */;
INSERT INTO `sae_diagnostico` VALUES (3,'05555','6565656',NULL,1,1,1,1,1,NULL,1,NULL,NULL,1,NULL,NULL),(4,'88298','210800002',1,1,NULL,1,1,NULL,1,NULL,NULL,1,NULL,NULL,NULL),(5,'88298','210800002',1,1,NULL,1,1,NULL,1,NULL,NULL,1,NULL,NULL,NULL),(6,'88298','210800002',1,1,1,1,1,1,1,1,1,1,1,1,NULL),(7,'88298','210800002',1,1,1,1,1,1,1,1,1,1,1,1,NULL),(8,'88298','210800002',1,1,1,1,1,1,1,1,1,1,1,1,NULL),(9,'88298','210800002',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'88298','210800002',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'88298','210800002',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'88298','210800002',1,1,1,1,1,1,1,1,1,1,1,1,NULL),(13,'77214','210800003',1,NULL,1,NULL,1,NULL,1,NULL,1,1,1,1,NULL);
/*!40000 ALTER TABLE `sae_diagnostico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sae_endoscopia`
--

DROP TABLE IF EXISTS `sae_endoscopia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sae_endoscopia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_pac` varchar(45) DEFAULT NULL,
  `num_atd` varchar(45) DEFAULT NULL,
  `frasco1` varchar(10) DEFAULT NULL,
  `frasco2` varchar(10) DEFAULT NULL,
  `frasco3` varchar(10) DEFAULT NULL,
  `frasco4` varchar(10) DEFAULT NULL,
  `ligadura` int(11) DEFAULT NULL,
  `dilatacao` int(11) DEFAULT NULL,
  `balao_gastro` int(11) DEFAULT NULL,
  `argonio` int(11) DEFAULT NULL,
  `observacoes` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sae_endoscopia`
--

LOCK TABLES `sae_endoscopia` WRITE;
/*!40000 ALTER TABLE `sae_endoscopia` DISABLE KEYS */;
INSERT INTO `sae_endoscopia` VALUES (3,'88298','210800002','1','1','3','6',2,2,2,2,'Um givugvgv8'),(4,'88298','210800002','1','1','3','6',2,2,2,2,'Um givugvgv8'),(5,'88298','210800002','1','1','3','6',1,2,2,2,'Um givugvgv8'),(6,'77214','210800003','3','1','4','4',2,1,2,2,'7tfiyv8ggugvugvu'),(7,'77214','210800003','3','1','4','4',2,1,2,2,'7tfiyv8ggugvugvu'),(8,'88298','210800002','1','1','3','6',1,2,2,2,'Um givugvgv8');
/*!40000 ALTER TABLE `sae_endoscopia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sae_enfermagem`
--

DROP TABLE IF EXISTS `sae_enfermagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sae_enfermagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_pac` varchar(45) DEFAULT NULL,
  `num_atd` varchar(45) DEFAULT NULL,
  `historico` int(11) DEFAULT NULL,
  `alergia` int(11) DEFAULT NULL,
  `alergia_desc` varchar(200) DEFAULT NULL,
  `dor` int(11) DEFAULT NULL,
  `dor_desc` varchar(200) DEFAULT NULL,
  `medicamento` int(11) DEFAULT NULL,
  `medicamento_desc` varchar(200) DEFAULT NULL,
  `fuma` int(11) DEFAULT NULL,
  `bebidas` int(11) DEFAULT NULL,
  `cardiaco` int(11) DEFAULT NULL,
  `pulmonares` int(11) DEFAULT NULL,
  `andar` int(11) DEFAULT NULL,
  `assinatura` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sae_enfermagem`
--

LOCK TABLES `sae_enfermagem` WRITE;
/*!40000 ALTER TABLE `sae_enfermagem` DISABLE KEYS */;
INSERT INTO `sae_enfermagem` VALUES (19,'88298','210800002',2,2,'Teste1',2,'Teste2',2,'Teste3',1,1,1,1,1,'http://144.217.100.77/arquivos/cadastros/assinatura-Gustavo-11.jpg'),(20,'88298','210800002',2,2,'Teste1',2,'Teste2',2,'Teste3',1,1,1,1,1,'http://144.217.100.77/arquivos/cadastros/assinatura-Gustavo-11.jpg');
/*!40000 ALTER TABLE `sae_enfermagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sae_etapa_executando`
--

DROP TABLE IF EXISTS `sae_etapa_executando`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sae_etapa_executando` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_atd` varchar(45) DEFAULT NULL,
  `etapa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sae_etapa_executando`
--

LOCK TABLES `sae_etapa_executando` WRITE;
/*!40000 ALTER TABLE `sae_etapa_executando` DISABLE KEYS */;
/*!40000 ALTER TABLE `sae_etapa_executando` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sae_etapas`
--

DROP TABLE IF EXISTS `sae_etapas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sae_etapas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_pac` varchar(45) DEFAULT NULL,
  `num_atd` varchar(45) DEFAULT NULL,
  `historico` varchar(5) DEFAULT 'pend',
  `diagnostico` varchar(5) DEFAULT 'pend',
  `pre_atendimento` varchar(5) DEFAULT 'pend',
  `sala_exames` varchar(5) DEFAULT 'pend',
  `recuperacao` varchar(5) DEFAULT 'pend',
  `endoscopia` varchar(5) DEFAULT 'pend',
  `colonoscopia` varchar(5) DEFAULT 'pend',
  `prescricao` varchar(5) DEFAULT 'pend',
  `intercorrencias` varchar(5) DEFAULT 'pend',
  `liberacao` varchar(5) DEFAULT 'pend',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sae_etapas`
--

LOCK TABLES `sae_etapas` WRITE;
/*!40000 ALTER TABLE `sae_etapas` DISABLE KEYS */;
INSERT INTO `sae_etapas` VALUES (19,'1234','8888888','concl','concl','concl','concl','concl','concl','concl','concl','concl','concl'),(20,'5555','6565656','concl','concl','concl','concl','concl','concl','concl','concl','concl','concl'),(21,'88298','210800002','concl','concl','concl','concl','concl','concl','concl','concl','concl','concl'),(22,'123','123456789','concl','concl','concl','concl','concl','concl','pend','pend','concl','concl'),(23,'77214','210800003','concl','concl','concl','concl','concl','concl','pend','pend','concl','concl');
/*!40000 ALTER TABLE `sae_etapas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sae_exames`
--

DROP TABLE IF EXISTS `sae_exames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sae_exames` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_pac` varchar(45) DEFAULT NULL,
  `num_atd` varchar(45) DEFAULT NULL,
  `posicionar_pacientes` int(11) DEFAULT NULL,
  `instalar_oximetria` int(11) DEFAULT NULL,
  `instalar_o2` int(11) DEFAULT NULL,
  `administrar_medicamentos` int(11) DEFAULT NULL,
  `verificar_sinais` int(11) DEFAULT NULL,
  `encaminhar_paciente` int(11) DEFAULT NULL,
  `inicio_exame` varchar(50) DEFAULT NULL,
  `termino_exame` varchar(50) DEFAULT NULL,
  `pre_pa` varchar(10) DEFAULT NULL,
  `pre_fc` varchar(10) DEFAULT NULL,
  `pre_fr` varchar(10) DEFAULT NULL,
  `pre_sat02` varchar(10) DEFAULT NULL,
  `exame_pa1` varchar(10) DEFAULT NULL,
  `exame_fc` varchar(10) DEFAULT NULL,
  `exame_fr` varchar(10) DEFAULT NULL,
  `exame_sat02` varchar(10) DEFAULT NULL,
  `exame_pa2` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sae_exames`
--

LOCK TABLES `sae_exames` WRITE;
/*!40000 ALTER TABLE `sae_exames` DISABLE KEYS */;
INSERT INTO `sae_exames` VALUES (5,'88298','210800002',1,1,1,1,1,1,'10:45','10:45',NULL,NULL,NULL,NULL,'160','61','23','89','170'),(6,'88298','210800002',1,1,1,1,1,1,'10:45','10:45',NULL,NULL,NULL,NULL,'160','61','23','89','170'),(7,'88298','210800002',1,1,1,1,1,1,'10:45','10:45',NULL,NULL,NULL,NULL,'200','61','23','89','210'),(8,'77214','210800003',1,1,1,1,1,1,'15:08','15:08',NULL,NULL,NULL,NULL,'160','62','22','88','170');
/*!40000 ALTER TABLE `sae_exames` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sae_intercorrencias`
--

DROP TABLE IF EXISTS `sae_intercorrencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sae_intercorrencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_pac` varchar(45) DEFAULT NULL,
  `num_atd` varchar(45) DEFAULT NULL,
  `intercorrencia` longtext,
  `medico` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sae_intercorrencias`
--

LOCK TABLES `sae_intercorrencias` WRITE;
/*!40000 ALTER TABLE `sae_intercorrencias` DISABLE KEYS */;
INSERT INTO `sae_intercorrencias` VALUES (2,'88298','210800002','7yf8yf7yf7yf87gcugvugv',''),(3,'88298','210800002','7yf8yf7yf7yf87gcugvugv',''),(4,'77214','210800003','Mas teste estando longe você me fala logo tudo bom muito bom você entende o que eu falo mesmo conversa mesmo com máscara tem um quarto de e lalaia','');
/*!40000 ALTER TABLE `sae_intercorrencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sae_liberacao`
--

DROP TABLE IF EXISTS `sae_liberacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sae_liberacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_pac` varchar(45) DEFAULT NULL,
  `num_atd` varchar(45) DEFAULT NULL,
  `dentaduras_devolvidas` int(11) DEFAULT NULL,
  `retirado_acesso` int(11) DEFAULT NULL,
  `condicoes_alta` int(11) DEFAULT NULL,
  `alta_para` int(11) DEFAULT NULL,
  `qual_forma` int(11) DEFAULT NULL,
  `acordado_alerta` int(11) DEFAULT NULL,
  `quente_seco` int(11) DEFAULT NULL,
  `move_membros` int(2) DEFAULT NULL,
  `pre_pa2` varchar(10) DEFAULT NULL,
  `pre_pa1` varchar(10) DEFAULT NULL,
  `pre_fc` varchar(10) DEFAULT NULL,
  `pre_fr` varchar(10) DEFAULT NULL,
  `pre_sat02` varchar(10) DEFAULT NULL,
  `exame_pa` varchar(10) DEFAULT NULL,
  `exame_fc` varchar(10) DEFAULT NULL,
  `exame_fr` varchar(10) DEFAULT NULL,
  `exame_sat02` varchar(10) DEFAULT NULL,
  `evolucao_enfermagem` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sae_liberacao`
--

LOCK TABLES `sae_liberacao` WRITE;
/*!40000 ALTER TABLE `sae_liberacao` DISABLE KEYS */;
INSERT INTO `sae_liberacao` VALUES (2,'88298','210800002',1,1,1,2,2,1,1,1,'190','180','62','26','86',NULL,NULL,NULL,NULL,'Um ugcug'),(3,'88298','210800002',1,1,1,2,2,1,1,1,'190','180','62','26','86',NULL,NULL,NULL,NULL,''),(4,'88298','210800002',1,1,1,2,2,1,1,1,'190','180','62','26','86',NULL,NULL,NULL,NULL,'sdsdasdassasdasd');
/*!40000 ALTER TABLE `sae_liberacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sae_lotes`
--

DROP TABLE IF EXISTS `sae_lotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sae_lotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(10) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `lote` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sae_lotes`
--

LOCK TABLES `sae_lotes` WRITE;
/*!40000 ALTER TABLE `sae_lotes` DISABLE KEYS */;
INSERT INTO `sae_lotes` VALUES (13,'11-01-22','23-DOLANTINA 100MG/2ML INJETÁVEL','99OOIDFF2124'),(14,'11-01-22','23-DOLANTINA 100MG/2ML INJETÁVEL','99OOIDFF2124'),(15,'11-01-22','25-LIDOCAÍNA 2% GELÉIA 30G','G33553456TGG'),(16,'11-01-22','25-LIDOCAÍNA 2% GELÉIA 30G','G33553456TGG'),(17,'11-01-22','23-DOLANTINA 100MG/2ML INJETÁVEL','99OOIDFF2124'),(18,'11-01-22','23-DOLANTINA 100MG/2ML INJETÁVEL','99OOIDFF2124');
/*!40000 ALTER TABLE `sae_lotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sae_paciente`
--

DROP TABLE IF EXISTS `sae_paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sae_paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_pac` varchar(6) DEFAULT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `num_atd` varchar(10) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` varchar(10) DEFAULT NULL,
  `exames` varchar(200) DEFAULT NULL,
  `idade` varchar(15) DEFAULT NULL,
  `convenio` varchar(45) DEFAULT NULL,
  `situacao` varchar(1) DEFAULT '1',
  `cod_exame` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `num_atd_UNIQUE` (`num_atd`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sae_paciente`
--

LOCK TABLES `sae_paciente` WRITE;
/*!40000 ALTER TABLE `sae_paciente` DISABLE KEYS */;
INSERT INTO `sae_paciente` VALUES (1,'05555','Eduardo Teste','6565656','2021-10-21','08:00','Endoscopia','58','teste','2',NULL),(2,'01234','Jose de Almeida','8888888','2021-10-21','09:00','Endoscopia','55','teste','2',NULL),(3,'123','TESTE 123','123456789','2021-10-21','16:00','ENDOSCOPIA DIG ALTA','44','UNIMED','2',NULL),(4,'88298','ALDREY CINTIA SGORLON LACERDA','210800002','2021-10-21','17:14','ENDOSCOPIA DIGESTIVA ALTA COM BIOPSIA E TESTE DE UREASE','45','UNIMED','2',NULL),(5,'77214','ANDREA APARECIDA DE OLIVEIRA CARVALHO','210800003','2021-10-21','17:16','ENDOSCOPIA DIGESTIVA ALTA COM BIOPSIA OU CITOLOGIA','20','BRADESCO SAÚDE','2',NULL),(6,'00003','ADRIANA DE MORAES PEREIRA SANTOS','220100002','2022-01-08','20:44','ENDOSCOPIA DIGESTIVA ALTA COM BIOPSIA E TESTE DE UREASE','49','UNIMED','1',NULL);
/*!40000 ALTER TABLE `sae_paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sae_pre_atendimento`
--

DROP TABLE IF EXISTS `sae_pre_atendimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sae_pre_atendimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_pac` varchar(45) DEFAULT NULL,
  `num_atd` varchar(45) DEFAULT NULL,
  `acomodar_paciente` int(11) DEFAULT NULL,
  `manter_cabeceira` int(11) DEFAULT NULL,
  `puncionar_acesso` int(11) DEFAULT NULL,
  `retirar_proteses` int(11) DEFAULT NULL,
  `verificar_sinais` int(11) DEFAULT NULL,
  `elevar_grades` int(11) DEFAULT NULL,
  `transportar_paciente` int(11) DEFAULT NULL,
  `hora_preparo` varchar(45) DEFAULT NULL,
  `pre_pa1` varchar(10) DEFAULT NULL,
  `pre_fc` varchar(10) DEFAULT NULL,
  `pre_fr` varchar(10) DEFAULT NULL,
  `pre_sat02` varchar(10) DEFAULT NULL,
  `exame_pa` varchar(10) DEFAULT NULL,
  `exame_fc` varchar(10) DEFAULT NULL,
  `exame_fr` varchar(10) DEFAULT NULL,
  `exame_sat02` varchar(10) DEFAULT NULL,
  `pre_pa2` varchar(10) DEFAULT NULL,
  `assinatura` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sae_pre_atendimento`
--

LOCK TABLES `sae_pre_atendimento` WRITE;
/*!40000 ALTER TABLE `sae_pre_atendimento` DISABLE KEYS */;
INSERT INTO `sae_pre_atendimento` VALUES (7,'88298','210800002',1,1,1,1,1,1,1,'10:35','80','62','22','90',NULL,NULL,NULL,NULL,'140',NULL),(8,'88298','210800002',1,1,1,1,1,1,1,'10:35','80','62','22','90',NULL,NULL,NULL,NULL,'140',NULL),(9,'88298','210800002',1,1,1,1,1,1,1,'10:35','80','62','22','90',NULL,NULL,NULL,NULL,'140',NULL),(10,'88298','210800002',1,1,1,1,1,1,1,'10:35','200','62','22','90',NULL,NULL,NULL,NULL,'140',NULL),(11,'77214','210800003',1,1,NULL,1,1,1,1,'14:05','160','62','20','89',NULL,NULL,NULL,NULL,'130',NULL);
/*!40000 ALTER TABLE `sae_pre_atendimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sae_prescricao`
--

DROP TABLE IF EXISTS `sae_prescricao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sae_prescricao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_pac` varchar(45) DEFAULT NULL,
  `num_atd` varchar(45) DEFAULT NULL,
  `fentanil` varchar(45) DEFAULT NULL,
  `dormonid` varchar(45) DEFAULT NULL,
  `propofol` varchar(45) DEFAULT NULL,
  `hioscina` varchar(45) DEFAULT NULL,
  `narcan` varchar(45) DEFAULT NULL,
  `flumazenil` varchar(45) DEFAULT NULL,
  `ondasedrona` varchar(45) DEFAULT NULL,
  `dipirona` varchar(45) DEFAULT NULL,
  `solucao_fisiologica` varchar(45) DEFAULT NULL,
  `glicose` varchar(45) DEFAULT NULL,
  `lote_sedativos` longtext,
  `medico_prescritor` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sae_prescricao`
--

LOCK TABLES `sae_prescricao` WRITE;
/*!40000 ALTER TABLE `sae_prescricao` DISABLE KEYS */;
INSERT INTO `sae_prescricao` VALUES (2,'88298','210800002','Utf7y','7te75','Utdutdu','Utxutxu','Utxufxy','Utcufcut','Há hvhcf','Utcutdu','Igfiyf8','Jgfigfi','Jgcigcguucg','Uycugdugdug'),(3,'88298','210800002','Utf7y','7te75','Utdutdu','Utxutxu','Utxufxy','Utcufcut','Há hvhcf','Utcutdu','Igfiyf8','Jgfigfi','Jgcigcguucg','Uycugdugdug');
/*!40000 ALTER TABLE `sae_prescricao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sae_recuperacao`
--

DROP TABLE IF EXISTS `sae_recuperacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sae_recuperacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_pac` varchar(45) DEFAULT NULL,
  `num_atd` varchar(45) DEFAULT NULL,
  `manter_paciente` int(11) DEFAULT NULL,
  `manter_o2` int(11) DEFAULT NULL,
  `levantar_paciente` int(11) DEFAULT NULL,
  `retirar_acesso` int(11) DEFAULT NULL,
  `preencher_estatus` int(11) DEFAULT NULL,
  `liberar_paciente` int(11) DEFAULT NULL,
  `sae_recuperacaocol` varchar(45) DEFAULT NULL,
  `pre_pa1` varchar(10) DEFAULT NULL,
  `pre_fc` varchar(10) DEFAULT NULL,
  `pre_fr` varchar(10) DEFAULT NULL,
  `pre_sat02` varchar(10) DEFAULT NULL,
  `exame_pa` varchar(10) DEFAULT NULL,
  `exame_fc` varchar(10) DEFAULT NULL,
  `exame_fr` varchar(10) DEFAULT NULL,
  `exame_sat02` varchar(10) DEFAULT NULL,
  `pre_pa2` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sae_recuperacao`
--

LOCK TABLES `sae_recuperacao` WRITE;
/*!40000 ALTER TABLE `sae_recuperacao` DISABLE KEYS */;
INSERT INTO `sae_recuperacao` VALUES (2,'88298','210800002',1,1,1,1,1,1,NULL,'70','53','15','96',NULL,NULL,NULL,NULL,'80'),(3,'88298','210800002',1,1,1,1,1,1,NULL,'70','53','15','96',NULL,NULL,NULL,NULL,'80'),(4,'77214','210800003',1,1,1,1,1,1,NULL,'80','52','13','97',NULL,NULL,NULL,NULL,'90');
/*!40000 ALTER TABLE `sae_recuperacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_user` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `acesso` int(11) DEFAULT '1',
  `nome` varchar(100) DEFAULT NULL,
  `n_registro` varchar(10) DEFAULT NULL,
  `assinatura` varchar(100) DEFAULT NULL,
  `tipo_registro` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (29,'83545','123456',1,'Gustavo Sevá Pereira',NULL,'http://144.217.100.77/arquivos/cadastros/assinatura-Gustavo-11.jpg',NULL),(30,NULL,'d41d8cd98f00b204e9800998ecf8427e',1,NULL,NULL,'http://144.217.100.77/arquivos/cadastros/assinatura-Gustavo-11.jpg',NULL),(31,'100','TESTE1',1,'TESTE1','12345','http://144.217.100.77/arquivos/cadastros/assinatura-Gustavo-11.jpg',NULL),(32,'100','TESTE1',1,'TESTE1','12345','http://144.217.100.77/arquivos/cadastros/assinatura-Gustavo-11.jpg',NULL),(33,'103','TESTE5',1,'TESTE5','161075','http://144.217.100.77/arquivos/cadastros/assinatura-Gustavo-11.jpg',NULL),(34,'219','MEDICACAO',1,'MEDICACAO','96444','http://144.217.100.77/arquivos/cadastros/assinatura-Gustavo-11.jpg',NULL),(35,'104','WILLIAM',1,'WILLIAM','109452','http://144.217.100.77/arquivos/cadastros/alexandre.jpg',NULL),(36,'106','MARCIOL',1,'MARCIOL','161075','http://144.217.100.77/arquivos/cadastros/assinatura_carlospimentel.jpg',NULL),(37,'107','MARCIO2',1,'MARCIO2','109452','http://144.217.100.77/arquivos/cadastros/assinatura-Gustavo-11.jpg','CRM'),(38,'108','MARCIO3',1,'MARCIO3','00015','http://144.217.100.77/arquivos/cadastros/infantilSantos.jpg','OUT'),(39,'220','THAIS CAL',1,'THAIS CAL','573376','',NULL),(40,'221','CLAUDIA PR',1,'CLAUDIA PR','','',NULL),(41,'35','FLAVIA',1,'FLAVIA','','',''),(42,'222','NUBIA',1,'NUBIA','425573','',NULL),(43,'223','FABIANA',1,'FABIANA','','',NULL),(44,'224','ADRIANA MS',1,'ADRIANA MS','','',NULL),(45,'225','CELIA LO',1,'CELIA LO','69001','',NULL),(46,'226','ELAINE',1,'ELAINE','423119','',NULL),(47,'227','ANDREIA C',1,'ANDREIA C','1514814','',NULL),(48,'228','ELIAN',1,'ELIAN','1406864','',NULL),(49,'229','GABRIEL M',1,'GABRIEL M','1550027','',NULL),(50,'230','MARCELO B',1,'MARCELO B','1589547','',NULL),(51,'233','MARTA ',1,'MARTA ','456564','',NULL),(52,'234','ROSA',1,'ROSA','702151','',NULL),(53,'235','MARIA LA',1,'MARIA LA','505069','',NULL),(54,'236','THAMIRES M',1,'THAMIRES M','1526829','',NULL),(55,'237','CLESIA',1,'CLESIA','825453','',NULL),(56,'238','DEBORA',1,'DEBORA','1377789','',NULL),(57,'239','IRACEMA ',1,'IRACEMA ','674508','',NULL),(58,'240','LEILTON',1,'LEILTON','1533718','',NULL),(59,'241','LEONARDO',1,'LEONARDO','1139611','',NULL),(60,'242','LILIAN',1,'LILIAN','505226','',NULL),(61,'244','MICHELE',1,'MICHELE','717153','',NULL),(62,'245','RUAN',1,'RUAN','1569551','',NULL),(63,'246','ANA L',1,'ANA L','1502145','',NULL),(64,'247','ANDREIA R',1,'ANDREIA R','1075005','',NULL),(65,'248','CLAUDIA M',1,'CLAUDIA M','420278','',NULL),(66,'249','EDNA ',1,'EDNA ','1530388','',NULL),(67,'250','GISLAINE',1,'GISLAINE','792991','',NULL),(68,'251','GRAZIELE',1,'GRAZIELE','1352540','',NULL),(69,'252','IVONETE',1,'IVONETE','525321','',NULL),(70,'253','MARCELO PS',1,'MARCELO PS','652291','',NULL),(71,'254','MARIA LG',1,'MARIA LG','583309','',NULL),(72,'6','ALINE',1,'ALINE','','',''),(73,'255','AGATA',1,'AGATA','1486336','',NULL),(74,'256','ALEXSANDRA',1,'ALEXSANDRA','1514235','',NULL),(75,'257','BRUNO',1,'BRUNO','1565426','',NULL),(76,'258','CIBELE',1,'CIBELE','1173459','',NULL),(77,'259','ELIANE NS',1,'ELIANE NS','1536414','',NULL),(78,'260','JENNY',1,'JENNY','1534852','',NULL),(79,'261','ROSALVA ',1,'ROSALVA ','','',NULL),(80,'262','ROSENILDA',1,'ROSENILDA','','',NULL),(81,'263','VALERIA M',1,'VALERIA M','1625117','',NULL),(82,'264','JENIFER',1,'JENIFER','1627752','',NULL),(83,'265','SUELI',1,'SUELI','1543452','',NULL),(84,'266','FERNANDA T',1,'FERNANDA T','1539713','',NULL),(85,'267','VANESSA L',1,'VANESSA L','383464','',NULL),(86,'268','ELIS',1,'ELIS','1578002','',NULL),(87,'269','RAIMUNDA',1,'RAIMUNDA','1572357','',NULL),(88,'270','MAIARA M',1,'MAIARA M','666568','',NULL),(89,'271','LIVIA',1,'LIVIA','1553802','',NULL),(90,'272','KELLY RP',1,'KELLY RP','1572592','',NULL),(91,'273','EDILAINE ',1,'EDILAINE ','1567391','',NULL),(92,'274','JAQUELINA',1,'JAQUELINA','1626273','',NULL),(93,'275','NATALIA',1,'NATALIA','1588290','',NULL),(94,'276','ADONES',1,'ADONES','01761-T','',NULL),(95,'277','CRISTIANA',1,'CRISTIANA','43666-T','',NULL),(96,'278','EDUARDO',1,'EDUARDO','07733-T','',NULL),(97,'279','MAIARA G',1,'MAIARA G','03826-N','',NULL),(98,'280','MIKAELI',1,'MIKAELI','46758-T','',NULL),(99,'281','MAURICIO ',1,'MAURICIO ','45929-T','',NULL),(100,'282','THIAGO AR',1,'THIAGO AR','06515-N','',NULL),(101,'283','VANESSA RM',1,'VANESSA RM','38827-T','',NULL),(102,'284','NATASHA',1,'NATASHA','53920-T','',NULL),(103,'2','MONICA',1,'MONICA','','',''),(104,'3','CAMILA',1,'CAMILA','','',''),(105,'4','CAIO',1,'CAIO','','',''),(106,'5','CRISTIANO',1,'CRISTIANO','130020','','CRM'),(107,'6','MARTINEZ',1,'MARTINEZ','31528','','CRM'),(108,'7','MOISES',1,'MOISES','74323','','CRM'),(109,'8','RODRIGO',1,'RODRIGO','141130','','CRM'),(110,'9','LUCIO',1,'LUCIO','15273','','CRM'),(111,'10','AKIRA',1,'AKIRA','29484','','CRM'),(112,'11','WILSON',1,'WILSON','138919','','CRM'),(113,'285','RODRIGO G',1,'RODRIGO G','116912','',NULL),(114,'286','DEBORA SA',1,'DEBORA SA','381810','',NULL),(115,'208','DANIELAC',1,'DANIELAC','329994','','CREFITO'),(116,'11','VINICIUS',1,'VINICIUS','304615','','CRFA'),(117,'11','VINICIUS',1,'VINICIUS','304615','','CRFA'),(118,'209','LUCIMAR',1,'LUCIMAR','','',''),(119,'284','FERNANDA M',1,'FERNANDA M','105646','','CRM'),(120,'287','ANDREA',1,'ANDREA','','',''),(121,'120','MORGANA ',1,'MORGANA ','195882','http://144.217.100.77/arquivos/cadastros/ass dra morgana.jpeg','CRM'),(122,'288','LEONARDO S',1,'LEONARDO S','150242','',NULL),(123,'289','ANDREA A',1,'ANDREA A','','',NULL),(124,'121','MARCELO ',1,'MARCELO ','','',''),(125,'232','LORENA2',1,'LORENA2','33326','','CRM'),(126,'210','CAMILAQ',1,'CAMILAQ','001693179','','COREN'),(127,'285','FRANCISCO',1,'FRANCISCO','28493','','CRM'),(128,'211','KARINA',1,'KARINA','24749','','CRP'),(129,'290','JAQUE EL',1,'JAQUE EL','0141473','',NULL),(130,'12','THAIS',1,'THAIS','','http://144.217.100.77/arquivos/cadastros/assin_tmp_91674.jpg',''),(131,'8','LEONARDO',1,'LEONARDO','324014-F','','OUT'),(132,'122','GEOVANA',1,'GEOVANA','','',''),(133,'37','LUCASMOURA',1,'LUCASMOURA','','',''),(134,'38','KATIAC',1,'KATIAC','','',''),(135,'17','KETHELEEN',1,'KETHELEEN','','',''),(136,'291','PRISCILA P',1,'PRISCILA P','216836','','CRM'),(137,'69','ISABELLA',1,'ISABELLA','','',''),(138,'287','MAYRA',1,'MAYRA','170146','','CRM'),(139,'288','MILENAF',1,'MILENAF','151325','',''),(140,'289','GABRIEL H',1,'GABRIEL H','','',''),(141,'183','JOAOG',1,'JOAOG','','',''),(142,'184','KARINAM',1,'KARINAM','','',''),(143,'197','KARENG',1,'KARENG','123959','','CRM'),(144,'49','NBARBATO',1,'NBARBATO','108971\r\n','','CRM'),(145,'198','RAFAELR',1,'RAFAELR','123959','','CRM'),(146,'199','SARAN',1,'SARAN','123959','','CRM'),(147,'212','CAMILAFB',1,'CAMILAFB','','',''),(148,'292','GISELE S',1,'GISELE S','','',''),(149,'293','ANGELA M',1,'ANGELA M','477320','','COREN'),(150,'294','GIZELIA',1,'GIZELIA','310877','','COREN'),(151,'2','PAULO',1,'PAULO','','',''),(152,'185','FELIPE',1,'FELIPE','','',''),(153,'233','THAISO',1,'THAISO','','',''),(154,'213','ANDREIAST',1,'ANDREIAST','04/62096','','CRP'),(155,'295','TITO',1,'TITO','64560','',NULL),(156,'200','KETLING',1,'KETLING','','',''),(157,'296','FABIANA A',1,'FABIANA A','','',NULL),(158,'201','NATHALIAS',1,'NATHALIAS','','',''),(159,'2','LUCIANA ',1,'LUCIANA ','123456','','CRM'),(160,'3','ANA',1,'ANA','','',''),(161,'4','VIVIAN M',1,'VIVIAN M','','',''),(162,'292','SARAH',1,'SARAH','','',''),(163,'202','ADRIANE',1,'ADRIANE','171709','','CRP'),(164,'214','LEIDIANEC',1,'LEIDIANEC','304006-F','','CREFITO'),(165,'234','SUPORTE',1,'SUPORTE','','',''),(166,'293','AMANDA C',1,'AMANDA C','190953','','CRM'),(167,'2','LETICIA',1,'LETICIA','','',''),(168,'215','VICTORMR',1,'VICTORMR','00019','','CREFITO'),(169,'297','CIRO',1,'CIRO','','',''),(170,'50','NICOLAS',1,'NICOLAS','108971\r\n','','CRM'),(171,'3','CAROL',1,'CAROL','130766','','CRM'),(172,'4','ANA PAULA',1,'ANA PAULA','105747','','CRM'),(173,'125','THAMIRES',1,'THAMIRES','','http://144.217.100.77/arquivos/cadastros/thamires ].jpg',''),(174,'5','ANDRE',1,'ANDRE','104633','','CRM'),(175,'6','ANGELA',1,'ANGELA','150087','','CRM'),(176,'7','BRUNO',1,'BRUNO','119941','','CRM'),(177,'8','EDERJAN',1,'EDERJAN','50606','','CRN'),(178,'9','FLAVIA',1,'FLAVIA','95722','','CRM'),(179,'10','GUSTAVO',1,'GUSTAVO','109304','','CRM'),(180,'11','SERGIO',1,'SERGIO','97175','','CRM'),(181,'73','ERIKA',1,'ERIKA','','',''),(182,'74','MELISSA',1,'MELISSA','','',''),(183,'12','ANA RACHEL',1,'ANA RACHEL','124579','','CRM'),(184,'298','ROSANGELAB',1,'ROSANGELAB','','',NULL),(185,'70','NICOLLY ',1,'NICOLLY ','','',''),(186,'299','BRYAN AP',1,'BRYAN AP','133588','','CRM'),(187,'300','DIEGO AA',1,'DIEGO AA','155665','','CRM'),(188,'216','GILNEIARC',1,'GILNEIARC','248194-F','','CREFITO'),(189,'301','MILTON FS',1,'MILTON FS','148434','','CRM'),(190,'75','MICHELE',1,'MICHELE','','',''),(191,'302','MAIRA',1,'MAIRA','166007','',NULL),(192,'303','EDILENE K',1,'EDILENE K','0090661','','COREN'),(193,'304','BEATRIZ A',1,'BEATRIZ A','512068','','COREN'),(194,'5','DANIELA',1,'DANIELA','00003','','CRM'),(195,'6','GEOVANNA',1,'GEOVANNA','','',''),(196,'305','CELIA HM',1,'CELIA HM','','',''),(197,'7','IKE ',1,'IKE ','61498','','CRM'),(198,'306','FELIPE SF',1,'FELIPE SF','189416','','CRM'),(199,'3','ANDRESSA',1,'ANDRESSA','','',''),(200,'235','DRRUBENS',1,'DRRUBENS','29484','','CRM'),(201,'13','ANAP',1,'ANAP','','',''),(202,'14','LETICIAC',1,'LETICIAC','','',''),(203,'15','ANA MARIA ',1,'ANA MARIA ','','',''),(204,'16','CINTIAC',1,'CINTIAC','','',''),(205,'8','ROCHELI',1,'ROCHELI','00003','','COREN-AUX'),(206,'203','SIMONEC',1,'SIMONEC','','',''),(207,'217','IVANITS',1,'IVANITS','46419','','CRP'),(208,'294','A CAROLINA',1,'A CAROLINA','141850','','CRM'),(209,'4','AMANDA',1,'AMANDA','00002','',''),(210,'307','MARIA FM',1,'MARIA FM','226845','','CRM'),(211,'308','ELAINE C',1,'ELAINE C','','',''),(212,'7','ALINEB',1,'ALINEB','00001','','COREN'),(213,'309','MARIA AF',1,'MARIA AF','','',NULL),(214,'310','LEANDROA',1,'LEANDROA','','',''),(215,'311','PAULO SF',1,'PAULO SF','','',NULL),(216,'224','GISLEINE',1,'GISLEINE','','',''),(217,'295','SARA C',1,'SARA C','156374','','CRM'),(218,'312','CLEUSA SG',1,'CLEUSA SG','','',NULL),(219,'296','RENATO C',1,'RENATO C','176101','','CRM'),(220,'204','SUZANAG',1,'SUZANAG','','',''),(221,'236','GABRIEL M',1,'GABRIEL M','','',''),(222,'297','ELLEN',1,'ELLEN','','',''),(223,'298','AMANDA J',1,'AMANDA J','221265','','CRM'),(224,'51','VMANFREDI',1,'VMANFREDI','185241','','CRM'),(225,'313','SIMONE C',1,'SIMONE C','171683','','COREN'),(226,'75','ALINER',1,'ALINER','264742F','','CREFITO-3'),(227,'299','FRANCIELEC',1,'FRANCIELEC','','',''),(228,'225','ARLENE',1,'ARLENE','673957','','COREN');
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

-- Dump completed on 2022-01-11 20:42:02
