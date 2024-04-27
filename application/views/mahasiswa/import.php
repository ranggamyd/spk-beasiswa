<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title"> Mahasiswa </h4>
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
				<a href="<?= site_url('mahasiswa') ?>"> Mahasiswa </a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="<?= site_url('mahasiswa/tambah') ?>"> Tambah </a>
			</li>
		</ul>
	</div>

	<form method="POST" action="<?= site_url('mahasiswa/proses_import') ?>" enctype="multipart/form-data">
		<div class="row">
			<div class="col-lg-5">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title"> 
							<span class="d-inline-block">
								Import Mahasiswa
							</span>
						</h4>
					</div>
					<div class="card-body">
					
						<div class="form-group">
							Catatan : <br>
							<ul>
								<li> Import wajib menggunakan template yg kami sediakan </li>
								<li> Download template dengan <a href="<?= site_url('templates/Template_Import_Data_Mahasiswa.xlsx') ?>" download> Klik Disini </a> </li>
							</ul>
						</div>

						<div class='banner banner-info'>
							Kolom bertanda <span class='text-danger'> * </span> wajib diisi.
						</div>

						<div class="form-group">
							<label>
								Kelompok <span class='text-danger'> * </span>
							</label>
							<select class="form-control" name="id_kelompok" required>
								<option disabled selected> - Pilih Kelompok - </option>
								<?php foreach($kelompok as $k) : ?>
								<option value="<?= $k->id_kelompok ?>"> <?= $k->nama_kelompok ?> </option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label>
								File <span class='text-danger'> * </span>
							</label>
							<input type="file" name="file_excel" class="form-control" accept=".xlsx" required>
						</div>

						<hr>

						<button class="btn btn-success" type="submit">
							<i class="fas fa-upload"></i> Upload
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>