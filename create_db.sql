CREATE DATABASE IF NOT EXISTS patient;
USE patient;

DROP TABLE IF EXISTS patientinfo;
CREATE TABLE patientinfo (
    id INT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    address VARCHAR(100),
    reason VARCHAR(20),
    contact VARCHAR(15)
);
