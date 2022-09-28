<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tugas Membuat Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body>
    <div class="container px-5 my-5">
        <form id="contactForm" method="POST">
            <h2 class="text-center mb-5">Form Data Pegawai</h2>
            <div class="mb-3 mt-3">
                <label class="form-label" for="nama">Nama Pegawai</label>
                <input class="form-control" name="nama" type="text" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="agama">Agama</label>
                <select class="form-select" name="agama" aria-label="Agama">
                    <option value="">-- Pilih Agama Anda --</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen Protestan">Kristen Protestan</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label d-block">Jabatan</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" value="Manager" type="radio" name="jabatan" data-sb-validations="" />
                    <label class="form-check-label" for="manager">Manager</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" value="Asisten" type="radio" name="jabatan" data-sb-validations="" />
                    <label class="form-check-label" for="asisten">Asisten</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" value="Kabag" type="radio" name="jabatan" data-sb-validations="" />
                    <label class="form-check-label" for="kabag">Kabag</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" value="Staff" type="radio" name="jabatan" data-sb-validations="" />
                    <label class="form-check-label" for="staff">Staff</label>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label d-block">Status</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" value="Menikah" id="menikah" type="radio" name="status" data-sb-validations="" />
                    <label class="form-check-label" for="menikah">Menikah</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" Value="Belum Menikah" id="blmMenikah" type="radio" name="status" data-sb-validations="" />
                    <label class="form-check-label" for="belumMenikah">Belum Menikah</label>
                </div>
            </div>
            <div class="mb-3" id="jlhAnak" style="visibility : hidden">
                <label class="form-label" for="jumlahAnak">Jumlah Anak</label>
                <input class="form-control" name="jlhAnak" type="text" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="jumlahAnak:required">Jumlah Anak is required.</div>
            </div>
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    <p>To activate this form, sign up at</p>
                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                </div>
            </div>
            <div class="d-none" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">Error sending message!</div>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg" name="simpan" type="submit">Submit</button>
            </div>
        </form>
    </div>
        <?php 
        //tangkap request
        $nama = $_POST['nama'];
        $agama = $_POST['agama'];
        $jabatan = $_POST['jabatan'];
        $status = $_POST['status'];
        $jlhAnak = $_POST['jlhAnak'];
        $tombol = $_POST['simpan'];

        switch ($jabatan) {
            case 'Manager': $gapok = 20000000; break;
            case 'Asisten': $gapok = 15000000; break;
            case 'Kabag': $gapok = 10000000; break;
            case 'Staff': $gapok = 4000000; break;
            default: $gapok = '';
        }
        $tunjanganJabatan = 0.2 * $gapok;

        if($status == 'Menikah' && $jlhAnak <= 2) $tunjanganKeluarga = 0.05 * $gapok;
        else if($status == 'Menikah' && $jlhAnak >= 3 && $jlhAnak <= 5) $tunjanganKeluarga = 0.1 * $gapok;
        else if($status == 'Menikah' && $jlhAnak > 5) $tunjanganKeluarga = 0.15 * $gapok;
        else $tunjanganKeluarga = 0;

        $gajiKotor = $gapok + $tunjanganJabatan + $tunjanganKeluarga;
        $zakat_profesi = ($agama == 'Islam' && $gajiKotor >=  6000000) ? 0.025 * $gajiKotor : 0; 
        $takehome_pay = $gajiKotor - $zakat_profesi;
        
        if(isset($tombol)){ ?>
        <div class="card" style="width: 75%; margin: auto;">
            <div class="body">
                <div class=" alert alert-primary p-5" role="alert">
                    <h3 class="text-center mb-3">Data Pegawai</h3>
                    Nama Pegawai: <?= $nama; ?>
                    <br />Agama: <?= $agama; ?>
                    <br />Jabatan: <?= $jabatan; ?>
                    <br />Status: <?= $status; ?>
                    <br />Jumlah Anak : <?= $jlhAnak; ?>
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                            <th scope="col">Gaji Pokok</th>
                            <th scope="col">Tunjangan Jabatan</th>
                            <th scope="col">Tunjangan Keluarga</th>
                            <th scope="col">Gaji Kotor</th>
                            <th scope="col">Zakat Profesi</th>
                            <th scope="col">Take Home Pay</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>Rp. <?= number_format($gapok, 2, ',', '.'); ?></td>
                            <td>Rp. <?= number_format($tunjanganJabatan, 2, ',', '.'); ?></td>
                            <td>Rp. <?= number_format($tunjanganKeluarga, 2, ',', '.'); ?></td>
                            <td>Rp. <?= number_format($gajiKotor, 2, ',', '.'); ?></td>
                            <td>Rp. <?= number_format($zakat_profesi, 2, ',', '.'); ?></td>
                            <th>Rp. <?= number_format($takehome_pay, 2, ',', '.'); ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php } ?>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
        <script>
             $("document").ready(function(){
                $("#menikah").click(function(){
                    $("#jlhAnak").css({
                        'visibility' : "visible"
                    });
                });
                $("#blmMenikah").click(function(){
                    $("#jlhAnak").css({
                        'visibility' : "hidden"
                    });
                });
             });
        </script>
    </body>
</html>
