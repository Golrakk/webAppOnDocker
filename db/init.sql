/*CREATE DATABASE IF NOT EXISTS mydatabase;*/
USE db;


CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    access INT NOT NULL
);

CREATE TABLE allied_land (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL
);

CREATE TABLE enemy_land (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL
);

CREATE TABLE moxes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL
);

CREATE TABLE power_nines (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL
);

INSERT INTO users(login,password,access)
VALUES
    ('user','user',1),
    ('admin','admin',2);


INSERT INTO allied_land (image, name, price, stock)
VALUES 
    ('img/allied_land/tundra.png', 'tundra', 245, 128),
    ('img/allied_land/underground_sea.png', 'Underground Sea', 76.50, 256),
    ('img/allied_land/badlands.png', 'Badlands', 230.40, 64),
    ('img/allied_land/taiga.png', 'Taiga', 1843.20, 32),
    ('img/allied_land/savannah.png', 'Savannah', 145.60, 16);


INSERT INTO enemy_land (image, name, price, stock)
VALUES 
    ('img/enemy_land/scrubland.png', 'Scrubland', 130, 512),
    ('img/enemy_land/bayou.png', 'Bayou', 149, 128),
    ("img/enemy_land/tropical_island.png","Tropical Island",160,96),
    ("img/enemy_land/volcanic_island.png","Volcanic Island",128.25,64),
    ("img/enemy_land/plateau.png","Plateau",256.25,32);

INSERT INTO moxes (image, name, price, stock)
VALUES 
    ('img/moxes/mox_emerald.png', 'Mox Emerald', 3800, 24),
    ('img/moxes/mox_jet.png', 'Mox Jet', 3500, 64),
    ("img/moxes/mox_pearl.png","Mox Pearl",3199,8),
    ("img/moxes/mox_ruby.png","Mox Ruby",3999,32),
    ("img/moxes/mox_sapphire.png","Mox Sapphire",5290,16);

INSERT INTO power_nines (image, name, price, stock)
VALUES 
    ('img/power_nines/time_twister.png', 'Time Twister', 1695.99, 16),
    ('img/power_nines/time_walk.png', 'Time Walk', 2595.95, 16),
    ("img/power_nines/ancestral_recall.png","Ancestral Recall",4999.99,16),
    ("img/power_nines/wheel_of_fortune.png","Wheel Of Fortune",9995.95,16),
    ("img/power_nines/black_lotus.png","Black Lotus",14999.99,16);
