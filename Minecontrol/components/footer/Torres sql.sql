
CREATE DATABASE Mine_Management_se;
USE Mine_Management_se;

CREATE TABLE embeddedsystems 
(
    systemCode INT PRIMARY KEY AUTO_INCREMENT,
    description VARCHAR(200),
    sectorID VARCHAR(40),
    dust DECIMAL(10, 2) NOT NULL,
    co DECIMAL(10, 2) NOT NULL,
    co2 DECIMAL(10, 2) NOT NULL,
    ethanol DECIMAL(10, 2) NOT NULL,
    h2 DECIMAL(10, 2) NOT NULL,
    nh3 DECIMAL(10, 2) NOT NULL,
    ch4 DECIMAL(10, 2) NOT NULL,
    no2 DECIMAL(10, 2) NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    status BOOLEAN
);

