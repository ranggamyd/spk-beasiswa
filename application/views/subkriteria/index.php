<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title"> Sub Kriteria </h4>
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
				<a href="<?= site_url('subkriteria') ?>"> Sub Kriteria </a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-lg-9">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"> 
						<span class="d-inline-block">
							Sub Kriteria
						</span>

						<?php if(!empty($kriteria_aktif)) : ?>
						<a class="btn btn-primary float-right" href="<?= site_url('subkriteria/tambah?id_kriteria='.$kriteria_aktif->id_kriteria) ?>">
						<?php else : ?>
						<a class="btn btn-primary float-right" href="<?= site_url('subkriteria/tambah') ?>">
						<?php endif; ?>
						
						<i class="fa fa-plus"></i> Tambah
						</a>
					</h4>
				</div>
				<div class="card-body">

					<p class="mx-3">
						<b> Kriteria </b> &nbsp;:&nbsp;
						<select class="form-control kriteria d-inline" style="max-width: 300px; width: 100%;">
							<?php foreach($kriteria as $k): ?>

								<?php if($kriteria_aktif) : ?>
								<option value="<?= $k->id_kriteria ?>" <?php if($kriteria_aktif->id_kriteria == $k->id_kriteria){ echo 'selected'; } ?>> <?= $k->nama_kriteria ?> </option>
								<?php else : ?>
								<option value="<?= $k->id_kriteria ?>"> <?= $k->nama_kriteria ?> </option>
								<?php endif; ?>

							<?php endforeach; ?>
						</select>
					</p>

					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable">
							<thead>
								<tr>
									<th> No </th>
									<th> Range Nilai </th>
									<th> Kategori </th>
									<th> Nilai </th>
									<th width="100"> Aksi </th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach($subkriteria as $sk) : ?>
								<tr>
									<td> <?= $i++ ?> </td>
									<?php if($sk->range_awal != $sk->range_akhir) : ?>
									<td> <?= custom_format_number($sk->range_awal) ?> - <?= custom_format_number($sk->range_akhir) ?> </td>
									<?php else : ?>
									<td> <?= custom_format_number($sk->range_awal) ?> </td>
									<?php endif; ?>
									<td> <?= $sk->kategori ?> </td>
									<td> <?= $sk->nilai ?> </td>
									<td>
										<div class="dropdown">
											<button class="btn btn-primary dropdown-toggle py-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Aksi
											</button>

											<div class="dropdown-menu">
												<a class="dropdown-item" href="<?= site_url('subkriteria/edit/'.$sk->id_subkriteria) ?>">
													<i class="fas fa-edit mr-2"></i> Edit
												</a>
												<a class="dropdown-item" href="<?= site_url('subkriteria/hapus/'.$sk->id_subkriteria) ?>" onclick="return confirm('Yakin ingin dihapus?')">
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

<script type="text/javascript">
	$(function(){

		$('.kriteria').on('change', function(){
			const id_kriteria = $(this).val()
			window.location.href = `<?= site_url('subkriteria') ?>?id_kriteria=${id_kriteria}`
		})

	})
</script>