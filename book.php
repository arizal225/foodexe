<?php
if (isset($_POST['selectChair'])) {
	include 'dbCon.php';
	$con = connect();

	$res_id = $_POST['res_id'];
	$reservation_name = $_POST['reservation_name'];
	$reservation_firstname = $_POST['reservation_firstname'];
	$reservation_phone = $_POST['reservation_phone'];
	$reservation_email = $_POST['reservation_email'];
	$reservation_date = $_POST['reservation_date'];
	$reservation_time = $_POST['reservation_time'];
	$chair = $_POST["chair"];

	include 'template/header.php'; ?>

	<link rel="stylesheet" href="css/css/card.css">

	<body>

		<?php include 'template/nav-bar.php'; ?>
		<style>
			.color-span {
				font-weight: 500;
				color: #ffb03b;
			}

			.color-span-title {
				font-weight: 700;
				color: grey;
				font-family: inherit;
			}
		</style>

		<section class="ftco-section" style="margin-top: 10em;">
			<div class="container">
				<div class="booking-form-w3layouts">
					<h2 class="sub-heading-agileits pb-2">Konfirmasi Reservasi Anda</h2>
					<div class="block-9 mt-5 mb-4">
						<div class="">
							<h2 class="h4 mb-4" style="color: grey;">Reservasi</h2>
							<div class="d-flex ftco-animate">
								<div class="col-md-12 flex-column">
									<div class="row d-block flex-row">
										<div class="col mb-2 d-flex py-4 border" style="background: white;">
											<div class="align-self-center">
												<p class="mb-0"><span class="color-span-title"><i class="fas fa-user-tag fa-lg fa-fw mr-4" aria-hidden="true"></i> Nama Akhir :</span> <span class="color-span"><?php echo $reservation_name; ?></span></p>
											</div>
										</div>
										<div class="col mb-2 d-flex py-4 border" style="background: white;">
											<div class="align-self-center">
												<p class="mb-0"><span class="color-span-title"><i class="fas fa-user fa-lg fa-fw mr-4" aria-hidden="true"></i> Nama Awal : </span> <span class="color-span"><?php echo $reservation_firstname; ?></span></p>
											</div>
										</div>
										<div class="col mb-2 d-flex py-4 border" style="background: white;">
											<div class="align-self-center">
												<p class="mb-0"><span class="color-span-title"><i class="fas fa-phone-square-alt fa-lg fa-fw mr-4" aria-hidden="true"></i> Nomor telepon : </span> <span class="color-span"><?php echo $reservation_phone; ?></span></p>
											</div>
										</div>
										<div class="col mb-2 d-flex py-4 border" style="background: white;">
											<div class="align-self-center">
												<p class="mb-0"><span class="color-span-title"><i class="far fa-envelope fa-lg fa-fw mr-4" aria-hidden="true"></i> E-Mail : </span> <span class="color-span"><?php echo $reservation_email; ?></span></p>
											</div>
										</div>
										<div class="col mb-2 d-flex py-4 border" style="background: white;">
											<div class="align-self-center">
												<p class="mb-0"><span class="color-span-title"><i class="fas fa-calendar-alt fa-lg fa-fw mr-4" aria-hidden="true"></i> Tanggal : </span> <span class="color-span"><?php echo date("d/m/Y", strtotime($reservation_date)); ?></span></p>
											</div>
										</div>
										<div class="col mb-2 d-flex py-4 border" style="background: white;">
											<div class="align-self-center">
												<p class="mb-0"><span class="color-span-title"><i class="fas fa-clock fa-lg fa-fw mr-4" aria-hidden="true"></i> Jam : </span> <span class="color-span"><?php echo $reservation_time; ?></span></p>
											</div>
										</div>
										<div class="col mb-2 d-flex py-4 border" style="background: white;">
											<div class="align-self-center">
												<p class="mb-0"><span class="color-span-title"><i class="fas fa-utensils fa-lg fa-fw mr-4" aria-hidden="true"></i> Meja : </span>
													<?php for ($q = 0; $q < count($_POST["chair"]); $q++) {
														$c_id = $_POST['chair'][$q];
														$sql5 = "SELECT * FROM `restaurant_personne` WHERE id = '$c_id';";
														$result5 = $con->query($sql5);
														foreach ($result5 as $r5) {
													?>
															<span class="color-span"><?php echo $r5['table_no']; ?></span>
													<?php }
													} ?>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<form action="manage-insert.php" method="POST">
						<div class="col-lg-12" style="text-align: center;">
							<input type="hidden" name="res_id" value="<?php echo $res_id; ?>">
							<input type="hidden" name="reservation_name" value="<?php echo $reservation_name; ?>">
							<input type="hidden" name="reservation_firstname" value="<?php echo $reservation_firstname; ?>">
							<input type="hidden" name="reservation_phone" value="<?php echo $reservation_phone; ?>">
							<input type="hidden" name="reservation_email" value="<?php echo $reservation_email; ?>">
							<input type="hidden" name="reservation_date" value="<?php echo $reservation_date; ?>">
							<input type="hidden" name="reservation_time" value="<?php echo $reservation_time; ?>">

							<?php for ($s = 0; $s < count($_POST["chair"]); $s++) {
								$chr_id = $_POST['chair'][$s]; ?>
								<input type="hidden" name="chair[]" value="<?php echo $chr_id; ?>">
							<?php } ?>

							<input type="submit" value="Book" name="book" class="btn btn-warning">
						</div>
					</form>
				</div>
			</div>
		</section>

		<?php include 'template/instagram.php'; ?>

		<?php include 'template/footer.php'; ?>

		<?php include 'template/bootstrap.php'; ?>

		<?php include 'template/script.php'; ?>

	</body>

	</html>
<?php } ?>