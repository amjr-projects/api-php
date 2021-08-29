CREATE DATABASE dbapi;

CREATE TABLE tb_users (
	id_user INT NOT NULL AUTO_INCREMENT,
    name_user VARCHAR(100) NOT NULL,
    id_address INT,
    id_city INT,
    id_state INT,
    PRIMARY KEY (id_user),
    FOREIGN KEY (id_address) REFERENCES tb_address(id_address),
    FOREIGN KEY (id_city) REFERENCES tb_city(id_city),
    FOREIGN KEY (id_state) REFERENCES tb_state(id_state)
);

CREATE TABLE tb_address (
	id_address INT NOT NULL AUTO_INCREMENT,
    name_address VARCHAR(55),
    PRIMARY KEY (id_address)
);

CREATE TABLE tb_city (
	id_city INT NOT NULL AUTO_INCREMENT,
    name_city VARCHAR(55),
	PRIMARY KEY (id_city)
);

CREATE TABLE tb_state (
	id_state INT NOT NULL AUTO_INCREMENT,
    name_state VARCHAR(55),
    PRIMARY KEY (id_state)
);