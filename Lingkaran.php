<?php
require_once 'Bentuk.php';

class Lingkaran extends Bentuk2D
{
    public $jari2;
    const phie = 3.14;

    public function __construct($jari2)
    {
        $this->jari2 = $jari2;
    }

    public function namaBidang(){
        $nama = "Lingkaran";
        return $nama;
    }

   public function luasBidang(){
    $luas = Lingkaran::phie * pow($this->jari2,2);
   }

   public function kelilingBidang(){
    $keliling = Lingkaran::phie * 2 * $this->jari2;
    return $keliling;
   }

   public function keterangan(){
    return "
    Jari-jari : ".$this->jari2."
    ";
}
}
