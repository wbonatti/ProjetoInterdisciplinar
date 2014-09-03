SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Intranet
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Intranet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `Intranet` ;

-- -----------------------------------------------------
-- Table `Intranet`.`funcao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`funcao` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`funcao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(128) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`pessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`pessoa` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`pessoa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(128) NULL,
  `sobrenome` VARCHAR(128) NULL,
  `datanascimento` DATE NULL,
  `funcao_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_PESSOA_FUNCAO1_idx` (`funcao_id` ASC),
  CONSTRAINT `fk_PESSOA_FUNCAO1`
    FOREIGN KEY (`funcao_id`)
    REFERENCES `Intranet`.`funcao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`categoria` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`usuario` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(128) NULL,
  `senha` VARCHAR(128) NULL,
  `pessoa_id` INT NOT NULL,
  `categoria_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_USUARIO_PESSOA_idx` (`pessoa_id` ASC),
  INDEX `fk_USUARIO_CATEGORIA1_idx` (`categoria_id` ASC),
  CONSTRAINT `fk_USUARIO_PESSOA`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `Intranet`.`pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USUARIO_CATEGORIA1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `Intranet`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`turma`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`turma` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`turma` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(128) NULL,
  `turno` VARCHAR(128) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`disciplina`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`disciplina` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`disciplina` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(128) NULL,
  `turma_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_DISCIPLINA_TURMA1_idx` (`turma_id` ASC),
  CONSTRAINT `fk_DISCIPLINA_TURMA1`
    FOREIGN KEY (`turma_id`)
    REFERENCES `Intranet`.`turma` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`log`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`log` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`log` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` TEXT NULL,
  `usuario_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_LOG_USUARIO1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_LOG_USUARIO1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `Intranet`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`pessoa_disciplina`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`pessoa_disciplina` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`pessoa_disciplina` (
  `pessoa_id` INT NOT NULL AUTO_INCREMENT,
  `disciplina_id` INT NOT NULL,
  PRIMARY KEY (`pessoa_id`, `disciplina_id`),
  INDEX `fk_PESSOA_has_DISCIPLINA_DISCIPLINA1_idx` (`disciplina_id` ASC),
  INDEX `fk_PESSOA_has_DISCIPLINA_PESSOA1_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_PESSOA_has_DISCIPLINA_PESSOA1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `Intranet`.`pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PESSOA_has_DISCIPLINA_DISCIPLINA1`
    FOREIGN KEY (`disciplina_id`)
    REFERENCES `Intranet`.`disciplina` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`atributo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`atributo` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`atributo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` TEXT NULL,
  `valor` TEXT NULL,
  `pessoa_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ATRIBUTO_PESSOA1_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_ATRIBUTO_PESSOA1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `Intranet`.`pessoa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
