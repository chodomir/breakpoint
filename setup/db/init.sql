CREATE DATABASE IF NOT EXISTS breakpoint;

use breakpoint;

CREATE TABLE IF NOT EXISTS account(
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS profile(
    id INT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,
    created_at DATETIME NOT NULL,
    img_url VARCHAR(255),
    gender INT,
    CONSTRAINT FOREIGN KEY(id) REFERENCES account(id)
);