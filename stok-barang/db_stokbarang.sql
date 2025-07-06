CREATE DATABASE IF NOT EXISTS db_stokbarang;
USE db_stokbarang;

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(100)
);

INSERT INTO admin (username, password) VALUES ('admin', md5('admin'));

CREATE TABLE barang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(100),
    kategori VARCHAR(50),
    stok INT
);

CREATE TABLE stok_masuk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_barang INT,
    jumlah INT,
    tanggal DATE
);

CREATE TABLE stok_keluar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_barang INT,
    jumlah INT,
    tanggal DATE
);

CREATE TABLE IF NOT EXISTS kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100)
);

ALTER TABLE barang ADD COLUMN kategori_id INT;
