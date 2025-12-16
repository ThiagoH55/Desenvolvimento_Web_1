CREATE DATABASE clinica;

USE clinica;

CREATE TABLE medicos (
    id_med INT NOT NULL AUTO_INCREMENT,
    nome_med VARCHAR(90) NOT NULL,
    especialidade VARCHAR(45) NOT NULL,
    CONSTRAINT PK_med PRIMARY KEY (id_med)
);

CREATE TABLE pacientes (
    id_pac INT NOT NULL AUTO_INCREMENT,
    nome_pac VARCHAR(90) NOT NULL,
    nasc_pac DATE NOT NULL,
    tip_sang_pac VARCHAR(3),
    CONSTRAINT PK_pac PRIMARY KEY (id_pac)
)

CREATE TABLE consulta (
    id_cons INT NOT NULL AUTO_INCREMENT
    date_time_cons TIMESTAMP,
    obse_cons VARCHAR(255),
    id_med INT NOT NULL,
    id_pac INT NOT NULL,
    FOREIGN KEY (id_med) REFERENCES medicos(id_med) ON DELETE CASCADE,
    FOREIGN KEY (id_pac) REFERENCES pacientes(id_pac) ON DELETE CASCADE,
    CONSTRAINT PK_cons PRIMARY KEY (id_cons)
)