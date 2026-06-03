<?php

/*
ANALISIS ERROR buah.php:
- $mango->warna = 'Yellow'  → ERROR karena $warna adalah 'protected',
  tidak bisa diakses langsung dari luar class.
- $mango->buah  = '300'     → ERROR karena $berat adalah 'private',
  tidak bisa diakses dari luar class sama sekali. Selain itu nama
  propertinya juga salah ($buah seharusnya $berat).

KESIMPULAN:
  Protected  → hanya bisa diakses dari dalam class & class turunannya.
  Private    → hanya bisa diakses dari dalam class itu sendiri.
  Untuk mengakses keduanya dari luar class, harus melalui method getter/setter.

PERBAIKAN: tambahkan getter & setter, lalu akses via method tersebut.
*/

class buah
{
    public    $nama;
    protected $warna;
    private   $berat;

    // Getter & Setter warna (protected)
    public function getWarna()
    {
        return $this->warna;
    }

    public function setWarna($warna)
    {
        $this->warna = $warna;
    }

    // Getter & Setter berat (private)
    public function getBerat()
    {
        return $this->berat;
    }

    public function setBerat($berat)
    {
        $this->berat = $berat;
    }
}

$mango         = new buah();
$mango->nama   = 'Mango';          // OK - public
$mango->setWarna('Yellow');        // PERBAIKAN - via setter
$mango->setBerat('300');           // PERBAIKAN - via setter

echo "Nama  : " . $mango->nama         . "<br>";
echo "Warna : " . $mango->getWarna()   . "<br>";
echo "Berat : " . $mango->getBerat()   . " gram<br>";
