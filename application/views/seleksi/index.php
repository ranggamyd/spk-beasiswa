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
				<a href="<?= site_url('program_studi') ?>"> Hasil Seleksi </a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-lg-9">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"> 
						<span class="d-inline-block">
							Hasil Seleksi
						</span>
						<a class="btn btn-primary float-right" href="<?= site_url('seleksi/tambah') ?>">
							<i class="fa fa-plus"></i> Tambah
						</a>
					</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable">
							<thead>
								<tr>
									<th style="width: 50px;"> No </th>
									<th> Kelompok </th>
									<th> Tahun </th>
									<th width="100"> Aksi </th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1 ?>
								<?php foreach($hasil_seleksi as $s) : ?>
								<tr>
									<td> <?= $i++ ?> </td>
									<td> <?= $s->nama_kelompok ?> </td>
									<td> <?= date('Y', strtotime($s->tgl_dibuat)) ?> </td>
									<td>
										<div class="dropdown">
											<button class="btn btn-primary dropdown-toggle py-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Aksi
											</button>

											<div class="dropdown-menu">
												<a class="dropdown-item" href="<?= site_url('seleksi/detail/'.$s->id_hasil_seleksi) ?>">
													<i class="fas fa-search mr-2"></i> Detail
												</a>
												<a class="dropdown-item" href="<?= site_url('seleksi/export_pdf/'.$s->id_hasil_seleksi) ?>">
													<i class="fas fa-download mr-2"></i> Download PDF
												</a>
												<a class="dropdown-item" href="<?= site_url('seleksi/hapus/'.$s->id_hasil_seleksi) ?>" onclick="return confirm('Yakin ingin dihapus?')">
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