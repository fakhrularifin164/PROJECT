-- Jalankan query ini di phpMyAdmin

CREATE DATABASE IF NOT EXISTS db_crud;

USE db_crud;

CREATE TABLE IF NOT EXISTS users (
    id       INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    nama     VARCHAR(150) NOT NULL,
    alamat   VARCHAR(255) NOT NULL,
    email    VARCHAR(150) NOT NULL,
    nohp     VARCHAR(20)  NOT NULL
);

-- Data 
INSERT INTO users (username, nama, alamat, email, nohp) VALUES
('Jandaank5',     'Lely Kurnia Eli', 'Citerep',      'akujanda@gmail.com',  '0817228227'),
('cutans',        'sutan',           'balaraja',     'cutans@gmail.com',    '081319177907'),
('BujangLanang',  'Brian',           'Bekasi',       'dudaanak5@gmail.com', '081377727287'),
('HetiAjayakan',  'Heti Kusendang',  'Bandung Raya', 'hetiaja@gmail.com',   '081319188608');