-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-09-2022 a las 21:16:02
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
-- Estructura de tabla para la tabla `chat_privado`
--

CREATE TABLE `chat_privado` (
  `mensaje_id` int(11) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `emisor_id` int(4) NOT NULL,
  `receptor_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chat_privado`
--

INSERT INTO `chat_privado` (`mensaje_id`, `mensaje`, `emisor_id`, `receptor_id`) VALUES
(1, 'hola', 39, 18),
(2, 'hola lol', 18, 39),
(3, 'sas', 18, 39),
(4, 'sus', 39, 18),
(5, 'sas', 39, 18),
(6, 'sas', 39, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat_publico`
--

CREATE TABLE `chat_publico` (
  `mensaje_id` int(11) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `usuario_id` int(4) NOT NULL,
  `curso_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chat_publico`
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
(16, 'asd', 18, 2);

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
-- Estructura de tabla para la tabla `exam_notas`
--

CREATE TABLE `exam_notas` (
  `nota_id` int(11) NOT NULL,
  `test_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `nota` int(3) NOT NULL,
  `cant_quest` int(3) NOT NULL,
  `tema_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `exam_notas`
--

INSERT INTO `exam_notas` (`nota_id`, `test_id`, `user_id`, `nota`, `cant_quest`, `tema_id`) VALUES
(2, 22, 19, 3, 4, 15);

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
  `res_correct` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `exam_question`
--

INSERT INTO `exam_question` (`quest_id`, `test_id`, `quest_desc`, `ans1`, `ans2`, `ans3`, `ans4`, `res_correct`) VALUES
(1, 19, 'holaaaaaaaaa', 'sas', 'ses', 'lol', 'sus', 4),
(2, 20, 'hola', '1', '2', '3', '4', 5),
(8, 22, 'p1', '1', '2', '3', '4', 1),
(9, 22, 'p2', '1', '2', '3', '4', 2),
(10, 22, 'p3', '1', '2', '3', '4', 3),
(11, 22, 'p4', '1', '2', '3', '4', 4);

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
-- Estructura de tabla para la tabla `exam_userans`
--

CREATE TABLE `exam_userans` (
  `res_id` int(11) NOT NULL,
  `test_id` int(5) NOT NULL,
  `res_user` int(3) NOT NULL,
  `res_correct` int(3) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `exam_userans`
--

INSERT INTO `exam_userans` (`res_id`, `test_id`, `res_user`, `res_correct`, `user_id`) VALUES
(9, 22, 1, 1, 19),
(10, 22, 2, 2, 19),
(11, 22, 3, 3, 19),
(12, 22, 2, 4, 19);

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
  `intentos` int(1) NOT NULL DEFAULT 5,
  `cursos` varchar(100) NOT NULL,
  `temavis` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `correo`, `usuario`, `clave`, `rol`, `curso`, `materia`, `estatus`, `intentos`, `cursos`, `temavis`) VALUES
(18, 'diez', 'lautaro10.colegio@gmail.com', 'diez', 'e10adc3949ba59abbe56e057f20f883e', 1, 10, 1, 1, 5, '', '2'),
(19, 'Lautaro', 'diezprocapoxd@gmail.com', 'Alumno', 'e10adc3949ba59abbe56e057f20f883e', 3, 11, 1, 1, 5, '', '1'),
(20, 'Lautaro2', 'diezprocapoxd2@gmail.com', 'Profesor', 'e10adc3949ba59abbe56e057f20f883e', 2, 9, 1, 1, 5, '', '1'),
(25, 'USUARIOPRUE', '33@gmail.com', 'ELBROMAS', 'e10adc3949ba59abbe56e057f20f883e', 1, 10, 1, 1, 5, '', '1'),
(30, 'jorge', 'jorge@gmail.com', 'El Chorch', '81dc9bdb52d04dc20036dbd8313ed055', 1, 10, NULL, 1, 5, '', '1'),
(31, 'johni', 'joni@gmail.com', 'el shoni', '81dc9bdb52d04dc20036dbd8313ed055', 2, 11, NULL, 1, 5, '', '1'),
(32, 'juan', 'juan@gmail.com', 'el juancho', '81dc9bdb52d04dc20036dbd8313ed055', 3, 10, NULL, 1, 5, '', '1'),
(33, 'juan', 'pepe@gmail.com', 'lol', '81dc9bdb52d04dc20036dbd8313ed055', 2, 2, NULL, 1, 5, '-2-4-6-8-10', '1'),
(34, 'amogus', 'sus@gmail.com', 'sus', '81dc9bdb52d04dc20036dbd8313ed055', 3, 4, NULL, 1, 5, '-4', '1'),
(35, 'asjkdhasjkld', 'askdhaskdh@gmail.com', 'asdkashdkjas', 'a87ddd71d9eef30b4136635e8b4310dd', 3, NULL, NULL, 1, 5, '-4', '1'),
(36, 'akasjlqwyoqweuioqweuio', 'qeuieywqeuioy@gmail.com', 'wqdasdaw', '84ed30001fcccfc70cc54b02b82bbe7d', 3, NULL, NULL, 1, 5, '-8', '1'),
(37, 'admin2', 'hola@gmail.com', 'sas', '81dc9bdb52d04dc20036dbd8313ed055', 1, NULL, NULL, 1, 5, '-11', '1'),
(38, 'hola', 'hola@gmail.com', 'hola', '81dc9bdb52d04dc20036dbd8313ed055', 3, NULL, NULL, 1, 5, '-1', '6'),
(39, 'ojasdnoawdoadns', 'awowdhdoawi@gmail.com', 'test', '81dc9bdb52d04dc20036dbd8313ed055', 1, NULL, NULL, 1, 5, '-1-3-5-7-9-11', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat_privado`
--
ALTER TABLE `chat_privado`
  ADD PRIMARY KEY (`mensaje_id`);

--
-- Indices de la tabla `chat_publico`
--
ALTER TABLE `chat_publico`
  ADD PRIMARY KEY (`mensaje_id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`);

--
-- Indices de la tabla `exam_notas`
--
ALTER TABLE `exam_notas`
  ADD PRIMARY KEY (`nota_id`);

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
-- Indices de la tabla `exam_userans`
--
ALTER TABLE `exam_userans`
  ADD PRIMARY KEY (`res_id`);

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
  ADD KEY `materia` (`materia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat_privado`
--
ALTER TABLE `chat_privado`
  MODIFY `mensaje_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `chat_publico`
--
ALTER TABLE `chat_publico`
  MODIFY `mensaje_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `exam_notas`
--
ALTER TABLE `exam_notas`
  MODIFY `nota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT de la tabla `exam_userans`
--
ALTER TABLE `exam_userans`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
