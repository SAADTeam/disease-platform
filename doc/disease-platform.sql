-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-29 14:19:50
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disease-platform`
--

-- -----------------------------------------------------
-- Schema disease-platform
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `disease-platform` DEFAULT CHARACTER SET utf8 ;
USE `disease-platform` ;

--
-- 表的结构 `academicconference`
--

CREATE TABLE `academicconference` (
  `conferenceId` int(11) NOT NULL,
  `conferenceName` varchar(200) NOT NULL,
  `conferenceYear` int(11) NOT NULL,
  `conferenceInfo` varchar(4000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `creature`
--

CREATE TABLE `creature` (
  `creatureId` int(11) NOT NULL,
  `creatureName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `datatoollink`
--

CREATE TABLE `datatoollink` (
  `dataToolLinkId` int(11) NOT NULL,
  `dataToolLinkType` enum('data','database','analysis') NOT NULL,
  `dataToolLinkName` varchar(200) NOT NULL,
  `dataToolLinkUrl` varchar(1000) NOT NULL,
  `dataToolLinkInfo` varchar(4000) DEFAULT NULL,
  `speciesProject_speciesProjectId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `newsId` int(11) NOT NULL,
  `newsTitle` varchar(500) NOT NULL,
  `newsDate` int(11) NOT NULL,
  `newsContent` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `notification`
--

CREATE TABLE `notification` (
  `notificationId` int(11) NOT NULL,
  `notificationTitle` varchar(500) NOT NULL,
  `notificationDate` int(11) NOT NULL,
  `notificationContent` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `publisharticle`
--

CREATE TABLE `publisharticle` (
  `publishArticleId` int(11) NOT NULL,
  `publishArticleTitle` varchar(500) NOT NULL,
  `author` varchar(500) NOT NULL,
  `publishYear` int(11) NOT NULL,
  `publishArticlelink` varchar(1000) DEFAULT NULL,
  `researchTeam_researchTeamId` int(11) NOT NULL,
  `speciesProject_speciesProjectId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `researchteam`
--

CREATE TABLE `researchteam` (
  `researchTeamId` int(11) NOT NULL,
  `researchTeamName` varchar(50) NOT NULL,
  `researchTeamInfo` varchar(4000) DEFAULT NULL,
  `researchTeamDirection` varchar(500) DEFAULT NULL,
  `researchTeamTask` varchar(1000) DEFAULT NULL,
  `researchTeamType` enum('main','participate') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `speciesproject`
--

CREATE TABLE `speciesproject` (
  `speciesProjectId` int(11) NOT NULL,
  `speciesName` varchar(100) NOT NULL,
  `speciesInfo` varchar(4000) DEFAULT NULL,
  `projectProgress` text,
  `researchTeam_researchTeamId` int(11) NOT NULL,
  `creature_creatureId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `speciesrelativearticle`
--

CREATE TABLE `speciesrelativearticle` (
  `relativeArticleId` int(11) NOT NULL,
  `relativeArticleTitle` varchar(500) NOT NULL,
  `relativeArticleLink` varchar(1000) NOT NULL,
  `speciesProject_speciesProjectId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` char(40) NOT NULL,
  `userType` enum('superAdminUser','adminUser','labUser','registerUser','anonymousUser') NOT NULL,
  `userInfo` varchar(4000) DEFAULT NULL,
  `userResearchDirection` varchar(500) DEFAULT NULL,
  `userResearchResult` varchar(2000) DEFAULT NULL,
  `researchTeam_researchTeamId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academicconference`
--
ALTER TABLE `academicconference`
  ADD PRIMARY KEY (`conferenceId`),
  ADD UNIQUE KEY `conferenceId_UNIQUE` (`conferenceId`);

--
-- Indexes for table `creature`
--
ALTER TABLE `creature`
  ADD PRIMARY KEY (`creatureId`),
  ADD UNIQUE KEY `creatureId_UNIQUE` (`creatureId`);

--
-- Indexes for table `datatoollink`
--
ALTER TABLE `datatoollink`
  ADD PRIMARY KEY (`dataToolLinkId`),
  ADD UNIQUE KEY `dataToolLinkId_UNIQUE` (`dataToolLinkId`),
  ADD KEY `fk_dataToolLink_speciesProject1_idx` (`speciesProject_speciesProjectId`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsId`),
  ADD UNIQUE KEY `newsId_UNIQUE` (`newsId`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationId`),
  ADD UNIQUE KEY `notificationId_UNIQUE` (`notificationId`);

--
-- Indexes for table `publisharticle`
--
ALTER TABLE `publisharticle`
  ADD PRIMARY KEY (`publishArticleId`),
  ADD UNIQUE KEY `articleId_UNIQUE` (`publishArticleId`),
  ADD KEY `fk_publishArticle_researchTeam1_idx` (`researchTeam_researchTeamId`),
  ADD KEY `fk_publishArticle_speciesproject1` (`speciesProject_speciesProjectId`);

--
-- Indexes for table `researchteam`
--
ALTER TABLE `researchteam`
  ADD PRIMARY KEY (`researchTeamId`),
  ADD UNIQUE KEY `researchTeamId_UNIQUE` (`researchTeamId`),
  ADD UNIQUE KEY `researchTeamName_UNIQUE` (`researchTeamName`);

--
-- Indexes for table `speciesproject`
--
ALTER TABLE `speciesproject`
  ADD PRIMARY KEY (`speciesProjectId`),
  ADD UNIQUE KEY `speciesProjectId_UNIQUE` (`speciesProjectId`),
  ADD KEY `fk_speciesProject_researchTeam1_idx` (`researchTeam_researchTeamId`),
  ADD KEY `fk_speciesProject_creature1_idx` (`creature_creatureId`);

--
-- Indexes for table `speciesrelativearticle`
--
ALTER TABLE `speciesrelativearticle`
  ADD PRIMARY KEY (`relativeArticleId`),
  ADD UNIQUE KEY `relativeArticleId_UNIQUE` (`relativeArticleId`),
  ADD KEY `fk_speciesRelativeArticle_speciesProject1_idx` (`speciesProject_speciesProjectId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userid_UNIQUE` (`userId`),
  ADD UNIQUE KEY `userName_UNIQUE` (`userName`),
  ADD KEY `fk_user_researchTeam1_idx` (`researchTeam_researchTeamId`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `academicconference`
--
ALTER TABLE `academicconference`
  MODIFY `conferenceId` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `creature`
--
ALTER TABLE `creature`
  MODIFY `creatureId` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `datatoollink`
--
ALTER TABLE `datatoollink`
  MODIFY `dataToolLinkId` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationId` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `publisharticle`
--
ALTER TABLE `publisharticle`
  MODIFY `publishArticleId` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `researchteam`
--
ALTER TABLE `researchteam`
  MODIFY `researchTeamId` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `speciesproject`
--
ALTER TABLE `speciesproject`
  MODIFY `speciesProjectId` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `speciesrelativearticle`
--
ALTER TABLE `speciesrelativearticle`
  MODIFY `relativeArticleId` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;
--
-- 限制导出的表
--

--
-- 限制表 `datatoollink`
--
ALTER TABLE `datatoollink`
  ADD CONSTRAINT `fk_dataToolLink_speciesProject1` FOREIGN KEY (`speciesProject_speciesProjectId`) REFERENCES `speciesproject` (`speciesProjectId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `publisharticle`
--
ALTER TABLE `publisharticle`
  ADD CONSTRAINT `fk_publishArticle_researchTeam1` FOREIGN KEY (`researchTeam_researchTeamId`) REFERENCES `researchteam` (`researchTeamId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publishArticle_speciesproject1` FOREIGN KEY (`speciesProject_speciesProjectId`) REFERENCES `speciesproject` (`speciesProjectId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `speciesproject`
--
ALTER TABLE `speciesproject`
  ADD CONSTRAINT `fk_speciesProject_creature1` FOREIGN KEY (`creature_creatureId`) REFERENCES `creature` (`creatureId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_speciesProject_researchTeam1` FOREIGN KEY (`researchTeam_researchTeamId`) REFERENCES `researchteam` (`researchTeamId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `speciesrelativearticle`
--
ALTER TABLE `speciesrelativearticle`
  ADD CONSTRAINT `fk_speciesRelativeArticle_speciesProject1` FOREIGN KEY (`speciesProject_speciesProjectId`) REFERENCES `speciesproject` (`speciesProjectId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_researchTeam1` FOREIGN KEY (`researchTeam_researchTeamId`) REFERENCES `researchteam` (`researchTeamId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
