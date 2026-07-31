-- --------------------------------------------------------
-- Base de données : touche_pas_au_klaxon
-- --------------------------------------------------------

DROP DATABASE IF EXISTS touche_pas_au_klaxon;
CREATE DATABASE touche_pas_au_klaxon
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE touche_pas_au_klaxon;

-- --------------------------------------------------------
-- Table : users
-- --------------------------------------------------------

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user'
);

-- --------------------------------------------------------
-- Table : agencies
-- --------------------------------------------------------

CREATE TABLE agencies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    city VARCHAR(100) NOT NULL UNIQUE
);

-- --------------------------------------------------------
-- Table : trips
-- --------------------------------------------------------

CREATE TABLE trips (
    id INT AUTO_INCREMENT PRIMARY KEY,

    departure_agency_id INT NOT NULL,
    arrival_agency_id INT NOT NULL,

    departure_datetime DATETIME NOT NULL,
    arrival_datetime DATETIME NOT NULL,

    total_seats INT NOT NULL,
    available_seats INT NOT NULL,

    user_id INT NOT NULL,

    CONSTRAINT fk_trip_departure
        FOREIGN KEY (departure_agency_id)
        REFERENCES agencies(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    CONSTRAINT fk_trip_arrival
        FOREIGN KEY (arrival_agency_id)
        REFERENCES agencies(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    CONSTRAINT fk_trip_user
        FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);