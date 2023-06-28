<?php
require_once "../koneksi.php";
require_once "../function.php";
check_login();

$kodejabatan = $_POST['kodejabatan'] ?? '';
$namajabatan = $_POST['namajabatan'] ?? '';
$gajipokok = $_POST['gajipokok'] ?? '';
$uangmakan = $_POST['uangmakan'] ?? '';
$tunjanganbpjs = $_POST['tunjanganbpjs'] ?? '';
$totalgaji = $_POST['totalgaji'] ?? '';

$error = '';
$isError = false;

if (isset($_POST['submit'])) {
    if ($kodejabatan == '') {
        $isError = true;
        $error = 'Kode jabatan harus diisi!';
    }

    if (!$isError) {
        $conn = open_connection();

        $query = "INSERT INTO tb_jabatan (kodejabatan, namajabatan, gajipokok, uangmakan, tunjanganbpjs, totalgaji) VALUES ('$kodejabatan', '$namajabatan', '$gajipokok', '$uangmakan', '$tunjanganbpjs', '$totalgaji')";
        $hasil = mysqli_query($conn, $query);

        if ($hasil) {
            $url = BASE_URL . 'jabatan/jabatan.php';
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
    <title>FORM INPUT JABATAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php include "../navbar.php"; ?>
    <main>
        <table align="center">
            <tr>
                <td>
                    <form method="POST">
                <td>
                    <div class="mb-3 text-center">
                        <label for="kodejabatan" class="form-label">Kode Jabatan</label>
                        <input type="text" id="kodejabatan" name="kodejabatan" class="form-control"
                            placeholder="Kode jabatan" value="<?= $kodejabatan ?>">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="namajabatan" class="form-label">Nama jabatan</label>
                        <input type="text" name="namajabatan" id="namajabatan" class="form-control"
                            placeholder="Nama Jabatan" value="<?= $namajabatan ?>">
                    </div>
                </td>

                <td>
                    <div class="mb-3 text-center">
                        <label for="password" class="form-label">Gaji Pokok</label>
                        <input type="text" name="gajipokok" id="password" class="form-control" placeholder="Password"
                            value="<?= $gajipokok ?>">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="password" class="form-label">Uang Makan</label>
                        <input type="text" name="uangmakan" id="password" class="form-control" placeholder="Password"
                            value="<?= $uangmakan ?>">
                    </div>
                </td>
                <td>
                    <div class="mb-3 text-center">
                        <label for="password" class="form-label">Tunjangan Bpjs</label>
                        <input type="text" name="tunjanganbpjs" id="password" class="form-control"
                            placeholder="Password" value="<?= $tunjanganbpjs ?>">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="password" class="form-label">Total gaji</label>
                        <input type="text" name="totalgaji" id="password" class="form-control" placeholder="Password"
                            value="<?= $totalgaji ?>">
                    </div>
                </td>
                <div class="mb-3 text-center">
                    <?php if ($isError): ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?= $error ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3 text-center mt-5">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
                </form>
                </td>
            </tr>
        </table>
    </main>
</body>

</html>