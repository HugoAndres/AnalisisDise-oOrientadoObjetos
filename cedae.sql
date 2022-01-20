-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-01-2021 a las 00:13:57
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cedae`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

DROP TABLE IF EXISTS `diagnostico`;
CREATE TABLE IF NOT EXISTS `diagnostico` (
  `idDiagnostico` int NOT NULL AUTO_INCREMENT,
  `idHistorial` int NOT NULL,
  `peso` int NOT NULL,
  `estatura` int NOT NULL,
  `presionArterial` varchar(30) NOT NULL,
  `frecuenciaCardiaca` int NOT NULL,
  `frecuenciaRespiratoria` int NOT NULL,
  `temperatura` float NOT NULL,
  `topografia` varchar(300) NOT NULL,
  `morfologia` varchar(500) NOT NULL,
  `pielAnexos` varchar(500) NOT NULL,
  `diagnostico` varchar(300) NOT NULL,
  `tratamiento` varchar(2000) NOT NULL,
  `notaCobro` varchar(300) NOT NULL,
  `motivoConsulta` varchar(2000) NOT NULL,
  `diagnosticada` tinyint(1) NOT NULL,
  `fechaHora` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cie` varchar(80) NOT NULL,
  `descripcion` varchar(700) NOT NULL,
  PRIMARY KEY (`idDiagnostico`),
  KEY `idHistorial` (`idHistorial`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `diagnostico`
--

INSERT INTO `diagnostico` (`idDiagnostico`, `idHistorial`, `peso`, `estatura`, `presionArterial`, `frecuenciaCardiaca`, `frecuenciaRespiratoria`, `temperatura`, `topografia`, `morfologia`, `pielAnexos`, `diagnostico`, `tratamiento`, `notaCobro`, `motivoConsulta`, `diagnosticada`, `fechaHora`, `cie`, `descripcion`) VALUES
(1, 1, 45, 145, '120/80', 66, 12, 36.5, 'D DISEINADA A CARA Y TRONCO POSTERIOR', 'CONSTITUIDA POR 2-3 PAPULAS\r\nERITEMATOSAS , MANCHAS HIEPRIGMENTADAS\r\n, COSTRAS SANGUINEAS', 'ALOPECIA DIFUSA', 'ACNÉ INFLAMATORIO MODERADO EXCORIADO', 'se realiza microdermo + retisses 4%\r\nDT 8400\r\nSE SOLICITAN LABS\r\n1. TREVISSAGE 20MG\r\n2. PHYS AC JABON\r\n3. CLENANACE HYDRA\r\n4. HELIOCARE 50 COMPACTO\r\n5. KOJICOL + BENZAC 2.5 PM\r\n6 U WHITE ADVANCE ESPALDA PM', 'Cobrar $100 por uso de productos', 'Presenta daños a causa de rayos solares', 1, '10/1/2021     09:19pm', '', ''),
(2, 1, 45, 145, '12080', 12, 12, 37, '', '', '', '', '', '', 'Manchas en la nariz', 0, '', '', ''),
(3, 2, 68, 176, '120/80', 12, 12, 37, 'D DISEINADA A CARA Y TRONCO POSTERIOR d', 'DADSADS', 'ASDASDA', 'ADSDAD', 'DASDASDAS', 'DASDASD', 'Daño solar ', 1, '11/1/2021     06:15pm', '', ''),
(4, 3, 60, 176, '120/80', 12, 12, 37, 'D DISEINADA A CARA Y TRONCO POSTERIOR', 'CONSTITUIDA POR 2-3 PAPULAS\r\nERITEMATOSAS , MANCHAS HIEPRIGMENTADAS\r\n, COSTRAS SANGUINEAS', 'ALOPECIA DIFUSA', 'ACNÉ INFLAMATORIO MODERADO EXCORIADO', 'se realiza microdermo + retisses 4%', 'Cobrar $100 por uso de productos dentro de consultorio', 'Granitos en la espalda', 1, '11/1/2021     06:07pm', '', ''),
(5, 1, 56, 167, '120/80', 66, 12, 36, 'D DISEINADA A CARA Y TRONCO POSTERIOR', 'CONSTITUIDA POR 2-3 PAPULAS\r\nERITEMATOSAS , MANCHAS HIEPRIGMENTADAS\r\n, COSTRAS SANGUINEAS', 'ALOPECIA DIFUSA', 'ACNÉ INFLAMATORIO MODERADO EXCORIADO', 'se realiza microdermo + retisses 4%', 'Cobrar $100 por uso de productos', 'Granitos en la espalda', 1, '11/1/2021     07:28pm', '', ''),
(6, 2, 45, 146, '120/80', 12, 12, 36, '', '', '', '', '', '', 'Manchas en la piel', 0, '', '', ''),
(7, 3, 78, 178, '120/12', 12, 12, 37, '', '', '', '', '', '', 'Manchas en la piel', 0, '', '', ''),
(8, 4, 57, 167, '120/12', 12, 12, 37, '', '', '', '', '', '', 'Manchas en el brazo', 0, '', '', ''),
(9, 5, 56, 157, '120/12', 12, 12, 37, '', '', '', '', '', '', 'Granitos en la espalda', 0, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `sucursal` varchar(255) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `end` datetime DEFAULT NULL,
  `doctor` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `sexo`, `tel`, `sucursal`, `correo`, `end`, `doctor`) VALUES
(1, 'Evento Azul', '#0071c5', '2021-01-21 00:00:00', '', '2147483647', 'Satélite', 'correo@electronico.com', '2021-01-22 13:00:00', 'Dr. Karina Gutierrez'),
(2, 'Eventos 2', '#40E0D0', '2021-01-25 00:00:00', '', '2147483647', 'Satélite', 'correo@electronico.com', '2021-01-25 00:00:00', 'Dr. Maria Maldonado'),
(3, 'Doble click para editar evento', '#008000', '2020-01-26 00:00:00', '', '0', '5557351594,', 'correo@electronico.com', '2020-01-26 00:00:00', 'Dr. Arturo Ruiz'),
(8, 'Carlos Muñoz Carbajal', '', '2021-01-18 00:00:00', 'masculino', '', '', '', '2021-01-19 00:00:00', ''),
(9, 'Daniel Pérez Romero', '#008000', '2021-01-19 15:00:00', '', '', '', '', '2021-01-20 16:00:00', ''),
(10, 'Carlos Muñoz Carbajal', '', '2021-01-23 17:00:00', '', '', '', '', '2021-01-23 18:00:00', ''),
(11, 'Cristina Sandoval Castillo', '#FF0000', '2021-01-29 00:00:00', '', '', '', '', '2021-01-30 00:00:00', ''),
(12, 'Marco Rivera Guzmán', '#008000', '2021-01-27 17:00:00', '', '', '', '', '2021-01-27 18:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farmaceuta`
--

DROP TABLE IF EXISTS `farmaceuta`;
CREATE TABLE IF NOT EXISTS `farmaceuta` (
  `idFarmaceuta` int NOT NULL AUTO_INCREMENT,
  `apellidoPaterno` varchar(50) NOT NULL,
  `apellidoMaterno` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `idUsuario` int NOT NULL,
  PRIMARY KEY (`idFarmaceuta`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `farmaceuta`
--

INSERT INTO `farmaceuta` (`idFarmaceuta`, `apellidoPaterno`, `apellidoMaterno`, `nombre`, `idUsuario`) VALUES
(1, 'Sánchez', 'Trejo', 'Alberto', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialclinico`
--

DROP TABLE IF EXISTS `historialclinico`;
CREATE TABLE IF NOT EXISTS `historialclinico` (
  `idHistorial` int NOT NULL AUTO_INCREMENT,
  `idPaciente` int NOT NULL,
  `antecedentesPatologicos` varchar(300) NOT NULL,
  `alergias` varchar(300) NOT NULL,
  `antecedentesHeredofamiliares` varchar(300) NOT NULL,
  PRIMARY KEY (`idHistorial`),
  KEY `idPaciente` (`idPaciente`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historialclinico`
--

INSERT INTO `historialclinico` (`idHistorial`, `idPaciente`, `antecedentesPatologicos`, `alergias`, `antecedentesHeredofamiliares`) VALUES
(3, 3, 'No declaró', 'No declaró', 'No declaró'),
(4, 6, 'No declaró', 'No declaró', 'No declaró'),
(5, 7, 'No declaró', 'No declaró', 'No declaró');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

DROP TABLE IF EXISTS `medicamento`;
CREATE TABLE IF NOT EXISTS `medicamento` (
  `idMedicamento` int NOT NULL AUTO_INCREMENT,
  `codigoBarras` bigint NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `presentacion` varchar(300) NOT NULL,
  `direccionImg` varchar(500) NOT NULL,
  PRIMARY KEY (`idMedicamento`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`idMedicamento`, `codigoBarras`, `nombre`, `presentacion`, `direccionImg`) VALUES
(1, 1, 'Penicilina Pura', 'Suspension oral', 'penicilina-antibiotico-bacteria.jpg'),
(2, 2, 'Crema Dove intensiva', 'Crema', 'dove_skin_care_nutr_intensiva_200ml_fop_7501056346188_ch-651575.png.ulenscale.460x460.jpg'),
(3, 3, 'Crema ozono Dor', 'Crema', 'Crema_ozonoDor.jpg'),
(4, 4, 'Goicochea arnica', 'Crema', 'mayoreototal-caja-crema-goicochea-arnica-de-400-ml-con-12-piezas-genomma-lab-cremas-corporales-y-faciales-genomma-lab-sku_2000x.jpg'),
(5, 5, 'Crema ozono Dor', 'Crema', 'Crema_ozonoDor.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

DROP TABLE IF EXISTS `medico`;
CREATE TABLE IF NOT EXISTS `medico` (
  `idMedico` int NOT NULL AUTO_INCREMENT,
  `idUsuario` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoPaterno` varchar(50) NOT NULL,
  `apellidoMaterno` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `idClinica` int NOT NULL,
  PRIMARY KEY (`idMedico`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idUsuario_2` (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`idMedico`, `idUsuario`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `email`, `telefono`, `idClinica`) VALUES
(1, 1, 'Alberto', 'Gutiérrez', 'Trejo', 'random@gmail.com', '5512246766', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicoauxiliar`
--

DROP TABLE IF EXISTS `medicoauxiliar`;
CREATE TABLE IF NOT EXISTS `medicoauxiliar` (
  `idMedicoAux` int NOT NULL AUTO_INCREMENT,
  `idUsuario` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoPaterno` varchar(50) NOT NULL,
  `apellidoMaterno` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`idMedicoAux`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicoauxiliar`
--

INSERT INTO `medicoauxiliar` (`idMedicoAux`, `idUsuario`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `email`, `telefono`) VALUES
(1, 4, 'Teresa', 'Rosas', 'Hernández', 'random3@gmail.com', '5512246766');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `idPaciente` int NOT NULL AUTO_INCREMENT,
  `idUsuario` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoPaterno` varchar(50) NOT NULL,
  `apellidoMaterno` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ocupacion` varchar(100) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `estadoCivil` varchar(30) NOT NULL,
  `aseguradora` varchar(100) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `confirmado` tinyint(1) NOT NULL,
  `fechaNac` date NOT NULL,
  PRIMARY KEY (`idPaciente`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idPaciente`, `idUsuario`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `email`, `ocupacion`, `genero`, `telefono`, `estadoCivil`, `aseguradora`, `fechaRegistro`, `confirmado`, `fechaNac`) VALUES
(3, 11, 'Ignacio', 'Santos', 'Pérez', 'random@gmail.com', '', 'Masculino', '5577884433', '', '', '2021-01-18', 1, '1989-08-07'),
(7, 13, 'Cristina', 'Sandoval', 'Castillo', 'random@gmail.com', '', 'Femenino', '5544667788', '', '', '2021-01-18', 1, '1990-08-07'),
(6, 12, 'Carlos', 'Muñoz', 'Carbajal', 'random@gmail.com', '', 'Masculino', '5566774422', '', '', '2021-01-18', 1, '2000-10-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcionista`
--

DROP TABLE IF EXISTS `recepcionista`;
CREATE TABLE IF NOT EXISTS `recepcionista` (
  `idRecepcionista` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidoPaterno` varchar(50) NOT NULL,
  `apellidoMaterno` varchar(50) NOT NULL,
  `idSucursal` int NOT NULL,
  `idUsuario` int NOT NULL,
  PRIMARY KEY (`idRecepcionista`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recepcionista`
--

INSERT INTO `recepcionista` (`idRecepcionista`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `idSucursal`, `idUsuario`) VALUES
(2, 'Rosa', 'Gutierrez', 'Martinez', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

DROP TABLE IF EXISTS `receta`;
CREATE TABLE IF NOT EXISTS `receta` (
  `idReceta` int NOT NULL AUTO_INCREMENT,
  `idDiagnostico` int NOT NULL,
  `nombreSucursal` varchar(30) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `nombreMedico` varchar(300) NOT NULL,
  PRIMARY KEY (`idReceta`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`idReceta`, `idDiagnostico`, `nombreSucursal`, `fecha`, `nombreMedico`) VALUES
(1, 5, '', '12-01-2021', 'Alberto Gutiérrez Trejo'),
(2, 5, '', '12-01-2021', 'Alberto Gutiérrez Trejo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

DROP TABLE IF EXISTS `seguimiento`;
CREATE TABLE IF NOT EXISTS `seguimiento` (
  `idSeguimiento` int NOT NULL AUTO_INCREMENT,
  `idDiagnostico` int NOT NULL,
  `fechaHora` varchar(100) NOT NULL,
  `clinica` varchar(50) NOT NULL,
  `motivoConsulta` varchar(1000) NOT NULL,
  `Padecimiento` varchar(3000) NOT NULL,
  `temperatura` float NOT NULL,
  `frecuenciaCar` float NOT NULL,
  `frecuenciaRes` float NOT NULL,
  `presionArterial` varchar(20) NOT NULL,
  `saturacionOxigeno` float NOT NULL,
  `altura` int NOT NULL,
  `peso` int NOT NULL,
  `IMC` varchar(50) NOT NULL,
  `examenFisico` varchar(5000) NOT NULL,
  `impresionDiag` varchar(500) NOT NULL,
  `notas` varchar(1000) NOT NULL,
  PRIMARY KEY (`idSeguimiento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `idSucursal` int NOT NULL AUTO_INCREMENT,
  `direccion` varchar(300) NOT NULL,
  `codigoPostal` varchar(10) NOT NULL,
  `sucursal` varchar(30) NOT NULL,
  PRIMARY KEY (`idSucursal`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`idSucursal`, `direccion`, `codigoPostal`, `sucursal`) VALUES
(1, 'dadasd', '', 'CEDAE Sátelite');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

DROP TABLE IF EXISTS `tratamiento`;
CREATE TABLE IF NOT EXISTS `tratamiento` (
  `idTratamiento` int NOT NULL AUTO_INCREMENT,
  `idReceta` int NOT NULL,
  `nombreMedicamento` varchar(200) NOT NULL,
  `intervalo` varchar(100) NOT NULL,
  `cantidad` varchar(40) NOT NULL,
  `duracion` varchar(100) NOT NULL,
  `notas` varchar(1000) NOT NULL,
  PRIMARY KEY (`idTratamiento`),
  KEY `idReceta` (`idReceta`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`idTratamiento`, `idReceta`, `nombreMedicamento`, `intervalo`, `cantidad`, `duracion`, `notas`) VALUES
(1, 1, 'Penisilina', 'Cada 6 horas', '1 Pildora', '3 Semanas', 'Tomar una antes de cada comida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

DROP TABLE IF EXISTS `unidades`;
CREATE TABLE IF NOT EXISTS `unidades` (
  `idUnidad` int NOT NULL AUTO_INCREMENT,
  `codigoBarras` bigint NOT NULL,
  `fechaCaducidad` date NOT NULL,
  `precio` int NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `presentacion` varchar(200) NOT NULL,
  PRIMARY KEY (`idUnidad`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`idUnidad`, `codigoBarras`, `fechaCaducidad`, `precio`, `nombre`, `presentacion`) VALUES
(1, 4, '2021-03-14', 120, 'Goicochea arnica', 'Crema'),
(2, 4, '2021-03-14', 120, 'Goicochea arnica', 'Crema'),
(3, 4, '2021-03-14', 120, 'Goicochea arnica', 'Crema'),
(4, 4, '2021-03-14', 120, 'Goicochea arnica', 'Crema'),
(5, 4, '2021-03-14', 120, 'Goicochea arnica', 'Crema'),
(6, 1, '2021-07-21', 78, 'Penicilina Pura', 'Suspension oral'),
(7, 1, '2021-07-21', 78, 'Penicilina Pura', 'Suspension oral'),
(8, 1, '2021-07-21', 78, 'Penicilina Pura', 'Suspension oral'),
(9, 1, '2021-07-21', 78, 'Penicilina Pura', 'Suspension oral'),
(10, 1, '2021-07-21', 78, 'Penicilina Pura', 'Suspension oral'),
(11, 5, '2021-04-14', 100, 'Crema ozono Dor', 'Crema'),
(12, 5, '2021-04-14', 100, 'Crema ozono Dor', 'Crema'),
(13, 5, '2021-04-14', 100, 'Crema ozono Dor', 'Crema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `tipoUsuario` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUsuario`, `clave`, `tipoUsuario`) VALUES
(1, 'MED1', '1234', '1'),
(5, 'FAR1', '1234', '5'),
(3, 'REC1', '1234', '4'),
(4, 'MAU1', '1234', '2'),
(12, 'MuñozCarbajal20', '1234', '3'),
(11, 'SantosPérez67', '1234', '3'),
(13, 'SandovalCastillo34', '1234', '3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
