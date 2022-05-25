/*Realizado en PHP 7.4.29*/
/*Base de datos MariaDB*/


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*Creacion de roles*/

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `rol` (`idrol`, `rol`) VALUES
(1, 'Admin'),
(2, 'Profesor'),
(3, 'Alumno');

/*Usuarios con rol ya creados por el desarrolador*/

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `usuario` (`idusuario`, `nombre`, `correo`, `usuario`, `clave`, `rol`, `estatus`) VALUES
(18, 'diez', 'lautaro10.colegio@gmail.com', 'diez', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(19, 'Lautaro', 'diezprocapoxd@gmail.com', 'Alumno', 'e10adc3949ba59abbe56e057f20f883e', 3, 1),
(20, 'Lautaro2', 'diezprocapoxd2@gmail.com', 'Profesor', 'e10adc3949ba59abbe56e057f20f883e', 2, 1);


ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `rol` (`rol`);

ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;
