<?php
require_once "../koneksi.php";
require_once "../function.php";
check_login();

$kodetransaksi = $_POST['kodetransaksi'] ?? '';
$kodekaryawan = $_POST['kodekaryawan'] ?? '';
$namakaryawan = $_POST['namakaryawan'] ?? '';
$namajabatan = $_POST['namajabatan'] ?? '';
$tglinput = $_POST['tglinputt'] ?? '';
$gajipokok = $_POST['gajipokok'] ?? '';
$uangmakan = $_POST['uangmakan'] ?? '';
$tunjanganbpjs = $_POST['tunjanganbpjs'] ?? '';
$totalgaji = $_POST['totalgaji'] ?? '';

$error = '';
$isError = false;

if (isset($_POST['submit'])) {
    if ($kodetransaksi == '') {
        $isError = true;
        $error = 'Kode transaksi harus diisi!';
    }

    if (!$isError) {
        $conn = open_connection();

        $query = "INSERT INTO tb_transaksi (kodetransaksi, kodekaryawan, namakaryawan, namajabatan, tglinputt, gajipokok, uangmakan, tunjanganbpjs, totalgaji) VALUES ('$kodetransaksi', '$kodekaryawan', '$namakaryawan', '$namajabatan', '$tglinput', '$gajipokok', '$uangmakan', '$tunjanganbpjs', '$totalgaji')";
        $hasil = mysqli_query($conn, $query);

        if ($hasil) {
            $url = BASE_URL . 'transaksi/transaksi.php';
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
    <title>FORM INPUT TRANSAKSI</title>
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
                        <label for="kodetransaksi" class="form-label">Kode transaksi</label>
                        <input type="text" id="kodetransaksi" name="kodetransaksi" class="form-control" size="55" placeholder="Kode admin" value="<?= $kodetransaksi ?>">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="name" class="form-label">kode Karyawan</label>
                        <input type="text" name="kodekaryawan" id="kodekaryawan" class="form-control" placeholder="Nama" value="<?= $kodekaryawan ?>">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="username" class="form-label">nama karyawan</label>
                        <input type="text" name="namakaryawan" id="namakaryawan" class="form-control" placeholder="Username" value="<?= $namakaryawan ?>">
                    </div>
                    </td>

                    <td>
                    <div class="mb-3 text-center">
                        <label for="password" class="form-label">nama jabatan</label>
                        <input type="text" name="namajabatan" id="password" class="form-control" placeholder="Password" value="<?= $namajabatan ?>">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="password" class="form-label">tanggal input</label>
                        <input type="date" name="tglinputt" id="password" class="form-control" placeholder="Password" value="<?= $tglinput ?>">
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
