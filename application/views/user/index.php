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
		</ul>
	</div>
	<div class="row">
		<div class="col-lg-9">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"> 
						<span class="d-inline-block">
							User
						</span>
						<a class="btn btn-primary float-right" href="<?= site_url('user/tambah') ?>">
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
									<th> Nama Lengkap </th>
									<th> Username </th>
									<th> Role </th>
									<th width="100"> Aksi </th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1 ?>
								<?php foreach($user as $u) : ?>
								<tr>
									<td> <?= $i++ ?> </td>
									<td> <?= $u->nama_lengkap ?> </td>
									<td> <?= $u->username ?> </td>
									<td> <?= $u->role ?> </td>
									<td>
										<div class="dropdown">
											<button class="btn btn-primary dropdown-toggle py-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Aksi
											</button>

											<div class="dropdown-menu">
												<a class="dropdown-item" href="<?= site_url('user/edit/'.$u->id_user) ?>">
													<i class="fas fa-edit mr-2"></i> Edit
												</a>
												<a class="dropdown-item" href="<?= site_url('user/hapus/'.$u->id_user) ?>" onclick="return confirm('Yakin ingin dihapus?')">
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