CREATE DATABASE nassiha;

USE nassiha ;

CREATE TABLE clients(
  id INT PRIMARY KEY AUTO_INCREMENT,
  fname VARCHAR(100) NOT NULL,
  lname VARCHAR(100) NOT NULL,
  photo VARCHAR(255) DEFAULT NULL,
  tel VARCHAR(10) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
);

CREATE TABLE lawyers(
  id INT PRIMARY KEY,
  bar VARCHAR(100) NOT NULL,
  cassation BOOLEAN DEFAULT FALSE,
  adress VARCHAR(255) NOT NULL,
  CONSTRAINT fk_client FOREIGN KEY (id) REFERENCES clients(id)
);

CREATE TABLE skills(
  id INT PRIMARY KEY AUTO_INCREMENT,
  skill VARCHAR(255)
);


CREATE TABLE consultation(
  id INT PRIMARY KEY AUTO_INCREMENT,
  create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status BOOLEAN DEFAULT FALSE,
  idLawyer INT,
  idClient INT,
  CONSTRAINT fk_lawyer FOREIGN KEY (idLawyer) REFERENCES lawyers(id),
  CONSTRAINT fk_client FOREIGN KEY (idClient) REFERENCES clients(id),
);

CREATE TABLE messages(
  id INT PRIMARY KEY AUTO_INCREMENT,
  create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  _read BOOLEAN DEFAULT FALSE,
  content VARCHAR(255),
  _from INT,
  _to INT,
  idConsultation INT,
  CONSTRAINT fk_client_from FOREIGN KEY (_from) REFERENCES clients(id),
  CONSTRAINT fk_client_to FOREIGN KEY (_to) REFERENCES clients(id),
  CONSTRAINT fk_consultation FOREIGN KEY (idConsultation) REFERENCES consultation(id)
);

CREATE TABLE specialised (
  idLawyer INT NOT NULL,
  idSkill INT NOT NULL,
  CONSTRAINT fk_specialised_lawyer FOREIGN KEY (idLawyer) REFERENCES lawyers(id),
  CONSTRAINT fk_specialised_skill FOREIGN KEY (idSkill) REFERENCES skills(id),
  PRIMARY KEY (idLawyer, idSkill)
);

CREATE TABLE diplomas (
	id INT PRIMARY KEY AUTO_INCREMENT,
  diploma VARCHAR NOT NULL,
  university VARCHAR NOT NULL,
  idLawyer INT NOT NULL,
  CONSTRAINT fk_diplomas_lawyer FOREIGN KEY (idLawyer) REFERENCES lawyers(id)
)
