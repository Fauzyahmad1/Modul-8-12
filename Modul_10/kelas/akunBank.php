<?php

class akunBank
{
    protected $accountNumber;
    protected $jmlUang;
    protected $nama;

    public function __construct($nomorAkun, $nominal)
    {
        $this->accountNumber = $nomorAkun;
        $this->jmlUang       = $nominal;
    }

    // Getter & Setter untuk $nama
    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    // Getter untuk nomor akun
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    // Menambahkan jumlah uang
    public function tambahUang($jumlah)
    {
        if ($jumlah > 0) {
            $this->jmlUang += $jumlah;
            echo "Berhasil menambahkan Rp " . number_format($jumlah, 0, ',', '.') . "<br>";
        } else {
            echo "Jumlah tidak valid.<br>";
        }
    }

    // Mengurangi jumlah uang
    public function kurangUang($jumlah)
    {
        if ($jumlah > 0 && $jumlah <= $this->jmlUang) {
            $this->jmlUang -= $jumlah;
            echo "Berhasil menarik Rp " . number_format($jumlah, 0, ',', '.') . "<br>";
        } else {
            echo "Saldo tidak mencukupi atau jumlah tidak valid.<br>";
        }
    }

    // Menampilkan jumlah uang
    public function tampilUang()
    {
        echo "Saldo saat ini: Rp " . number_format($this->jmlUang, 0, ',', '.') . "<br>";
    }

    // Menghitung pajak 11%
    public function hitungPajak()
    {
        $pajak = $this->jmlUang * 0.11;
        echo "Pajak (11%): Rp " . number_format($pajak, 0, ',', '.') . "<br>";
        return $pajak;
    }
}
