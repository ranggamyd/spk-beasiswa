<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title"> Kriteria </h4>
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
				<a href="<?= site_url('kriteria') ?>"> Kriteria </a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="<?= site_url('kriteria/edit/'.$kriteria->id_kriteria) ?>"> Edit </a>
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
							Edit Kriteria
						</span>
					</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="<?= site_url('kriteria/proses_edit/'.$kriteria->id_kriteria) ?>">
						<div class='banner banner-info'>
							Kolom bertanda <span class='text-danger'> * </span> wajib diisi.
						</div>

						<div class="form-group">
							<label>
								Kode Kriteria <span class='text-danger'> * </span>
							</label>
							<input type="text" name="kode_kriteria" class="form-control" placeholder="Masukkan kode kriteria" maxlength="2" value="<?= $kriteria->kode_kriteria ?>" required>
						</div>

						<div class="form-group">
							<label>
								Nama Kriteria <span class='text-danger'> * </span>
							</label>
							<input type="text" name="nama_kriteria" class="form-control" placeholder="Masukkan nama kriteria" maxlength="100" value="<?= $kriteria->nama_kriteria ?>" required>
						</div>

						<div class="form-group">
							<label>
								Penggolongan <span class='text-danger'> * </span>
							</label>
							<select class="form-control" name="penggolongan" required>
								<option selected disabled> - Pilih - </option>
								<option value="Benefit" <?php if($kriteria->penggolongan == 'Benefit') { echo 'selected'; } ?>> Benefit </option>
								<option value="Cost" <?php if($kriteria->penggolongan == 'Cost') { echo 'selected'; } ?>> Cost </option>
							</select>
						</div>

						<div class="form-group">
							<label>
								Bobot (%) <span class='text-danger'> * </span>
							</label>
							<div class="input-group">
								<input type="number" name="bobot" class="form-control" placeholder="Masukkan bobot (1-100)" min="1" max="100" value="<?= $kriteria->bobot ?>" required>
								<div class="input-group-append">
									<span class="input-group-text"> % </span>
								</div>
							</div>
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