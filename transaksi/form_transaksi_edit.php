<?php
require_once "../koneksi.php";
require_once "../function.php";
check_login();

$conn = open_connection();

$param_kodekaryawan = $_GET['kodekaryawan'];

$old_data = array();
$query = "SELECT * FROM tb_transaksi WHERE kodekaryawan = '$param_kodekaryawan'";
$hasil = mysqli_query($conn, $query);
if ($row = mysqli_fetch_assoc($hasil)) {
    $old_data = $row;
}

// data
$kodetransaksi = $_POST['kodetransaksi'] ?? $old_data['kodetransaksi'];
$kodekaryawan = $_POST['kodekaryawan'] ?? $old_data['kodekaryawan'];
$namakaryawan = $_POST['namakaryawan'] ?? $old_data['namakaryawan'];
$namajabatan = $_POST['namajabatan'] ?? $old_data['namajabatan'];
$tglinputt = $_POST['tglinputt'] ?? $old_data['tglinputt'];
$gajipokok = $_POST['gajipokok'] ?? $old_data['gajipokok'];
$uangmakan = $_POST['uangmakan'] ?? $old_data['uangmakan'];
$tunjanganbpjs = $_POST['tunjanganbpjs'] ?? $old_data['tunjanganbpjs'];
$totalgaji = $_POST['totalgaji'] ?? $old_data['totalgaji'];

$error = '';
$isError = false;

if (isset($_POST['submit'])) {
    if ($kodekaryawan == '') {
        $isError = true;
        $error = 'kode harus diisi!';
    }

    if (!$isError) {
        // Perbarui query Anda sesuai dengan kebutuhan Anda
        $query = "UPDATE tb_transaksi SET 
        kodetransaksi = '$kodetransaksi', 
        namakaryawan = '$namakaryawan',
        tglinputt = '$tglinputt',
        gajipokok = '$gajipokok',
        uangmakan = '$uangmakan',
        tunjanganbpjs = '$tunjanganbpjs',
        totalgaji = '$totalgaji',
        namajabatan = '$namajabatan' WHERE kodekaryawan = '$param_kodekaryawan'";
        $hasil = mysqli_query($conn, $query);

        if ($hasil) {
            $url = BASE_URL . 'transaksi/transaksi.php';
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
                        <div class="alert alert-dark" role="alert">
                            <?= $error ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="kodeadmin" class="form-label">kode transaksi</label>
                            <input type="text" id="namakaryawan" name="kodetransaksi" class="form-control" placeholder="kode transaksi" value="<?= $kodetransaksi ?>">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">kode karyawan</label>
                            <input type="text" name="kodekaryawan" id="nama" class="form-control" placeholder="kode karyawan" value="<?= $kodekaryawan ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="notlp" class="form-label">nama karyawan</label>
                            <input type="text" name="namakaryawan" id="notlp" class="form-control" placeholder="nama karyawan" value="<?= $namakaryawan ?>">
                        </div>
                        <div class="mb-3">
                            <label for="kodekaryawan" class="form-label">nama jabatan</label>
                            <input type="text" name="namajabatan" id="kodekaryawan" class="form-control" placeholder="nama jabatan" value="<?= $namajabatan ?>">
                        </div>
                        <div class="mb-3">
                            <label for="namajabatan" class="form-label">tanggal input </label>
                            <input type="date" name="tglinputt" id="namajabatan" class="form-control" placeholder="tanggal input" value="<?= $tglinputt ?>">
                        </div>
                        <div class="mb-3">
                            <label for="gajipokok" class="form-label">gaji pokok</label>
                            <input type="text" name="gajipokok" id="gajipokok" class="form-control" placeholder="gaji pokok" value="<?= $gajipokok ?>">
                        </div>
                        <div class="mb-3">
                            <label for="uangmakan" class="form-label">uang makan</label>
                            <input type="text" name="uangmakan" id="uangmakan" class="form-control" placeholder="uang makan" value="<?= $uangmakan ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tunjanganbpjs" class="form-label">tunjangan bpjs</label>
                            <input type="text" name="tunjanganbpjs" id="tunjanganbpjs" class="form-control" placeholder="tunjangan bpjs" value="<?= $tunjanganbpjs ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">total gaji</label>
                            <input type="text" name="totalgaji" id="totalgaji" class="form-control" placeholder="total gaji" value="<?= $totalgaji ?>">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </td>
            </tr>
        </table>
    </main>
</body>

</html>
