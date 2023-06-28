<?php
require_once "../koneksi.php";
require_once "../function.php";
check_login();

$namakaryawan = $_POST['namakaryawan'] ?? '';
$alamat = $_POST['alamat'] ?? '';
$notelp = $_POST['notlp'] ?? '';
$kodekaryawan = $_POST['kodekaryawan'] ?? '';
$namajabatan = $_POST['namajabatan'] ?? '';
$gajipokok = $_POST['gajipokok'] ?? '';
$uangmakan = $_POST['uangmakan'] ?? '';
$tunjanganbpjs = $_POST['tunjanganbpjs'] ?? '';
$totalgaji = $_POST['totalgaji'] ?? '';

$error = '';
$isError = false;

if (isset($_POST['submit'])) {
    if ($kodekaryawan == '') {
        $isError = true;
        $error = 'Kode jabatan harus diisi!';
    }

    if (!$isError) {
        $conn = open_connection();

        $query = "INSERT INTO tb_karyawan (namakaryawan, alamat, notlp, kodekaryawan, namajabatan, gajipokok, uangmakan, tunjanganbpjs, totalgaji) VALUES ('$namakaryawan', '$alamat', '$notelp', '$kodekaryawan', '$namajabatan', '$gajipokok', '$uangmakan', '$tunjanganbpjs', '$totalgaji')";
        $hasil = mysqli_query($conn, $query);

        if ($hasil) {
            $url = BASE_URL . 'karyawan/karyawan.php';
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
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
                <?php endif; ?>
                <form method="POST">
                    <td>
                    <div class="mb-3 text-center">
                        <label for="kodeadmin" class="form-label">Nama Karyawan</label>
                        <input type="text" id="kodeadmin" name="namakaryawan" class="form-control" size="55" placeholder="Kode admin" value="<?= $namakaryawan ?>">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="name" class="form-label">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Nama" value="<?= $alamat ?>">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="username" class="form-label">Nomer Telfon</label>
                        <input type="text" name="notlp" id="username" class="form-control" placeholder="Username" value="<?= $notelp ?>">
                    </div>
                    </td>

                    <td>
                    <div class="mb-3 text-center">
                        <label for="password" class="form-label">Kode Karyawan</label>
                        <input type="text" name="kodekaryawan" id="password" class="form-control" placeholder="Password" value="<?= $kodekaryawan ?>">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="password" class="form-label">Nama Jabatan</label>
                        <input type="text" name="namajabatan" id="password" class="form-control" placeholder="Password" value="<?= $namajabatan ?>">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="password" class="form-label">Gaji Pokok</label>
                        <input type="text" name="gajipokok" id="password" class="form-control" placeholder="Password" value="<?= $gajipokok ?>">
                    </div>
                    </td>

                    <td>
                    <div class="mb-3 text-center">
                        <label for="password" class="form-label">Uang Makan</label>
                        <input type="text" name="uangmakan" id="password" class="form-control" placeholder="Password" value="<?= $uangmakan ?>">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="password" class="form-label">Tunjangan Bpjs</label>
                        <input type="text" name="tunjanganbpjs" id="password" class="form-control" placeholder="Password" value="<?= $tunjanganbpjs ?>">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="password" class="form-label">Total gaji</label>
                        <input type="text" name="totalgaji" id="password" class="form-control" placeholder="Password" value="<?= $totalgaji ?>">
                    </div>
                    </td>
                    <div class="mb-3 text-left mt-4">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </td>
        </tr>
        </table>
    </main>
</body>
</html>
