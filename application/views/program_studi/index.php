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
		</ul>
	</div>
	<div class="row">
		<div class="col-lg-9">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"> 
						<span class="d-inline-block">
							Program Studi
						</span>
						<a class="btn btn-primary float-right" href="<?= site_url('program_studi/tambah') ?>">
							<i class="fa fa-plus"></i> Tambah
						</a>
					</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable">
							<thead>
								<tr>
									<th> No </th>
									<th> Nama Program Studi </th>
									<th width="100"> Aksi </th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1 ?>
								<?php foreach($program_studi as $p) : ?>
								<tr>
									<td> <?= $i++ ?> </td>
									<td> <?= $p->nama_program_studi ?> </td>
									<td>
										<div class="dropdown">
											<button class="btn btn-primary dropdown-toggle py-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Aksi
											</button>

											<div class="dropdown-menu">
												<a class="dropdown-item" href="<?= site_url('program_studi/edit/'.$p->id_program_studi) ?>">
													<i class="fas fa-edit mr-2"></i> Edit
												</a>
												<a class="dropdown-item" href="<?= site_url('program_studi/hapus/'.$p->id_program_studi) ?>" onclick="return confirm('Yakin ingin dihapus?')">
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