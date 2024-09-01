<!DOCTYPE html>
<html>

<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
        //Include file koneksi, untuk koneksikan ke database
        include_once "koneksi.php";

        //Fungsi untuk mencegah inputan karakter yang tidak sesuai
        function input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id_peserta = input($_POST["id_peserta"]);
            $Tanggal_Surat = input($_POST["Tanggal_Surat"]);
            $No_Surat = input($_POST["No_Surat"]);
            $Jenis_Surat = input($_POST["Jenis_Surat"]);
            $Instansi_Pengirim = input($_POST["Instansi_Pengirim"]);
            $Perihal = input($_POST["Perihal"]);
            $Disposisi_Pilihan = input($_POST["Disposisi_Pilihan"]);
            $Catatan_Penting = input($_POST["catatan_penting"]);
            $Tanggal_Kegiatan = input($_POST["Tanggal_Kegiatan"]);
            $Jenis_Kegiatan = input($_POST["Jenis_Kegiatan"]);
            $Pukul = input($_POST["Pukul"]);
            $Lokasi = input($_POST["Lokasi"]);

            //Query input menginput data kedalam tabel anggota
            $sql = "UPDATE peserta SET tanggal_surat = '$Tanggal_Surat', no_surat = '$No_Surat', jenis_surat = '$Jenis_Surat', instansi_pengirim = '$Instansi_Pengirim', perihal = '$Perihal', disposisi_pilihan = '$Disposisi_Pilihan', catatan_penting = '$Catatan_Penting', tanggal_kegiatan = '$Tanggal_Kegiatan', jenis_kegiatan = '$Jenis_Kegiatan', pukul = '$Pukul', lokasi = '$Lokasi' WHERE id_peserta = $id_peserta";

            //Mengeksekusi/menjalankan query diatas
            $hasil = mysqli_query($kon, $sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }
        ?>
        <h2>Input Data</h2>


        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

            <?php
            include "koneksi.php";
            $id_peserta = $_GET["id_peserta"];
            $sql = "select * from peserta where id_peserta = '$id_peserta'";

            $hasil = mysqli_query($kon, $sql);
            while ($data = mysqli_fetch_array($hasil)) {

            ?>
                <input type="hidden" name="id_peserta" value="<?php echo $data["id_peserta"]; ?>">
                <div class="form-group">
                    <label>Tanggal Surat:</label>
                    <input type="date" name="Tanggal_Surat" class="form-control" placeholder="Masukan Tanggal Surat" required value="<?php echo $data["tanggal_surat"]; ?>" />

                </div>
                <div class="form-group">
                    <label>No Surat:</label>
                    <input type="text" name="No_Surat" class="form-control" placeholder="Masukan No Surat" required value="<?php echo $data["no_surat"]; ?>" />
                </div>
                <div class="form-group">
                    <label>Jenis Surat :</label>
                    <input type="text" name="Jenis_Surat" class="form-control" placeholder="Masukan Jenis Surat" required value="<?php echo $data["jenis_surat"]; ?>" />
                </div>
                <div class="form-group">
                    <label>Instansi Pengirim:</label>
                    <input type="text" name="Instansi_Pengirim" class="form-control" placeholder="Masukan Instansi Pengirim" required value="<?php echo $data["instansi_pengirim"]; ?>" />
                </div>
                <div class="form-group">
                    <label>Perihal:</label>
                    <input type="text" name="Perihal" class="form-control" placeholder="Masukan Perihal" required value="<?php echo $data["perihal"];   ?>" />
                </div>
                <div class="form-group">
                    <label>Disposisi Pilihan:</label>
                    <select name="Disposisi_Pilihan" class="form-control" placeholder="Masukan Disposisi Pilihan" required>
                        <?php $selectedValue = $data["disposisi_pilihan"];
                        var_dump($selectedValue); ?>
                        <option>Pilih Disposisi</option>
                        <option value="bupati" <?php echo ($selectedValue == 'bupati') ? "selected" : ''; ?>>Disposisi Bupati</option>
                        <option value="sekda" <?php echo ($selectedValue == 'sekda') ? 'selected' : ''; ?>>Disposisi Sekda</option>
                        <option value="asisten" <?php echo ($selectedValue == 'asisten') ? 'selected' : ''; ?>>Disposisi Asisten</option>
                        <option value="kabid" <?php echo ($selectedValue == 'kabid') ? 'selected' : ''; ?>>Disposisi Kabid</option>
                        <option value="sekban" <?php echo ($selectedValue == 'sekban') ? 'selected' : ''; ?>>Disposisi Sekban</option>
                        <option value="kabag" <?php ($selectedValue == 'kabag') ? 'selected' : ''; ?>>Disposisi Kabag</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal_Kegiatan:</label>
                    <input type="date" name="Tanggal_Kegiatan" class="form-control" placeholder="Masukan Tanggal_Kegiatan" required value="<?php echo $data["tanggal_kegiatan"]; ?>" />
                </div>
                <div class="form-group">
                    <label>Jenis_Kegiatan:</label>
                    <input type="text" name="Jenis_Kegiatan" class="form-control" placeholder="Masukan Jenis_Kegiatan" required value="<?php echo $data["jenis_kegiatan"]; ?>" />
                </div>
                <div class="form-group">
                    <label>Pukul:</label>
                    <input type="time" name="Pukul" class="form-control" placeholder="Masukan Pukul" required value="<?php echo $data["pukul"]; ?>" />
                </div>
                <div class="form-group">
                    <label>Lokasi:</label>
                    <input type="text" name="Lokasi" class="form-control" placeholder="Masukan Lokasi" required value="<?php echo $data["lokasi"]; ?>" />
                </div>
                <div class="form-group">
                    <label>Catatan Penting:</label>
                    <textarea name="catatan_penting" class="form-control" rows="5" placeholder="Masukan Catatan Penting" required><?php echo $data["catatan_penting"];   ?></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <?php
            }
            ?>
        </form>
    </div>
</body>

</html>