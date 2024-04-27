<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title"> Program Studi </h4>
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
				<a href="<?= site_url('program_studi') ?>"> Program Studi </a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="<?= site_url('program_studi/edit/'.$program_studi->id_program_studi) ?>"> Edit </a>
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
							Edit Program Studi
						</span>
					</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="<?= site_url('program_studi/proses_edit/'.$program_studi->id_program_studi) ?>">
						<div class='banner banner-info'>
							Kolom bertanda <span class='text-danger'> * </span> wajib diisi.
						</div>

						<div class="form-group">
							<label>
								Nama Program Studi <span class='text-danger'> * </span>
							</label>
							<input type="text" name="nama_program_studi" class="form-control" placeholder="Masukkan nama program studi" maxlength="100" value="<?= $program_studi->nama_program_studi ?>" required>
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