CREATE DATABASE project7am;

CREATE TABLE tbl_users(
uid int PRIMARY KEY AUTO_INCREMENT,
name varchar(100) not null,
email varchar(100) UNIQUE not null,
user_type ENUM ('user','admin') DEFAULT 'user',
status int DEFAULT 0,
password varchar(100) not null,
image varchar(100) not null

);

CREATE TABLE tbl_dogs
(
dog_id int primary KEY auto_increment,
    dog_name varchar(100),
    age int not null,
    color varchar(100) not null,
    action ENUM('adopt','sell') DEFAULT 'adopt',
    image varchar(100) not null,
    breed_id int,
    INDEX(breed_id),
    FOREIGN KEY(breed_id) REFERENCES tbl_breeds(breed_id)

);



SELECT *
From tbl_dogs INNER JOIN tbl_breeds ON tbl_dogs.breed_id=tbl_breeds.breed_id ORDER BY dog_id