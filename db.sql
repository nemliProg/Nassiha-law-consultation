CREATE DATABASE tonbook;

USE tonbook ;


CREATE TABLE user (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  tel VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  pw VARCHAR(255) NOT NULL,
);


CREATE TABLE offer (
  id INT PRIMARY KEY AUTO_INCREMENT,
  _description VARCHAR(255) NOT NULL,
  photo VARCHAR(255) NOT NULL,
  idUser INT ,
  prix FLOAT NOT NULL,
  CONSTRAINT fk_offer_user FOREIGN KEY (idUser) REFERENCES user(id)
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
