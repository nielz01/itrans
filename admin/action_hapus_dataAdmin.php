<?php
require_once "../koneksi.php";
require_once "../function.php";
check_login();

	$kodeadmin = $_GET['kodeadmin'];

	$conn = open_connection();

	$query = "DELETE FROM tb_admin WHERE kodeadmin = '$kodeadmin' ";

	$hasil = mysqli_query($conn, $query);

	if($hasil){
		$url = BASE_URL . 'admin/admin.php';
            header("Location: $url");
	}else {
		echo "gagal hapus data : " . mysqli_error($conn);

	}

?>
