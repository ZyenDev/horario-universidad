-- Crear la tabla persona
DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `id` int NOT NULL AUTO_INCREMENT,
  `primer_nombre` varchar(30) NOT NULL,
  `segundo_nombre` varchar(30) DEFAULT NULL,
  `primer_apellido` varchar(30) NOT NULL,
  `segundo_apellido` varchar(30) DEFAULT NULL,
  `cedula` varchar(20) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `numero_telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla rol
DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rol_unique` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla pregunta_seguridad
DROP TABLE IF EXISTS `pregunta_seguridad`;

CREATE TABLE `pregunta_seguridad` (
  `id` int NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla usuario
DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `fk_persona` int NOT NULL,
  `fk_rol` int NOT NULL,
  `fk_pregunta_seguridad` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_unique` (`usuario`),
  UNIQUE KEY `usuario_unique_1` (`fk_persona`),
  KEY `usuario_pregunta_seguridad_FK` (`fk_pregunta_seguridad`),
  KEY `usuario_rol_FK` (`fk_rol`),
  CONSTRAINT `usuario_persona_FK` FOREIGN KEY (`fk_persona`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario_rol_FK` FOREIGN KEY (`fk_rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario_pregunta_seguridad_FK` FOREIGN KEY (`fk_pregunta_seguridad`) REFERENCES `pregunta_seguridad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla tipo_aula
DROP TABLE IF EXISTS `tipo_aula`;

CREATE TABLE `tipo_aula` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo_aula_unique` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla aula
DROP TABLE IF EXISTS `aula`;

CREATE TABLE `aula` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(30) NOT NULL,
  `fk_tipo_aula` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `aula_unique` (`codigo`),
  KEY `aula_tipo_aula_FK` (`fk_tipo_aula`),
  CONSTRAINT `aula_tipo_aula_FK` FOREIGN KEY (`fk_tipo_aula`) REFERENCES `tipo_aula` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla trayecto
DROP TABLE IF EXISTS `trayecto`;

CREATE TABLE `trayecto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(30) NOT NULL,
  `periodo` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla materia
DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `materia_unique` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla profesor
DROP TABLE IF EXISTS `profesor`;

CREATE TABLE `profesor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fk_usuario` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `profesor_unique` (`fk_usuario`),
  CONSTRAINT `profesor_usuario_FK` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla coordinador
DROP TABLE IF EXISTS `coordinador`;

CREATE TABLE `coordinador` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fk_usuario` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coordinador_unique` (`fk_usuario`),
  CONSTRAINT `coordinador_usuario_FK` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla bloque_horario
DROP TABLE IF EXISTS `bloque_horario`;

CREATE TABLE `bloque_horario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fk_trayecto` int NOT NULL,
  `fk_aula` int NOT NULL,
  `fk_profesor` int NOT NULL,
  `fk_materia` int NOT NULL,
  `hora` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bloque_horario_materia_FK` (`fk_materia`),
  KEY `bloque_horario_aula_FK` (`fk_aula`),
  KEY `bloque_horario_profesor_FK` (`fk_profesor`),
  KEY `bloque_horario_trayecto_FK` (`fk_trayecto`),
  CONSTRAINT `bloque_horario_aula_FK` FOREIGN KEY (`fk_aula`) REFERENCES `aula` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bloque_horario_materia_FK` FOREIGN KEY (`fk_materia`) REFERENCES `materia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bloque_horario_profesor_FK` FOREIGN KEY (`fk_profesor`) REFERENCES `profesor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bloque_horario_trayecto_FK` FOREIGN KEY (`fk_trayecto`) REFERENCES `trayecto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Crear la tabla pregunta_seguridad_tipo_pregunta_seguridad
DROP TABLE IF EXISTS `tipo_pregunta_seguridad`;

CREATE TABLE `tipo_pregunta_seguridad` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo_pregunta_seguridad_unique` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `alumno` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fk_trayecto` int NOT NULL,
  `fk_persona` int NOT NULL,
  `estatus` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alumno_unique` (`fk_persona`),
  KEY `alumno_trayecto_FK` (`fk_trayecto`),
  CONSTRAINT `alumno_persona_FK` FOREIGN KEY (`fk_persona`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `alumno_trayecto_FK` FOREIGN KEY (`fk_trayecto`) REFERENCES `trayecto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;