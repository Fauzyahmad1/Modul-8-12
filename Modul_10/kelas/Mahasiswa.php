<?php

require_once "Manusia.php";

class mahasiswa extends Manusia
{
    protected $NIM;
    protected $jurusan;
    protected $kelas;

    public function __construct($nama)
    {
        // kita bisa langsung manfaatkan fungsi dari kelas manusia.php
        $this->setNama($nama);
    }

    // Getter & Setter NIM
    public function getNIM()
    {
        return $this->NIM;
    }

    public function setNIM($NIM)
    {
        $this->NIM = $NIM;
    }

    // Getter & Setter Jurusan
    public function getJurusan()
    {
        return $this->jurusan;
    }

    public function setJurusan($jurusan)
    {
        $this->jurusan = $jurusan;
    }

    // Getter & Setter Kelas
    public function getKelas()
    {
        return $this->kelas;
    }

    public function setKelas($kelas)
    {
        $this->kelas = $kelas;
    }
}
