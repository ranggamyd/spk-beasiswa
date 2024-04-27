<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold"> Dashboard </h2>
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-lg-3 col-md-12">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-star text-primary"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category"> Program Studi </p>
								<h4 class="card-title"> <?= count($this->Program_studi_model->get_all()) ?> </h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-12">
			<div class="card card-stats card-round">
				<div class="card-body ">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-users text-success"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category"> Kelompok </p>
								<h4 class="card-title">
									<?= count($this->Kelompok_model->get_all()) ?>
								</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-12">
			<div class="card card-stats card-round">
				<div class="card-body ">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-users text-danger"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category"> Mahasiswa </p>
								<h4 class="card-title">
									<?= count($this->Mahasiswa_model->get_all()) ?>
								</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="col-lg-3 col-md-12">
			<div class="card card-stats card-round">
				<div class="card-body ">
					<div class="row">
						<div class="col-5">
							<div class="icon-big text-center">
								<i class="flaticon-star text-warning"></i>
							</div>
						</div>
						<div class="col-7 col-stats">
							<div class="numbers">
								<p class="card-category"> Test </p>
								<h4 class="card-title">
									43
								</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</div>
</div>