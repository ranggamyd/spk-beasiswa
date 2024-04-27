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
		</ul>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"> 
						<span class="d-inline-block">
							Mahasiswa
						</span>
						<div class="float-right">
							<a class="btn btn-success text-white" href="<?= site_url('mahasiswa/import') ?>">
								<i class="fa fa-upload"></i> Import
							</a>
							<a class="btn btn-primary" href="<?= site_url('mahasiswa/tambah') ?>">
								<i class="fa fa-plus"></i> Tambah
							</a>
						</div>
					</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable">
							<thead>
								<tr>
									<th> No </th>
									<th> Nama Mahasiswa </th>
									<th> Program Studi </th>
									<th> NRP </th>
									<th> Kelompok </th>
									<th> IPK (C1) </th>
									<th> Penghasilan Orangtua (C2) </th>
									<th> Tanggungan Orangtua (C3) </th>
									<th width="100"> Aksi </th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1 ?>
								<?php foreach($mahasiswa as $d) : ?>
								<tr>
									<td> <?= $i++ ?> </td>
									<td> <?= $d->nama_mahasiswa ?> </td>
									<td> <?= $d->nama_program_studi ?> </td>
									<td> <?= $d->nrp ?> </td>
									<td> <?= $d->nama_kelompok ?> </td>
									<td> <?= custom_format_number($d->c1) ?> </td>
									<td> <?= custom_format_number($d->c2) ?> </td>
									<td> <?= custom_format_number($d->c3) ?> </td>
									<td>
										<div class="dropdown">
											<button class="btn btn-primary dropdown-toggle py-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Aksi
											</button>

											<div class="dropdown-menu">
												<a class="dropdown-item" href="<?= site_url('mahasiswa/edit/'.$d->id_mahasiswa) ?>">
													<i class="fas fa-edit mr-2"></i> Edit
												</a>
												<a class="dropdown-item" href="<?= site_url('mahasiswa/hapus/'.$d->id_mahasiswa) ?>" onclick="return confirm('Yakin ingin dihapus?')">
													<i class="fas fa-trash mr-2"></i> Hapus
												</a>
											</div>
										</div>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>