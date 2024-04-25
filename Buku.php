<?php
class Buku {
    private $judul;
    private $tahun;
    private $jumlahHalaman;
    private $bahanMateri;
    private $diskon;

    // Konstruktor
    public function __construct($judul, $tahun, $jumlahHalaman, $bahanMateri, $diskon) {
        $this->judul = $judul;
        $this->tahun = $tahun;
        $this->jumlahHalaman = $jumlahHalaman;
        $this->bahanMateri = $bahanMateri;
        $this->diskon = $diskon;
    }

    // Getter 
    public function getJudul() {
        return $this->judul;
    }

    public function getTahun() {
        return $this->tahun;
    }

    public function getJumlahHalaman() {
        return $this->jumlahHalaman;
    }

    public function getBahanMateri() {
        return $this->bahanMateri;
    }

    public function getDiskon() {
        return $this->diskon;
    }

    // Setter
    public function setDiskon($diskon) {
        $this->diskon = $diskon;
    }

    public function cekHarga() {

        $usiaBuku = 2024 - $this->tahun;
        if ($usiaBuku <= 5) {
            if ($this->jumlahHalaman <= 100) {
                return 100000;
            } elseif ($this->jumlahHalaman > 500) {
                return 500000;
            } else {
                return 300000;
            }
        } elseif ($usiaBuku > 5 && $usiaBuku <= 10) {
            if ($this->jumlahHalaman <= 100) {
                return 50000;
            } elseif ($this->jumlahHalaman > 500) {
                return 250000;
            } else {
                return 150000;
            }
        } else {
            return 10000;
        }
    }
    
}

class Komik extends Buku {
    private $isColorful;

    private function __construct($judul, $tahun, $jumlahHalaman, $isColorful) {
        parent::__construct($judul, $tahun, $jumlahHalaman, "Kertas", 0); 
        $this->isColorful = $isColorful;
    }
    public static function createBuku($judul, $tahun, $jumlahHalaman, $isColorful) {
        return new Komik($judul, $tahun, $jumlahHalaman, $isColorful);
    }

    public function getIsColorful() {
        return $this->isColorful;
    }
}

$buku1 = new Buku("Calculus", 2024, 1000, "Kertas", 10);
$buku2 = new Buku("One Pice", 1998, 500, "Kertas", 10);

echo "Judul Buku: " . $buku1->getJudul() . "<br>";
echo "Tahun Terbit: " . $buku1->getTahun() . "<br>";
echo "Jumlah Halaman: " . $buku1->getJumlahHalaman() . "<br>";
echo "Bahan Materi: " . $buku1->getBahanMateri() . "<br>";
echo "Diskon: " . $buku1->getDiskon() . "%<br>";
echo "Harga: $" . $buku1->cekHarga(). "<br><br>"; 

echo "Judul Buku: " . $buku2->getJudul() . "<br>";
echo "Tahun Terbit: " . $buku2->getTahun() . "<br>";
echo "Jumlah Halaman: " . $buku2->getJumlahHalaman() . "<br>";
echo "Bahan Materi: " . $buku2->getBahanMateri() . "<br>";
echo "Diskon: " . $buku2->getDiskon() . "%<br>";
echo "Harga: $" . $buku2->cekHarga();
