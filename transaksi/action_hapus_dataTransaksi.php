<?php
require_once "../koneksi.php";
require_once "../function.php";
check_login();

	$kodekaryawan = $_GET['kodekaryawan'];

	$conn = open_connection();

	$query = "DELETE FROM tb_transaksi WHERE kodekaryawan = '$kodekaryawan' ";

	$hasil = mysqli_query($conn, $query);

	if($hasil){
		$url = BASE_URL . 'transaksi/transaksi.php';
            header("Location: $url");
	}else {
		echo "gagal hapus data : " . mysqli_error($conn);

	}

?>
