<?php

include '../function/functions.php';

session_start();

if (!isset($_SESSION['login'])) {
  header("Location:../404.html");
  exit;
 } 

 $barang = mysqli_query($conn,"SELECT * FROM barang WHERE kondisi = 2");
  header("Content-type:applicationt/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Data Barang Inventaris.xls");

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<h1><center>Data Barang Inventaris</center></h1>
<table class="table" border="1">
  <thead class="thead-dark">
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Kode Barang</th>
      <th scope="col">Barang</th>
      <th scope="col">Jenis</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Lokasi</th>
      <th scope="col">Sumber Dana</th>
      <th scope="col">Harga</th>
      <th scope="col">Kondisi</th>
      <th scope="col">Tahun Perolehan</th>
     
    </tr>
  </thead>
  <tbody>
     <?php $i = 1 ?>
  <?php foreach ($barang as $brg): ?>
     <tr>
      <!-- <th scope="row">1</th> -->
      <td><?= $i; ?></td>
      <td><?php echo $brg['kd_barang']; ?></td>
      <td><?php echo $brg["barang"]; ?></td>
       <td>
        <?php 
          if ($brg["jenis"] == 1 ) {
           echo '<span class="btn btn-warning readonly">Elektronik</span>';
          }else if($brg["jenis"] == 2 ){
             echo'<span class="btn btn-success readonly">Non-Elektronik</span>';

           }
        ?>
    </td>
      <td><?php echo $brg["jumlah"]; ?></td>
      <td><?php echo $brg["lokasi"]; ?></td>
      <td><?php echo $brg["sumber_dana"]; ?></td>
      <td><?php echo $brg['harga']; ?></td>
      <td>
       <?php 
          if ($brg["kondisi"] == 1 ) {
           echo '<span class="btn btn-success readonly">Baik</span>';
          }else if($brg["kondisi"] == 2 ){
             echo'<span class="btn btn-warning readonly">Rusak Ringan</span>';
          }else if($brg["kondisi"] == 3 ){
             echo'<span class="btn btn-danger readonly">Rusak Berat</span>';
         }
        ?>
    </td>
     <td><center><?php echo $brg['thn_peroleh'];?></center></td>
    </tr>
     <?php $i++ ?>
   <?php endforeach; ?>
  </tbody>
</table>
    

</body>
</html>