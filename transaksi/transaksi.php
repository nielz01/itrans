<?php
require_once "../function.php";
check_login();
?>
<!DOCTYPE html>
<html>

<head>
	<title>FORM TRANSAKSI</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
		crossorigin="anonymous"></script>
	<style>
		body {
			background: url(../logoLogin.jpg);
		}
	</style>
</head>

<body>
	<?php include "../navbar.php"; ?>


	</div>
	<main class="my-5 ">
		<div class="container">
			<div class="row mb-2">
				<div class="col-sm-6 align-self-start">
					<a href="form_transaksi.php" class="btn btn-outline-light my-3 " style="width: 30%;">Tambah</a>

				</div>
				<div class="col-sm-12">

					<table class="table table-striped text-center bg-light" style="border: 1;padding: 10px;">

						<tr>
							<td>NO</td>
							<td>KODE TRANSAKSI</td>
							<td>KODE KARYAWAN</td>
							<td>NAMA KARYAWAN</td>
							<td>NAMA JABATAN</td>
							<td>TANGGAL INPUT</td>
							<td>GAJI POKOK</td>
							<td>UANG MAKAN</td>
							<td>TUNJANGAN BPJS</td>
							<td>TOTAL GAJI</td>
							<td colspan="3">ACTION</td>
						</tr>
						<?php
						require_once "../koneksi.php";
						$conn = open_connection();

						$query = "SELECT kodetransaksi, kodekaryawan, namakaryawan, namajabatan, tglinputt, gajipokok, uangmakan, tunjanganbpjs, totalgaji FROM tb_transaksi";
						$hasil = mysqli_query($conn, $query);
						$i = 1;
						while ($row = mysqli_fetch_assoc($hasil)) {
							echo "<tr>";
							echo "<td>" . $i++ . "</td>";
							echo "<td>$row[kodetransaksi]</td>";
							echo "<td>$row[kodekaryawan]</td>";
							echo "<td>$row[namakaryawan]</td>";
							echo "<td>$row[namajabatan]</td>";
							echo "<td>$row[tglinputt]</td>";
							echo "<td>$row[gajipokok]</td>";
							echo "<td>$row[uangmakan]</td>";
							echo "<td>$row[tunjanganbpjs]</td>";
							echo "<td>$row[totalgaji]</td>";
							echo "<td><a class='btn btn-primary btn-sm' href='form_transaksi_edit.php?kodekaryawan=$row[kodekaryawan]'>EDIT</a></td>
                                  <td><a class='btn btn-danger btn-sm' href='action_hapus_dataTransaksi.php?kodekaryawan=$row[kodekaryawan]'>HAPUS</a></td>
                                  <td><a class='btn btn-success btn-sm' href='cetak.php?kodekaryawan=$row[kodekaryawan]'>cetak</a></td>";
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