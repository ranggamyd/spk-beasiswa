<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title"> Detail Hasil Seleksi </h4>
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
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="<?= site_url('seleksi/proses_tambah').'?id_kelompok='.$_GET['id_kelompok'] ?>"> Hasil </a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"> 
						<span class="d-inline-block">
							Matriks Keputusan (X)
						</span>
					</h4>
				</div>
				<div class="card-body">

					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th> No </th>
									<th> Nama Alternatif </th>
									<th> NRP </th>
									<th> C1 </th>
									<th> C2 </th>
									<th> C3 </th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach($hasil['matriks_keputusan'] as $h) : ?>
								<tr>
									<td> <?= $no++ ?> </td>
									<td> <?= $h->nama_mahasiswa ?> </td>
									<td> <?= $h->nrp ?> </td>
									<td> <?= $h->c1 ?> </td>
									<td> <?= $h->c2 ?> </td>
									<td> <?= $h->c3 ?> </td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

				</div>
			</div>

			<div class="card">
				<div class="card-header">
					<h4 class="card-title"> 
						<span class="d-inline-block">
							Matriks Ternormalisasi (R)
						</span>
					</h4>
				</div>
				<div class="card-body">

					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th> No </th>
									<th> Nama Alternatif </th>
									<th> NRP </th>
									<th> C1 </th>
									<th> C2 </th>
									<th> C3 </th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach($hasil['matriks_ternormalisasi'] as $h) : ?>
								<tr>
									<td> <?= $no++ ?> </td>
									<td> <?= $h->nama_mahasiswa ?> </td>
									<td> <?= $h->nrp ?> </td>
									<td> <?= $h->c1 ?> </td>
									<td> <?= $h->c2 ?> </td>
									<td> <?= $h->c3 ?> </td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

				</div>
			</div>

			<div class="card">
				<div class="card-header">
					<h4 class="card-title"> 
						<span class="d-inline-block">
							Bobot Preferensi (W)
						</span>
					</h4>
				</div>
				<div class="card-body">

					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th> C1 (Benefit) </th>
									<th> C2 (Cost) </th>
									<th> C3 (Benefit) </th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td> <?= $hasil['bobot_preferensi']->c1 ?> </td>
									<td> <?= $hasil['bobot_preferensi']->c2 ?> </td>
									<td> <?= $hasil['bobot_preferensi']->c3 ?> </td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>
			</div>

			<div class="card">
				<div class="card-header">
					<h4 class="card-title"> 
						<span class="d-inline-block">
							Nilai Preferensi (V)
						</span>
					</h4>
				</div>
				<div class="card-body">

					<form method="POST" action="<?= site_url('seleksi/simpan_hasil?id_kelompok='.$_GET['id_kelompok']) ?>">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th> No </th>
										<th> Nama Alternatif </th>
										<th> NRP </th>
										<th> C1 </th>
										<th> C2 </th>
										<th> C3 </th>
										<th> Hasil </th>
										<th> Status </th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach($hasil['hasil'] as $h) : ?>
									<tr>
										<td> <?= $no++ ?> </td>
										<td> <?= $h->nama_mahasiswa ?> </td>
										<td> <?= $h->nrp ?> </td>
										<td> <?= $h->c1 ?> </td>
										<td> <?= $h->c2 ?> </td>
										<td> <?= $h->c3 ?> </td>
										<td> <?= $h->hasil ?> </td>
										<?php if($h->status == 'Diterima') : ?>
										<td class="text-success"> <?= $h->status ?> </td>
										<?php elseif($h->status == 'Cadangan') : ?>
										<td class="text-info"> <?= $h->status ?> </td>
										<?php else : ?>
										<td class="text-danger"> <?= $h->status ?> </td>
										<?php endif; ?>
										<input type="hidden" name="nama_mahasiswa[]" value="<?= $h->nama_mahasiswa ?>">
										<input type="hidden" name="nrp[]" value="<?= $h->nrp ?>">
										<input type="hidden" name="id_program_studi[]" value="<?= $h->id_program_studi ?>">
										<input type="hidden" name="c1[]" value="<?= $h->c1 ?>">
										<input type="hidden" name="c2[]" value="<?= $h->c2 ?>">
										<input type="hidden" name="c3[]" value="<?= $h->c3 ?>">
										<input type="hidden" name="hasil[]" value="<?= $h->hasil ?>">
										<input type="hidden" name="status[]" value="<?= $h->status ?>">
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>

						<hr>

						<button class="btn btn-primary" type="submit">
							<i class="fas fa-check mr-2"></i> Simpan
						</button>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>