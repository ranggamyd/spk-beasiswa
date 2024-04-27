<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title"> Jumlah Penerima Beasiswa </h4>
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
				<a href="<?= site_url('setting/jumlah_penerimaan') ?>"> Jumlah Penerima </a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"> 
						<span class="d-inline-block">
							Jumlah Penerima Beasiswa
						</span>
					</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="<?= site_url('setting/simpan_jumlah_penerimaan') ?>">
						<div class='banner banner-info'>
							Kolom bertanda <span class='text-danger'> * </span> wajib diisi.
						</div>

						<div class="form-group">
							<label>
								Jumlah Penerima Beasiswa <span class='text-danger'> * </span>
							</label>
							<input type="number" name="jumlah_penerimaan" class="form-control" placeholder="Masukkan jumlah penerimaan beasiswa" min="1" value="<?= $jumlah_penerimaan ?>" required>
						</div>

						<div class="form-group">
							<label>
								Jumlah Penerima Cadangan <span class='text-danger'> * </span>
							</label>
							<input type="number" name="jumlah_penerima_cadangan" class="form-control" placeholder="Masukkan jumlah penerimaan beasiswa" min="1" value="<?= $jumlah_penerima_cadangan ?>" required>
						</div>

						<hr>

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