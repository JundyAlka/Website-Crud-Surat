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
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $Tanggal_Surat=input($_POST["Tanggal_Surat"]);
        $No_Surat=input($_POST["No_Surat"]);
        $Jenis_Surat=input($_POST["Jenis_Surat"]);
        $Instansi_Pengirim=input($_POST["Instansi_Pengirim"]);
        $Perihal=input($_POST["Perihal"]);
        $Disposisi_Pilihan=input($_POST["Disposisi_Pilihan"]);
        $Catatan_Penting=input($_POST["catatan_penting"]);
        $Tanggal_Kegiatan=input($_POST["Tanggal_Kegiatan"]);
        $Jenis_Kegiatan=input($_POST["Jenis_Kegiatan"]);
        $Pukul=input($_POST["Pukul"]);
        $Lokasi=input($_POST["Lokasi"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into peserta values
        (NULL, '$Tanggal_Surat','$No_Surat','$Jenis_Surat','$Instansi_Pengirim','$Perihal','$Disposisi_Pilihan','$Tanggal_Kegiatan','$Jenis_Kegiatan', '$Pukul','$Lokasi', '$Catatan_Penting')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Tanggal Surat:</label>
            <input type="date" name="Tanggal_Surat" class="form-control" placeholder="Masukan Tanggal Surat" required />

        </div>
        <div class="form-group">
            <label>No Surat:</label>
            <input type="text" name="No_Surat" class="form-control" placeholder="Masukan No Surat" required/>
        </div>
       <div class="form-group">
            <label>Jenis Surat :</label>
            <input type="text" name="Jenis_Surat" class="form-control" placeholder="Masukan Jenis Surat" required/>
        </div>
        <div class="form-group">
            <label>Instansi Pengirim:</label>
            <input type="text" name="Instansi_Pengirim" class="form-control" placeholder="Masukan Instansi Pengirim" required/>
        </div>
        <div class="form-group">
            <label>Perihal:</label>
            <input type="text" name="Perihal" class="form-control" placeholder="Masukan Perihal" required/>
        </div>
        <div class="form-group">
            <label>Disposisi Pilihan:</label>
            <select name="Disposisi_Pilihan" class="form-control" placeholder="Masukan Disposisi Pilihan" required>
                <option>Pilih Disposisi</option>
                <option value="bupati">Disposisi Bupati</option>
                <option value="sekda">Disposisi Sekda</option>
                <option value="asisten">Disposisi Asisten</option>
                <option value="kabid">Disposisi Kabid</option>
                <option value="sekban">Disposisi Sekban</option>
                <option value="kabag">Disposisi Kabag</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal_Kegiatan:</label>
            <input type="date" name="Tanggal_Kegiatan" class="form-control" placeholder="Masukan Tanggal_Kegiatan" required/>
        </div>
        <div class="form-group">
            <label>Jenis_Kegiatan:</label>
            <input type="text" name="Jenis_Kegiatan" class="form-control" placeholder="Masukan Jenis_Kegiatan" required/>
        </div> <div class="form-group">
            <label>Pukul:</label>
            <input type="time" name="Pukul" class="form-control" placeholder="Masukan Pukul" required/>
        </div> <div class="form-group">
            <label>Lokasi:</label>
            <input type="text" name="Lokasi" class="form-control" placeholder="Masukan Lokasi" required/>
        </div>
        <div class="form-group">
            <label>Catatan Penting:</label>
            <textarea name="catatan_penting" class="form-control" rows="5" placeholder="Masukan Catatan Penting" required></textarea>
        </div>       
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>