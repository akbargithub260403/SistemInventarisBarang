<?php
session_start(); 
error_reporting(0);

include '../function/functions.php';

$id = $_POST['checked'];

if (!isset($id)) {
  echo "
  <script>
    alert('Pilih data yang ingin di Export terlebih dahulu');
    window.location.href='../last_data.php';
  </script>";
 }else{
  header("Content-type:applicationt/vnd-ms-excel");
  header("Content-Disposition: attachment; filename= Last Data Barang Inventaris.xls");
  ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  <h1><center> Last Data Inventaris Barang</center></h1>
  <table class="table" border="1" style="width: 600px;">
    <thead>
      <tr>
         <th scope="col"><h3>NO</h3></th>
         <th scope="col"><h3>Kode Barang</h3></th>
           <th scope="col"><h3>Barang</h3></th>
           <th scope="col"><h3>Jenis Barang</h3></th>
           <th scope="col"><h3>Jumlah</h3></th>
           <th scope="col"><h3>Lokasi</h3></th>
           <th scope="col"><h3>Sumber Dana</h3></th>
           <th scope="col"><h3>Harga</h3></th>
           <th scope="col"><h3>Kondisi</h3></th>
           <th scope="col"><h3>Tahun Perolehan</h3></th>
      </tr>
    </thead>
    <?php 
        $i = 1;
        foreach ($id as $key ) {
        $query = mysqli_query($conn,"SELECT * FROM last_data WHERE id = '$key'");
        while ($data = mysqli_fetch_array($query)) {  ?>

    <tbody>
      <tr>
        <td><center><?= $i++;?></center></td>
        <td><center><?php echo $data['kd_barang'];?></center></td>
        <td><center><?php echo $data['barang'];?></center></td>
        <td>
        <?php 
          if ($data["jenis"] == 1 ) {
           echo '<span class="btn btn-warning readonly">Elektronik</span>';
          }else if($data["jenis"] == 2 ){
             echo'<span class="btn btn-success readonly">Non-Elektronik</span>';

           }
        ?>
    </td>
        <td><center><?php echo $data['jumlah'];?></center></td>
        <td><center><?php echo $data['lokasi'];?></center></td>
        <td><center><?php echo $data['sumber_dana'];?></center></td>
        <td><center><?php echo $data['harga'];?></center></td>
        <td>
        <?php 
          if ($data["kondisi"] == 1 ) {
           echo '<span class="btn btn-success readonly">Baik</span>';
          }else if($data["kondisi"] == 2 ){
             echo'<span class="btn btn-warning readonly">Rusak Ringan</span>';
          }else if($data["kondisi"] == 3 ){
             echo'<span class="btn btn-danger readonly">Rusak Berat</span>';
         }
        ?>
    </td>
        <td><center><?php echo $data['thn_peroleh'];?></center></td>
      </tr> 
  <?php 
}
    }
     ?>
 </tbody>
</table>
</body>
</html>
 <?php 
  }
 ?>