<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title"> User </h4>
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
				<a href="<?= site_url('user') ?>"> User </a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="<?= site_url('user/edit/'.$user->id_user) ?>"> Edit </a>
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
							Edit User
						</span>
					</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="<?= site_url('user/proses_edit/'.$user->id_user) ?>">
						<div class='banner banner-info'>
							Kolom bertanda <span class='text-danger'> * </span> wajib diisi.
						</div>

						<div class="form-group">
							<label>
								Nama Lengkap <span class='text-danger'> * </span>
							</label>
							<input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama lengkap" maxlength="100" value="<?= $user->nama_lengkap ?>" required>
						</div>

						<div class="form-group">
							<label>
								Username <span class='text-danger'> * </span>
							</label>
							<input type="text" name="username" class="form-control" placeholder="Masukkan username" maxlength="100" value="<?= $user->username ?>" required>
						</div>

						<div class="form-group">
							<label>
								Password (Isi Jika Ingin Ganti Password)
							</label>
							<input type="password" name="password" class="form-control" placeholder="Isi Jika Ingin Ganti Password" maxlength="100">
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