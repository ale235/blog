ALTER TABLE `post` ADD `description` TEXT NULL AFTER `slug`;

CREATE TABLE IF NOT EXISTS `categoria` (
  `categoria_id` INT NOT NULL AUTO_INCREMENT,
  `nombre_categoria` VARCHAR(45) NOT NULL,
  `descripcion_categoria` VARCHAR(145) NOT NULL,
  PRIMARY KEY (`categoria_id`),
  UNIQUE INDEX `nombre_categoria_UNIQUE` (`nombre_categoria` ASC))
ENGINE = InnoDB;