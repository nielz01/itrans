<?php
require_once "../koneksi.php";
require_once "../function.php";
check_login();

$conn = open_connection();

$param_kodekaryawan = $_GET['kodekaryawan'];

$old_data = array();
$query = "SELECT * FROM tb_karyawan WHERE kodekaryawan = '$param_kodekaryawan' ";
$hasil = mysqli_query($conn, $query);
if ($row = mysqli_fetch_assoc($hasil)) {
    $old_data = $row;
}

// data
$namakaryawan = $_POST['namakaryawan'] ?? $old_data['namakaryawan'];
$alamat = $_POST['alamat'] ?? $old_data['alamat'];
$notlp = $_POST['notlp'] ?? $old_data['notlp'];
$kodekaryawan = $_POST['kodekaryawan'] ?? $old_data['kodekaryawan'];
$namajabatan = $_POST['namajabatan'] ?? $old_data['namajabatan'];
$gajipokok = $_POST['gajipokok'] ?? $old_data['gajipokok'];
$uangmakan = $_POST['uangmakan'] ?? $old_data['uangmakan'];
$tunjanganbpjs = $_POST['tunjanganbpjs'] ?? $old_data['tunjanganbpjs'];
$totalgaji = $_POST['totalgaji'] ?? $old_data['totalgaji'];

$error = '';
$isError = false;

if (isset($_POST['submit'])) {
    if ($kodekaryawan == '') {
        $isError = true;
        $error = 'username  harus diisi!';
    }

    if (!$isError) {
        // Perbarui query Anda sesuai dengan kebutuhan Anda
        $query = "UPDATE tb_karyawan SET 
        namakaryawan = '$namakaryawan', 
        alamat = '$alamat', 
        notlp = '$notlp' WHERE kodekaryawan = '$param_kodekaryawan'";
        $hasil = mysqli_query($conn, $query);

        if ($hasil) {
            $url = BASE_URL . 'karyawan/karyawan.php';
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
    <title>FORM INPUT KARYAWAN</title>
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
                            <label for="kodeadmin" class="form-label">Nama Karyawan</label>
                            <input type="text" id="namakaryawan" name="namakaryawan" class="form-control" size="55" placeholder="nama karyawan" value="<?= $namakaryawan ?>">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">alamat</label>
                            <input type="text" name="alamat" id="nama" class="form-control" placeholder="Nama" value="<?= $alamat ?>">
                        </div>
                        <div class="mb-3">
                            <label for="notlp" class="form-label">nomer telepon</label>
                            <input type="text" name="notlp" id="notlp" class="form-control" placeholder="Username" value="<?= $notlp ?>">
                        </div>
                        <div class="mb-3">
                            <label for="kodekaryawan" class="form-label">kode karyawan</label>
                            <input type="kodekaryawan" name="kodekaryawan" id="kodekaryawan" class="form-control" placeholder="Password" value="<?= $kodekaryawan ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="namajabatan" class="form-label">nama jabatan</label>
                            <input type="namajabatan" name="namajabatan" id="namajabatan" class="form-control" placeholder="Password" value="<?= $namajabatan ?>">
                        </div>
                        <div class="mb-3">
                            <label for="gajipokok" class="form-label">gaji pokok</label>
                            <input type="gajipokok" name="gajipokok" id="gajipokok" class="form-control" placeholder="Password" value="<?= $gajipokok ?>">
                        </div>
                        <div class="mb-3">
                            <label for="uangmakan" class="form-label">uang makan</label>
                            <input type="uangmakan" name="uangmakan" id="uangmakan" class="form-control" placeholder="Password" value="<?= $uangmakan ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tunjanganbpjs" class="form-label">tunjangan bpjs</label>
                            <input type="tunjanganbpjs" name="tunjanganbpjs" id="tunjanganbpjs" class="form-control" placeholder="Password" value="<?= $tunjanganbpjs ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">total gaji</label>
                            <input type="text" name="totalgaji" id="totalgaji" class="form-control" placeholder="Password" value="<?= $totalgaji ?>">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </td>
            </tr>
        </table>
    </main>
</body>

</html>
