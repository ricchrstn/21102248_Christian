/* Create Database and Table */
CREATE DATABASE zawata;
USE zawata;
 
CREATE TABLE `library` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL, 
  `category` VARCHAR(255) NOT NULL, 
  `publisher` VARCHAR(255) NOT NULL, 
  `count` INT NOT NULL,
  `picture` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);