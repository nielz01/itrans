<?php
require_once "../koneksi.php";
require_once "../function.php";
check_login();

$conn = open_connection();

$param_kodeadmin = $_GET['kodeadmin'];

$old_data = array();
$query = "SELECT * FROM tb_admin WHERE kodeadmin = '$param_kodeadmin' ";
$hasil = mysqli_query($conn, $query);
if ($row = mysqli_fetch_assoc($hasil)) {
    $old_data = $row;
}

// data
$kodeadmin = $_POST['kodeadmin'] ?? $old_data['kodeadmin'];
$nama = $_POST['nama'] ?? $old_data['nama'];
$username = $_POST['username'] ?? $old_data['username'];
$password = $_POST['password'] ?? $old_data['password'];

$error = '';
$isError = false;

if (isset($_POST['submit'])) {
    if ($username == '') {
        $isError = true;
        $error = 'username  harus diisi!';
    }

    if (!$isError) {
        // Perbarui query Anda sesuai dengan kebutuhan Anda
        $query = "UPDATE tb_admin SET 
        nama = '$nama', 
        username = '$username', 
        password = '$password' WHERE kodeadmin = '$param_kodeadmin'";
        $hasil = mysqli_query($conn, $query);

        if ($hasil) {
            $url = BASE_URL . 'admin/admin.php';
            header("Location: $url");
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
                            <input type="text" id="kodeadmin" name="kodeadmin" class="form-control" size="55" placeholder="Kode admin" value="<?= $kodeadmin ?>" readonly>
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
                    </form>
                </td>
            </tr>
        </table>
    </main>
</body>

</html>
