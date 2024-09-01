 <!DOCTYPE html>
 <html>

 <head>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
 </head>
 <title>
     Surat Masuk PPM 2024</title>

 <body>
     <nav class="navbar navbar-dark bg-dark">
         <span class="navbar-brand mb-0 h1">Surat Masuk PPM 2024</span>
         </div>
     </nav>
     <div class="container">
         <br>
         <h4 style="text-align: center;">DAFTAR SURAT MASUK PPM 2024</h4>
         <?php

            include "koneksi.php";

            //Cek apakah ada kiriman form dari method post
            if (isset($_GET['id_peserta'])) {
                $id_peserta = htmlspecialchars($_GET["id_peserta"]);

                $sql = "delete from peserta where id_peserta='$id_peserta' ";
                $hasil = mysqli_query($kon, $sql);

                //Kondisi apakah berhasil atau tidak
                if ($hasil) {
                    header("Location:index.php");
                } else {
                    echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
                }
            }
            ?>


         <!-- <tr class="table-danger">
            <br>
        <thead>
        <tr> -->
         <table class="table table-bordered">
             <thead style="text-align: center;">
                 <tr class="table-primary">
                     <th rowspan="2">No</th>
                     <th rowspan="2">Tanggal Surat</th>
                     <th rowspan="2">No Surat</th>
                     <th rowspan="2">Jenis Surat</th>
                     <th rowspan="2">Instansi Pengirim</th>
                     <th rowspan="2">Perihal</th>
                     <th rowspan="2">Disposisi Pilihan</th>
                     <th colspan="4">Tindak Lanjut Kegiatan</th>

                     <th rowspan="2">Catatan Penting</th>
                     <th colspan='2' rowspan="2">Aksi</th>
                 </tr>
                 <tr>
                     <th>Tanggal Kegiatan</th>
                     <th>Jenis Kegiatan</th>
                     <th>Pukul</th>
                     <th>Lokasi</th>
                 </tr>
             </thead>

             <?php
                include "koneksi.php";
                $sql = "select * from peserta order by id_peserta desc";

                $hasil = mysqli_query($kon, $sql);
                $no = 0;
                while ($data = mysqli_fetch_array($hasil)) {
                    $no++;
                ?>
                 <tbody>
                     <tr>
                         <td><?php echo $no; ?></td>
                         <td><?php echo $data["tanggal_surat"]; ?></td>
                         <td><?php echo $data["no_surat"];?></td>
                         <td><?php echo $data["jenis_surat"];   ?></td>
                         <td><?php echo $data["instansi_pengirim"];   ?></td>
                         <td><?php echo $data["perihal"];   ?></td>
                         <td><?php echo $data["disposisi_pilihan"];?></td>
                         <td><?php echo $data["tanggal_kegiatan"];?></td>
                         <td><?php echo $data["jenis_kegiatan"];?></td>
                         <td><?php echo $data["pukul"];?></td>
                         <td><?php echo $data["lokasi"];?></td>
                         <td><?php echo $data["catatan_penting"];   ?></td>
                         <td>
                             <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-warning" role="button">Update</a>
                             <a id="delete" href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_peserta=<?php echo $data['id_peserta']; ?>" class="btn btn-danger" role="button">Delete</a>
                         </td>
                     </tr>
                 </tbody>
             <?php
                }
                ?>
         </table>
         <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
     </div>
     <script>
        const deleteElm = document.getElementById("delete");
        deleteElm.onclick = (e)  => {
            let isConfimed = confirm("Apakah Anda yakin ingin menghapus data ini?")
            
            if (!isConfimed) {
                e.preventDefault()

                return
            }

            window.location.url = deleteElm.href

        }
     </script>
 </body>
 <style>
    .container {
        margin: 0;
        min-width: 100%;
        overflow-y: scroll;
    }

    .container table {
        width: 100%;
    }
</style>
 </html>