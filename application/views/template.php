<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title> SPK </title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<meta content="rI9KFIl1NC4psUQ4vLXwdjCjHAOhPNKAblv6Wnz6" name="_token">

	<!-- <link rel="icon" href="<?= site_url() ?>assets/img/logo/icon.png" type="image/x-icon"/> -->

	<!-- Fonts and icons -->
	<script src="<?= site_url() ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Quicksand:500,700"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
					"simple-line-icons"
				],
				urls: [`<?= site_url() ?>assets/css/fonts.min.css`]
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= site_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= site_url() ?>assets/css/atlantis.min.css">

	<link rel="stylesheet" href="<?= site_url() ?>assets/css/custom/app.css">

	<link rel="stylesheet" href="<?= site_url() ?>assets/vendors/ladda/ladda-themeless.min.css">
	<link rel="stylesheet" href="<?= site_url() ?>assets/vendors/pace/blue/pace-theme-loading-bar.css">
	<link rel="stylesheet" href="<?= site_url() ?>assets/vendors/jquery-confirm/jquery-confirm.css">
	<link rel="stylesheet" href="<?= site_url() ?>assets/vendors/clockpicker/dist/bootstrap-clockpicker.min.css">
	<link rel="stylesheet" href="<?= site_url() ?>assets/vendors/select2/select2.css">
	<link rel="stylesheet" href="<?= site_url() ?>assets/css/custom/select2-atlantis.css">

	<style type="text/css">
		a.btn-primary,
		a.btn-primary:hover {
			color: white;
		}

		.table th,
		.table td {
			vertical-align: top !important;
		}
	</style>


	<!--   Core JS Files   -->
	<script src="<?= site_url() ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= site_url() ?>assets/js/core/popper.min.js"></script>
	<script src="<?= site_url() ?>assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?= site_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?= site_url() ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?= site_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="<?= site_url() ?>assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?= site_url() ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="<?= site_url() ?>assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="<?= site_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?= site_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?= site_url() ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?= site_url() ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="<?= site_url() ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<script src="<?= site_url() ?>assets/vendors/ladda/spin.min.js"></script>
	<script src="<?= site_url() ?>assets/vendors/ladda/ladda.min.js"></script>
	<script src="<?= site_url() ?>assets/vendors/ladda/ladda.jquery.min.js"></script>
	<script src="<?= site_url() ?>assets/vendors/jquery-confirm/jquery-confirm.js"></script>
	<script src="<?= site_url() ?>assets/vendors/select2/select2.min.js"></script>
	<script src="<?= site_url() ?>assets/vendors/clockpicker/dist/bootstrap-clockpicker.min.js"></script>

</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">

				<a href="<?= site_url() ?>" class="logo">
					<img src="<?= site_url() ?>assets/img/logo/logo.png" alt="navbar brand" class="navbar-brand" style="max-width: 150px; max-height: 50px;">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

				<div class="container-fluid">
					<div class="collapse" id="search-nav">
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>

						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="<?= site_url() ?>assets/img/default-avatar.jpg" alt="" class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="<?= site_url() ?>assets/img/default-avatar.jpg" alt="Foto Profil" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4> </h4>
												<p class="text-muted">
													<?= $this->session->userdata('user')->nama_lengkap ?> <br>
													<b> <?= $this->session->userdata('user')->role ?> </b>
												</p>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?= site_url() ?>login/logout">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-primary" id="menu-nav">

						<li class="nav-item">
							<a href="<?= site_url() ?>dashboard">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>

						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section"> Menu Utama </h4>
						</li>

						<?php
						if ($this->session->userdata('user')->role == 'Admin' || $this->session->userdata('user')->role == 'Sekprodi') :
						?>
							<li class="nav-item">
								<a href="<?= site_url() ?>mahasiswa">
									<i class="fas fa-users"></i>
									<p> Mahasiswa </p>
								</a>
							</li>
						<?php
						endif;
						?>

						<?php
						if ($this->session->userdata('user')->role == 'Admin') :
						?>
							<li class="nav-item">
								<a href="<?= site_url() ?>kriteria">
									<i class="fas fa-clipboard-check"></i>
									<p> Kriteria </p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?= site_url() ?>subkriteria">
									<i class="fas fa-clipboard-list"></i>
									<p> Sub Kriteria </p>
								</a>
							</li>
						<?php
						endif;
						?>


						<?php
						if ($this->session->userdata('user')->role == 'Admin') :
						?>
							<li class="nav-item">
								<a href="<?= site_url() ?>perhitungan">
									<i class="fas fa-calculator"></i>
									<p> Perhitungan </p>
								</a>
							</li>
						<?php
						endif;
						?>

						<li class="nav-item">
							<a href="<?= site_url() ?>seleksi">
								<i class="fas fa-star"></i>
								<p> Hasil Seleksi </p>
							</a>
						</li>

						<?php
						if ($this->session->userdata('user')->role == 'Admin') :
						?>
							<li class="nav-section">
								<span class="sidebar-mini-icon">
									<i class="fa fa-ellipsis-h"></i>
								</span>
								<h4 class="text-section"> Master Data </h4>
							</li>

							<li class="nav-item">
								<a href="<?= site_url() ?>program_studi">
									<i class="fas fa-graduation-cap"></i>
									<p> Program Studi </p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?= site_url() ?>kelompok">
									<i class="fas fa-user-friends"></i>
									<p> Beasiswa </p>
								</a>
							</li>

							<li class="nav-item">
								<a href="<?= site_url() ?>user">
									<i class="fas fa-user"></i>
									<p> User </p>
								</a>
							</li>
						<?php
						endif;
						?>

						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section"> Konfigurasi </h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#menu-setting">
								<i class="fas fa-wrench"></i>
								<p> Pengaturan </p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="menu-setting">
								<ul class="nav nav-collapse">
									<?php
									if ($this->session->userdata('user')->role == 'Admin') :
									?>
										<li>
											<a href="<?= site_url() ?>setting/jumlah_penerimaan">
												<i class="fas fa-users"></i>
												<p> Jumlah Penerima </p>
											</a>
										</li>
									<?php
									endif;
									?>
									<li>
										<a href="<?= site_url() ?>setting/ganti_password">
											<i class="fas fa-key"></i>
											<p> Ganti Password </p>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<?php $this->load->view($content) ?>
			</div>

			<footer class="footer">
				<div class="container-fluid">
					<div class="copyright ml-auto">
						Copyright @ 2023 | Inday
					</div>
				</div>
			</footer>
		</div>
	</div>

	<form action="<?= site_url() ?>assets/logout" method="POST" id="formLogout">
		<input type="hidden" name="_token" value="rI9KFIl1NC4psUQ4vLXwdjCjHAOhPNKAblv6Wnz6">
	</form>

	<!-- Atlantis JS -->
	<script src="<?= site_url() ?>assets/js/atlantis.min.js"></script>

	<script type="text/javascript">
		$('#dataTable').DataTable({
			lengthMenu: [
				[10, 25, 50, 100, 150, 250, -1],
				[10, 25, 50, 100, 150, 250, 'All'],
			],
		})

		const setActiveMenu = () => {
			let isFoundLink = false;
			let path = [];
			window.location.pathname.split("/").forEach(item => {
				if (item !== "") path.push(item);
			})
			let lengthPath = path.length;
			let lengthUse = lengthPath;
			let origin = window.location.origin;

			while (lengthUse >= 1) {
				let link = '';
				for (let i = 0; i < lengthUse; i++) {
					link += `/${path[i]}`;
				}
				$.each($('#menu-nav').find('a'), (i, elem) => {
					if ($(elem).attr('href') == `${origin}${link}`) {
						$(elem).parent('li').addClass('active')
						$(elem).parents('li.nav-item').addClass('active').addClass('submenu')
						$(elem).parents('li.nav-item').find(`.collapse`).addClass('show')
					}
				})

				if (isFoundLink) break;
				lengthUse--;
			}
		}


		setActiveMenu();
	</script>

</body>

</html>