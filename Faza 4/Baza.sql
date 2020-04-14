CREATE DATABASE  IF NOT EXISTS `bazaMarkoLaza` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bazaMarkoLaza`;
drop table if exists Korisnik;

CREATE TABLE Korisnik
(
	username             VARCHAR(20) NOT NULL,
	password             VARCHAR(20) NULL,
	imeiprezime          VARCHAR(20) NULL,
	email                VARCHAR(40) NULL,
	adresa               VARCHAR(40) NULL,
	telefon              VARCHAR(20) NULL,
	admin                boolean NULL
);

ALTER TABLE Korisnik
ADD CONSTRAINT XPKKorisnik PRIMARY KEY (username);
drop table if exists LF;

CREATE TABLE LF
(
	izgpro               boolean NULL,
	oglasId              INTEGER NOT NULL
);

ALTER TABLE LF
ADD CONSTRAINT XPKLF PRIMARY KEY (oglasId);

drop table if exists Oglas;

CREATE TABLE Oglas
(
	oglasId              INTEGER NOT NULL,
	vrsta                VARCHAR(10) NULL,
	pol                  VARCHAR(10) NULL,
	rasa                 VARCHAR(20) NULL,
	slika                VARCHAR(40) NULL,
	opis                 VARCHAR(200) NULL,
	username             VARCHAR(20) NOT NULL
);

ALTER TABLE Oglas
ADD CONSTRAINT XPKOglas PRIMARY KEY (oglasId);
drop table if exists SrecnaPrica;

CREATE TABLE SrecnaPrica
(
	srecnapricaId        INTEGER NOT NULL,
	slika                VARCHAR(30) NULL,
	opis                 VARCHAR(200) NULL
);

ALTER TABLE SrecnaPrica
ADD CONSTRAINT XPKSrecnaPrica PRIMARY KEY (srecnapricaId);

drop table if exists Udomi;

CREATE TABLE Udomi
(
	starost              VARCHAR(20) NULL,
	mesto                VARCHAR(20) NULL,
	oglasId              INTEGER NOT NULL
);

ALTER TABLE Udomi
ADD CONSTRAINT XPKUdomi PRIMARY KEY (oglasId);

drop table if exists Vest;

CREATE TABLE Vest
(
	vestId               INTEGER NOT NULL,
	naslov               VARCHAR(40) NULL,
	slika                VARCHAR(30) NULL,
	opis                 VARCHAR(200) NULL
);

ALTER TABLE Vest
ADD CONSTRAINT XPKVest PRIMARY KEY (vestId);
drop table if exists Zalba;

CREATE TABLE Zalba
(
	zalbaId              INTEGER NOT NULL,
	opis                 VARCHAR(20) NULL,
	username             VARCHAR(20) NOT NULL
);

ALTER TABLE Zalba
ADD CONSTRAINT XPKZalba PRIMARY KEY (zalbaId);

ALTER TABLE LF
ADD CONSTRAINT R_1 FOREIGN KEY (oglasId) REFERENCES Oglas (oglasId)
		ON DELETE CASCADE;

ALTER TABLE Oglas
ADD CONSTRAINT R_4 FOREIGN KEY (username) REFERENCES Korisnik (username);

ALTER TABLE Udomi
ADD CONSTRAINT R_2 FOREIGN KEY (oglasId) REFERENCES Oglas (oglasId)
		ON DELETE CASCADE;

ALTER TABLE Zalba
ADD CONSTRAINT R_3 FOREIGN KEY (username) REFERENCES Korisnik (username);