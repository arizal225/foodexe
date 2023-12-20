<?php include 'dbCon.php'; ?>
<?php include 'template/header.php'; ?>

<body>

  <?php include 'template/nav-bar.php'; ?>
  <?php include 'template/search-header.php'; ?>


  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <span class="subheading">Login Ke Akun Anda</span>
          <h4>Login ke akun anda untuk booking restaurant favorite.</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 dish-menu">
          <div class="nav nav-pills justify-content-center ftco-animate" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link py-3 px-4 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><span class="flaticon-meat"></span> Log in</a>
          </div>
          <div class="tab-content py-5" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                  <div class="d-flex ftco-animate form-border" style="background: white;">
                    <div class="row" style="width: 100%">
                      <div class="col-md-12">
                        <form class="form-register" action="" method="POST" enctype="multipart/form-data">
                          <div class="form-group input-with-icon">
                            <input type="email" name="email" class="form-control" required="" placeholder="Email">
                            <i class="far fa-envelope fa-lg fa-fw" aria-hidden="true"></i>
                          </div>
                          <div class="form-group input-with-icon">
                            <input type="password" name="password" class="form-control" required="" placeholder="Kata Sandi">
                            <i class="fas fa-unlock fa-lg fa-fw" aria-hidden="true"></i>
                          </div>
                          <div class="form-group text-center">
                            <input type="submit" value="Login" name="login" class="btn btn-warning">
                          </div>
                        </form>
                        <p class="text-center">Belum mempunyai akun? <a href="register.php">Klik disini</a> </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END -->
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include 'template/instagram.php'; ?>

  <?php include 'template/footer.php'; ?>

  <?php include 'template/script.php'; ?>

</body>

</html>

<?php
if (isset($_POST['login'])) {

  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  $con = connect();
  $emailSQL = "SELECT * FROM rc_info WHERE email = '$email';";
  $emailResult = $con->query($emailSQL);
  $passwordSQL = "SELECT * FROM rc_info WHERE email = '$email' And password=?;";
  $stmt = mysqli_stmt_init($con);

  
  if (!mysqli_stmt_prepare($stmt, $passwordSQL)) {
    echo "SQL declaration has failed.";
  } else {
    
    mysqli_stmt_bind_param($stmt, "s", $password);
    
    mysqli_stmt_execute($stmt);
    $row = mysqli_fetch_assoc($emailResult);
   
    $passwordResult = mysqli_stmt_get_result($stmt);

    if ($emailResult->num_rows <= 0) {
      include 'dashboard/template/alert.php';
      echo '<script>
              swal({
                title: false,
                text: "Email ini tidak terdaftar",
                icon: "warning",
                button: "ok",
              }).then(function() {
                window.location = "login.php";
              });
            </script>';
    } else if ($passwordResult->num_rows <= 0) {
      // if (!password_verify($password, $row['password'])) {
      include 'dashboard/template/alert.php';
      echo '<script>
                swal({
                  title: false,
                  text: "Password Salah!",
                  icon: "Peringatan",
                  button: "ok",
                }).then(function() {
                  window.location = "login.php";
                });
              </script>';
      // }
    } else {

      $_SESSION['isLoggedIn'] = TRUE;

      $SQL = "SELECT * FROM rc_info WHERE email = '$email' And password = '$password'";
      $result = $con->query($SQL);

      foreach ($result as $r) {
        $_SESSION['id'] = $r['id'];
        $_SESSION['name'] = $r['rc_name'];
        $_SESSION['first_name'] = $r['first_name'];
        $_SESSION['phone'] = $r['phone'];
        $_SESSION['email'] = $r['email'];
        $_SESSION['password'] = $r['password'];
        $_SESSION['role'] = $r['role'];
      }

      if ($_SESSION['role'] == 1) {
        echo '<script>window.location="dashboard/accueil.php"</script>';
      } elseif ($_SESSION['role'] == 2) {
        echo '<script>window.location="accueil.php"</script>';
      }
    }
  }
}
?>