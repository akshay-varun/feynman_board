create database feynman;
CREATE USER 'feynman'@'localhost' IDENTIFIED WITH mysql_native_password BY 'fem&65n$78@aIOPu*j!248';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, INDEX, DROP, ALTER, CREATE TEMPORARY TABLES, LOCK TABLES ON feynman.* TO 'feynman'@'localhost';

CREATE TABLE users(
  id int(11) NOT NULL AUTO_INCREMENT unique key,
  username varchar(100) PRIMARY KEY
);

CREATE TABLE `dashboard` (
                             `username` varchar(255) NOT NULL,
                             `topic` varchar(255) NOT NULL,
                             `percentage` DECIMAL(25) NOT NULL,
                             `textarea` LONGTEXT NOT NULL
);

ALTER TABLE `dashboard` ADD CONSTRAINT `dashboard_fk0` FOREIGN KEY (`username`) REFERENCES `users`(`username`);