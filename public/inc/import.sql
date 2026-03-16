DROP DATABASE IF EXISTS `studentloket`;

CREATE DATABASE `studentloket`;

USE `studentloket`;

CREATE TABLE `schools` (
  `schoolid` integer PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) UNIQUE,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `postalcode` varchar(6) NOT NULL
);

CREATE TABLE `tickets` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` ENUM ('IT', 'Kantine', 'Vervoer', 'Rooster') NOT NULL,
  `creationdate` timestamp NOT NULL,
  `status` ENUM ('Open', 'In behandeling', 'Opgelost') NOT NULL,
  `school` int NOT NULL,
  `maker` int NOT NULL,
  `assignee` int,
  `notes` varchar(255)
);

CREATE TABLE `users` (
  `userid` integer PRIMARY KEY AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `infix` varchar(255),
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) UNIQUE NOT NULL
);

CREATE TABLE `accounts` (
  `accountid` integer PRIMARY KEY AUTO_INCREMENT,
  `userid` integer UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` ENUM ('standaard', 'admin', 'schooladmin', 'ticketsolver') NOT NULL
);

CREATE TABLE `accountschoolconn` (
  `accountid` integer,
  `schoolid` integer,
  PRIMARY KEY (`accountid`, `schoolid`)
);

ALTER TABLE `tickets` ADD FOREIGN KEY (`school`) REFERENCES `schools` (`schoolid`);

ALTER TABLE `tickets` ADD FOREIGN KEY (`maker`) REFERENCES `users` (`userid`);

ALTER TABLE `tickets` ADD FOREIGN KEY (`assignee`) REFERENCES `users` (`userid`);

ALTER TABLE `accounts` ADD FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

ALTER TABLE `accountschoolconn` ADD FOREIGN KEY (`accountid`) REFERENCES `accounts` (`accountid`);

ALTER TABLE `accountschoolconn` ADD FOREIGN KEY (`schoolid`) REFERENCES `schools` (`schoolid`);
