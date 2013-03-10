/* Script Administración BalloonMail*/

-- -----------------------------------------------------
-- Table `mburiano_ballommail`.`Conexiones`
-- -----------------------------------------------------

DROP TABLE IF EXISTS `mburiano_balloonmail`.`conexiones`;
CREATE TABLE  `mburiano_balloonmail`.`conexiones` (
  `id` int(11) NOT NULL auto_increment,
  `fecha` datetime default NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;




-- -----------------------------------------------------
-- Table `mburiano_ballommail`.`Usuarios` -> Modificación
-- -----------------------------------------------------

ALTER TABLE usuarios ADD bloqueado tinyint(1);

update table usuarios set bloqueado=0;

ALTER TABLE `mburiano_balloonmail`.`corrientes` ADD COLUMN `active` BOOLEAN NOT NULL DEFAULT 1 AFTER `descripcion`;
