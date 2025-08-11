-- Active: 1752434449310@@127.0.0.1@3306
CREATE DATABASE IF NOT EXISTS `garden`;

USE `garden`;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
);

DROP TABLE IF EXISTS plants;

CREATE TABLE IF NOT EXISTS plants (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(200) NOT NULL,
    `category` VARCHAR(100) NOT NULL,
    `family` VARHCAR(100)NOT NULL,
    PRIMARY KEY (`id`)
);


INSERT INTO
    `users` (`name`, `email`, `password`)
VALUES (
        'adrian',
        'adrian@gmail.com',
        'h3ll0.'
    );

INSERT INTO
    `users` (`name`, `email`, `password`)
VALUES (
        'ana',
        'ana@gmail.com',
        'h3ll0.'
    );