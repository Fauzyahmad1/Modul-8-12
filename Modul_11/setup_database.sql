-- ============================================================
--  FILE: setup_database.sql
--  Jalankan file ini di phpMyAdmin atau MySQL CLI
--  untuk membuat database dan tabel yang dibutuhkan
-- ============================================================

-- Buat database
CREATE DATABASE IF NOT EXISTS db_kampus
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE db_kampus;

-- -------------------------------------------------------
-- Tabel t_dosen
-- -------------------------------------------------------
CREATE TABLE IF NOT EXISTS t_dosen (
    idDosen    INT          NOT NULL AUTO_INCREMENT,
    namaDosen  VARCHAR(50)  NOT NULL,
    noHP       VARCHAR(25)  NOT NULL,
    PRIMARY KEY (idDosen)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------------
-- Tabel t_mahasiswa
-- -------------------------------------------------------
CREATE TABLE IF NOT EXISTS t_mahasiswa (
    npm        INT          NOT NULL,
    namaMhs    VARCHAR(50)  NOT NULL,
    prodi      VARCHAR(25)  NOT NULL,
    alamat     VARCHAR(70)  NOT NULL,
    noHP       VARCHAR(25)  NOT NULL,
    PRIMARY KEY (npm)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------------
-- Tabel t_matakuliah
-- -------------------------------------------------------
CREATE TABLE IF NOT EXISTS t_matakuliah (
    kodeMK   INT          NOT NULL,
    namaMK   VARCHAR(70)  NOT NULL,
    sks      INT          NOT NULL,
    jam      INT          NOT NULL,
    PRIMARY KEY (kodeMK)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------------
-- Data contoh t_dosen
-- -------------------------------------------------------
INSERT INTO t_dosen (namaDosen, noHP) VALUES
    ('Dr. Ahmed Yusuf, M.Sc',  '081222333444'),
    ('Jarwo Slamet Joyo, Ph.D', '081444333555');

-- -------------------------------------------------------
-- Data contoh t_mahasiswa
-- -------------------------------------------------------
INSERT INTO t_mahasiswa (npm, namaMhs, prodi, alamat, noHP) VALUES
    (2021001, 'Budi Santoso',    'Teknik Informatika', 'Jl. Merdeka No.1 Madiun',   '082111222333'),
    (2021002, 'Siti Rahayu',     'Sistem Informasi',   'Jl. Pahlawan No.5 Madiun',  '083222333444'),
    (2021003, 'Andi Wijaya',     'Teknik Informatika', 'Jl. Diponegoro No.10 Kediri','085333444555');

-- -------------------------------------------------------
-- Data contoh t_matakuliah
-- -------------------------------------------------------
INSERT INTO t_matakuliah (kodeMK, namaMK, sks, jam) VALUES
    (101, 'Pemrograman Web',       3, 3),
    (102, 'Basis Data',            3, 3),
    (103, 'Algoritma & Pemrograman', 4, 4);
