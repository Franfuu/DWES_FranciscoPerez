CREATE TABLE `ud4_persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` tinytext NOT NULL,
  `apellidos` text NOT NULL,
  `telefono` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




INSERT INTO `ud4_persona` (`id`, `nombre`, `apellidos`, `telefono`)
VALUES
  (1,'Pedro','Ramirez','123'),
  (2,'Juan','Serrano','456'),
  (3,'Rafa','López','789'),
  (6,'Antonio','Gómez','01254');