<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title"> Sub Kriteria </h4>
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
				<a href="<?= site_url('subkriteria') ?>"> Sub Kriteria </a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="<?= site_url('subkriteria/edit/'.$subkriteria->id_subkriteria) ?>"> Edit </a>
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
							Edit Sub Kriteria
						</span>
					</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="<?= site_url('subkriteria/proses_edit/'.$subkriteria->id_subkriteria) ?>">
						<div class='banner banner-info'>
							Kolom bertanda <span class='text-danger'> * </span> wajib diisi.
						</div>

						<div class="form-group">
							<label>
								Kriteria <span class='text-danger'> * </span>
							</label>
							<select class="form-control" name="id_kriteria" required>
								<option selected disabled> - Pilih - </option>
								<?php foreach($kriteria as $k) : ?>
									<?php if(isset($subkriteria->id_kriteria)) : ?>
									<option value="<?= $k->id_kriteria ?>" <?php if($subkriteria->id_kriteria == $k->id_kriteria){ echo 'selected'; } ?>> <?= $k->nama_kriteria ?> </option>
									<?php else : ?>
									<option value="<?= $k->id_kriteria ?>"> <?= $k->nama_kriteria ?> </option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label>
								Range Awal <span class='text-danger'> * </span>
							</label>
							<input type="number" name="range_awal" class="form-control" placeholder="Masukkan nilai range awal" step="0.01" value="<?= $subkriteria->range_awal ?>" required>
						</div>

						<div class="form-group">
							<label>
								Range Akhir <span class='text-danger'> * </span>
							</label>
							<input type="number" name="range_akhir" class="form-control" placeholder="Masukkan nilai range akhir" step="0.01" value="<?= $subkriteria->range_akhir ?>" required>
						</div>

						<div class="form-group">
							<label>
								Kategori <span class='text-danger'> * </span>
							</label>
							<input type="text" name="kategori" class="form-control" placeholder="Masukkan kategori" maxlength="50" value="<?= $subkriteria->kategori ?>" required>
						</div>

						<div class="form-group">
							<label>
								Nilai <span class='text-danger'> * </span>
							</label>
							<input type="number" name="nilai" class="form-control" placeholder="Masukkan nilai" min="1" max="99" value="<?= $subkriteria->nilai ?>" required>
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