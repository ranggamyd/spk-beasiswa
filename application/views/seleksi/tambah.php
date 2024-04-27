<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title"> Hasil Seleksi </h4>
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
				<a href="<?= site_url('seleksi') ?>"> Hasil Seleksi </a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"> 
						<span class="d-inline-block">
							Hasil Seleksi
						</span>
					</h4>
				</div>
				<div class="card-body">
					<form method="GET" action="<?= site_url('seleksi/hasil') ?>">

						<div class="form-group">
							<label>
								Kelompok <span class='text-danger'> * </span>
							</label>
							<select class="form-control" name="id_kelompok" required>
								<option value="" disabled selected> - Pilih Kelompok - </option>
								<?php foreach($kelompok as $k) : ?>
								<option value="<?= $k->id_kelompok ?>"> <?= $k->nama_kelompok ?> </option>
								<?php endforeach; ?>
							</select>
						</div>

						<hr>

						<button class="btn btn-primary" type="submit">
							<i class="fas fa-check mr-2"></i> Buat Hasil Seleksi
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>