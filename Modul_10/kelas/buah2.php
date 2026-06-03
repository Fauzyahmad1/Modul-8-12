<?php

/*
ANALISIS ERROR buah2.php:
- $mango->set_color('Yellow')  → ERROR karena set_color() adalah 'protected',
  tidak bisa dipanggil langsung dari luar class.
- $mango->set_weight('300')    → ERROR karena set_weight() adalah 'private',
  tidak bisa dipanggil dari luar class sama sekali.

KESIMPULAN:
  Access modifier berlaku tidak hanya untuk properti, tetapi juga untuk METHOD.
  Method 'protected' dan 'private' hanya bisa dipanggil dari dalam class.
  Solusinya adalah mengubah visibility method tersebut menjadi 'public',
  atau membuat method public baru yang memanggil method private/protected tersebut.

PERBAIKAN: ubah set_color dan set_weight menjadi public.
*/

class buah2
{
    public $nama;
    public $warna;
    public $bbobot;

    public function set_name($n)
    {
        $this->nama = $n;
    }

    // PERBAIKAN: ubah dari 'protected' menjadi 'public'
    public function set_color($n)
    {
        $this->warna = $n;
    }

    // PERBAIKAN: ubah dari 'private' menjadi 'public'
    public function set_weight($n)
    {
        $this->bbobot = $n;
    }
}

$mango = new buah2();
$mango->set_name('Mango');
$mango->set_color('Yellow');   // PERBAIKAN - sekarang public
$mango->set_weight('300');     // PERBAIKAN - sekarang public

echo "Nama   : " . $mango->nama   . "<br>";
echo "Warna  : " . $mango->warna  . "<br>";
echo "Bobot  : " . $mango->bbobot . " gram<br>";
