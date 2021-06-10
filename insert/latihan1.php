<?php
// Koneksi ke DB & Pilih Database
$conn = mysqli_connect('localhost', 'root', '', 'php-database');

// Query isi tabel mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// ubah data ke dalam array
// $row = mysqli_fetch_row($result); // array numerik -> indeks-nya angka
// $row = mysqli_fetch_assoc($result); // array associative -> indeks-nya sesuai field di database
// $row = mysqli_fetch_array($result); // keduanya -> indeks-nya ada yang angka, ada juga yang sesuai field di database
$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

// tampung ke variabel mahasiswa
$mahasiswa = $rows;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Mahasiswa</title>
  </head>
  <body>
    <h3>Daftar Mahasiswa</h3>

    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>#</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
        <th>Aksi</th>
      </tr>
      <?php $i = 1;foreach ($mahasiswa as $m): ?>
        <tr>
          <td><?=$i++;?></td>
          <td><img src="img/<?=$m['gambar'];?>" width="60" /></td>
          <td><?=$m['nrp'];?></td>
          <td><?=$m['nama'];?></td>
          <td><?=$m['email'];?></td>
          <td><?=$m['jurusan'];?></td>
          <td><a href="">ubah</a> | <a href="">hapus</a></td>
        </tr>
      <?php endforeach;?>
    </table>
  </body>
</html>
