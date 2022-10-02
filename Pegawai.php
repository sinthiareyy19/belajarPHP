<?php
class Pegawai{
    
    //member1 variabel
    protected $nip;
    public $nama;
    public $jabatan;
    private $agama;
    private $status;

    const PEGAWAI = 'Data Pegawai PT.RUTAN';
    
    //member2 
    public function __construct($nip, $nama, $jabatan, $agama, $status){
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
    }

    //method
    public function setGajiPokok(){
        switch($this->jabatan){
            case 'Manager' : $this->gapok = 15000000; break;
            case 'Asmen' : $this->gapok = 10000000; break;
            case 'Kabag' : $this->gapok = 7000000; break;
            case 'Staff' : $this->gapok = 4000000; break;
            default : $this->gapok = 0;
        }
    }
    public function setTunjab(){
        $this->tunjab = 0.2 * $this->gapok;
    }

    public function setTunkel(){
        $this->tunkel = ($this->status == 'Menikah') ? 0.1 * $this->gapok : 0;
        $this->gajiKotor = $this->gapok + $this->tunjab + $this->tunkel;
    }

    public function setZakatProfesi(){
        if($this->agama == 'Islam' && $this->gajiKotor >= 6000000 ){
            $this->zakatProfesi = 0.025 * $this->gapok;
        } else $this->zakatProfesi = 0;
    }

    public function menampilkan(){
        echo '<b><u>'.self::PEGAWAI.'</u></b>'; 
        echo '<br/>NIP: '.$this->nip;
        echo '<br/>Nama Pegawai: '.$this->nama;
        echo '<br/>Jabatan: '.$this->jabatan;
        echo '<br/>Agama: '.$this->agama;
        echo '<br/>Status: '.$this->status;
        echo '<br/>Gaji Pokok: Rp. '.number_format($this->gapok, 0, ',', '.');
        echo '<br/>Tunjangan Jabatan: Rp. '.number_format($this->tunjab, 0, ',', '.');
        echo '<br/>Tunjangan Keluarga: Rp. '.number_format($this->tunkel, 0, ',', '.');
        echo '<br/>Zakat Profesi: Rp. '.number_format($this->zakatProfesi, 0, ',', '.');
        echo '<br/>Gaji Bersih : Rp. '.number_format($this->gajiKotor + $this->zakatProfesi, 0, ',', '.');
        echo '<hr/>';
    }
}