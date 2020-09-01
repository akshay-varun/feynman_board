create database feynman;
CREATE USER 'feynman'@'localhost' IDENTIFIED WITH mysql_native_password BY 'fem&65n$78@aIOPu*j!248';
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, INDEX, DROP, ALTER, CREATE TEMPORARY TABLES, LOCK TABLES ON feynman.* TO 'feynman'@'localhost';

CREATE TABLE users(
  id int(11) NOT NULL AUTO_INCREMENT unique key,
  username varchar(100) PRIMARY KEY
);