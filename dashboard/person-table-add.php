<!-- table-add.php -->
<?php include 'template/header.php';
if (!isset($_SESSION['isLoggedIn'])) {
	echo '<script>window.location="login.php"</script>';
}
?>

<body>
	<section class="body">
		<!-- start: header -->
		<?php include 'template/top-bar.php'; ?>
		<!-- end: header -->
		<div class="inner-wrapper">
			<!-- start: sidebar -->
			<?php include 'template/left-bar.php'; ?>
			<!-- end: sidebar -->
			<section role="main" class="content-body">
				<header class="page-header">
					<h2>Kelola  Ketersediaan</h2>
					<div class="right-wrapper pull-right">
						<ol class="breadcrumbs">
							<li>
								<a href="index.html">
									<i class="fa fa-home"></i>
								</a>
							</li>
							<li><span>Kelola  Ketersediaan</span></li>
							<li><span>Meja Baru</span></li>
						</ol>
						<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
					</div>
				</header>
				<!-- start: page -->
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<form action="manage-insert.php" method="POST" enctype="multipart/form-data">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">Tambah Meja Baru</h2>
									<p class="panel-subtitle">
										Untuk Menambah <code>Jenis dari Meja</code> silahkan pilih dari menu dibawah <br><br>
										Lalu masuk ke menu nav-bar kiri: <code>"Kelola Meja"</code> dan <code>"Daftar Tabel yang Tersedia"</code>, untuk menambahkan berapa banyak setiap tabel yang Anda miliki.
									</p>
								</header>
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label class="control-label">Jenis meja yang Anda miliki di restoran Anda</label>
												<div class="form-group">
													<select data-plugin-selectTwo class="form-control populate" name="tablename" required="">
														<option value=""> -Pilih- </option>
														<option value="1 Orang">Meja untuk 1 Orang</option>
														<option value="2 Orang">Meja untuk 2 Orang</option>
														<option value="3 Orang">Meja untuk 3 Orang</option>
														<option value="4 Orang">Meja untuk 4 Orang</option>
														<option value="5 Orang">Meja untuk 5 Orang</option>
														<option value="6 Orang">Meja untuk 6 Orang</option>
														<option value="7 Orang">Meja untuk 7 Orang</option>
														<option value="8 Orang">Meja untuk 8 Orang</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								<footer class="panel-footer">
									<input type="submit" name="addtable" class="btn btn-warning btn-sm" value="Add">
								</footer>
							</section>
						</form>
					</div>
				</div>
				<!-- end: page -->
			</section>
		</div>
		<?php include 'template/right-bar.php'; ?>
	</section>

	<!-- Vendor -->
	<script src="assets/vendor/jquery/jquery.js"></script>
	<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
	<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
	<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="assets/javascripts/theme.js"></script>

	<!-- Theme Custom -->
	<script src="assets/javascripts/theme.custom.js"></script>

	<!-- Theme Initialization Files -->
	<script src="assets/javascripts/theme.init.js"></script>

	<!-- Sweet Alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>