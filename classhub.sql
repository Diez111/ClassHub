-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-08-2022 a las 01:19:02
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `classhub`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idcurso` int(11) NOT NULL,
  `curso` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idcurso`, `curso`) VALUES
(1, 'Primero'),
(2, 'Segundo'),
(3, 'Tercero'),
(4, 'Cuarto EL'),
(5, 'Cuarto EM'),
(6, 'Quinto EL'),
(7, 'Quinto EM'),
(8, 'Sexto EL'),
(9, 'Sexto EM'),
(10, 'Septimo EL'),
(11, 'Septimo EM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam_question`
--

CREATE TABLE `exam_question` (
  `quest_id` int(11) NOT NULL,
  `test_id` int(5) DEFAULT NULL,
  `quest_desc` varchar(300) DEFAULT NULL,
  `ans1` varchar(300) DEFAULT NULL,
  `ans2` varchar(300) DEFAULT NULL,
  `ans3` varchar(300) DEFAULT NULL,
  `ans4` varchar(300) DEFAULT NULL,
  `res_correct` int(1) DEFAULT NULL,
  `res_user` int(3) NOT NULL DEFAULT 0,
  `user_id` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `exam_question`
--

INSERT INTO `exam_question` (`quest_id`, `test_id`, `quest_desc`, `ans1`, `ans2`, `ans3`, `ans4`, `res_correct`, `res_user`, `user_id`) VALUES
(1, 19, 'holaaaaaaaaa', 'sas', 'ses', 'lol', 'sus', 4, 0, 0),
(2, 20, 'hola', '1', '2', '3', '4', 5, 0, 0),
(8, 22, 'p1', '1', '2', '3', '4', 1, 1, 19),
(9, 22, 'p2', '1', '2', '3', '4', 2, 2, 19),
(10, 22, 'p3', '1', '2', '3', '4', 3, 3, 19),
(11, 22, 'p4', '1', '2', '3', '4', 4, 1, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam_result`
--

CREATE TABLE `exam_result` (
  `login` varchar(20) DEFAULT NULL,
  `test_id` int(5) DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `score` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exam_result`
--

INSERT INTO `exam_result` (`login`, `test_id`, `test_date`, `score`) VALUES
('raj', 8, '0000-00-00', 3),
('raj', 9, '0000-00-00', 3),
('raj', 8, '0000-00-00', 1),
('ashish', 10, '0000-00-00', 3),
('ashish', 9, '0000-00-00', 2),
('ashish', 10, '0000-00-00', 0),
('raj', 8, '0000-00-00', 0),
('ankur', 11, '0000-00-00', 0),
('admin', 12, '0000-00-00', 0),
('diez', 13, '0000-00-00', 2),
('diez', 14, '0000-00-00', 2),
('diez', 11, '0000-00-00', 0),
('diez', 12, '0000-00-00', 0),
('lautaro', 14, '0000-00-00', 2),
('diez', 14, '0000-00-00', 2),
('Lautaro', 14, '0000-00-00', 2),
('Lautaro', 15, '0000-00-00', 2),
('diez', 15, '0000-00-00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam_results`
--

CREATE TABLE `exam_results` (
  `user_id` int(3) NOT NULL,
  `test_id` int(3) NOT NULL,
  `nota` int(3) NOT NULL,
  `cant_quest` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `exam_results`
--

INSERT INTO `exam_results` (`user_id`, `test_id`, `nota`, `cant_quest`) VALUES
(19, 22, 0, 4),
(19, 22, 3, 4),
(19, 22, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam_subject`
--

CREATE TABLE `exam_subject` (
  `idtema` int(5) NOT NULL,
  `tema` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exam_subject`
--

INSERT INTO `exam_subject` (`idtema`, `tema`) VALUES
(1, 'VB'),
(2, 'Oracle'),
(3, 'Java'),
(4, 'PHP'),
(5, 'Computer Fundamental'),
(6, 'Networking'),
(7, 'mysql'),
(8, 'C++'),
(9, 'android'),
(10, 'PRUEBA'),
(11, 'GAS'),
(12, 'Almaraz'),
(13, 'sadasd'),
(14, 'Tucson'),
(15, 'Pruebafinal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam_test`
--

CREATE TABLE `exam_test` (
  `test_id` int(5) NOT NULL,
  `idtema` int(5) DEFAULT NULL,
  `test_name` varchar(30) DEFAULT NULL,
  `total_que` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exam_test`
--

INSERT INTO `exam_test` (`test_id`, `idtema`, `test_name`, `total_que`) VALUES
(8, 1, 'VB Basic Test', '3'),
(9, 1, 'Essentials of VB', '5'),
(10, 1, 'Creating User Services', '5'),
(11, 7, 'function', '5'),
(12, 8, 'horas', '4'),
(13, 9, 'Introduccion a android', '3'),
(14, 10, 'PRUEBA2', '2'),
(15, 11, 'GASJUAREZ', '3'),
(16, 8, 'vectores', '10'),
(19, 13, 'pepe', '3'),
(20, 14, 'xadasd', '5'),
(22, 15, 'Domadosssssssssss', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `idmateria` int(11) NOT NULL,
  `materia` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idmateria`, `materia`) VALUES
(1, 'ingles'),
(2, 'matematicas'),
(3, 'programacion'),
(4, 'geografia'),
(5, 'historia'),
(6, 'electronica'),
(7, 'fundamento'),
(8, 'comunicaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `idnoticia` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `contenido` varchar(800) NOT NULL,
  `fecha_subido` datetime NOT NULL,
  `nombre_archivo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idnoticia`, `titulo`, `contenido`, `fecha_subido`, `nombre_archivo`) VALUES
(1, 'Prueba', 'adsjksdfbhjsefbhjsefbhsfdhsdfhjsdfbh', '2022-08-04 16:11:52', 'Captura desde 2022-08-04 14-08-50.png'),
(2, 'Prueba2', 'dqwdqhebwqbeuyqwbeub', '2022-08-04 16:13:46', 'GRUPO-2_PLANIFICACION-DEL-PROYECTO.xlsx'),
(3, 'Prueba3', 'asdiuuysadgabwuydbqwuyawb', '2022-08-04 16:17:04', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol`) VALUES
(1, 'Admin'),
(2, 'Profesor'),
(3, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `idtarea` int(11) NOT NULL,
  `curso` int(3) NOT NULL,
  `materia` int(3) NOT NULL,
  `titulo` varchar(75) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `idcreador` int(3) NOT NULL,
  `nombre_archivo` varchar(100) NOT NULL,
  `rol` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`idtarea`, `curso`, `materia`, `titulo`, `descripcion`, `fecha_creacion`, `idcreador`, `nombre_archivo`, `rol`) VALUES
(4, 10, 1, 'PEPEPEPEPEOPE', 'ETE SECH AMOGUS', '2022-08-04 01:02:41', 18, 'TP Investigacion.docx', 1),
(5, 10, 2, 'uihuihuh', 'yguygyuguyygu', '2022-08-04 01:43:00', 18, 'mvc2.zip', 1),
(6, 10, 8, 'prueba', 'asdasdasdsadasdasdasdasdasd', '2022-08-04 03:27:47', 28, 'indumentaria altas temperaturas.pdf', 2),
(7, 11, 8, 'prueba', NULL, '2022-08-04 16:47:01', 19, 'GRUPO-2_PLANIFICACION-DEL-PROYECTO.xlsx', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `curso` int(11) DEFAULT NULL,
  `materia` int(11) DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `intentos` int(1) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `correo`, `usuario`, `clave`, `rol`, `curso`, `materia`, `estatus`, `intentos`) VALUES
(18, 'diez', 'lautaro10.colegio@gmail.com', 'diez', 'e10adc3949ba59abbe56e057f20f883e', 1, 10, 1, 1, 5),
(19, 'Lautaro', 'diezprocapoxd@gmail.com', 'Alumno', 'e10adc3949ba59abbe56e057f20f883e', 3, 11, 1, 1, 5),
(20, 'Lautaro2', 'diezprocapoxd2@gmail.com', 'Profesor', 'e10adc3949ba59abbe56e057f20f883e', 2, 9, 1, 1, 5),
(25, 'USUARIOPRUE', '33@gmail.com', 'ELBROMAS', 'e10adc3949ba59abbe56e057f20f883e', 1, 10, 1, 1, 5),
(28, 'carlos', 'asldkjasdlk@gmail', 'carlos', '81dc9bdb52d04dc20036dbd8313ed055', 2, 10, 1, 1, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`);

--
-- Indices de la tabla `exam_question`
--
ALTER TABLE `exam_question`
  ADD PRIMARY KEY (`quest_id`);

--
-- Indices de la tabla `exam_subject`
--
ALTER TABLE `exam_subject`
  ADD PRIMARY KEY (`idtema`);

--
-- Indices de la tabla `exam_test`
--
ALTER TABLE `exam_test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idmateria`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idnoticia`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`idtarea`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `rol` (`rol`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `curso` (`curso`),
	 ADD COLUMN recuperar varchar(8) NOT NULL,
  ADD KEY `materia` (`materia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `exam_question`
--
ALTER TABLE `exam_question`
  MODIFY `quest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `exam_subject`
--
ALTER TABLE `exam_subject`
  MODIFY `idtema` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `exam_test`
--
ALTER TABLE `exam_test`
  MODIFY `test_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `idmateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idnoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `idtarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
