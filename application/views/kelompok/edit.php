<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title"> Beasiswa </h4>
		<ul class="breadcrumbs">
			<li class="nav-home">
				<a href="<?= site_url('dashboard') ?>">
				<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="<?= site_url('kelompok') ?>"> Beasiswa </a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="<?= site_url('kelompok/edit/'.$kelompok->id_kelompok) ?>"> Edit </a>
			</li>
		</ul>
	</div>

<?php if (validation_errors()) : ?>
	<div class="alert alert-danger" role="alert">
		<?php echo validation_errors(); ?>
	</div>
<?php endif ?>
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"> 
						<span class="d-inline-block">
							Edit Beasiswa
						</span>
					</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="<?= site_url('kelompok/proses_edit/'.$kelompok->id_kelompok) ?>">
						<div class='banner banner-info'>
							Kolom bertanda <span class='text-danger'> * </span> wajib diisi.
						</div>

						<div class="form-group">
							<label>
								Nama Beasiswa <span class='text-danger'> * </span>
							</label>
							<input type="text" name="nama_kelompok" class="form-control" placeholder="Masukkan nama kelompok" maxlength="100" value="<?= $kelompok->nama_kelompok ?>" required>
						</div>

						<hr>

						<button class="btn btn-primary" type="submit">
							<i class="fas fa-check"></i> Simpan
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>