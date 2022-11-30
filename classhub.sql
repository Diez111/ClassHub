-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 05:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_privado`
--

CREATE TABLE `chat_privado` (
  `mensaje_id` int(11) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `emisor_id` int(4) NOT NULL,
  `receptor_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_privado`
--

INSERT INTO `chat_privado` (`mensaje_id`, `mensaje`, `emisor_id`, `receptor_id`) VALUES
(1, 'hola', 39, 18),
(2, 'hola lol', 18, 39),
(3, 'sas', 18, 39),
(4, 'sus', 39, 18),
(5, 'sas', 39, 18),
(6, 'sas', 39, 18),
(7, 'HOLA\r\n', 40, 25),
(8, 'asdasd', 18, 25),
(9, 'sas', 18, 25),
(10, 'sas', 18, 25);

-- --------------------------------------------------------

--
-- Table structure for table `chat_publico`
--

CREATE TABLE `chat_publico` (
  `mensaje_id` int(11) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `usuario_id` int(4) NOT NULL,
  `curso_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_publico`
--

INSERT INTO `chat_publico` (`mensaje_id`, `mensaje`, `usuario_id`, `curso_id`) VALUES
(1, 'hola', 18, 1),
(2, 'hola pibe', 38, 1),
(3, 'adasd', 38, 1),
(4, 'asasas', 38, 1),
(5, 'asdasdasd', 38, 1),
(6, 'giygysdgyasdgyasduy', 38, 1),
(7, 'hjbdzhjxbzzxhjb', 18, 1),
(8, 'sfsdhjbdfbhjsdfbhjsdfhjsdf', 18, 1),
(9, 'hjbdzhjxbzzxhjbasdasdaas', 18, 1),
(10, 'asdasd', 18, 1),
(11, 'adsdsad', 18, 1),
(12, 'asdasd', 18, 1),
(13, 'fsddsf\r\n\r\n', 18, 1),
(14, 'sdasd\r\nasdasdas\r\nasdasd', 18, 1),
(15, 'sadasd', 18, 2),
(16, 'asd', 18, 2),
(17, 'Hola', 20, 3),
(18, 'HOLA\r\n', 40, 8),
(19, 'hola', 18, 8),
(20, 'Re mogolico ', 18, 3),
(21, 'hola', 18, 14),
(22, 'ff', 18, 12),
(23, 'assdaas', 18, 1),
(24, 'asdas', 18, 1),
(25, 'sas', 18, 1),
(26, 'sas', 18, 1),
(27, 'sas', 18, 1),
(28, 'sas', 18, 1),
(29, 'sadasjdhkasdh\r\naskdjhasjkdas\r\najshdkashdajksdh\r\nasdjhaskjdhasd', 18, 1),
(30, 'el pepe', 18, 1),
(31, 'sas', 18, 1),
(32, 'asda', 18, 1),
(33, 's', 18, 1),
(34, 's', 18, 1),
(35, 'sas', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL,
  `curso` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`idcurso`, `curso`) VALUES
(1, 'Primero A'),
(2, 'Primero B'),
(3, 'Segundo A'),
(4, 'Segundo B'),
(5, 'Tercero A'),
(6, 'Tercero B'),
(7, 'Cuarto EL'),
(8, 'Cuarto EM'),
(9, 'Quinto EL'),
(10, 'Quinto EM'),
(11, 'Sexto EL'),
(12, 'Sexto EM'),
(13, 'Septimo EL'),
(14, 'Septimo EM');

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `ideventos` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `contenido` varchar(800) NOT NULL,
  `idusuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`ideventos`, `titulo`, `contenido`, `idusuario`) VALUES
(10, 'Prueba matematica', '17/10', 18),
(11, 'Recuperatorio sistemas de control', '2/10', 18),
(13, 'Test', '12/12', 18);

-- --------------------------------------------------------

--
-- Table structure for table `exam_notas`
--

CREATE TABLE `exam_notas` (
  `nota_id` int(11) NOT NULL,
  `test_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `nota` varchar(10) NOT NULL,
  `materia_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_notas`
--

INSERT INTO `exam_notas` (`nota_id`, `test_id`, `user_id`, `nota`, `materia_id`) VALUES
(13, 28, 19, '0/1', 7),
(14, 24, 19, '1/3', 6),
(16, 25, 19, '1/2', 8),
(18, 29, 19, '3/3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_question`
--

CREATE TABLE `exam_question` (
  `quest_id` int(11) NOT NULL,
  `test_id` int(5) DEFAULT NULL,
  `quest_desc` varchar(300) DEFAULT NULL,
  `ans1` varchar(300) DEFAULT NULL,
  `ans2` varchar(300) DEFAULT NULL,
  `ans3` varchar(300) DEFAULT NULL,
  `ans4` varchar(300) DEFAULT NULL,
  `res_correct` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_question`
--

INSERT INTO `exam_question` (`quest_id`, `test_id`, `quest_desc`, `ans1`, `ans2`, `ans3`, `ans4`, `res_correct`) VALUES
(14, 24, 'Que es una resistencia?', 'Un componente que permite disminuir el paso de la corriente por medio del conductor', 'Es un tipo de diodo led', 'Es un componente que se opone al paso de la corriente', 'Es un capitulo de one piece', 3),
(15, 24, 'Que es un diodo?', 'Es un componente el cual permite el paso de la tension', 'Es un componente que permite el paso de la corriente dependiendo de si en el cae un minimo de 0.7v de tension', 'Es un amplificador ', 'Es un transistor bipolar', 2),
(16, 25, 'Que es una pala?', '1', '2', '3', 'Pala', 4),
(17, 25, 'Que es trabajo?', '1', '2', '3', 'Algo', 4),
(18, 24, 'sas', 'eperope', 'ertpoerit', 'ertert', 'ertert', 3),
(19, 28, 'Hola', '1', '2', '3', '4', 1),
(20, 29, 'pregunta 1', '1', '2', '3', '4', 1),
(21, 29, 'pregunta 2', '1', '2', '3', '4', 2),
(22, 29, 'pregunta 3', '1', '2', '3', '4', 3);

-- --------------------------------------------------------

--
-- Table structure for table `exam_test`
--

CREATE TABLE `exam_test` (
  `test_id` int(5) NOT NULL,
  `idmateria` int(4) NOT NULL,
  `test_name` varchar(30) DEFAULT NULL,
  `idcurso` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_test`
--

INSERT INTO `exam_test` (`test_id`, `idmateria`, `test_name`, `idcurso`) VALUES
(24, 6, 'Introduccion a la electronica', 11),
(25, 8, 'Seguridad en el trabajo', 11),
(27, 7, 'test 2', 11),
(28, 7, 'test 3', 11),
(29, 1, 'ejemplo', 11);

-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE `materia` (
  `idmateria` int(11) NOT NULL,
  `materia` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materia`
--

INSERT INTO `materia` (`idmateria`, `materia`) VALUES
(1, 'inglés'),
(2, 'matematicas'),
(3, 'programacion'),
(4, 'geografia'),
(5, 'historia'),
(6, 'electronica'),
(7, 'fundamento'),
(8, 'comunicaciones'),
(12, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

CREATE TABLE `noticias` (
  `idnoticia` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `contenido` varchar(800) NOT NULL,
  `fecha_subido` datetime NOT NULL,
  `nombre_archivo` varchar(100) DEFAULT NULL,
  `idusuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`idnoticia`, `titulo`, `contenido`, `fecha_subido`, `nombre_archivo`, `idusuario`) VALUES
(2, 'Prueba2', 'dqwdqhebwqbeuyqwbeub', '2022-08-04 16:13:46', '', 18),
(5, 'Prueba final', 'prueba', '2022-10-13 17:07:53', '', 18),
(6, 'ss', 'class', '2022-10-13 17:08:30', '', 18),
(11, 'sadasd', 'asdasda', '2022-11-15 19:10:40', 'Diagrama 1 (2).jpeg', 18),
(13, 'sas', 'sassa', '2022-11-24 14:11:53', '', 18);

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`idrol`, `rol`) VALUES
(1, 'Admin'),
(2, 'Profesor'),
(3, 'Alumno');

-- --------------------------------------------------------

--
-- Table structure for table `tarea`
--

CREATE TABLE `tarea` (
  `idtarea` int(11) NOT NULL,
  `curso` int(3) NOT NULL,
  `materia` int(3) NOT NULL,
  `titulo` varchar(75) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `nombre_archivo` varchar(100) NOT NULL,
  `idusuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tarea`
--

INSERT INTO `tarea` (`idtarea`, `curso`, `materia`, `titulo`, `descripcion`, `fecha_creacion`, `nombre_archivo`, `idusuario`) VALUES
(5, 10, 2, 'uihuihuh', 'yguygyuguyygu', '2022-08-04 01:43:00', '', 18),
(8, 8, 2, 'GOL', 'ESTUDIENdiez', '2022-10-13 16:45:08', '', 18),
(10, 13, 4, 'test', 'test 2', '2022-11-03 14:35:24', '', 18),
(11, 11, 8, 'el pepe', 'amogus', '2022-11-18 01:18:21', '', 18),
(12, 11, 8, 'test', 'hola', '2022-11-18 01:18:47', 'Gaturro_estatua.jpg', 18),
(15, 3, 6, 'test', 'sas', '2022-11-29 12:32:12', '', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tarea_alumnos`
--

CREATE TABLE `tarea_alumnos` (
  `idrespuesta` int(11) NOT NULL,
  `idtarea` int(5) NOT NULL,
  `nombre_archivo` varchar(100) NOT NULL,
  `fecha_enviado` datetime NOT NULL,
  `idusuario` int(5) NOT NULL,
  `curso` int(5) NOT NULL,
  `materia` int(5) NOT NULL,
  `idcreador` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tarea_alumnos`
--

INSERT INTO `tarea_alumnos` (`idrespuesta`, `idtarea`, `nombre_archivo`, `fecha_enviado`, `idusuario`, `curso`, `materia`, `idcreador`) VALUES
(1, 12, 'casco.jpg', '2022-11-29 13:08:58', 19, 11, 8, 18);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `intentos` int(1) NOT NULL DEFAULT 5,
  `cursos` varchar(100) NOT NULL,
  `temavis` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `correo`, `usuario`, `clave`, `rol`, `estatus`, `intentos`, `cursos`, `temavis`) VALUES
(18, 'diez', 'lautaro10.colegio@gmail.com', 'diez', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 5, '-1-3-4', '5'),
(19, 'Lautaro', 'diezprocapoxd@gmail.com', 'Alumno', 'e10adc3949ba59abbe56e057f20f883e', 3, 1, 5, '-11', '5'),
(20, 'Lautaro2', 'diezprocapoxd2@gmail.com', 'Profesor', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, 5, '-3', '2'),
(25, 'USUARIOPRUE', '33@gmail.com', 'ELBROMAS', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 5, '-4', '1'),
(30, 'jorge', 'jorge@gmail.com', 'El Chorch', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 5, '-5', '1'),
(31, 'johni', 'joni@gmail.com', 'el shoni', '81dc9bdb52d04dc20036dbd8313ed055', 2, 1, 5, '-6', '1'),
(32, 'juan', 'juan@gmail.com', 'el juancho', '81dc9bdb52d04dc20036dbd8313ed055', 3, 1, 5, '-7', '1'),
(33, 'juan', 'pepe@gmail.com', 'lol', '81dc9bdb52d04dc20036dbd8313ed055', 2, 1, 5, '-2-4-6-8-10', '1'),
(34, 'amogus', 'sus@gmail.com', 'sus', '81dc9bdb52d04dc20036dbd8313ed055', 3, 1, 5, '-4', '1'),
(35, 'asjkdhasjkld', 'askdhaskdh@gmail.com', 'asdkashdkjas', 'a87ddd71d9eef30b4136635e8b4310dd', 3, 1, 5, '-4', '1'),
(36, 'akasjlqwyoqweuioqweuio', 'qeuieywqeuioy@gmail.com', 'wqdasdaw', '84ed30001fcccfc70cc54b02b82bbe7d', 3, 1, 5, '-8', '1'),
(38, 'hola', 'hola@gmail.com', 'hola', '81dc9bdb52d04dc20036dbd8313ed055', 3, 1, 5, '-1', '2'),
(39, 'ojasdnoawdoadns', 'awowdhdoawi@gmail.com', 'test', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 5, '-1-3-5-7-9-11', '1'),
(40, 'Servidio', 'Servidio@gmail.com', 'servidio', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, 5, '-8-9-10-11', '2'),
(41, 'jorge', 'jorge12@gmail.com', 'El George', '81dc9bdb52d04dc20036dbd8313ed055', 3, 1, 5, '', '1'),
(42, 'test', 'test@gmail.com', 'test', '81dc9bdb52d04dc20036dbd8313ed055', 2, 1, 5, '-1-14', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_privado`
--
ALTER TABLE `chat_privado`
  ADD PRIMARY KEY (`mensaje_id`),
  ADD KEY `emisor_id` (`emisor_id`),
  ADD KEY `receptor_id` (`receptor_id`);

--
-- Indexes for table `chat_publico`
--
ALTER TABLE `chat_publico`
  ADD PRIMARY KEY (`mensaje_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`ideventos`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indexes for table `exam_notas`
--
ALTER TABLE `exam_notas`
  ADD PRIMARY KEY (`nota_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `materia_id` (`materia_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD PRIMARY KEY (`quest_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `exam_test`
--
ALTER TABLE `exam_test`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `idmateria` (`idmateria`),
  ADD KEY `idcurso` (`idcurso`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idmateria`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idnoticia`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indexes for table `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`idtarea`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `curso` (`curso`),
  ADD KEY `materia` (`materia`);

--
-- Indexes for table `tarea_alumnos`
--
ALTER TABLE `tarea_alumnos`
  ADD PRIMARY KEY (`idrespuesta`),
  ADD KEY `idtarea` (`idtarea`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `curso` (`curso`),
  ADD KEY `materia` (`materia`),
  ADD KEY `idcreador` (`idcreador`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_privado`
--
ALTER TABLE `chat_privado`
  MODIFY `mensaje_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chat_publico`
--
ALTER TABLE `chat_publico`
  MODIFY `mensaje_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `ideventos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `exam_notas`
--
ALTER TABLE `exam_notas`
  MODIFY `nota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `exam_question`
--
ALTER TABLE `exam_question`
  MODIFY `quest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `exam_test`
--
ALTER TABLE `exam_test`
  MODIFY `test_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `idmateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idnoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tarea`
--
ALTER TABLE `tarea`
  MODIFY `idtarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tarea_alumnos`
--
ALTER TABLE `tarea_alumnos`
  MODIFY `idrespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_privado`
--
ALTER TABLE `chat_privado`
  ADD CONSTRAINT `chat_privado_ibfk_1` FOREIGN KEY (`emisor_id`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `chat_privado_ibfk_2` FOREIGN KEY (`receptor_id`) REFERENCES `usuario` (`idusuario`);

--
-- Constraints for table `chat_publico`
--
ALTER TABLE `chat_publico`
  ADD CONSTRAINT `chat_publico_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `chat_publico_ibfk_2` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`idcurso`);

--
-- Constraints for table `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Constraints for table `exam_notas`
--
ALTER TABLE `exam_notas`
  ADD CONSTRAINT `exam_notas_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `exam_test` (`test_id`),
  ADD CONSTRAINT `exam_notas_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `exam_notas_ibfk_3` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`idmateria`),
  ADD CONSTRAINT `exam_notas_ibfk_4` FOREIGN KEY (`test_id`) REFERENCES `exam_test` (`test_id`);

--
-- Constraints for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD CONSTRAINT `exam_question_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `exam_test` (`test_id`);

--
-- Constraints for table `exam_test`
--
ALTER TABLE `exam_test`
  ADD CONSTRAINT `exam_test_ibfk_1` FOREIGN KEY (`idmateria`) REFERENCES `materia` (`idmateria`),
  ADD CONSTRAINT `exam_test_ibfk_2` FOREIGN KEY (`idcurso`) REFERENCES `curso` (`idcurso`);

--
-- Constraints for table `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Constraints for table `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `tarea_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `tarea_ibfk_2` FOREIGN KEY (`curso`) REFERENCES `curso` (`idcurso`),
  ADD CONSTRAINT `tarea_ibfk_3` FOREIGN KEY (`materia`) REFERENCES `materia` (`idmateria`);

--
-- Constraints for table `tarea_alumnos`
--
ALTER TABLE `tarea_alumnos`
  ADD CONSTRAINT `tarea_alumnos_ibfk_1` FOREIGN KEY (`idtarea`) REFERENCES `tarea` (`idtarea`),
  ADD CONSTRAINT `tarea_alumnos_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `tarea_alumnos_ibfk_3` FOREIGN KEY (`curso`) REFERENCES `curso` (`idcurso`),
  ADD CONSTRAINT `tarea_alumnos_ibfk_4` FOREIGN KEY (`materia`) REFERENCES `materia` (`idmateria`),
  ADD CONSTRAINT `tarea_alumnos_ibfk_5` FOREIGN KEY (`idcreador`) REFERENCES `usuario` (`idusuario`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`idrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
