<?php

/**
 * Class Database
 * Kelas untuk menangani koneksi basis data menggunakan OOP (Modul 12)
 * Menggunakan mysqli dengan konsep OOP dan Prepared Statements
 */
class Database
{
    // Properties (atribut kelas)
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname   = "db_kampus";

    // Property untuk menyimpan objek koneksi mysqli
    public $con;

    /**
     * Constructor: dipanggil otomatis saat objek Database dibuat
     * Langsung membuat koneksi ke database
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * Method connect: membuat koneksi ke MySQL
     */
    private function connect()
    {
        $this->con = new mysqli(
            $this->hostname,
            $this->username,
            $this->password,
            $this->dbname
        );

        // Cek apakah koneksi berhasil
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }

        // Set charset agar mendukung karakter Indonesia
        $this->con->set_charset("utf8mb4");
    }

    /**
     * Method getConnection: mengembalikan objek koneksi
     * Digunakan oleh kelas lain untuk mendapatkan koneksi
     */
    public function getConnection()
    {
        return $this->con;
    }


    public function close()
    {
        if ($this->con) {
            $this->con->close();
        }
    }
}
