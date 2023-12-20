<!-- signin.php -->
<?php include 'dbCon.php'; ?>
<?php include 'template/header.php'; ?>

  <body>

    <?php include 'template/nav-bar.php'; ?>
    <?php include 'template/search-header.php'; ?>
    

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Buat Akun</span>
            <h4>Daftar akun untuk membooking restaurant favorit anda.</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 dish-menu">
            <div class="nav nav-pills justify-content-center ftco-animate" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link py-3 px-4 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><span class="flaticon-meat"></span> Akun Customer</a>
              <a class="nav-link py-3 px-4" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><span class="flaticon-cutlery"></span> Akun Restaurant</a>
            </div>
            <!--register as customer-->
            
            <div class="tab-content py-5" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="row">
                  <div class="col-lg-3"></div>
                  <div class="col-lg-6">
                    <div class="d-flex ftco-animate form-border" style="background: white;">
                      <div class="row" style="width: 100%">
                        <div class="col-md-12">
                          <form class="form-register" action="manage-insert.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group input-with-icon">
                              <input type="text" name="rc_name" class="form-control" required="" placeholder="Nama Akhir" style="text-transform: capitalize;">
                              <i class="fas fa-user-tag fa-lg fa-fw" aria-hidden="true"></i>
                            </div>
                            <div class="form-group input-with-icon">
                              <input type="text" name="first_name" class="form-control" required="" placeholder="Nama Awal" style="text-transform: capitalize;">
                              <i class="fas fa-user fa-lg fa-fw" aria-hidden="true"></i>
                            </div>
                            <div class="form-group input-with-icon">
                              <input type="email" name="email" class="form-control" required="" placeholder="E-mail">
                              <i class="far fa-envelope fa-lg fa-fw" aria-hidden="true"></i>
                            </div>
                            <div class="form-group input-with-icon">
                              <input type="text" name="phone" class="form-control" required="" placeholder="Nomor telepon">
                              <i class="fas fa-phone-square-alt fa-lg fa-fw" aria-hidden="true"></i>
                            </div>
                            <div class="form-group input-with-icon">
                              <input type="password" name="password" class="form-control" required="" placeholder="Kata sandi">
                              <i class="fas fa-lock fa-lg fa-fw" aria-hidden="true"></i>
                            </div>
                            <div class="form-group  text-center">
                              <input type="submit" value="Daftar" name="submit" class="btn btn-warning">
                            </div>
                          </form>
                          <p class="text-center">Sudah punya akun? <a href="login.php">Klik Disini</a> </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END -->
              <!--register as restaurant-->
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="row">
                  <div class="col-lg-3"></div>
                  <div class="col-lg-6">
                    <div class="d-flex ftco-animate  form-border" style="background: white;">
                      <div class="row" style="width: 100%">
                        <div class="col-md-12">
                          <form class="form-register" action="manage-insert.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group input-with-icon">
                              <input type="text" name="rc_name" class="form-control" required="" placeholder="Nama Restaurant" style="text-transform: capitalize;">
                              <i class="fas fa-store fa-fw" aria-hidden="true" style="font-size: 18px;"></i>
                            </div>
                            <div class="form-group input-with-icon">
                              <input type="url" name="website" class="form-control" placeholder="Website">
                              <i class="fas fa-at fa-lg fa-fw" aria-hidden="true"></i>
                            </div>
                            <div class="form-group input-with-icon">
                              <input type="email" name="email" class="form-control" required="" placeholder="E-Mail">
                              <i class="far fa-envelope fa-lg fa-fw" aria-hidden="true"></i>
                            </div>
                            <div class="form-group input-with-icon">
                              <input type="text" name="phone" class="form-control" required="" minlength="10" maxlength="10" placeholder="No telepon">
                              <i class="fas fa-phone-square-alt fa-lg fa-fw" aria-hidden="true"></i>
                            </div>
                            <div class="form-group input-with-icon">
                              <input type="text" name="address" class="form-control" placeholder="Restaurant Address">
                              <i class="fas fa-map-marker-alt fa-lg fa-fw" aria-hidden="true"></i>
                            </div>
                            <div class="form-group input-with-icon">
                              <input type="text" name="siret" class="form-control" required="" minlength="9" maxlength="9" placeholder="PIN (9 characters)">
                              <i class="fas fa-fingerprint fa-lg fa-fw" aria-hidden="true"></i>
                            </div>
                            <div class="form-group input-with-icon">
                              <input type="password" name="password" class="form-control" required="" placeholder="Kata Sandi">
                              <i class="fas fa-lock fa-lg fa-fw" aria-hidden="true"></i>
                            </div>
                            <div class="row">
                              <div class="col">
                                <select class="form-control " name="category" required="">
                                  <option value=""> -Kategory- </option>
                                  <?php
                                  $con = connect();
                                  $sql = "SELECT * FROM `categories`;";
                                  $result = $con->query($sql);
                                  foreach ($result as $r) {
                                  ?>
                                    <option value="<?php echo $r['id']; ?>"><?php echo $r['category_name']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                              <div class="col">
                                <select class="form-control" name="area" required="">
                                  <option value=""> -Lokasi- </option>
                                  <?php
                                  $con = connect();
                                  $sql = "SELECT * FROM `locations`;";
                                  $result = $con->query($sql);
                                  foreach ($result as $r) {
                                  ?>
                                    <option value="<?php echo $r['id']; ?>"><?php echo $r['location_name']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="row hours-spacing">
                              <div class="col">
                                <label for="open" class="label-spacing">Buka</label>
                                <input type="time" name="opening_res" class="" required="">
                                <br />
                                <label for="close" class="label-spacing">Tutup</label>
                                <input type="time" name="closing_res" class="" required="">
                              </div>
                            </div>
                            <div class="form-group check-service">
                              <input id="yes" type="radio" value="1" name="full_service"> &nbsp;&nbsp;<i class="fas fa-check" required style="color: rgb(63, 153, 63);"></i> Full Time service.&nbsp;
                              <br>
                              <input id="no" type="radio" value="2" name="full_service"> &nbsp;&nbsp;<i class="fas fa-times fa-lg" style="color: rgb(241, 75, 75);"></i> Service Terhentikan di jam siang/malam hari.
                              <div class="legend">*Pilih apabila restoran anda tutup di siang/malam hari</div>
                            </div>
                            <div class="form-group input-with-icon">
                              <i class="fas fa-camera-retro fa-lg fa-fw" aria-hidden="true"></i>
                              <input type="file" name="image" class="form-control" required="">
                            </div>
                            <div class="form-group text-center">
                              <input type="submit" value="Daftar" name="submit2" class="btn btn-warning">
                            </div>
                          </form>
                          <p class="text-center">Sudah punya akun? <a href="login.php">Klik disini</a> </p>
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

    <?php 

    ?>

    <?php include 'template/instagram.php'; ?>

    <?php include 'template/footer.php'; ?>

    <?php include 'template/script.php'; ?>

  </body>

</html>