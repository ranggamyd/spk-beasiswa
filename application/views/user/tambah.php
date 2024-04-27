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
				<a href="<?= site_url('user/tambah') ?>"> Tambah </a>
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
							Tambah User
						</span>
					</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="<?= site_url('user/proses_tambah') ?>">
						<div class='banner banner-info'>
							Kolom bertanda <span class='text-danger'> * </span> wajib diisi.
						</div>

						<div class="form-group">
							<label>
								Nama Lengkap <span class='text-danger'> * </span>
							</label>
							<input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama lengkap" maxlength="100" required>
						</div>

						<div class="form-group">
							<label>
								Username <span class='text-danger'> * </span>
							</label>
							<input type="text" name="username" class="form-control" placeholder="Masukkan username" maxlength="100" required>
						</div>

						<div class="form-group">
							<label>
								Password <span class='text-danger'> * </span>
							</label>
							<input type="password" name="password" class="form-control" placeholder="Masukkan password" maxlength="100" required>
						</div>

						<div class="form-group">
							<label>
								Role <span class='text-danger'> * </span>
							</label>
							<select class="form-control" name="role" required>
								<option disabled selected> - Pilih Role - </option>
								<option value="Admin"> Admin </option>
								<option value="Bag Kemahasiswaan"> Bag Kemahasiswaan </option>
								<option value="Sekprodi"> Sekretaris Prodi </option>
							</select>
						</div>

						<div id="prodi"></div>

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

<script type="text/javascript">
	
	$(function(){

		$(`[name="role"]`).on('change', function(){
			let val = $(this).val()
			if(val == 'Sekprodi') {
				const html = $('#prodi-template').text()
				$('#prodi').html(html)
			} else {
				$('#prodi').html('')
			}
		})

	})

</script>

<script type="text/html" id="prodi-template">
	<div class="form-group">
		<label>
			Program Studi <span class='text-danger'> * </span>
		</label>
		<select class="form-control" name="id_program_studi" required>
			<option disabled selected> - Pilih Program Studi - </option>
			<?php foreach($program_studi as $p) : ?>
			<option value="<?= $p->id_program_studi ?>"> <?= $p->nama_program_studi ?> </option>
			<?php endforeach; ?>
		</select>
	</div>
</script>