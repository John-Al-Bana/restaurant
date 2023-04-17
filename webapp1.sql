CREATE DATABASE webapp1;

CREATE TABLE Persons (
    id int PRIMARY KEY AUTO_INCREMENT,
    username varchar(200),
    email varchar(200),
    password varchar(200),
);

CREATE TABLE Persons (
    id int PRIMARY KEY AUTO_INCREMENT,
    title text,
    omschrijving text,
    prijs decimal(4,2),
);
