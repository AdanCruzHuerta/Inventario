-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema inventario
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema inventario
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `inventario` DEFAULT CHARACTER SET utf8 ;
USE `inventario` ;

-- -----------------------------------------------------
-- Table `inventario`.`departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`departamento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`.`empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`empleado` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `Departamento_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Empleado_Departamento_idx` (`Departamento_id` ASC),
  CONSTRAINT `fk_Empleado_Departamento`
    FOREIGN KEY (`Departamento_id`)
    REFERENCES `inventario`.`departamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`.`equipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`equipo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `marca` VARCHAR(45) NULL DEFAULT NULL,
  `modelo` VARCHAR(45) NULL DEFAULT NULL,
  `serie` VARCHAR(100) NULL DEFAULT NULL,
  `precio` DOUBLE NOT NULL,
  `memoria` VARCHAR(45) NULL DEFAULT NULL,
  `procesador` VARCHAR(45) NULL DEFAULT NULL,
  `caracteristica` TEXT NULL DEFAULT NULL,
  `estatus` VARCHAR(45) NOT NULL COMMENT '1.- Asignada\n2.- No funciona\n3.- Partes\n4.- En reparación\n5.- En garantía\n6.- Baja\n7.- Almacenada',
  `tipo` VARCHAR(45) NULL DEFAULT NULL COMMENT '1.-Laptop\n2.-Computadora de Escritorio\n',
  `fecha_instalacion` DATE NULL DEFAULT NULL,
  `fecha_compra` DATE NOT NULL,
  `Empleado_id` INT(11) NULL DEFAULT NULL,
  `sistema_operativo` VARCHAR(400) NULL,
  `sap_instalado` INT(11) NULL DEFAULT NULL COMMENT '1 - Si\n2 - No',
  `fecha_ultimo_mantenimiento` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Equipo_Empleado1_idx` (`Empleado_id` ASC),
  CONSTRAINT `fk_Equipo_Empleado1`
    FOREIGN KEY (`Empleado_id`)
    REFERENCES `inventario`.`empleado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`.`accesorio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`accesorio` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `marca` VARCHAR(45) NULL DEFAULT NULL,
  `modelo` VARCHAR(45) NULL DEFAULT NULL,
  `serie` VARCHAR(45) NULL DEFAULT NULL,
  `precio` DOUBLE NOT NULL,
  `caracteristica` TEXT NULL DEFAULT NULL COMMENT 'Caracteristicas adicionales que ayuden a identificar el accesorio',
  `estatus` VARCHAR(45) NOT NULL COMMENT '1.- Asignada\n2.- No funciona\n3.- Partes\n4.- En reparación\n5.- En garantía\n6.- Baja\n7.- Almacenada',
  `fecha_asignacion` DATE NULL DEFAULT NULL,
  `fecha_compra` DATE NOT NULL,
  `equipo_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_accesorio_equipo1_idx` (`equipo_id` ASC),
  CONSTRAINT `fk_accesorio_equipo1`
    FOREIGN KEY (`equipo_id`)
    REFERENCES `inventario`.`equipo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`.`impresora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`impresora` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `marca` VARCHAR(45) NULL DEFAULT NULL,
  `modelo` VARCHAR(45) NULL DEFAULT NULL,
  `serie` VARCHAR(100) NULL DEFAULT NULL,
  `precio` VARCHAR(45) NOT NULL,
  `caracteristica` TEXT NULL DEFAULT NULL COMMENT 'Caracteristicas adicionales que ayuden a identificar mejor la impresora',
  `estatus` VARCHAR(45) NOT NULL COMMENT '1.- Asignada\n2.- No funciona\n3.- Partes\n4.- En reparación\n5.- En garantía\n6.- Baja\n7.- Almacenada',
  `tipo` VARCHAR(45) NULL DEFAULT NULL COMMENT '1.- Impresoras Laser\n2.-Inyeccion de tinta',
  `fecha_instalacion` DATETIME NULL DEFAULT NULL,
  `fecha_compra` DATETIME NOT NULL,
  `fecha_ultimo_mantenimiento` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`.`departamento_has_impresora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`departamento_has_impresora` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `departamento_id` INT(11) NOT NULL,
  `impresora_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `departamento_id`, `impresora_id`),
  INDEX `fk_departamento_has_impresora_impresora1_idx` (`impresora_id` ASC),
  INDEX `fk_departamento_has_impresora_departamento1_idx` (`departamento_id` ASC),
  CONSTRAINT `fk_departamento_has_impresora_departamento1`
    FOREIGN KEY (`departamento_id`)
    REFERENCES `inventario`.`departamento` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_departamento_has_impresora_impresora1`
    FOREIGN KEY (`impresora_id`)
    REFERENCES `inventario`.`impresora` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`.`mantenimiento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`mantenimiento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `estatus` VARCHAR(45) NOT NULL COMMENT 'define el tipo de mantenimiento que se efectuo\n\n1.- Preventivo\n2.- Correctivo',
  `fecha_mantenimiento` DATE NOT NULL,
  `descripcion` TEXT NULL DEFAULT NULL COMMENT 'se coloca el motivo o que fue lo que se le hizo de mantenimiento',
  `impresora_id` INT(11) NULL DEFAULT NULL,
  `Equipo_id` INT(11) NULL DEFAULT NULL,
  `tipo_mantenimiento` INT(11) NULL DEFAULT NULL COMMENT '1 Correctivo\n2 Preventivo',
  `accesorio_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_mantenimiento_impresora1_idx` (`impresora_id` ASC),
  INDEX `fk_mantenimiento_Equipo1_idx` (`Equipo_id` ASC),
  INDEX `fk_mantenimiento_accesorio_idx` (`accesorio_id` ASC),
  CONSTRAINT `fk_mantenimiento_Equipo1`
    FOREIGN KEY (`Equipo_id`)
    REFERENCES `inventario`.`equipo` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_mantenimiento_accesorio`
    FOREIGN KEY (`accesorio_id`)
    REFERENCES `inventario`.`accesorio` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_mantenimiento_impresora1`
    FOREIGN KEY (`impresora_id`)
    REFERENCES `inventario`.`impresora` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(80) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
