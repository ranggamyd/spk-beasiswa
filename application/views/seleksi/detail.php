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
				<a href="<?= site_url('seleksi/detail/'.$hasil_seleksi->id_hasil_seleksi) ?>"> Detail </a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"> 
						<span class="d-inline-block">
							Hasil
						</span>
					</h4>
				</div>
				<div class="card-body">

					<table>
						<tr>
							<td> Kelompok </td>
							<td width="20" align="center">  : </td>
							<td><b> <?= $hasil_seleksi->nama_kelompok ?> </b></td>
						</tr>
						<tr>
							<td> Tgl Dibuat </td>
							<td width="20" align="center">  : </td>
							<td><b> <?= date('d M Y H:i', strtotime($hasil_seleksi->tgl_dibuat)) ?> </b></td>
						</tr>
					</table>

					<br>

					<div class="table table-responsive">
						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th> No </th>
									<th> Nama Mahasiswa </th>
									<th> NRP </th>
									<th> Program Studi </th>
									<th> C1 </th>
									<th> C2 </th>
									<th> C3 </th>
									<th> Hasil </th>
									<th> Status </th>
								</tr>
							</thead>
							<tbody>
								<?php if(count($detail) > 0) : ?>

								<?php $i = 1; ?>
								<?php foreach($detail as $h) : ?>
								<tr>
									<td> <?= $i++ ?> </td>
									<td> <?= $h->nama_mahasiswa ?> </td>
									<td> <?= $h->nrp ?> </td>
									<td> <?= $h->nama_program_studi ?> </td>
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
								</tr>
								<?php endforeach; ?>

								<?php else : ?>
								<tr>
									<td colspan="9" align="center"> Tidak Ada </td>
								</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>

					<a href="<?= site_url('seleksi/export_pdf/'.$hasil_seleksi->id_hasil_seleksi) ?>" class="btn btn-primary"> 
						<i class="fas fa-download"></i> Download PDF 
					</a>

				</div>
			</div>
		</div>
	</div>
</div>