<?php
session_start();
define('BASE_URL', "http://localhost/itrans/");

function check_login() {
	if (!isset($_SESSION['username'])) {
		header("Location: " . BASE_URL . "login.php");
		exit();
	}
}


function get_data_admin(){
	require_once "koneksi.php";
	$conn = open_connection();

	$query = "SELECT kodeadmin, nama, username, password  FROM tb_admin";
	$hasil = mysqli_query($conn, $query);

	$list = array();
	while($row = mysqli_fetch_assoc($hasil)){
		$list[ $row['kodeadmin'] ] = $row['nama'] = $row['username'] = $row['password'];
	}
	return $list;


	
}

