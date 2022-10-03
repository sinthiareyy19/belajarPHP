<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 5 PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
  <div class="container mt-3">
    <h3><center>Menghitung Bangun Datar</center></h3>
  <br/>
    <?php
    require_once "Lingkaran.php";
    require_once "PersegiPanjang.php";
    require_once "Segitiga.php";

    $ar_judul = ["No","Nama Bidang","Keterangan","Luas Bidang","Keliling Bidang"];
    ?>
    <table border="2" class="table table-success table-striped">
        <thead>
            <tr>
                <?php
                foreach($ar_judul as $judul) { ?>
                <th><?= $judul ?></th>
              <?php } ?>
            </tr>            
        </thead>
<tbody>
    <?php
    $persegiPanjang = new PersegiPanjang(10,4);
    $lingkaran =  new Lingkaran(14);
    $segitiga = new Segitiga(10,12);

    $arrayBentuk = [$persegiPanjang, $lingkaran, $segitiga];
    $no = 1;

    foreach($arrayBentuk as $bentuk){
      $namaBidang = $bentuk->namaBidang();
      $keterangan = $bentuk->keterangan();
      $luasBidang = $bentuk->luasBidang();
      $kelilingBidang = $bentuk->kelilingBidang();
  
    ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $namaBidang ?></td>
      <td><?= $keterangan ?></td>
      <td><?= $luasBidang ?></td>
      <td><?= $kelilingBidang ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </div>
  </body>
</html>