-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema programa
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `programa`
-- -----------------------------------------------------
-- Schema programa
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `programa` DEFAULT CHARACTER SET utf8 ;
USE `programa` ;

-- -----------------------------------------------------
-- Table `programa`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `programa`.`usuarios` (
  `idusuarios` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(300) NOT NULL,
  `senha` VARCHAR(300) NOT NULL,
  `email` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`idusuarios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `programa`.`documentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `programa`.`documentos` (
  `iddocumentos` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(300) NOT NULL,
  `nomeDoc` VARCHAR(300) NOT NULL,
  `data` DATETIME NOT NULL,
  `usuarios_idusuarios` INT NOT NULL,
  PRIMARY KEY (`iddocumentos`, `usuarios_idusuarios`),
  CONSTRAINT `fk_documentos_usuarios`
    FOREIGN KEY (`usuarios_idusuarios`)
    REFERENCES `programa`.`usuarios` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `programa`.`compartilhamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `programa`.`compartilhamentos` (
  `idcompartilhamentos` INT NOT NULL AUTO_INCREMENT,
  `iddocumentosCom` INT NOT NULL,
  `idusuariosDocCom` INT NOT NULL,
  `idusuariosCom` INT NOT NULL,
  `visualizar` TINYINT NULL,
  `alterar` TINYINT NULL,
  `excluir` TINYINT NULL,
  PRIMARY KEY (`idcompartilhamentos`, `iddocumentosCom`, `idusuariosDocCom`, `idusuariosCom`),
  CONSTRAINT `fk_compartilhamentos_documentos1`
    FOREIGN KEY (`iddocumentosCom` , `idusuariosDocCom`)
    REFERENCES `programa`.`documentos` (`iddocumentos` , `usuarios_idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compartilhamentos_usuarios1`
    FOREIGN KEY (`idusuariosCom`)
    REFERENCES `programa`.`usuarios` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
