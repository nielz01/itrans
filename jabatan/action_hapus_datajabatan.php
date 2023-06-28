<?php
require_once "../koneksi.php";
require_once "../function.php";
check_login();

	$kodejabatan = $_GET['kodejabatan'];

	$conn = open_connection();

	$query = "DELETE FROM tb_jabatan WHERE kodejabatan = '$kodejabatan' ";

	$hasil = mysqli_query($conn, $query);

	if($hasil){
		$url = BASE_URL . 'jabatan/jabatan.php';
            header("Location: $url");
	}else {
		echo "gagal hapus data : " . mysqli_error($conn);

	}

?>
