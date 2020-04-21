#@(#) script.ddl

DROP TABLE IF EXISTS Moduliai;
DROP TABLE IF EXISTS Loginai;
DROP TABLE IF EXISTS Komentarai;
DROP TABLE IF EXISTS Student_login;
DROP TABLE IF EXISTS Modulio_komentaras;
DROP TABLE IF EXISTS Admin_login;
CREATE TABLE Admin_login
(
	Admin_id varchar (255) NOT NULL,
	Vardas varchar (255),
	Pavarde varchar (255),
	Slapyvardis varchar (255),
	Slaptazodis varchar (255),
	Elektroninis_Pastas varchar (255),
	PRIMARY KEY(Admin_id)
);

CREATE TABLE Modulio_komentaras
(
	Modulio_id integer (255) NOT NULL,
	Komentaro_id integer NOT NULL,
	PRIMARY KEY(Komentaro_id, Modulio_id)
);

CREATE TABLE Student_login
(
	Vidkodas varchar (255) NOT NULL,
	Vardas varchar (255),
	Pavarde varchar (255),
	Slapyvardis varchar (255),
	Slaptazodis varchar (255),
	Elektroninis_pastas varchar (255),
	Komentaru_kiekis integer,
	PRIMARY KEY(Vidkodas)
);

CREATE TABLE Komentarai
(
	id integer (255) NOT NULL,
	Komentaras varchar (255),
	Upvote integer,
	Redaguota boolean,
	Data date,
	PRIMARY KEY(id)
);

CREATE TABLE Loginai
(
	ip_adresas varchar (255),
	Data date,
	Tinklapio_adresas varchar (255),
	Jungimosi_id varchar (255) NOT NULL,
	PRIMARY KEY(Jungimosi_id)
);

CREATE TABLE Moduliai
(
	Kodas varchar (255) NOT NULL,
	Pavadinimas varchar (255),
	Kalba varchar (255),
	PRIMARY KEY(Kodas)
);
