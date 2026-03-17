DROP DATABASE IF EXISTS `studentloket`;

CREATE DATABASE `studentloket`;

USE `studentloket`;

CREATE TABLE `schools` (
  `schoolid` integer PRIMARY KEY AUTO_INCREMENT,
  `schoolname` varchar(255) UNIQUE NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `postalcode` varchar(6) NOT NULL
);

CREATE TABLE `tickets` (
  `ticketid` integer PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` ENUM ('IT', 'Kantine', 'Vervoer', 'Rooster', 'Overig') NOT NULL,
  `creationdate` timestamp NOT NULL,
  `status` ENUM ('Open', 'In behandeling', 'Opgelost') NOT NULL,
  `schoolid` int NOT NULL,
  `makerid` int NOT NULL,
  `assigneeid` int,
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

ALTER TABLE `tickets` ADD FOREIGN KEY (`schoolid`) REFERENCES `schools` (`schoolid`);

ALTER TABLE `tickets` ADD FOREIGN KEY (`makerid`) REFERENCES `users` (`userid`);

ALTER TABLE `tickets` ADD FOREIGN KEY (`assigneeid`) REFERENCES `users` (`userid`);

ALTER TABLE `accounts` ADD FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

ALTER TABLE `accountschoolconn` ADD FOREIGN KEY (`accountid`) REFERENCES `accounts` (`accountid`);

ALTER TABLE `accountschoolconn` ADD FOREIGN KEY (`schoolid`) REFERENCES `schools` (`schoolid`);


-- SCHOOLS
INSERT INTO schools (schoolname, city, street, postalcode) VALUES
('Hogeschool Groningen', 'Groningen', 'Zernikeplein 1', '9747AS'),
('ROC Alfa College', 'Groningen', 'Kluiverboom 3', '9747KP'),
('Noorderpoort', 'Groningen', 'Muntinglaan 3', '9727JT'),
('Han University', 'Nijmegen', 'Kapittelweg 33', '6525EN'),
('Windesheim', 'Zwolle', 'Campus 2', '8017CA');

-- USERS
INSERT INTO users (firstname, infix, lastname, email) VALUES
('Jan', NULL, 'Jansen', 'jan.jansen@email.com'),
('Piet', 'de', 'Vries', 'piet.devries@email.com'),
('Sara', NULL, 'Bakker', 'sara.bakker@email.com'),
('Ali', NULL, 'Khan', 'ali.khan@email.com'),
('Emma', NULL, 'Visser', 'emma.visser@email.com');

-- ACCOUNTS
INSERT INTO accounts (userid, password, role) VALUES
(1, 'hashed_pw1', 'admin'),
(2, 'hashed_pw2', 'schooladmin'),
(3, 'hashed_pw3', 'ticketsolver'),
(4, 'hashed_pw4', 'standaard'),
(5, 'hashed_pw5', 'standaard');

-- ACCOUNT-SCHOOL CONNECTIE
INSERT INTO accountschoolconn (accountid, schoolid) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- TICKETS
INSERT INTO tickets (title, description, category, creationdate, status, schoolid, makerid, assigneeid, notes) VALUES
('Laptop kapot', 'Mijn laptop start niet meer op', 'IT', NOW(), 'Open', 1, 1, 3, 'Spoed'),
('Kantine eten slecht', 'Eten is koud en niet vers', 'Kantine', NOW(), 'In behandeling', 2, 2, 3, NULL),
('Bus te laat', 'Bus komt altijd te laat', 'Vervoer', NOW(), 'Open', 3, 3, NULL, NULL),
('Rooster fout', 'Mijn les staat dubbel ingepland', 'Rooster', NOW(), 'Opgelost', 1, 4, 2, 'Gefixt'),
('Overig probleem', 'Algemene klacht', 'Overig', NOW(), 'Open', 5, 5, NULL, NULL);