CREATE DATABASE airparking; 
USE airparking;

CREATE TABLE users (
	user_id INT NOT NULL AUTO_INCREMENT,
	username varchar(50) NOT NULL UNIQUE,
	password varchar(50) NOT NULL,
    confirmpassword varchar(50),
	PRIMARY KEY (user_id)
);

CREATE TABLE ParkingSpot (
    spot_id INT NOT NULL AUTO_INCREMENT,
    area varchar(100) NOT NULL,
	street varchar(100)	NOT NULL,
    description varchar(255),
    img LONGBLOB,
    PRIMARY KEY (spot_id)
);

