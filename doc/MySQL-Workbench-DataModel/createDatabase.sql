-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema disease-platform
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema disease-platform
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `disease-platform` DEFAULT CHARACTER SET utf8 ;
USE `disease-platform` ;

-- -----------------------------------------------------
-- Table `disease-platform`.`researchTeam`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `disease-platform`.`researchTeam` (
  `researchTeamId` INT NOT NULL AUTO_INCREMENT,
  `researchTeamName` VARCHAR(50) NOT NULL,
  `researchTeamInfo` VARCHAR(4000) NULL,
  `researchTeamDirection` VARCHAR(500) NULL,
  `researchTeamTask` VARCHAR(1000) NULL,
  PRIMARY KEY (`researchTeamId`),
  UNIQUE INDEX `researchTeamId_UNIQUE` (`researchTeamId` ASC),
  UNIQUE INDEX `researchTeamName_UNIQUE` (`researchTeamName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `disease-platform`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `disease-platform`.`user` (
  `userId` INT NOT NULL AUTO_INCREMENT,
  `userName` VARCHAR(50) NOT NULL,
  `password` CHAR(40) NOT NULL,
  `userType` ENUM('superAdminUser', 'adminUser', 'labUser', 'registerUser', 'anonymousUser') NOT NULL,
  `userInfo` VARCHAR(4000) NULL,
  `userResearchDirection` VARCHAR(500) NULL,
  `userResearchResult` VARCHAR(2000) NULL,
  `researchTeam_researchTeamId` INT NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE INDEX `userid_UNIQUE` (`userId` ASC),
  UNIQUE INDEX `userName_UNIQUE` (`userName` ASC),
  INDEX `fk_user_researchTeam1_idx` (`researchTeam_researchTeamId` ASC),
  CONSTRAINT `fk_user_researchTeam1`
    FOREIGN KEY (`researchTeam_researchTeamId`)
    REFERENCES `disease-platform`.`researchTeam` (`researchTeamId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `disease-platform`.`publishArticle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `disease-platform`.`publishArticle` (
  `publishArticleId` INT NOT NULL AUTO_INCREMENT,
  `publishArticleTitle` VARCHAR(500) NOT NULL,
  `author` VARCHAR(500) NOT NULL,
  `publishYear` INT NOT NULL,
  `publishArticlelink` VARCHAR(1000) NULL,
  `researchTeam_researchTeamId` INT NOT NULL,
  PRIMARY KEY (`publishArticleId`),
  UNIQUE INDEX `articleId_UNIQUE` (`publishArticleId` ASC),
  INDEX `fk_publishArticle_researchTeam1_idx` (`researchTeam_researchTeamId` ASC),
  CONSTRAINT `fk_publishArticle_researchTeam1`
    FOREIGN KEY (`researchTeam_researchTeamId`)
    REFERENCES `disease-platform`.`researchTeam` (`researchTeamId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `disease-platform`.`news`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `disease-platform`.`news` (
  `newsId` INT NOT NULL AUTO_INCREMENT,
  `newsTitle` VARCHAR(500) NOT NULL,
  `newsDate` DATE NOT NULL,
  `newsContent` MEDIUMTEXT NULL,
  PRIMARY KEY (`newsId`),
  UNIQUE INDEX `newsId_UNIQUE` (`newsId` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `disease-platform`.`notification`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `disease-platform`.`notification` (
  `notificationId` INT NOT NULL AUTO_INCREMENT,
  `notificationTitle` VARCHAR(500) NOT NULL,
  `notificationDate` DATE NOT NULL,
  `notificationContent` MEDIUMTEXT NULL,
  PRIMARY KEY (`notificationId`),
  UNIQUE INDEX `notificationId_UNIQUE` (`notificationId` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `disease-platform`.`academicConference`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `disease-platform`.`academicConference` (
  `conferenceId` INT NOT NULL AUTO_INCREMENT,
  `conferenceName` VARCHAR(200) NOT NULL,
  `conferenceDate` DATE NOT NULL,
  `conferenceInfo` VARCHAR(4000) NULL,
  PRIMARY KEY (`conferenceId`),
  UNIQUE INDEX `conferenceId_UNIQUE` (`conferenceId` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `disease-platform`.`creature`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `disease-platform`.`creature` (
  `creatureId` INT NOT NULL AUTO_INCREMENT,
  `creatureName` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`creatureId`),
  UNIQUE INDEX `creatureId_UNIQUE` (`creatureId` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `disease-platform`.`speciesProject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `disease-platform`.`speciesProject` (
  `speciesProjectId` INT NOT NULL AUTO_INCREMENT,
  `speciesName` VARCHAR(100) NOT NULL,
  `speciesInfo` VARCHAR(4000) NULL,
  `projectProgress` MEDIUMTEXT NULL,
  `researchTeam_researchTeamId` INT NOT NULL,
  `creature_creatureId` INT NOT NULL,
  PRIMARY KEY (`speciesProjectId`),
  UNIQUE INDEX `speciesProjectId_UNIQUE` (`speciesProjectId` ASC),
  INDEX `fk_speciesProject_researchTeam1_idx` (`researchTeam_researchTeamId` ASC),
  INDEX `fk_speciesProject_creature1_idx` (`creature_creatureId` ASC),
  CONSTRAINT `fk_speciesProject_researchTeam1`
    FOREIGN KEY (`researchTeam_researchTeamId`)
    REFERENCES `disease-platform`.`researchTeam` (`researchTeamId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_speciesProject_creature1`
    FOREIGN KEY (`creature_creatureId`)
    REFERENCES `disease-platform`.`creature` (`creatureId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `disease-platform`.`dataToolLink`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `disease-platform`.`dataToolLink` (
  `dataToolLinkId` INT NOT NULL AUTO_INCREMENT,
  `dataToolLinkType` ENUM('data', 'database', 'analysis') NOT NULL,
  `dataToolLinkName` VARCHAR(200) NOT NULL,
  `dataToolLinkUrl` VARCHAR(1000) NOT NULL,
  `dataToolLinkInfo` VARCHAR(4000) NULL,
  `speciesProject_speciesProjectId` INT NOT NULL,
  PRIMARY KEY (`dataToolLinkId`),
  UNIQUE INDEX `dataToolLinkId_UNIQUE` (`dataToolLinkId` ASC),
  INDEX `fk_dataToolLink_speciesProject1_idx` (`speciesProject_speciesProjectId` ASC),
  CONSTRAINT `fk_dataToolLink_speciesProject1`
    FOREIGN KEY (`speciesProject_speciesProjectId`)
    REFERENCES `disease-platform`.`speciesProject` (`speciesProjectId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `disease-platform`.`speciesRelativeArticle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `disease-platform`.`speciesRelativeArticle` (
  `relativeArticleId` INT NOT NULL AUTO_INCREMENT,
  `relativeArticleTitle` VARCHAR(500) NOT NULL,
  `relativeArticleLink` VARCHAR(1000) NOT NULL,
  `speciesProject_speciesProjectId` INT NOT NULL,
  PRIMARY KEY (`relativeArticleId`),
  UNIQUE INDEX `relativeArticleId_UNIQUE` (`relativeArticleId` ASC),
  INDEX `fk_speciesRelativeArticle_speciesProject1_idx` (`speciesProject_speciesProjectId` ASC),
  CONSTRAINT `fk_speciesRelativeArticle_speciesProject1`
    FOREIGN KEY (`speciesProject_speciesProjectId`)
    REFERENCES `disease-platform`.`speciesProject` (`speciesProjectId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
