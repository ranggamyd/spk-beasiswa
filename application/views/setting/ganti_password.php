<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title"> Ganti Password </h4>
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
				<a href="javascript:void(0);"> Pengaturan </a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="<?= site_url('setting/ganti_password') ?>"> Ganti Password </a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"> 
						<span class="d-inline-block">
							Ganti Password
						</span>
					</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="<?= site_url('setting/simpan_password') ?>">
						<div class='banner banner-info'>
							Kolom bertanda <span class='text-danger'> * </span> wajib diisi.
						</div>

						<div class="form-group">
							<label>
								Password Lama <span class='text-danger'> * </span>
							</label>
							<input type="password" name="old_password" class="form-control <?php if($this->session->flashdata('old_password_error')) { echo "is-invalid"; } ?>" placeholder="Masukkan password lama" maxlength="100" required>
							<?php if($this->session->flashdata('old_password_error')) : ?>
							<span class="invalid-feedback"> <?= $this->session->flashdata('old_password_error') ?> </span>
							<?php endif; ?>
						</div>

						<div class="form-group">
							<label>
								Password Baru <span class='text-danger'> * </span>
							</label>
							<input type="password" name="new_password" class="form-control" placeholder="Masukkan password baru" maxlength="100" required>
						</div>

						<hr>

						<?php if($this->session->flashdata('success')) : ?>
						<p class="text text-success"> <?= $this->session->flashdata('success') ?> </p>
						<?php endif; ?>

						<div class="form-group">
							<button class="btn btn-primary" type="submit">
								<i class="fas fa-check"></i> Simpan
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>