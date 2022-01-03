-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2021 a las 12:14:52
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siawget_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_alumnos`
--

CREATE TABLE `tb_alumnos` (
  `id_alumno` varchar(10) COLLATE utf8_bin NOT NULL,
  `nombre_alumno` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `apellido_alumno` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `fecha_nacimiento_alumno` date DEFAULT NULL,
  `sexo_alumno` tinyint(4) DEFAULT NULL,
  `zona_alumno` tinyint(4) DEFAULT NULL,
  `id_canton` int(11) DEFAULT NULL,
  `direccion_alumno` text COLLATE utf8_bin DEFAULT NULL,
  `id_responsablre` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_asignaciones`
--

CREATE TABLE `tb_asignaciones` (
  `id_asignacion` int(11) NOT NULL,
  `fecha_asignacion` date DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `asistente` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_asistencias`
--

CREATE TABLE `tb_asistencias` (
  `id_asistencia` int(11) NOT NULL,
  `fecha_asistencia` date DEFAULT NULL,
  `id_alumno` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `id_taller` int(11) DEFAULT NULL,
  `dui_tallerista` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_bitacora`
--

CREATE TABLE `tb_bitacora` (
  `id_bitacora` int(11) NOT NULL,
  `fecha_bitacora` datetime DEFAULT NULL,
  `detalle_bitacora` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `user` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `accion_bitacora` varchar(150) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cantones`
--

CREATE TABLE `tb_cantones` (
  `id_canton` int(11) NOT NULL,
  `nombre_canton` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `id_municipio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `tb_cantones`
--

INSERT INTO `tb_cantones` (`id_canton`, `nombre_canton`, `id_municipio`) VALUES
(1, 'La Soledad', 5),
(2, 'Quebradas', 5),
(3, 'El Caracol', 5),
(4, 'Calderas', 1),
(5, 'San Nicolas', 1),
(6, 'San Felipe', 1),
(7, 'San Antonio  los Ranchos', 3),
(8, 'San Benito', 3),
(9, 'La Cruz', 4),
(10, 'Las Animas', 4),
(11, 'San Francisco', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_departamentos`
--

CREATE TABLE `tb_departamentos` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `tb_departamentos`
--

INSERT INTO `tb_departamentos` (`id_departamento`, `nombre_departamento`) VALUES
(1, 'San Vicente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_donaciones`
--

CREATE TABLE `tb_donaciones` (
  `id_donacion` int(11) NOT NULL,
  `nombre_donacion` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `descripcion_donacion` text COLLATE utf8_bin DEFAULT NULL,
  `fecha_donacion` date DEFAULT NULL,
  `dui_donante` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `diu_empleado` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_donantes`
--

CREATE TABLE `tb_donantes` (
  `dui_donante` varchar(10) COLLATE utf8_bin NOT NULL,
  `nombre_donante` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `apellido_donante` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_empleados`
--

CREATE TABLE `tb_empleados` (
  `dui_empleado` varchar(10) COLLATE utf8_bin NOT NULL,
  `nombre_empleado` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `apellido_empleado` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `sexo_empleado` tinyint(4) DEFAULT NULL,
  `fecha_nacimiento_empleado` date DEFAULT NULL,
  `fecha_contrato_empleado` date DEFAULT NULL,
  `cargo_empleado` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `direccion_empleado` text COLLATE utf8_bin DEFAULT NULL,
  `id_canton` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_eventos`
--

CREATE TABLE `tb_eventos` (
  `id_evento` int(11) NOT NULL,
  `nombre_evento` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `fecha_evento` date DEFAULT NULL,
  `hora_evento` time DEFAULT NULL,
  `direccion_evento` text COLLATE utf8_bin DEFAULT NULL,
  `id_canton` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_horarios`
--

CREATE TABLE `tb_horarios` (
  `id_horario` int(11) NOT NULL,
  `dia` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `id_sala` int(11) DEFAULT NULL,
  `id_taller` int(11) DEFAULT NULL,
  `id_tallerista` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_imagenes`
--

CREATE TABLE `tb_imagenes` (
  `id_imagen` int(11) NOT NULL,
  `archibo_imagen` longblob DEFAULT NULL,
  `id_pertenencia` int(11) DEFAULT NULL,
  `tipo_imagen` int(11) DEFAULT NULL,
  `nombre_imagen` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_inscripciones`
--

CREATE TABLE `tb_inscripciones` (
  `id_inscripcion` int(11) NOT NULL,
  `fecha_inscripcion` date DEFAULT NULL,
  `id_alumno` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `id_taller` int(11) DEFAULT NULL,
  `comentarios_inscripcion` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_municipios`
--

CREATE TABLE `tb_municipios` (
  `id_municipio` int(11) NOT NULL,
  `nombre_municipio` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `tb_municipios`
--

INSERT INTO `tb_municipios` (`id_municipio`, `nombre_municipio`, `id_departamento`) VALUES
(1, 'Apastepque', 1),
(3, 'Guadalupe', 1),
(4, 'San Lorenzo', 1),
(5, 'San Vicente', 1),
(6, 'San Cayetano Istepeque', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_responsable`
--

CREATE TABLE `tb_responsable` (
  `id_responsable` varchar(10) COLLATE utf8_bin NOT NULL,
  `nombre_responsable` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `apellido_responsable` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `parentesco` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_salas`
--

CREATE TABLE `tb_salas` (
  `id_sala` int(11) NOT NULL,
  `nombre_sala` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `comentario_sala` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `tb_salas`
--

INSERT INTO `tb_salas` (`id_sala`, `nombre_sala`, `comentario_sala`) VALUES
(7, 'Jardin', 'jandin sala de Canto'),
(8, 'Musica', 'Sala de Musica'),
(9, 'Pintura', 'Sala de pintura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_talleres`
--

CREATE TABLE `tb_talleres` (
  `id_taller` int(11) NOT NULL,
  `nombre_taller` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `descripcion_taller` text COLLATE utf8_bin DEFAULT NULL,
  `tipo_taller` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `fecha_inicio_taller` date DEFAULT NULL,
  `duracion_taller` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `tb_talleres`
--

INSERT INTO `tb_talleres` (`id_taller`, `nombre_taller`, `descripcion_taller`, `tipo_taller`, `fecha_inicio_taller`, `duracion_taller`) VALUES
(1, 'Bisuteria', 'En este taller aprenderas a hacer articulos de bisuteria como pulseras collares etc.', 'Vocacional', '2021-09-05', 4),
(2, 'musica viento', 'aprender a tocar instrumnetos de vientos', 'Musica', '2021-11-16', 25),
(3, 'dibujo', 'aprenderas a dibujar y pintar.', 'Pintura', '2021-11-23', 3),
(4, 'Musica andina', 'Taller para aprender a tocar instrumentos artesanales para musica andina.', 'Musica', '2021-11-18', 6),
(5, 'Artesanias de barro', 'En este taller aprenderas a hacer artesanias con barro como alcancias jarrones etc.', 'Artesanias', '2021-11-28', 3),
(6, 'Violin', 'En este taller aprenderas a tocar violin', 'Musica', '2021-11-21', 12),
(8, 'Piano', 'En este taller aprenderas a tocar piano.', 'Musica', '2021-11-29', 9),
(9, 'Guitarra acústica', 'Aprenderas a tocar guitarra acustica.', 'Musica', '2021-11-25', 12),
(10, 'Poesía', 'Aprenderas a oratoria y poesia', 'Vocacional', '2021-12-19', 3),
(11, 'Pintura con acuarela', 'Aprenderas a crear obras maestras con pintura de acuarela.', 'Pintura', '2021-12-12', 6),
(12, 'Bordado de manteles', 'Aprenderas a bordar manteles.', 'Vocacional', '2021-11-29', 8),
(13, 'guitarra electrica', 'Aprenderas a tocar guitarra electrica.', 'Musica', '2021-12-05', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_talleristas`
--

CREATE TABLE `tb_talleristas` (
  `dui_tallerista` varchar(10) COLLATE utf8_bin NOT NULL,
  `nombre_tallerista` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `apellido_tallerista` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `sexo_tallerista` varchar(4) COLLATE utf8_bin DEFAULT '',
  `fecha_nacimiento_tallerista` date DEFAULT NULL,
  `fecha_contrato_tallerista` date DEFAULT NULL,
  `direccion_tallerista` text COLLATE utf8_bin DEFAULT NULL,
  `id_canton` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `tb_talleristas`
--

INSERT INTO `tb_talleristas` (`dui_tallerista`, `nombre_tallerista`, `apellido_tallerista`, `sexo_tallerista`, `fecha_nacimiento_tallerista`, `fecha_contrato_tallerista`, `direccion_tallerista`, `id_canton`) VALUES
('08245654-7', 'Francisca', 'Castros Ramirez', 'F', '1995-12-01', '2021-09-20', 'Barrio Concepcion casa#45 ', 5),
('09875643-4', 'Oscar Nahun', 'Serrano Castillo', 'M', '1992-08-13', '2021-10-19', 'Casa #23 col. las flores', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_telefonos`
--

CREATE TABLE `tb_telefonos` (
  `telefono` varchar(13) COLLATE utf8_bin NOT NULL,
  `dueño` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `user` varchar(50) COLLATE utf8_bin NOT NULL,
  `pass` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `dui_usuario` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `imagen_perfil` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_alumnos`
--
ALTER TABLE `tb_alumnos`
  ADD PRIMARY KEY (`id_alumno`) USING BTREE,
  ADD KEY `fk_alumno_responsable` (`id_responsablre`) USING BTREE,
  ADD KEY `fk_canton_alumno` (`id_canton`) USING BTREE;

--
-- Indices de la tabla `tb_asignaciones`
--
ALTER TABLE `tb_asignaciones`
  ADD PRIMARY KEY (`id_asignacion`) USING BTREE,
  ADD KEY `fk_asigna_tallerista` (`asistente`) USING BTREE,
  ADD KEY `fk_evento_asigna` (`id_evento`) USING BTREE;

--
-- Indices de la tabla `tb_asistencias`
--
ALTER TABLE `tb_asistencias`
  ADD PRIMARY KEY (`id_asistencia`) USING BTREE,
  ADD KEY `fk_asistencia_alumno` (`id_alumno`) USING BTREE,
  ADD KEY `fk_asistencia_taller` (`id_taller`) USING BTREE,
  ADD KEY `fk_asistencia_tarrerista` (`dui_tallerista`) USING BTREE;

--
-- Indices de la tabla `tb_bitacora`
--
ALTER TABLE `tb_bitacora`
  ADD PRIMARY KEY (`id_bitacora`) USING BTREE,
  ADD KEY `f_bitacora_usuario` (`user`) USING BTREE;

--
-- Indices de la tabla `tb_cantones`
--
ALTER TABLE `tb_cantones`
  ADD PRIMARY KEY (`id_canton`) USING BTREE,
  ADD KEY `fk_municipio_canton` (`id_municipio`) USING BTREE;

--
-- Indices de la tabla `tb_departamentos`
--
ALTER TABLE `tb_departamentos`
  ADD PRIMARY KEY (`id_departamento`) USING BTREE;

--
-- Indices de la tabla `tb_donaciones`
--
ALTER TABLE `tb_donaciones`
  ADD PRIMARY KEY (`id_donacion`) USING BTREE,
  ADD KEY `fk_donacion_donate` (`dui_donante`) USING BTREE,
  ADD KEY `fk_donacion_empleado` (`diu_empleado`) USING BTREE;

--
-- Indices de la tabla `tb_donantes`
--
ALTER TABLE `tb_donantes`
  ADD PRIMARY KEY (`dui_donante`) USING BTREE;

--
-- Indices de la tabla `tb_empleados`
--
ALTER TABLE `tb_empleados`
  ADD PRIMARY KEY (`dui_empleado`) USING BTREE,
  ADD KEY `fk_canton_empleado` (`id_canton`) USING BTREE;

--
-- Indices de la tabla `tb_eventos`
--
ALTER TABLE `tb_eventos`
  ADD PRIMARY KEY (`id_evento`) USING BTREE,
  ADD KEY `fk_canton_eventos` (`id_canton`) USING BTREE;

--
-- Indices de la tabla `tb_horarios`
--
ALTER TABLE `tb_horarios`
  ADD PRIMARY KEY (`id_horario`) USING BTREE,
  ADD KEY `fk_horario_taller` (`id_taller`) USING BTREE,
  ADD KEY `fk_horario_tallerista` (`id_tallerista`) USING BTREE,
  ADD KEY `fk_horario_salas` (`id_sala`) USING BTREE;

--
-- Indices de la tabla `tb_imagenes`
--
ALTER TABLE `tb_imagenes`
  ADD PRIMARY KEY (`id_imagen`) USING BTREE,
  ADD KEY `fk_imagen_sala` (`id_pertenencia`) USING BTREE;

--
-- Indices de la tabla `tb_inscripciones`
--
ALTER TABLE `tb_inscripciones`
  ADD PRIMARY KEY (`id_inscripcion`) USING BTREE,
  ADD KEY `fk_inscripcion_alumno` (`id_alumno`) USING BTREE,
  ADD KEY `fk_taller_inscripcion` (`id_taller`) USING BTREE;

--
-- Indices de la tabla `tb_municipios`
--
ALTER TABLE `tb_municipios`
  ADD PRIMARY KEY (`id_municipio`) USING BTREE,
  ADD KEY `fk_departamento_municipio` (`id_departamento`) USING BTREE;

--
-- Indices de la tabla `tb_responsable`
--
ALTER TABLE `tb_responsable`
  ADD PRIMARY KEY (`id_responsable`) USING BTREE;

--
-- Indices de la tabla `tb_salas`
--
ALTER TABLE `tb_salas`
  ADD PRIMARY KEY (`id_sala`) USING BTREE;

--
-- Indices de la tabla `tb_talleres`
--
ALTER TABLE `tb_talleres`
  ADD PRIMARY KEY (`id_taller`) USING BTREE,
  ADD KEY `id_talleres` (`id_taller`) USING BTREE;

--
-- Indices de la tabla `tb_talleristas`
--
ALTER TABLE `tb_talleristas`
  ADD PRIMARY KEY (`dui_tallerista`) USING BTREE,
  ADD KEY `fk_empleado_canton` (`id_canton`) USING BTREE;

--
-- Indices de la tabla `tb_telefonos`
--
ALTER TABLE `tb_telefonos`
  ADD PRIMARY KEY (`telefono`) USING BTREE,
  ADD KEY `fk_telefono_responsable` (`dueño`) USING BTREE;

--
-- Indices de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`user`) USING BTREE,
  ADD KEY `fk_dui_tallerista` (`dui_usuario`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_asignaciones`
--
ALTER TABLE `tb_asignaciones`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_asistencias`
--
ALTER TABLE `tb_asistencias`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_bitacora`
--
ALTER TABLE `tb_bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_cantones`
--
ALTER TABLE `tb_cantones`
  MODIFY `id_canton` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tb_departamentos`
--
ALTER TABLE `tb_departamentos`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_donaciones`
--
ALTER TABLE `tb_donaciones`
  MODIFY `id_donacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_eventos`
--
ALTER TABLE `tb_eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_horarios`
--
ALTER TABLE `tb_horarios`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tb_imagenes`
--
ALTER TABLE `tb_imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_inscripciones`
--
ALTER TABLE `tb_inscripciones`
  MODIFY `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_municipios`
--
ALTER TABLE `tb_municipios`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_salas`
--
ALTER TABLE `tb_salas`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tb_talleres`
--
ALTER TABLE `tb_talleres`
  MODIFY `id_taller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_alumnos`
--
ALTER TABLE `tb_alumnos`
  ADD CONSTRAINT `fk_alumno_responsable` FOREIGN KEY (`id_responsablre`) REFERENCES `tb_responsable` (`id_responsable`),
  ADD CONSTRAINT `fk_canton_alumno` FOREIGN KEY (`id_canton`) REFERENCES `tb_cantones` (`id_canton`);

--
-- Filtros para la tabla `tb_asignaciones`
--
ALTER TABLE `tb_asignaciones`
  ADD CONSTRAINT `fk_asigna_alumno` FOREIGN KEY (`asistente`) REFERENCES `tb_alumnos` (`id_alumno`),
  ADD CONSTRAINT `fk_asigna_tallerista` FOREIGN KEY (`asistente`) REFERENCES `tb_talleristas` (`dui_tallerista`),
  ADD CONSTRAINT `fk_evento_asigna` FOREIGN KEY (`id_evento`) REFERENCES `tb_eventos` (`id_evento`);

--
-- Filtros para la tabla `tb_asistencias`
--
ALTER TABLE `tb_asistencias`
  ADD CONSTRAINT `fk_asistencia_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `tb_alumnos` (`id_alumno`),
  ADD CONSTRAINT `fk_asistencia_taller` FOREIGN KEY (`id_taller`) REFERENCES `tb_talleres` (`id_taller`),
  ADD CONSTRAINT `fk_asistencia_tarrerista` FOREIGN KEY (`dui_tallerista`) REFERENCES `tb_talleristas` (`dui_tallerista`);

--
-- Filtros para la tabla `tb_bitacora`
--
ALTER TABLE `tb_bitacora`
  ADD CONSTRAINT `f_bitacora_usuario` FOREIGN KEY (`user`) REFERENCES `tb_usuario` (`user`);

--
-- Filtros para la tabla `tb_cantones`
--
ALTER TABLE `tb_cantones`
  ADD CONSTRAINT `fk_municipio_canton` FOREIGN KEY (`id_municipio`) REFERENCES `tb_municipios` (`id_municipio`);

--
-- Filtros para la tabla `tb_donaciones`
--
ALTER TABLE `tb_donaciones`
  ADD CONSTRAINT `fk_donacion_donate` FOREIGN KEY (`dui_donante`) REFERENCES `tb_donantes` (`dui_donante`),
  ADD CONSTRAINT `fk_donacion_empleado` FOREIGN KEY (`diu_empleado`) REFERENCES `tb_empleados` (`dui_empleado`);

--
-- Filtros para la tabla `tb_empleados`
--
ALTER TABLE `tb_empleados`
  ADD CONSTRAINT `fk_canton_empleado` FOREIGN KEY (`id_canton`) REFERENCES `tb_cantones` (`id_canton`);

--
-- Filtros para la tabla `tb_eventos`
--
ALTER TABLE `tb_eventos`
  ADD CONSTRAINT `fk_canton_eventos` FOREIGN KEY (`id_canton`) REFERENCES `tb_cantones` (`id_canton`);

--
-- Filtros para la tabla `tb_horarios`
--
ALTER TABLE `tb_horarios`
  ADD CONSTRAINT `fk_horario_salas` FOREIGN KEY (`id_sala`) REFERENCES `tb_salas` (`id_sala`),
  ADD CONSTRAINT `fk_horario_taller` FOREIGN KEY (`id_taller`) REFERENCES `tb_talleres` (`id_taller`),
  ADD CONSTRAINT `fk_horario_tallerista` FOREIGN KEY (`id_tallerista`) REFERENCES `tb_talleristas` (`dui_tallerista`);

--
-- Filtros para la tabla `tb_imagenes`
--
ALTER TABLE `tb_imagenes`
  ADD CONSTRAINT `fk_evento_imagen` FOREIGN KEY (`id_pertenencia`) REFERENCES `tb_eventos` (`id_evento`),
  ADD CONSTRAINT `fk_imagen_sala` FOREIGN KEY (`id_pertenencia`) REFERENCES `tb_salas` (`id_sala`),
  ADD CONSTRAINT `fk_imagen_taller` FOREIGN KEY (`id_pertenencia`) REFERENCES `tb_talleres` (`id_taller`);

--
-- Filtros para la tabla `tb_inscripciones`
--
ALTER TABLE `tb_inscripciones`
  ADD CONSTRAINT `fk_inscripcion_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `tb_alumnos` (`id_alumno`),
  ADD CONSTRAINT `fk_taller_inscripcion` FOREIGN KEY (`id_taller`) REFERENCES `tb_talleres` (`id_taller`);

--
-- Filtros para la tabla `tb_municipios`
--
ALTER TABLE `tb_municipios`
  ADD CONSTRAINT `fk_departamento_municipio` FOREIGN KEY (`id_departamento`) REFERENCES `tb_departamentos` (`id_departamento`);

--
-- Filtros para la tabla `tb_talleristas`
--
ALTER TABLE `tb_talleristas`
  ADD CONSTRAINT `fk_canton_tallerista` FOREIGN KEY (`id_canton`) REFERENCES `tb_cantones` (`id_canton`);

--
-- Filtros para la tabla `tb_telefonos`
--
ALTER TABLE `tb_telefonos`
  ADD CONSTRAINT `fk_telefono_alumno` FOREIGN KEY (`telefono`) REFERENCES `tb_alumnos` (`id_alumno`),
  ADD CONSTRAINT `fk_telefono_empleado` FOREIGN KEY (`dueño`) REFERENCES `tb_empleados` (`dui_empleado`),
  ADD CONSTRAINT `fk_telefono_responsable` FOREIGN KEY (`dueño`) REFERENCES `tb_responsable` (`id_responsable`),
  ADD CONSTRAINT `fk_telefono_tallerista` FOREIGN KEY (`dueño`) REFERENCES `tb_talleristas` (`dui_tallerista`);

--
-- Filtros para la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_dui_tallerista` FOREIGN KEY (`dui_usuario`) REFERENCES `tb_talleristas` (`dui_tallerista`),
  ADD CONSTRAINT `fk_usuario_empleado` FOREIGN KEY (`dui_usuario`) REFERENCES `tb_empleados` (`dui_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
