-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema daw1_database
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema daw1_database
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `daw1_database` DEFAULT CHARACTER SET utf8 ;
USE `daw1_database` ;

-- -----------------------------------------------------
-- Table `daw1_database`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `daw1_database`.`Usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `contrasena` VARCHAR(45) NOT NULL,
  `tipo_usuario` VARCHAR(45) NOT NULL,
  `nombre_usuario` VARCHAR(45) NULL,
  `nombre_completo` VARCHAR(45) NULL,
  `sexo` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `aficiones` BLOB NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `id_usuario_UNIQUE` (`id_usuario` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `daw1_database`.`Perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `daw1_database`.`Perfil` (
  `id_perfil` VARCHAR(100) NOT NULL,
  `nombre_perfil` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(300) NULL,
  `url_imagen` VARCHAR(300) NULL,
  `num_seguidores` INT NULL,
  `num_publicaciones` INT NULL,
  `categoria` VARCHAR(45) NULL,
  PRIMARY KEY (`id_perfil`),
  UNIQUE INDEX `id_perfil_UNIQUE` (`id_perfil` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `daw1_database`.`Publicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `daw1_database`.`Publicacion` (
  `id_publicacion` VARCHAR(100) NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `fecha_creacion` DATETIME NULL,
  `ruta_recurso_media` VARCHAR(300) NULL,
  `texto` VARCHAR(300) NULL,
  `id_perfil` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_publicacion`, `id_perfil`),
  UNIQUE INDEX `id_publicacion_UNIQUE` (`id_publicacion` ASC),
  INDEX `fk_Publicacion_Perfil1_idx` (`id_perfil` ASC),
  CONSTRAINT `fk_Publicacion_Perfil1`
    FOREIGN KEY (`id_perfil`)
    REFERENCES `daw1_database`.`Perfil` (`id_perfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `daw1_database`.`Usuario_Perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `daw1_database`.`Usuario_Perfil` (
  `id_usuario` INT NOT NULL,
  `id_perfil` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_usuario`, `id_perfil`),
  INDEX `fk_Usuario_has_Perfil_Perfil1_idx` (`id_perfil` ASC),
  INDEX `fk_Usuario_has_Perfil_Usuario_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_Usuario_has_Perfil_Usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `daw1_database`.`Usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Perfil_Perfil1`
    FOREIGN KEY (`id_perfil`)
    REFERENCES `daw1_database`.`Perfil` (`id_perfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
