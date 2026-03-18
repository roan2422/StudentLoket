DROP DATABASE IF EXISTS `studentloket`;
CREATE DATABASE `studentloket`;
USE `studentloket`;

-- TABLES
CREATE TABLE `schools` (
  `schoolid` integer PRIMARY KEY AUTO_INCREMENT,
  `schoolname` varchar(255) UNIQUE NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `postalcode` varchar(6) NOT NULL
);

CREATE TABLE `users` (
  `userid` integer PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) UNIQUE NOT NULL
);

CREATE TABLE `accounts` (
  `accountid` integer PRIMARY KEY AUTO_INCREMENT,
  `userid` integer UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` ENUM ('admin', 'schooladmin', 'employee') NOT NULL
);

CREATE TABLE `tickets` (
  `ticketid` integer PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `priority` ENUM ('laag', 'gemiddeld', 'hoog') NOT NULL,
  `creationdate` timestamp NOT NULL,
  `status` ENUM ('Open', 'In behandeling', 'Opgelost') NOT NULL,
  `schoolid` int NOT NULL,
  `makerid` int NOT NULL,
  `assigneeid` int,
  `notes` varchar(255)
);

CREATE TABLE `accountschoolconn` (
  `accountid` integer,
  `schoolid` integer,
  PRIMARY KEY (`accountid`, `schoolid`)
);

-- FOREIGN KEYS
ALTER TABLE `tickets` ADD FOREIGN KEY (`schoolid`) REFERENCES `schools` (`schoolid`);
ALTER TABLE `tickets` ADD FOREIGN KEY (`makerid`) REFERENCES `users` (`userid`);
ALTER TABLE `tickets` ADD FOREIGN KEY (`assigneeid`) REFERENCES `users` (`userid`);

ALTER TABLE `accounts` ADD FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

ALTER TABLE `accountschoolconn` ADD FOREIGN KEY (`accountid`) REFERENCES `accounts` (`accountid`);
ALTER TABLE `accountschoolconn` ADD FOREIGN KEY (`schoolid`) REFERENCES `schools` (`schoolid`);

-- MOCK DATA

-- Schools
INSERT INTO `schools` (`schoolname`, `city`, `street`, `postalcode`) VALUES
('Hanzehogeschool Groningen', 'Groningen', 'Zernikeplein 7', '9747AS'),
('Rijksuniversiteit Groningen', 'Groningen', 'Broerstraat 5', '9712CP'),
('Noorderpoort College', 'Groningen', 'Munnekeholm 10', '9711JA'),
('Alfa-college', 'Groningen', 'Kluiverboom 3', '9738AL');

-- Users
INSERT INTO `users` (`name`, `email`) VALUES
('Alice Jansen', 'alice.jansen@email.com'),
('Bob de Vries', 'bob.devries@email.com'),
('Charlie Bakker', 'charlie.bakker@email.com'),
('Diana Smit', 'diana.smit@email.com'),
('Ethan Visser', 'ethan.visser@email.com'),
('Fleur Meijer', 'fleur.meijer@email.com');

-- Accounts
INSERT INTO `accounts` (`userid`, `password`, `role`) VALUES
(1, 'hashed_pw_1', 'admin'),
(2, 'hashed_pw_2', 'schooladmin'),
(3, 'hashed_pw_3', 'employee'),
(4, 'hashed_pw_4', 'employee'),
(5, 'hashed_pw_5', 'schooladmin'),
(6, 'hashed_pw_6', 'employee');

-- Account-School Connections
INSERT INTO `accountschoolconn` (`accountid`, `schoolid`) VALUES
(2, 1),
(2, 2),
(3, 1),
(4, 2),
(5, 3),
(6, 4);

-- Tickets
INSERT INTO `tickets`
(`title`, `description`, `priority`, `creationdate`, `status`, `schoolid`, `makerid`, `assigneeid`, `notes`)
VALUES
('Printer werkt niet', 'Printer op verdieping 2 is kapot', 'laag', NOW() - INTERVAL 5 DAY, 'Open', 1, 3, 4, 'Nog niet nagekeken'),
('WiFi storing', 'Geen internet in lokaal B12', 'hoog', NOW() - INTERVAL 2 DAY, 'In behandeling', 2, 2, 3, 'IT is bezig'),
('Beamer defect', 'Beamer geeft geen beeld', 'gemiddeld', NOW() - INTERVAL 7 DAY, 'Opgelost', 1, 4, 3, 'Kabel vervangen'),
('Account geblokkeerd', 'Student kan niet inloggen', 'hoog', NOW() - INTERVAL 1 DAY, 'Open', 3, 5, NULL, NULL),
('Software installatie', 'Nieuwe versie van software nodig', 'laag', NOW() - INTERVAL 3 DAY, 'In behandeling', 4, 6, 4, 'Installatie gepland'),
('Laptop start niet op', 'Laptop blijft hangen bij opstarten', 'hoog', NOW() - INTERVAL 6 DAY, 'Opgelost', 2, 1, 3, 'OS opnieuw geïnstalleerd');