<?php require "function.php" ?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="ccslogin.ccs">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="csslogin.css"> -->
  <title>Login</title>
</head>

<body>

  <section>
  <form method="POST">
    <div class="container-fluid vh-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="logoLogin.jpg" class="img-fluid"
            alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form>
            <!-- username -->
            <div class="form-outline mb-4">
            <input class="form-control form-control-lg" type="username" name="username" placeholder="Username" autocomplete="off">

            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
            <input   class="form-control form-control-lg" type="password" name="password" placeholder="Enter Password">
            </div>

            

            <div class="text-center text-lg-start mt-4 pt-2">
            <button  class="btn btn-primary btn-lg"  style="padding-left: 2.5rem; padding-right: 2.5rem;" type="submit">Login</button>
            </div>
            <?php
             if(isset($_SESSION['username'])){
              $url = BASE_URL . 'index.php';
              header("Location:$url");
            }
            if(isset($_POST['username']) && isset($_POST['password'])){
              require "koneksi.php";
              //Buka koneksi
              $conn = open_connection();
        
              //membuat query mySQL
              $query = "SELECT * FROM tb_admin WHERE username = '$_POST[username]' AND password = ('$_POST[password]') ";
        
              //Eksekusi Query
              $hasil = mysqli_query($conn, $query);
        
              //Baca hasil, kalau berhasil kita pindah halaman, jika gagal muncul pesan
              if($isi = mysqli_fetch_assoc($hasil)){
                $_SESSION['username'] = $isi['username'];
                $url = BASE_URL . 'index.php';
                header("Location:$url");
              }else{
                echo '<br><div class="alert alert-danger" role="alert">username dan password salah</div> ';
              }
        
            }  
            ?>

          </form>
        </div>
      </div>
    </div>
    <div
      class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
      <!-- Copyright -->
      <div class="text-white mb-3 mb-md-0">
  
      </div>
      <!-- Copyright -->
      <!-- Right -->
    </div>
  </form>
  </section>
</body>

</html>