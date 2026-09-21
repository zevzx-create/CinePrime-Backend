CREATE DATABASE CinePrimeDB;
USE CinePrimeDB;


CREATE TABLE Filmes (
    Id INT PRIMARY KEY IDENTITY(1,1),
    Titulo VARCHAR(150) NOT NULL,
    Genero VARCHAR(50),
    Duracao INT, 
    Classificacao VARCHAR(10),
    PrecoBase DECIMAL(10,2)
);


CREATE TABLE Salas (
    Id INT PRIMARY KEY IDENTITY(1,1),
    NomeSala VARCHAR(50),
    CapacidadeTotal INT
);


CREATE TABLE Sessoes (
    Id INT PRIMARY KEY IDENTITY(1,1),
    FilmeId INT FOREIGN KEY REFERENCES Filmes(Id),
    SalaId INT FOREIGN KEY REFERENCES Salas(Id),
    DataHora DATETIME NOT NULL,
    PrecoIngresso DECIMAL(10,2)
);


CREATE TABLE Clientes (
    Id INT PRIMARY KEY IDENTITY(1,1),
    Nome VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE,
    Telefone VARCHAR(20)
);


CREATE TABLE Ingressos (
    Id INT PRIMARY KEY IDENTITY(1,1),
    SessaoId INT FOREIGN KEY REFERENCES Sessoes(Id),
    ClienteId INT FOREIGN KEY REFERENCES Clientes(Id),
    AssentoCodigo VARCHAR(10), 
    DataVenda DATETIME DEFAULT GETDATE(),
    ValorPago DECIMAL(10,2)
);


INSERT INTO Filmes (Titulo, Genero, Duracao, Classificacao, PrecoBase) VALUES ('Avatar: O Caminho da Água', 'Sci-Fi', 192, '12', 30.00);
INSERT INTO Salas (NomeSala, CapacidadeTotal) VALUES ('Sala IMAX 01', 100), ('Sala 02', 50);
INSERT INTO Sessoes (FilmeId, SalaId, DataHora, PrecoIngresso) VALUES (1, 1, '2026-10-01 19:00', 35.00);
