SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Intranet
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Intranet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `Intranet` ;

-- -----------------------------------------------------
-- Table `Intranet`.`pessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`pessoa` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`pessoa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(128) NULL,
  `sobrenome` VARCHAR(128) NULL,
  `datanascimento` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


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
-- Table `Intranet`.`funcionario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`funcionario` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`funcionario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(128) NULL,
  `rg` VARCHAR(128) NULL,
  `salario` FLOAT NULL,
  `pessoa_id` INT NOT NULL,
  `funcao_id` INT NULL,
  PRIMARY KEY (`id`, `pessoa_id`),
  INDEX `fk_funcionario_pessoa1_idx` (`pessoa_id` ASC),
  INDEX `fk_funcionario_funcao1_idx` (`funcao_id` ASC),
  CONSTRAINT `fk_funcionario_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `Intranet`.`pessoa` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_funcionario_funcao1`
    FOREIGN KEY (`funcao_id`)
    REFERENCES `Intranet`.`funcao` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`categoria` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`usuario` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(128) NULL,
  `senha` VARCHAR(128) NULL,
  `funcionario_id` INT NOT NULL,
  `categoria_id` INT NULL,
  PRIMARY KEY (`id`, `funcionario_id`),
  INDEX `fk_usuario_categoria1_idx` (`categoria_id` ASC),
  INDEX `fk_usuario_funcionario1_idx` (`funcionario_id` ASC),
  CONSTRAINT `fk_usuario_funcionario1`
    FOREIGN KEY (`funcionario_id`)
    REFERENCES `Intranet`.`funcionario` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_categoria1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `Intranet`.`categoria` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
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
  `valor` FLOAT NULL,
  `funcionario_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_DISCIPLINA_TURMA1_idx` (`turma_id` ASC),
  INDEX `fk_disciplina_funcionario1_idx` (`funcionario_id` ASC),
  CONSTRAINT `fk_DISCIPLINA_TURMA1`
    FOREIGN KEY (`turma_id`)
    REFERENCES `Intranet`.`turma` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `fk_disciplina_funcionario1`
    FOREIGN KEY (`funcionario_id`)
    REFERENCES `Intranet`.`funcionario` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`log`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`log` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`log` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` TEXT NULL,
  `data` DATETIME NULL,
  `usuario_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_log_usuario1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_log_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `Intranet`.`usuario` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`aluno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`aluno` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`aluno` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pessoa_id` INT NOT NULL,
  PRIMARY KEY (`id`, `pessoa_id`),
  INDEX `fk_aluno_pessoa1_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_aluno_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `Intranet`.`pessoa` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`responsavel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`responsavel` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`responsavel` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pessoa_id` INT NOT NULL,
  `aluno_id` INT NOT NULL,
  PRIMARY KEY (`id`, `pessoa_id`),
  INDEX `fk_responsavel_pessoa1_idx` (`pessoa_id` ASC),
  INDEX `fk_responsavel_aluno1_idx` (`aluno_id` ASC),
  CONSTRAINT `fk_responsavel_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `Intranet`.`pessoa` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_responsavel_aluno1`
    FOREIGN KEY (`aluno_id`)
    REFERENCES `Intranet`.`aluno` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`contato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`contato` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`contato` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(128) NULL,
  `numero` VARCHAR(128) NULL,
  `pessoa_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_contato_pessoa1_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_contato_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `Intranet`.`pessoa` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`aluno_disciplina`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`aluno_disciplina` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`aluno_disciplina` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `aluno_id` INT NOT NULL,
  `disciplina_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_aluno_disciplina_aluno1_idx` (`aluno_id` ASC),
  INDEX `fk_aluno_disciplina_disciplina1_idx` (`disciplina_id` ASC),
  CONSTRAINT `fk_aluno_disciplina_aluno1`
    FOREIGN KEY (`aluno_id`)
    REFERENCES `Intranet`.`aluno` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_aluno_disciplina_disciplina1`
    FOREIGN KEY (`disciplina_id`)
    REFERENCES `Intranet`.`disciplina` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`financeiro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`financeiro` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`financeiro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `valor` FLOAT NULL,
  `data` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`pagamento_funcionario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`pagamento_funcionario` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`pagamento_funcionario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `financeiro_id` INT NOT NULL,
  `funcionario_id` INT NOT NULL,
  PRIMARY KEY (`id`, `financeiro_id`),
  INDEX `fk_pagamento_funcionario_financeiro1_idx` (`financeiro_id` ASC),
  INDEX `fk_pagamento_funcionario_funcionario1_idx` (`funcionario_id` ASC),
  CONSTRAINT `fk_pagamento_funcionario_financeiro1`
    FOREIGN KEY (`financeiro_id`)
    REFERENCES `Intranet`.`financeiro` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_pagamento_funcionario_funcionario1`
    FOREIGN KEY (`funcionario_id`)
    REFERENCES `Intranet`.`funcionario` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`pagamento_aluno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`pagamento_aluno` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`pagamento_aluno` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `financeiro_id` INT NOT NULL,
  `aluno_id` INT NOT NULL,
  PRIMARY KEY (`id`, `financeiro_id`),
  INDEX `fk_pagamento_aluno_financeiro1_idx` (`financeiro_id` ASC),
  INDEX `fk_pagamento_aluno_aluno1_idx` (`aluno_id` ASC),
  CONSTRAINT `fk_pagamento_aluno_financeiro1`
    FOREIGN KEY (`financeiro_id`)
    REFERENCES `Intranet`.`financeiro` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_pagamento_aluno_aluno1`
    FOREIGN KEY (`aluno_id`)
    REFERENCES `Intranet`.`aluno` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`permissao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`permissao` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`permissao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tag` VARCHAR(45) NULL,
  `criar` TINYINT(1) NULL DEFAULT 0,
  `atualizar` TINYINT(1) NULL DEFAULT 0,
  `ler` TINYINT(1) NULL DEFAULT 0,
  `excluir` TINYINT(1) NULL DEFAULT 0,
  `categoria_id` INT NOT NULL,
  PRIMARY KEY (`id`, `categoria_id`),
  INDEX `fk_permissoes_categoria1_idx` (`categoria_id` ASC),
  CONSTRAINT `fk_permissoes_categoria1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `Intranet`.`categoria` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Intranet`.`notas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Intranet`.`notas` ;

CREATE TABLE IF NOT EXISTS `Intranet`.`notas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  `valor` FLOAT NULL,
  `aluno_id` INT NOT NULL,
  `disciplina_id` INT NOT NULL,
  PRIMARY KEY (`id`, `aluno_id`, `disciplina_id`),
  INDEX `fk_notas_aluno1_idx` (`aluno_id` ASC),
  INDEX `fk_notas_disciplina1_idx` (`disciplina_id` ASC),
  CONSTRAINT `fk_notas_aluno1`
    FOREIGN KEY (`aluno_id`)
    REFERENCES `Intranet`.`aluno` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_notas_disciplina1`
    FOREIGN KEY (`disciplina_id`)
    REFERENCES `Intranet`.`disciplina` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
