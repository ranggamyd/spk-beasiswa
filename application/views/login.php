<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="_token" content="rI9KFIl1NC4psUQ4vLXwdjCjHAOhPNKAblv6Wnz6">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title> SPK | Login </title>
	<link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/login.css" />
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

	<script src="<?= site_url() ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:600,400,400,600"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<link rel="stylesheet" href="<?= site_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= site_url() ?>assets/css/atlantis.min.css">
	<link rel="stylesheet" href="<?= site_url() ?>assets/vendors/ladda/ladda-themeless.min.css">
	<link rel="stylesheet" href="<?= site_url() ?>assets/vendors/jquery-confirm/jquery-confirm.css">
	<link rel="stylesheet" href="<?= site_url() ?>assets/css/custom/select2-atlantis.css">
	<link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/css/custom/login-added.css" />

	<style type="text/css">
		@media (max-width: 200px) {
			.image {
				display: block;
				position: absolute;
			}
		}

		.left-panel h1 {
			color: white;
			font-weight: 50px;
			font-size: 25px;
			margin-bottom: 20px;
		}
	</style>

</head>

<body>
	<div class="container">
		<div class="forms-container">
			<div class="signin-signup">

				<form class="sign-in-form" id="formLogin" method="POST" action="<?= site_url('login/proses_login') ?>">
					<h2 class="title">Sign In</h2>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="text" placeholder="Username" name="username" required="" />
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" placeholder="Password" name="password" required="" />
					</div>
					<button type="submit" class="btn-primary btn-round btn">
						Login
					</button>

					<?php if ($message = $this->session->flashdata('message')) : ?>
						<p class="message-error text-center text-danger"> <?= $message ?> </p>
					<?php endif; ?>

					<p class="social-text text-center">
						Copyright @ 2023 | Inday
					</p>
				</form>

			</div>
		</div>



		<div class="panels-container">
			<div class="panel left-panel">
				<img src="<?= site_url().'/assets/img/logo/logo-login.png' ?>" class="image" alt="">
			</div>
			<div class="panel right-panel">
				<img src="<?= site_url().'/assets/img/logo/logo-login.png' ?>" class="image" alt="">
			</div>
			<!-- <div class="panel left-panel">
				<h1> Selamat Datang di Sistem Pendukung Keputusan Beasiswa Fakultas Teknik UNPAS</h1>
			</div> -->
		</div>
	</div>

	<script src="<?= site_url() ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= site_url() ?>assets/js/core/popper.min.js"></script>
	<script src="<?= site_url() ?>assets/js/core/bootstrap.min.js"></script>


	<!-- Bootstrap Notify -->
	<script src="<?= site_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- Atlantis JS -->
	<script src="<?= site_url() ?>assets/js/atlantis.min.js"></script>

	<script src="<?= site_url() ?>assets/vendors/ladda/spin.min.js"></script>
	<script src="<?= site_url() ?>assets/vendors/ladda/ladda.min.js"></script>
	<script src="<?= site_url() ?>assets/vendors/ladda/ladda.jquery.min.js"></script>
	<script src="<?= site_url() ?>assets/js/myJs.js"></script>

</body>

</html>