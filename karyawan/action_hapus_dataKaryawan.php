<?php
require_once "../koneksi.php";
require_once "../function.php";
check_login();

	$kodekaryawan = $_GET['kodekaryawan'];

	$conn = open_connection();

	$query = "DELETE FROM tb_karyawan WHERE kodekaryawan = '$kodekaryawan' ";

	$hasil = mysqli_query($conn, $query);

	if($hasil){
		$url = BASE_URL . 'karyawan/karyawan.php';
            header("Location: $url");
	}else {
		echo "gagal hapus data : " . mysqli_error($conn);

	}

?>
