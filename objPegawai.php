<?php
require 'Pegawai.php';

 $sinthia = new Pegawai(101, 'Sinthia', 'Manager', 'Kristen', 'Belum Menikah');
 $mingyu = new Pegawai(102, 'Kim Mingyu', 'Asmen', 'Konghuchu', 'Menikah');
 $jaehyun = new Pegawai(103, 'Sinthia', 'Staff', 'Kristen', 'Menikah');
 $chanyeol = new Pegawai(104, 'Park Chanyeol', 'Kabag', 'Kristen', 'Belum Menikah');
 $sehun = new Pegawai(105, 'Ooh Sehun', 'Staff', 'Islam', 'Belum Menikah');

$sinthia->setGajiPokok();
$mingyu->setGajiPokok();
$jaehyun->setGajiPokok();
$chanyeol->setGajiPokok();
$sehun->setGajiPokok();

$sinthia->setTunjab();
$mingyu->setTunjab();
$jaehyun->setTunjab();
$chanyeol->setTunjab();
$sehun->setTunjab();

$sinthia->setTunkel();
$mingyu->setTunkel();
$jaehyun->setTunkel();
$chanyeol->setTunkel();
$sehun->setTunkel();

$sinthia->setZakatProfesi();
$mingyu->setZakatProfesi();
$jaehyun->setZakatProfesi();
$chanyeol->setZakatProfesi();
$sehun->setZakatProfesi();

echo '<h3 align="center">'.Pegawai::PEGAWAI.'</h3>';
$sinthia->menampilkan();
$mingyu->menampilkan();
$jaehyun->menampilkan();
$chanyeol->menampilkan();
$sehun->menampilkan();
