/*
 Navicat Premium Data Transfer

 Source Server         : phpmyadmin
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : siawget_db

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 19/01/2022 06:30:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_alumnos
-- ----------------------------
DROP TABLE IF EXISTS `tb_alumnos`;
CREATE TABLE `tb_alumnos`  (
  `id_alumno` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nombre_alumno` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `apellido_alumno` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `fecha_nacimiento_alumno` date NULL DEFAULT NULL,
  `sexo_alumno` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `zona_alumno` tinyint(4) NULL DEFAULT NULL,
  `id_canton` int(11) NULL DEFAULT NULL,
  `direccion_alumno` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `id_responsablre` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `telefono` varchar(9) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `taller_alumno` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id_alumno`) USING BTREE,
  INDEX `fk_alumno_responsable`(`id_responsablre`) USING BTREE,
  INDEX `fk_canton_alumno`(`id_canton`) USING BTREE,
  CONSTRAINT `fk_alumno_responsable` FOREIGN KEY (`id_responsablre`) REFERENCES `tb_responsable` (`id_responsable`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_canton_alumno` FOREIGN KEY (`id_canton`) REFERENCES `tb_cantones` (`id_canton`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_alumnos
-- ----------------------------
INSERT INTO `tb_alumnos` VALUES ('0347', 'Jhonatan', 'Berardo', '2001-03-07', 'Masculino', 10, 10, '11 Avenida Norte San Felipe', '0347', '78542136', 4);
INSERT INTO `tb_alumnos` VALUES ('0462', 'Pedro', 'Perez', '2000-02-15', 'Masculino', 3, 3, '17 avenida norte Barrio San Juan de Dios', '0462', '78541263', 1);
INSERT INTO `tb_alumnos` VALUES ('2933', 'Erick', 'Perez', '2000-02-15', 'Masculino', 2, 2, '22 Avenida Norte', '2933', '78542136', 8);
INSERT INTO `tb_alumnos` VALUES ('4528', 'Oscar', 'Ramirez', '1998-10-20', 'Masculino', 5, 5, '17 avenida norte Barrio San Juan de Dios', '4528', '78542136', 0);
INSERT INTO `tb_alumnos` VALUES ('6894', 'Erick', 'Alfaro', '1996-04-08', 'Masculino', 4, 4, '11 Avenida Norte San Felipe', '6894', '7632145', 0);

-- ----------------------------
-- Table structure for tb_asignaciones
-- ----------------------------
DROP TABLE IF EXISTS `tb_asignaciones`;
CREATE TABLE `tb_asignaciones`  (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_asignacion` date NULL DEFAULT NULL,
  `id_evento` int(11) NULL DEFAULT NULL,
  `asistente` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id_asignacion`) USING BTREE,
  INDEX `fk_asigna_tallerista`(`asistente`) USING BTREE,
  INDEX `fk_evento_asigna`(`id_evento`) USING BTREE,
  CONSTRAINT `fk_asigna_alumno` FOREIGN KEY (`asistente`) REFERENCES `tb_alumnos` (`id_alumno`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_asigna_tallerista` FOREIGN KEY (`asistente`) REFERENCES `tb_talleristas` (`dui_tallerista`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_evento_asigna` FOREIGN KEY (`id_evento`) REFERENCES `tb_eventos` (`id_evento`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_asignaciones
-- ----------------------------

-- ----------------------------
-- Table structure for tb_asistencias
-- ----------------------------
DROP TABLE IF EXISTS `tb_asistencias`;
CREATE TABLE `tb_asistencias`  (
  `id_asistencia` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_asistencia` date NULL DEFAULT NULL,
  `id_alumno` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `id_taller` int(11) NULL DEFAULT NULL,
  `dui_tallerista` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id_asistencia`) USING BTREE,
  INDEX `fk_asistencia_alumno`(`id_alumno`) USING BTREE,
  INDEX `fk_asistencia_taller`(`id_taller`) USING BTREE,
  INDEX `fk_asistencia_tarrerista`(`dui_tallerista`) USING BTREE,
  CONSTRAINT `fk_asistencia_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `tb_alumnos` (`id_alumno`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_asistencia_taller` FOREIGN KEY (`id_taller`) REFERENCES `tb_talleres` (`id_taller`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_asistencia_tarrerista` FOREIGN KEY (`dui_tallerista`) REFERENCES `tb_talleristas` (`dui_tallerista`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_asistencias
-- ----------------------------

-- ----------------------------
-- Table structure for tb_bitacora
-- ----------------------------
DROP TABLE IF EXISTS `tb_bitacora`;
CREATE TABLE `tb_bitacora`  (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `evento_bitacora` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `tabla_bitacora` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `fecha_bitacora` datetime(6) NULL DEFAULT NULL,
  `accion_bitacora` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `usuario_bitacora` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  PRIMARY KEY (`id_bitacora`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 75 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_bitacora
-- ----------------------------
INSERT INTO `tb_bitacora` VALUES (55, 'Se ha insertado un registro', 'tb_usuario', '2022-01-16 22:40:17.000000', 'francisca', 'p1');
INSERT INTO `tb_bitacora` VALUES (57, 'Se ha insertado un registro', 'tb_horarios', '2022-01-16 22:48:00.000000', 'Martes', 'p1');
INSERT INTO `tb_bitacora` VALUES (58, 'Se ha modificado un registro', 'tb_usuario', '2022-01-16 22:53:34.000000', 'Registro Actualizado ap123', 'p1');
INSERT INTO `tb_bitacora` VALUES (59, 'Se ha insertado un registro', 'tb_talleristas', '2022-01-17 05:55:24.000000', 'Jorge', 'p1');
INSERT INTO `tb_bitacora` VALUES (60, 'Se ha modificado un registro', 'tb_talleristas', '2022-01-18 14:50:01.000000', 'Registro Actualizado aMartes', 'jonportillo');
INSERT INTO `tb_bitacora` VALUES (61, 'Se ha modificado un registro', 'tb_talleristas', '2022-01-18 14:51:18.000000', 'Registro Actualizado aMartes', 'jonportillo');
INSERT INTO `tb_bitacora` VALUES (62, 'Se ha modificado un registro', 'tb_talleristas', '2022-01-18 14:52:05.000000', 'Registro Actualizado aMartes', 'jonportillo');
INSERT INTO `tb_bitacora` VALUES (63, 'Se ha modificado un registro', 'tb_talleristas', '2022-01-18 14:53:11.000000', 'Registro Actualizado aMiercoles', 'jonportillo');
INSERT INTO `tb_bitacora` VALUES (64, 'Se ha modificado un registro', 'tb_talleristas', '2022-01-18 14:53:43.000000', 'Registro Actualizado aDomingo', 'jonportillo');
INSERT INTO `tb_bitacora` VALUES (65, 'Se ha modificado un registro', 'tb_talleristas', '2022-01-18 14:54:26.000000', 'Registro Actualizado aJosselyn ', 'jonportillo');
INSERT INTO `tb_bitacora` VALUES (66, 'Se ha eliminado un registro', 'tb_talleristas', '2022-01-18 14:54:37.000000', 'Registro Eliminado 05201686-9', 'jonportillo');
INSERT INTO `tb_bitacora` VALUES (67, 'Se ha modificado un registro', 'tb_talleristas', '2022-01-18 14:56:03.000000', 'Registro Actualizado aJuan Carlos', 'jonportillo');
INSERT INTO `tb_bitacora` VALUES (68, 'Se ha modificado un registro', 'tb_talleristas', '2022-01-18 14:58:36.000000', 'Registro Actualizado aOscar  Bladimir', 'jonportillo');
INSERT INTO `tb_bitacora` VALUES (69, 'Se ha modificado un registro', 'tb_talleristas', '2022-01-18 14:59:05.000000', 'Registro Actualizado aFrancisca Elizabeth', 'jonportillo');
INSERT INTO `tb_bitacora` VALUES (70, 'Se ha modificado un registro', 'tb_talleristas', '2022-01-18 15:00:09.000000', 'Registro Actualizado aJosselyn  Noemy', 'jonportillo');
INSERT INTO `tb_bitacora` VALUES (71, 'Se ha modificado un registro', 'tb_talleristas', '2022-01-18 15:22:10.000000', 'Registro Actualizado aFrancisca Elizabeth', 'jonportillo');
INSERT INTO `tb_bitacora` VALUES (72, 'Se ha insertado un registro', 'tb_talleristas', '2022-01-18 11:30:21.000000', 'Xiomara Rosibel', 'jonportillo');
INSERT INTO `tb_bitacora` VALUES (73, 'Se ha modificado un registro', 'tb_talleristas', '2022-01-18 11:47:10.000000', 'Registro Actualizado aXiomara Magdalena', 'jonportillo');
INSERT INTO `tb_bitacora` VALUES (74, 'Se ha eliminado un registro', 'tb_talleristas', '2022-01-18 18:54:57.000000', 'Registro Eliminado 45268963-2', 'jonportillo');

-- ----------------------------
-- Table structure for tb_cantones
-- ----------------------------
DROP TABLE IF EXISTS `tb_cantones`;
CREATE TABLE `tb_cantones`  (
  `id_canton` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_canton` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `id_municipio` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_canton`) USING BTREE,
  INDEX `fk_municipio_canton`(`id_municipio`) USING BTREE,
  CONSTRAINT `fk_municipio_canton` FOREIGN KEY (`id_municipio`) REFERENCES `tb_municipios` (`id_municipio`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_cantones
-- ----------------------------
INSERT INTO `tb_cantones` VALUES (1, 'La Soledad', 5);
INSERT INTO `tb_cantones` VALUES (2, 'Quebradas', 5);
INSERT INTO `tb_cantones` VALUES (3, 'El Caracol', 5);
INSERT INTO `tb_cantones` VALUES (4, 'Calderas', 1);
INSERT INTO `tb_cantones` VALUES (5, 'San Nicolas', 1);
INSERT INTO `tb_cantones` VALUES (6, 'San Felipe', 1);
INSERT INTO `tb_cantones` VALUES (7, 'San Antonio  los Ranchos', 3);
INSERT INTO `tb_cantones` VALUES (8, 'San Benito', 3);
INSERT INTO `tb_cantones` VALUES (9, 'La Cruz', 4);
INSERT INTO `tb_cantones` VALUES (10, 'Las Animas', 4);
INSERT INTO `tb_cantones` VALUES (11, 'San Francisco', 4);

-- ----------------------------
-- Table structure for tb_departamentos
-- ----------------------------
DROP TABLE IF EXISTS `tb_departamentos`;
CREATE TABLE `tb_departamentos`  (
  `id_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_departamento` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id_departamento`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_departamentos
-- ----------------------------
INSERT INTO `tb_departamentos` VALUES (1, 'San Vicente');

-- ----------------------------
-- Table structure for tb_donaciones
-- ----------------------------
DROP TABLE IF EXISTS `tb_donaciones`;
CREATE TABLE `tb_donaciones`  (
  `id_donacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_donacion` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `descripcion_donacion` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `fecha_donacion` date NULL DEFAULT NULL,
  `dui_donante` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `diu_empleado` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id_donacion`) USING BTREE,
  INDEX `fk_donacion_donate`(`dui_donante`) USING BTREE,
  INDEX `fk_donacion_empleado`(`diu_empleado`) USING BTREE,
  CONSTRAINT `fk_donacion_donate` FOREIGN KEY (`dui_donante`) REFERENCES `tb_donantes` (`dui_donante`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_donacion_empleado` FOREIGN KEY (`diu_empleado`) REFERENCES `tb_empleados` (`dui_empleado`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_donaciones
-- ----------------------------

-- ----------------------------
-- Table structure for tb_donantes
-- ----------------------------
DROP TABLE IF EXISTS `tb_donantes`;
CREATE TABLE `tb_donantes`  (
  `dui_donante` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nombre_donante` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `apellido_donante` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`dui_donante`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_donantes
-- ----------------------------

-- ----------------------------
-- Table structure for tb_empleados
-- ----------------------------
DROP TABLE IF EXISTS `tb_empleados`;
CREATE TABLE `tb_empleados`  (
  `dui_empleado` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nombre_empleado` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `apellido_empleado` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `sexo_empleado` tinyint(4) NULL DEFAULT NULL,
  `fecha_nacimiento_empleado` date NULL DEFAULT NULL,
  `fecha_contrato_empleado` date NULL DEFAULT NULL,
  `direccion_empleado` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `id_canton` int(11) NULL DEFAULT NULL,
  `telefono` varchar(9) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`dui_empleado`) USING BTREE,
  INDEX `fk_canton_empleado`(`id_canton`) USING BTREE,
  CONSTRAINT `fk_canton_empleado` FOREIGN KEY (`id_canton`) REFERENCES `tb_cantones` (`id_canton`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_empleados
-- ----------------------------
INSERT INTO `tb_empleados` VALUES ('02135698-5', 'Jonathan', 'Portillo Perez', 1, '2022-01-21', '2022-01-19', 'las lomas2', 5, '60014895');
INSERT INTO `tb_empleados` VALUES ('05201686-8', 'Rafael ', 'Gonzales', 0, '2022-01-13', '2022-01-20', 'las lomas', 2, '78667913');

-- ----------------------------
-- Table structure for tb_eventos
-- ----------------------------
DROP TABLE IF EXISTS `tb_eventos`;
CREATE TABLE `tb_eventos`  (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `fecha_evento` date NULL DEFAULT NULL,
  `hora_evento` time(0) NULL DEFAULT NULL,
  `direccion_evento` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `id_canton` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_evento`) USING BTREE,
  INDEX `fk_canton_eventos`(`id_canton`) USING BTREE,
  CONSTRAINT `fk_canton_eventos` FOREIGN KEY (`id_canton`) REFERENCES `tb_cantones` (`id_canton`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_eventos
-- ----------------------------
INSERT INTO `tb_eventos` VALUES (1, 'Concurso de Musica Viento', '2022-01-12', '09:00:16', 'Frente Parque ', 3);
INSERT INTO `tb_eventos` VALUES (2, 'Talentos Cultura', '2022-02-02', '11:30:31', 'Frente a jadirn infantil', 7);

-- ----------------------------
-- Table structure for tb_horarios
-- ----------------------------
DROP TABLE IF EXISTS `tb_horarios`;
CREATE TABLE `tb_horarios`  (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `dia` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `hora_inicio` time(0) NULL DEFAULT NULL,
  `hora_fin` time(0) NULL DEFAULT NULL,
  `id_sala` int(11) NULL DEFAULT NULL,
  `id_taller` int(11) NULL DEFAULT NULL,
  `id_tallerista` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id_horario`) USING BTREE,
  INDEX `fk_horario_taller`(`id_taller`) USING BTREE,
  INDEX `fk_horario_tallerista`(`id_tallerista`) USING BTREE,
  INDEX `fk_horario_salas`(`id_sala`) USING BTREE,
  CONSTRAINT `fk_horario_salas` FOREIGN KEY (`id_sala`) REFERENCES `tb_salas` (`id_sala`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_horario_taller` FOREIGN KEY (`id_taller`) REFERENCES `tb_talleres` (`id_taller`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_horario_tallerista` FOREIGN KEY (`id_tallerista`) REFERENCES `tb_talleristas` (`dui_tallerista`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_horarios
-- ----------------------------
INSERT INTO `tb_horarios` VALUES (13, 'Domingo', '09:00:00', '11:00:00', 8, 9, '06231596-8');
INSERT INTO `tb_horarios` VALUES (14, 'Miercoles', '10:00:00', '12:00:00', 8, 2, '05201689-5');
INSERT INTO `tb_horarios` VALUES (18, 'Martes', '13:00:00', '14:00:00', 9, 3, '08245654-7');
INSERT INTO `tb_horarios` VALUES (19, 'Martes', '14:00:00', '16:00:00', 8, 2, '08245654-7');

-- ----------------------------
-- Table structure for tb_imagenes
-- ----------------------------
DROP TABLE IF EXISTS `tb_imagenes`;
CREATE TABLE `tb_imagenes`  (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `archibo_imagen` longblob NULL,
  `id_pertenencia` int(11) NULL DEFAULT NULL,
  `tipo_imagen` int(11) NULL DEFAULT NULL,
  `nombre_imagen` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id_imagen`) USING BTREE,
  INDEX `fk_imagen_sala`(`id_pertenencia`) USING BTREE,
  CONSTRAINT `fk_evento_imagen` FOREIGN KEY (`id_pertenencia`) REFERENCES `tb_eventos` (`id_evento`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_imagen_sala` FOREIGN KEY (`id_pertenencia`) REFERENCES `tb_salas` (`id_sala`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_imagen_taller` FOREIGN KEY (`id_pertenencia`) REFERENCES `tb_talleres` (`id_taller`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_imagenes
-- ----------------------------

-- ----------------------------
-- Table structure for tb_inscripciones
-- ----------------------------
DROP TABLE IF EXISTS `tb_inscripciones`;
CREATE TABLE `tb_inscripciones`  (
  `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inscripcion` date NULL DEFAULT NULL,
  `id_alumno` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `id_taller` int(11) NULL DEFAULT NULL,
  `comentarios_inscripcion` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  PRIMARY KEY (`id_inscripcion`) USING BTREE,
  INDEX `fk_inscripcion_alumno`(`id_alumno`) USING BTREE,
  INDEX `fk_taller_inscripcion`(`id_taller`) USING BTREE,
  CONSTRAINT `fk_inscripcion_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `tb_alumnos` (`id_alumno`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_taller_inscripcion` FOREIGN KEY (`id_taller`) REFERENCES `tb_talleres` (`id_taller`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_inscripciones
-- ----------------------------
INSERT INTO `tb_inscripciones` VALUES (1, '2022-01-19', '0462', 1, 'Ninguno');
INSERT INTO `tb_inscripciones` VALUES (2, '2022-01-19', '2933', 8, 'Ninguno');

-- ----------------------------
-- Table structure for tb_municipios
-- ----------------------------
DROP TABLE IF EXISTS `tb_municipios`;
CREATE TABLE `tb_municipios`  (
  `id_municipio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_municipio` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `id_departamento` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_municipio`) USING BTREE,
  INDEX `fk_departamento_municipio`(`id_departamento`) USING BTREE,
  CONSTRAINT `fk_departamento_municipio` FOREIGN KEY (`id_departamento`) REFERENCES `tb_departamentos` (`id_departamento`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_municipios
-- ----------------------------
INSERT INTO `tb_municipios` VALUES (1, 'Apastepeque', 1);
INSERT INTO `tb_municipios` VALUES (3, 'Guadalupe', 1);
INSERT INTO `tb_municipios` VALUES (4, 'San Lorenzo', 1);
INSERT INTO `tb_municipios` VALUES (5, 'San Vicente', 1);
INSERT INTO `tb_municipios` VALUES (6, 'San Cayetano Istepeque', 1);

-- ----------------------------
-- Table structure for tb_responsable
-- ----------------------------
DROP TABLE IF EXISTS `tb_responsable`;
CREATE TABLE `tb_responsable`  (
  `id_responsable` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nombre_responsable` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `apellido_responsable` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `parentesco` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `telefono` varchar(9) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id_responsable`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_responsable
-- ----------------------------
INSERT INTO `tb_responsable` VALUES ('0347', 'Tabo', 'Huezo', 'TIO', '74125896');
INSERT INTO `tb_responsable` VALUES ('0462', 'Juan', 'Alferez', 'Abuelo', '74125896');
INSERT INTO `tb_responsable` VALUES ('0635', 'Wendy', 'May', 'Abuelo', '74125896');
INSERT INTO `tb_responsable` VALUES ('0955', 'Juan', 'Huezo', 'Primo', '74125896');
INSERT INTO `tb_responsable` VALUES ('1293', 'Kevin', 'May', 'Abuelo', '74125896');
INSERT INTO `tb_responsable` VALUES ('1497', 'Juan', 'Ayala', 'TIO', '74125896');
INSERT INTO `tb_responsable` VALUES ('1938', 'Kevin', 'May', 'Abuelo', '74125896');
INSERT INTO `tb_responsable` VALUES ('2933', 'Wendy', 'Martinez', 'Prima', '74125896');
INSERT INTO `tb_responsable` VALUES ('4367', 'Pablo', 'Martinez', 'Abuelo', '74125896');
INSERT INTO `tb_responsable` VALUES ('4528', 'Wendy', 'Ayala', 'Prima', '74125896');
INSERT INTO `tb_responsable` VALUES ('6894', 'Gustavo', 'Alferez', 'Abuelo', '74125896');
INSERT INTO `tb_responsable` VALUES ('7605', 'Tabo', 'Huezo', 'Abuelo', '74125896');
INSERT INTO `tb_responsable` VALUES ('7844', 'Juan', 'Ayala', 'TIO', '74125896');
INSERT INTO `tb_responsable` VALUES ('8569', 'Kevin', 'Alferez', 'Primo', '74123121');

-- ----------------------------
-- Table structure for tb_salas
-- ----------------------------
DROP TABLE IF EXISTS `tb_salas`;
CREATE TABLE `tb_salas`  (
  `id_sala` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_sala` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `comentario_sala` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id_sala`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_salas
-- ----------------------------
INSERT INTO `tb_salas` VALUES (7, 'Jardin', 'jandin sala de Canto');
INSERT INTO `tb_salas` VALUES (8, 'Musica', 'Sala de Musica');
INSERT INTO `tb_salas` VALUES (9, 'Pintura', 'Sala de pintura');

-- ----------------------------
-- Table structure for tb_talleres
-- ----------------------------
DROP TABLE IF EXISTS `tb_talleres`;
CREATE TABLE `tb_talleres`  (
  `id_taller` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_taller` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `descripcion_taller` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `tipo_taller` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `fecha_inicio_taller` date NULL DEFAULT NULL,
  `duracion_taller` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_taller`) USING BTREE,
  INDEX `id_talleres`(`id_taller`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_talleres
-- ----------------------------
INSERT INTO `tb_talleres` VALUES (1, 'Bisuteria', 'En este taller aprenderas a hacer articulos de bisuteria como pulseras collares etc.', 'Vocacional', '2021-09-05', 4);
INSERT INTO `tb_talleres` VALUES (2, 'musica viento', 'aprender a tocar instrumnetos de vientos', 'Musica', '2021-11-16', 25);
INSERT INTO `tb_talleres` VALUES (3, 'dibujo', 'aprenderas a dibujar y pintar.', 'Pintura', '2021-11-23', 3);
INSERT INTO `tb_talleres` VALUES (4, 'Musica andina', 'Taller para aprender a tocar instrumentos artesanales para musica andina.', 'Musica', '2021-11-18', 6);
INSERT INTO `tb_talleres` VALUES (5, 'Artesanias de barro', 'En este taller aprenderas a hacer artesanias con barro como alcancias jarrones etc.', 'Artesanias', '2021-11-28', 3);
INSERT INTO `tb_talleres` VALUES (6, 'Violin', 'En este taller aprenderas a tocar violin', 'Musica', '2021-11-21', 12);
INSERT INTO `tb_talleres` VALUES (8, 'Piano', 'En este taller aprenderas a tocar piano.', 'Musica', '2021-11-29', 9);
INSERT INTO `tb_talleres` VALUES (9, 'Guitarra acústica', 'Aprenderas a tocar guitarra acustica.', 'Musica', '2021-11-25', 12);
INSERT INTO `tb_talleres` VALUES (10, 'Poesía', 'Aprenderas a oratoria y poesia', 'Vocacional', '2021-12-19', 3);
INSERT INTO `tb_talleres` VALUES (11, 'Pintura con acuarela', 'Aprenderas a crear obras maestras con pintura de acuarela.', 'Pintura', '2021-12-12', 6);
INSERT INTO `tb_talleres` VALUES (12, 'Bordado de manteles', 'Aprenderas a bordar manteles.', 'Vocacional', '2021-11-29', 8);
INSERT INTO `tb_talleres` VALUES (13, 'guitarra electrica', 'Aprenderas a tocar guitarra electrica.', 'Musica', '2021-12-05', 12);

-- ----------------------------
-- Table structure for tb_talleristas
-- ----------------------------
DROP TABLE IF EXISTS `tb_talleristas`;
CREATE TABLE `tb_talleristas`  (
  `dui_tallerista` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nombre_tallerista` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `apellido_tallerista` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `sexo_tallerista` varchar(4) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT '',
  `fecha_nacimiento_tallerista` date NULL DEFAULT NULL,
  `fecha_contrato_tallerista` date NULL DEFAULT NULL,
  `direccion_tallerista` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `id_canton` int(11) NULL DEFAULT NULL,
  `telefono` varchar(9) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`dui_tallerista`) USING BTREE,
  INDEX `fk_empleado_canton`(`id_canton`) USING BTREE,
  CONSTRAINT `fk_canton_tallerista` FOREIGN KEY (`id_canton`) REFERENCES `tb_cantones` (`id_canton`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_talleristas
-- ----------------------------
INSERT INTO `tb_talleristas` VALUES ('05201686-5', 'Josselyn  Noemy', 'Romero Calderon', 'F', '1869-12-11', '2022-01-13', '           lempa casa#45 frente la hermita   la paz        ', 5, '7866-7913');
INSERT INTO `tb_talleristas` VALUES ('05201689-5', 'Juan Carlos', 'Portillo Ramos', 'M', '1995-10-12', '2022-01-20', 'Frente a casa #26 a lado de iglesia bautista', 3, '7866-7895');
INSERT INTO `tb_talleristas` VALUES ('06231596-8', 'Oscar  Bladimir', 'Ramirez de la O', 'M', '1995-10-12', '2022-01-19', 'Casa #15 frente jardin infantil ', 2, '7899-5689');
INSERT INTO `tb_talleristas` VALUES ('08245654-7', 'Francisca Elizabeth', 'Castros Ramirez', 'F', '1995-12-01', '2021-09-20', '  Barrio Concepcion casa#45   ', 10, '');

-- ----------------------------
-- Table structure for tb_usuario
-- ----------------------------
DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE `tb_usuario`  (
  `user` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `tipo` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `dui_empleado` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `dui_tallerista` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `correo` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `estado` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`user`) USING BTREE,
  INDEX `fk_dui_tallerista`(`dui_tallerista`) USING BTREE,
  INDEX `fk_usuario_empleado`(`dui_empleado`) USING BTREE,
  CONSTRAINT `fk_dui_tallerista` FOREIGN KEY (`dui_tallerista`) REFERENCES `tb_talleristas` (`dui_tallerista`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_empleado` FOREIGN KEY (`dui_empleado`) REFERENCES `tb_empleados` (`dui_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_usuario
-- ----------------------------
INSERT INTO `tb_usuario` VALUES ('em12', '$2y$10$BFGqTrHKD4hYnKIwUf/ji.4NsIaRS8RVr.ujzFrAMAfPLjBtSGyYe', 'em', '05201686-8', NULL, 'p12@gmail.com', 'activo');
INSERT INTO `tb_usuario` VALUES ('francisca', '$2y$10$aXbHO.xgPGakkxohwHOsm.vu9yHVY/kI2NIq7mSWvABmQTUi4OqqG', 'ta', NULL, '08245654-7', 'Francisca@gmail.com', 'activo');
INSERT INTO `tb_usuario` VALUES ('jonportillo', '$2y$10$UNL5rZnTQ5KBkFoZixvIHe6RRCDM2gc28itAdg7hJiovIzpcIULU2', 'ad', '02135698-5', NULL, 'jhonataneulises@gmail.com', 'activo');

SET FOREIGN_KEY_CHECKS = 1;
