SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Intranet
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Intranet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `Intranet` ;

-- -----------------------------------------------------
-- Table `Intranet`.`FUNCAO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`FUNCAO` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`FUNCAO` (
  `FUNCAOID` INT NOT NULL AUTO_INCREMENT,
  `FUNCAONOME` VARCHAR(128) NULL,
  PRIMARY KEY (`FUNCAOID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`PESSOA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`PESSOA` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`PESSOA` (
  `PESSOAID` INT NOT NULL AUTO_INCREMENT,
  `PESSOANOME` VARCHAR(128) NULL,
  `PESSOASOBRENOME` VARCHAR(128) NULL,
  `DATANASCIMENTO` DATE NULL,
  `FUNCAO_FUNCAOID` INT NOT NULL,
  PRIMARY KEY (`PESSOAID`),
  INDEX `fk_PESSOA_FUNCAO1_idx` (`FUNCAO_FUNCAOID` ASC),
  CONSTRAINT `fk_PESSOA_FUNCAO1`
    FOREIGN KEY (`FUNCAO_FUNCAOID`)
    REFERENCES `Intranet`.`FUNCAO` (`FUNCAOID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`CATEGORIA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`CATEGORIA` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`CATEGORIA` (
  `CATEGORIAID` INT NOT NULL AUTO_INCREMENT,
  `CATEGORIANOME` VARCHAR(50) NULL,
  PRIMARY KEY (`CATEGORIAID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`USUARIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`USUARIO` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`USUARIO` (
  `USUARIOID` INT NOT NULL AUTO_INCREMENT,
  `USUARIOEMAIL` VARCHAR(128) NULL,
  `USUARIOSENHA` VARCHAR(128) NULL,
  `PESSOA_PESSOAID` INT NOT NULL,
  `CATEGORIA_CATEGORIAID` INT NOT NULL,
  PRIMARY KEY (`USUARIOID`),
  INDEX `fk_USUARIO_PESSOA_idx` (`PESSOA_PESSOAID` ASC),
  INDEX `fk_USUARIO_CATEGORIA1_idx` (`CATEGORIA_CATEGORIAID` ASC),
  CONSTRAINT `fk_USUARIO_PESSOA`
    FOREIGN KEY (`PESSOA_PESSOAID`)
    REFERENCES `Intranet`.`PESSOA` (`PESSOAID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USUARIO_CATEGORIA1`
    FOREIGN KEY (`CATEGORIA_CATEGORIAID`)
    REFERENCES `Intranet`.`CATEGORIA` (`CATEGORIAID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`TURMA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`TURMA` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`TURMA` (
  `TURMAID` INT NOT NULL AUTO_INCREMENT,
  `TURMANOME` VARCHAR(128) NULL,
  `TURMATURNO` VARCHAR(128) NULL,
  PRIMARY KEY (`TURMAID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`DISCIPLINA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`DISCIPLINA` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`DISCIPLINA` (
  `DISCIPLINAID` INT NOT NULL AUTO_INCREMENT,
  `DISCIPLINANOME` VARCHAR(128) NULL,
  `TURMA_TURMAID` INT NULL,
  PRIMARY KEY (`DISCIPLINAID`),
  INDEX `fk_DISCIPLINA_TURMA1_idx` (`TURMA_TURMAID` ASC),
  CONSTRAINT `fk_DISCIPLINA_TURMA1`
    FOREIGN KEY (`TURMA_TURMAID`)
    REFERENCES `Intranet`.`TURMA` (`TURMAID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`LOG`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`LOG` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`LOG` (
  `LOGID` INT NOT NULL AUTO_INCREMENT,
  `LOGDESCRICAO` TEXT NULL,
  `USUARIO_USUARIOID` INT NOT NULL,
  PRIMARY KEY (`LOGID`),
  INDEX `fk_LOG_USUARIO1_idx` (`USUARIO_USUARIOID` ASC),
  CONSTRAINT `fk_LOG_USUARIO1`
    FOREIGN KEY (`USUARIO_USUARIOID`)
    REFERENCES `Intranet`.`USUARIO` (`USUARIOID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`PESSOA_DISCIPLINA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`PESSOA_DISCIPLINA` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`PESSOA_DISCIPLINA` (
  `PESSOA_PESSOAID` INT NOT NULL AUTO_INCREMENT,
  `DISCIPLINA_DISCIPLINAID` INT NOT NULL,
  PRIMARY KEY (`PESSOA_PESSOAID`, `DISCIPLINA_DISCIPLINAID`),
  INDEX `fk_PESSOA_has_DISCIPLINA_DISCIPLINA1_idx` (`DISCIPLINA_DISCIPLINAID` ASC),
  INDEX `fk_PESSOA_has_DISCIPLINA_PESSOA1_idx` (`PESSOA_PESSOAID` ASC),
  CONSTRAINT `fk_PESSOA_has_DISCIPLINA_PESSOA1`
    FOREIGN KEY (`PESSOA_PESSOAID`)
    REFERENCES `Intranet`.`PESSOA` (`PESSOAID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PESSOA_has_DISCIPLINA_DISCIPLINA1`
    FOREIGN KEY (`DISCIPLINA_DISCIPLINAID`)
    REFERENCES `Intranet`.`DISCIPLINA` (`DISCIPLINAID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`ATRIBUTO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`ATRIBUTO` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`ATRIBUTO` (
  `ATRIBUTOID` INT NOT NULL AUTO_INCREMENT,
  `ATRIBUTONOME` TEXT NULL,
  `ATRIBUTOVALOR` TEXT NULL,
  `PESSOA_PESSOAID` INT NOT NULL,
  PRIMARY KEY (`ATRIBUTOID`),
  INDEX `fk_ATRIBUTO_PESSOA1_idx` (`PESSOA_PESSOAID` ASC),
  CONSTRAINT `fk_ATRIBUTO_PESSOA1`
    FOREIGN KEY (`PESSOA_PESSOAID`)
    REFERENCES `Intranet`.`PESSOA` (`PESSOAID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`AUTENTICADOR`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`AUTENTICADOR` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`AUTENTICADOR` (
  `TOKIEN` CHAR(8) NOT NULL,
  `TIMESTAMP` INT NULL,
  `IP` VARCHAR(45) NULL,
  `HOST` VARCHAR(45) NULL,
  `USUARIO_USUARIOID` INT NOT NULL,
  PRIMARY KEY (`TOKIEN`),
  INDEX `fk_AUTENTICADOR_USUARIO1_idx` (`USUARIO_USUARIOID` ASC),
  CONSTRAINT `fk_AUTENTICADOR_USUARIO1`
    FOREIGN KEY (`USUARIO_USUARIOID`)
    REFERENCES `Intranet`.`USUARIO` (`USUARIOID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
