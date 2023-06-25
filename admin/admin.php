<?php
	require_once "../function.php";
	check_login();
?>
<!DOCTYPE html>
<html>
<head>
	<title>FORM ADMIN</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
	<?php include "../navbar.php"; ?>

	
</div>
<main class="my-5 ">
	<div class="container">
		<div class="row mb-2">
			<div class="col-sm-6 align-self-start">
					<a href="form_admin.php" class="btn btn-outline-primary my-3 " style="width: 30%;">Tambah</a>

		</div>
	<div class="col-sm-12">

<table class="table table-striped"  style="border: 1;padding: 10px;">

  <tr>
  	<td>NO</td>
  	<td>KODE ADMIN</td>
  	<td>NAMA LENGKAP</td>
  	<td>USER NAME</td>
  	<td>PASSWORD</td>
  	<td></td>
  </tr>
  <?php 
require_once "../koneksi.php";
$conn = open_connection();

$query = "SELECT kodeadmin, nama, username, password  FROM tb_admin";
$hasil = mysqli_query($conn, $query); 
$i = 1;
while($row = mysqli_fetch_assoc($hasil)){
	echo "<tr>";
	echo "<td>".$i++."</td>";
	echo "<td>$row[kodeadmin]</td>";
	echo "<td>$row[nama]</td>";
	echo "<td>$row[username]</td>";
	echo "<td>$row[password]</td>";
	echo "<td><a class='btn btn-outline-primary' href='form_admin_edit.php?kodeadmin=$row[kodeadmin]'>EDIT</a> <a class='btn btn-outline-primary' href='action_hapus_dataAdmin.php?kodeadmin=$row[kodeadmin]'>HAPUS</a></td>";
	echo "</tr>";
}
?>
</table>
</div>
</div>
</main>
</nav>
</body>
</html>