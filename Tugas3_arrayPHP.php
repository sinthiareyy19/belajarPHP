
<?php
$m1 = ['nim' => '191402110', 'nama' => 'Park Chanyeol','nilai' => 96];
$m2 = ['nim' => '191402111', 'nama' => 'Oh Sehun','nilai' => 85];
$m3 = ['nim' => '191402112', 'nama' => 'Baekhyun','nilai' => 76];
$m4 = ['nim' => '191402113', 'nama' => 'Kim Jongin','nilai' => 59];
$m5 = ['nim' => '191402114', 'nama' => 'Kim Jongdae','nilai' => 88];
$m6 = ['nim' => '191402115', 'nama' => 'Kim Minseok','nilai' => 44];
$m7 = ['nim' => '191402116', 'nama' => 'Kim Junmyeon','nilai' => 96];
$m8 = ['nim' => '191402117', 'nama' => 'Zhang Yixing','nilai' => 83];
$m9 = ['nim' => '191402118', 'nama' => 'Do Kyungso','nilai' => 90];
$m10 = ['nim' => '19140219', 'nama' => 'Luhan','nilai' => 50];


$ar_judul = ['No', 'NIM', 'Nama', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

//array
$mahasiswa = [$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10];

$jmlh_siswa = count($mahasiswa);
$jmlh_nilai = array_column($mahasiswa, 'nilai');
$total_nilai = array_sum($jmlh_nilai);
$max_nilai = max($jmlh_nilai);
$min_nilai = min($jmlh_nilai);
$rata2 = $total_nilai / $jmlh_siswa;

$keterangan = [
    'Nilai Tertinggi'=>$max_nilai,
    'Nilai Terendah'=>$min_nilai,
    'Nilai Rata-Rata'=>$rata2,
    'Jumlah Siswa'=>$jmlh_siswa
];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Array dalam PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>

  <body>
    <h1 class="text-center">Daftar Nilai Mahasiswa</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <?php
                foreach($ar_judul as $jdl) {
                ?>
                <th><?= $jdl ?></th>
                <?php } ?>
        </thead>
        <tbody>
            <?php
            $no = 1;
        //if multi kondisi
            foreach($mahasiswa as $mhs){
            //ternary
                $status =($mhs['nilai'] >= 60) ? 'Lulus' : 'Gagal';
                
                if($mhs['nilai'] >= 85 && $mhs['nilai'] <= 100) {
                    $grade = "A";
                }
                else if($mhs['nilai'] >=75 && $mhs['nilai'] <85) {
                    $grade = "B";
                }
                else if($mhs['nilai'] >=65 && $mhs['nilai'] <75) {
                    $grade = "C";
                }
                else if($mhs['nilai'] >=55 &&$mhs['nilai'] <65) {
                    $grade = "D";
                }
                else{
                    $grade = "E";
                }
        //switch case
                switch ($grade) {
                    case "A":
                        $predikat="Memuaskan";
                        break;
                    case "B":
                        $predikat="Bagus";
                        break;
                    case "C":
                        $predikat="Cukup";
                        break;
                    case "D":
                        $predikat="Kurang";
                        break;
                    case "E":
                        $predikat="Buruk";
                        break;
                    default:
                        break;
                }
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $mhs['nim'] ?></td>
                    <td><?= $mhs['nama'] ?></td>
                    <td><?= $mhs['nilai'] ?></td>
                    <td><?= $status ?></td>
                    <td><?= $grade ?></td>
                    <td><?= $predikat ?></td>
                </tr>
                <?php $no++; } ?>
            </tbody>
            <tfoot>
                <?php
                foreach ($keterangan as $ket => $hasil) {
                ?>
                <tr>
                    <th colspan="3"><?= $ket ?></th>
                    <th><?= $hasil ?></th>
                </tr>
                <?php } ?>
            </tfoot>
        </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>