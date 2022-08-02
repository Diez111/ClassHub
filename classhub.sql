-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 02, 2022 at 05:11 AM
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
(1, 'primero'),
(2, 'segundo'),
(3, 'tercero'),
(4, 'cuartoelectronica'),
(5, 'cuartomecanica'),
(6, 'quintoelectronica'),
(7, 'quintomecanica'),
(8, 'sextoelectronica'),
(9, 'sextomecanica'),
(10, 'septimoelectronica'),
(11, 'septimomecanica');

-- --------------------------------------------------------

--
-- Table structure for table `exam_question`
--

CREATE TABLE `exam_question` (
  `que_id` int(5) NOT NULL,
  `test_id` int(5) DEFAULT NULL,
  `que_desc` varchar(150) DEFAULT NULL,
  `ans1` varchar(75) DEFAULT NULL,
  `ans2` varchar(75) DEFAULT NULL,
  `ans3` varchar(75) DEFAULT NULL,
  `ans4` varchar(75) DEFAULT NULL,
  `true_ans` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_question`
--

INSERT INTO `exam_question` (`que_id`, `test_id`, `que_desc`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`) VALUES
(16, 8, '¿Qué tipo de datos predeterminados?\r\n', 'String', 'Variant', 'Integer', 'Boolear', 2),
(17, 8, '¿Qué es el estilo de borde de formulario predeterminado?\r\n', 'Fixed Single', 'None', 'Sizeable', 'Fixed Diaglog', 3),
(18, 8, '¿Cuál no es el tipo de Control?\r\n', 'text', 'lable', 'checkbox', 'option button', 1),
(19, 9, '¿Cuál de los siguientes contextos está disponible en la ventana Agregar reloj?\r\n', 'Project', 'Module', 'Procedure', 'All', 4),
(20, 9, '¿Qué ventana le permitirá detener la ejecución de su código cuando cambie una variable?\r\n', 'La ventana de la pila de llamadas\r\n', 'La ventana inmediata\r\n', 'La ventana local', 'La ventana del reloj\r\n', 4),
(22, 9, '¿Cómo se puede imprimir el nombre del objeto asociado con el último error de VB en la ventana Inmediato?\r\n', 'Debug.Print Err.Number', 'Debug.Print Err.Source', 'Debug.Print Err.Description', 'Debug.Print Err.LastDLLError', 2),
(23, 9, '¿Cómo se puede imprimir el nombre del objeto asociado con el último error de VB en la ventana Inmediato?\r\n', 'Debug.Print Err.Number', 'Debug.Print Err.Source', 'Debug.Print Err.Description', 'Debug.Print Err.LastDLLError', 2),
(24, 9, '¿Qué función realiza la propiedad TabStop en un botón de comando?\r\n', 'Determina si el botón puede obtener el foco\r\n', 'Si se establece en False, deshabilita la propiedad Tabindex.\r\n', 'Determina el orden en que el botón recibirá el foco\r\n', 'Determina si la secuencia de teclas de acceso puede ser utilizada\r\n', 1),
(25, 10, 'Tu aplicación crea una instancia de un formulario. ¿Cuál es el primer evento que se desencadenará en el de?\r\n', 'Load', 'GotFocus', 'Instance', 'Initialize', 4),
(26, 10, '¿Cuál de las siguientes es la notación húngara para un menú?\r\n', 'Menu', 'Men', 'mnu', 'MN', 3),
(27, 10, 'Está listo para ejecutar su programa para ver si funciona. ¿Qué tecla en su teclado iniciará el programa?\r\n', 'F2', 'F3', 'F4', 'F5', 4),
(28, 10, '¿Cuál de los siguientes fragmentos de código descargará un formulario llamado frmFo0rm de la memoria?\r\n', 'Unload Form', 'Unload This', 'Unload Me', 'Unload', 3),
(29, 10, 'Desea que el texto en el cuadro de texto denominado txtMyText lea Mi texto. ¿En qué propiedad colocará esta cadena?\r\n', 'Caption', 'Text', 'String', 'None of the above', 2),
(30, 11, 'cómo usar date () en mysql?\r\n', 'now( )', 'today( )', 'date( )', 'time( )', 0),
(31, 11, 'cómo usar date () en mysql?\r\n', 'now( )', 'today( )', 'date( )', 'time( )', 0),
(41, 0, '', '', '', '', '', 0),
(42, 12, 'Horas', 'horas trajando en java', 'horas trajando en c++', 'horas trajando en cobol', 'horas trajando en prolog', 0),
(43, 0, '', '', '', '', '', 0),
(44, 0, '', '', '', '', '', 0),
(45, 0, '', '', '', '', '', 0),
(46, 0, '', '', '', '', '', 0),
(47, 0, '', '', '', '', '', 0),
(48, 0, '', '', '', '', '', 0),
(49, 13, 'Que es android', 'Un sistema operativo', 'Un televisor', 'Una empresa', 'Un compilador', 1),
(50, 13, 'De que lenguaje deriva android', 'De unix', 'De linux', 'De devian', 'De windows', 2),
(51, 13, 'Android es un lenguaje de programacion orientado a objetos', 'SI ', 'NO', 'si y no ', 'ninguna de la anteriores', 1),
(52, 0, '', '', '', '', '', 0),
(53, 14, 'RESPUESTA 1', '1', '2', '3', '4', 1),
(54, 14, 'RESPUESTA 2', '1', '2', '3', '4', 2),
(55, 15, 'gas1', '1', '2', '3', '4', 1),
(56, 15, 'GAS2', '1', '2', '3', '4', 2),
(57, 15, 'GAS3', '1', '2', '3', '4', 3);

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `login` varchar(20) DEFAULT NULL,
  `test_id` int(5) DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `score` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_result`
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
-- Table structure for table `exam_subject`
--

CREATE TABLE `exam_subject` (
  `idtema` int(5) NOT NULL,
  `tema` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_subject`
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
(11, 'GAS');

-- --------------------------------------------------------

--
-- Table structure for table `exam_test`
--

CREATE TABLE `exam_test` (
  `test_id` int(5) NOT NULL,
  `idtema` int(5) DEFAULT NULL,
  `test_name` varchar(30) DEFAULT NULL,
  `total_que` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_test`
--

INSERT INTO `exam_test` (`test_id`, `idtema`, `test_name`, `total_que`) VALUES
(8, 1, 'VB Basic Test', '3'),
(9, 1, 'Essentials of VB', '5'),
(10, 1, 'Creating User Services', '5'),
(11, 7, 'function', '5'),
(12, 8, 'horas', '4'),
(13, 9, 'Introduccion a android', '3'),
(14, 10, 'PRUEBA2', '2'),
(15, 11, 'GASJUAREZ', '3');

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
-- Table structure for table `mst_useranswer`
--

CREATE TABLE `mst_useranswer` (
  `sess_id` varchar(80) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `que_des` varchar(200) DEFAULT NULL,
  `ans1` varchar(50) DEFAULT NULL,
  `ans2` varchar(50) DEFAULT NULL,
  `ans3` varchar(50) DEFAULT NULL,
  `ans4` varchar(50) DEFAULT NULL,
  `true_ans` int(11) DEFAULT NULL,
  `your_ans` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_useranswer`
--

INSERT INTO `mst_useranswer` (`sess_id`, `test_id`, `que_des`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`, `your_ans`) VALUES
('2b8e3337837b82112def8d3e2f42f26e', 8, 'What  Default Data Type ?', 'String', 'Variant', 'Integer', 'Boolear', 2, 1),
('2b8e3337837b82112def8d3e2f42f26e', 8, 'What is Default Form Border Style ?', 'Fixed Single', 'None', 'Sizeable', 'Fixed Diaglog', 3, 3),
('2b8e3337837b82112def8d3e2f42f26e', 8, 'Which is not type of Control ?', 'text', 'lable', 'checkbox', 'option button', 1, 3),
('idjir9pcq2d07764us8rdiq9n5', 11, 'how to use date( ) in mysql ?', 'now( )', 'today( )', 'date( )', 'time( )', 0, 1),
('idjir9pcq2d07764us8rdiq9n5', 11, 'how to use date( ) in mysql ?', 'now( )', 'today( )', 'date( )', 'time( )', 0, 1),
('idjir9pcq2d07764us8rdiq9n5', 11, 'how to use date( ) in mysql ?', 'now( )', 'today( )', 'date( )', 'time( )', 0, 2),
('idjir9pcq2d07764us8rdiq9n5', 11, 'how to use date( ) in mysql ?', 'now( )', 'today( )', 'date( )', 'time( )', 0, 3),
('idjir9pcq2d07764us8rdiq9n5', 11, 'how to use date( ) in mysql ?', 'now( )', 'today( )', 'date( )', 'time( )', 0, 4),
('idjir9pcq2d07764us8rdiq9n5', 11, 'how to use date( ) in mysql ?', 'now( )', 'today( )', 'date( )', 'time( )', 0, 4),
('idjir9pcq2d07764us8rdiq9n5', 11, 'how to use date( ) in mysql ?', 'now( )', 'today( )', 'date( )', 'time( )', 0, 3),
('idjir9pcq2d07764us8rdiq9n5', 11, 'how to use date( ) in mysql ?', 'now( )', 'today( )', 'date( )', 'time( )', 0, 2),
('idjir9pcq2d07764us8rdiq9n5', 11, 'how to use date( ) in mysql ?', 'now( )', 'today( )', 'date( )', 'time( )', 0, 2),
('idjir9pcq2d07764us8rdiq9n5', 11, 'how to use date( ) in mysql ?', 'now( )', 'today( )', 'date( )', 'time( )', 0, 1),
('idjir9pcq2d07764us8rdiq9n5', 11, 'how to use date( ) in mysql ?', 'now( )', 'today( )', 'date( )', 'time( )', 0, 1),
('aefs193jlq9ql5lu0nt6vgt6ob', 12, 'Horas', 'horas trajando en java', 'horas trajando en c++', 'horas trajando en cobol', 'horas trajando en prolog', 0, 4),
('aefs193jlq9ql5lu0nt6vgt6ob', 11, 'how to use date( ) in mysql ?', 'now( )', 'today( )', 'date( )', 'time( )', 0, 3),
('aefs193jlq9ql5lu0nt6vgt6ob', 11, 'how to use date( ) in mysql ?', 'now( )', 'today( )', 'date( )', 'time( )', 0, 4),
('343dh8i5joabd77699jkteprt6', 13, 'Que es android', 'Un sistema operativo', 'Un televisor', 'Una empresa', 'Un compilador', 1, 1),
('343dh8i5joabd77699jkteprt6', 13, 'De que lenguaje deriva android', 'De unix', 'De linux', 'De devian', 'De windows', 2, 2),
('343dh8i5joabd77699jkteprt6', 13, 'Android es un lenguaje de programacion orientado a objetos', 'SI ', 'NO', 'si y no ', 'ninguna de la anteriores', 1, 2),
('711b97e47c0d4e61cbae9e93ffa5f74b', 15, 'gas1', '1', '2', '3', '4', 1, 1),
('711b97e47c0d4e61cbae9e93ffa5f74b', 15, 'GAS2', '1', '2', '3', '4', 2, 2),
('711b97e47c0d4e61cbae9e93ffa5f74b', 15, 'GAS3', '1', '2', '3', '4', 3, 1),
('4c8c046339446d86fc77b93d64f197bd', 15, 'gas1', '1', '2', '3', '4', 1, 1),
('4c8c046339446d86fc77b93d64f197bd', 15, 'GAS2', '1', '2', '3', '4', 2, 2),
('4c8c046339446d86fc77b93d64f197bd', 15, 'GAS3', '1', '2', '3', '4', 3, 3);

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
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `rol` int(11) DEFAULT NULL,
  `curso` int(11) DEFAULT NULL,
  `materia` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `rol`, `curso`, `materia`, `title`, `description`, `create_at`) VALUES
(31, NULL, 11, 2, 'epica la music', 'https://music.youtube.com/watch?v=XpjsdEu1N8o&list=LM', '2022-06-13 04:07:51'),
(35, NULL, 11, 2, 'uj', 'uj', '2022-06-13 04:40:38'),
(36, NULL, 2, 2, 'hola', 'como te va', '2022-06-13 16:09:02');

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
  `curso` int(11) DEFAULT NULL,
  `materia` int(11) DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `intentos` int(1) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `correo`, `usuario`, `clave`, `rol`, `curso`, `materia`, `estatus`, `intentos`) VALUES
(18, 'diez', 'lautaro10.colegio@gmail.com', 'diez', 'e10adc3949ba59abbe56e057f20f883e', 1, 11, 1, 1, 5),
(19, 'Lautaro', 'diezprocapoxd@gmail.com', 'Alumno', 'e10adc3949ba59abbe56e057f20f883e', 3, 11, 1, 1, 5),
(20, 'Lautaro2', 'diezprocapoxd2@gmail.com', 'Profesor', 'e10adc3949ba59abbe56e057f20f883e', 2, 9, 1, 1, 5),
(25, 'USUARIOPRUE', '33@gmail.com', 'ELBROMAS', 'e10adc3949ba59abbe56e057f20f883e', 1, 10, 1, 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`);

--
-- Indexes for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `exam_subject`
--
ALTER TABLE `exam_subject`
  ADD PRIMARY KEY (`idtema`);

--
-- Indexes for table `exam_test`
--
ALTER TABLE `exam_test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idmateria`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso` (`curso`),
  ADD KEY `materia` (`materia`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `rol` (`rol`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `curso` (`curso`),
  ADD KEY `materia` (`materia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `exam_question`
--
ALTER TABLE `exam_question`
  MODIFY `que_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `exam_subject`
--
ALTER TABLE `exam_subject`
  MODIFY `idtema` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `exam_test`
--
ALTER TABLE `exam_test`
  MODIFY `test_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `idmateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
