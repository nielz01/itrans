<?php
require_once "../koneksi.php";
require_once "../function.php";
check_login();

$kodeadmin = $_POST['kodeadmin'] ?? '';
$nama = $_POST['nama'] ?? '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$error = '';
$isError = false;

if (isset($_POST['submit'])) {
    if ($kodeadmin == '') {
        $isError = true;
        $error = 'Kode admin harus diisi!';
    }

    if (!$isError) {
        $conn = open_connection();

        $query = "INSERT INTO tb_admin (kodeadmin, nama, username, password) VALUES ('$kodeadmin', '$nama', '$username', '$password')";
        $hasil = mysqli_query($conn, $query);

        if ($hasil) {
            $url = BASE_URL . 'admin/admin.php';
            header("Location:$url");
            exit();
        } else {
            $isError = true;
            $error = "Gagal menyimpan data: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>FORM INPUT ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php include "../navbar.php"; ?>
    <main>
        <table align="center">
        <tr>
            <td>
                <?php if ($isError) : ?>
                <div class="alert alert-dark" role="alert">
                    <?= $error ?>
                </div>
                <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label for="kodeadmin" class="form-label">Kode admin</label>
                        <input type="text" id="kodeadmin" name="kodeadmin" class="form-control" size="55" placeholder="Kode admin" value="<?= $kodeadmin ?>">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value="<?= $nama ?>">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?= $username ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?= $password ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                   <a  class="btn btn-primary"  href="<?=BASE_URL  ?>admin/admin.php"> Kembali</a>
                </form>
            </td>
        </tr>
        </table>
    </main>
</body>
</html>
