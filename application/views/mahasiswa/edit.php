<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title"> Data Alternatif </h4>
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
				<a href="<?= site_url('mahasiswa') ?>"> Data Alternatif </a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="<?= site_url('mahasiswa/edit/'.$mahasiswa->id_mahasiswa) ?>"> Edit </a>
			</li>
		</ul>
	</div>

<?php if (validation_errors()) : ?>
	<div class="alert alert-danger" role="alert">
		<?php echo validation_errors(); ?>
	</div>
<?php endif ?>

	<form method="POST" action="<?= site_url('mahasiswa/proses_edit/'.$mahasiswa->id_mahasiswa) ?>">
		<div class="row">
			<div class="col-lg-5">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title"> 
							<span class="d-inline-block">
								Edit Data Alternatif
							</span>
						</h4>
					</div>
					<div class="card-body">
					
						<div class='banner banner-info'>
							Kolom bertanda <span class='text-danger'> * </span> wajib diisi.
						</div>

						<div class="form-group">
							<label>
								Nama Mahasiswa <span class='text-danger'> * </span>
							</label>
							<input type="text" name="nama_mahasiswa" class="form-control" placeholder="Masukkan nama mahasiswa" maxlength="100" value="<?= $mahasiswa->nama_mahasiswa ?>" required>
						</div>

						<div class="form-group">
							<label>
								Program Studi <span class='text-danger'> * </span>
							</label>
							<select class="form-control" name="id_program_studi" required>
								<option disabled selected> - Pilih Program Studi - </option>
								<?php foreach($program_studi as $p) : ?>
								<option value="<?= $p->id_program_studi ?>" <?php if($p->id_program_studi == $mahasiswa->id_program_studi) { echo 'selected'; } ?>> <?= $p->nama_program_studi ?> </option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label>
								NRP <span class='text-danger'> * </span>
							</label>
							<input type="text" name="nrp" class="form-control" placeholder="Masukkan NRP" maxlength="16" value="<?= $mahasiswa->nrp ?>" required>
						</div>

						<div class="form-group">
							<label>
								Kelompok <span class='text-danger'> * </span>
							</label>
							<select class="form-control" name="id_kelompok" required>
								<option disabled selected> - Pilih Kelompok - </option>
								<?php foreach($kelompok as $k) : ?>
								<option value="<?= $k->id_kelompok ?>" <?php if($k->id_kelompok == $mahasiswa->id_kelompok) { echo 'selected'; } ?>> <?= $k->nama_kelompok ?> </option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label>
								IPK (C1) <span class='text-danger'> * </span>
							</label>
							<input type="text" name="c1" class="form-control" placeholder="IPK (C1)" step="0.01" value="<?= $mahasiswa->c1 ?>" required>
						</div>

						<div class="form-group">
							<label>
								Penghasilan Orangtua (C2) <span class='text-danger'> * </span>
							</label>
							<input type="text" name="c2" class="form-control" placeholder="Penghasilan Orangtua (C2)" value="<?= $mahasiswa->c2 ?>" required>
						</div>

						<div class="form-group">
							<label>
								Tanggungan Orangtua (C3) <span class='text-danger'> * </span>
							</label>
							<input type="text" name="c3" class="form-control" placeholder="Tanggungan Orangtua (C3)" value="<?= $mahasiswa->c3 ?>" required>
						</div>

						<hr>

						<button class="btn btn-primary" type="submit">
							<i class="fas fa-check"></i> Simpan
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>