<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		table {
			width: 100%;
			border-collapse: collapse;
		}

		table th,
		table td {
			padding: 2px 5px;
			border: 1px solid black;
		}
	</style>
</head>

<body>
	<h1 align="center"> Hasil Seleksi </h1>

	<p>
		Kelompok : <b> <?= $hasil_seleksi->nama_kelompok ?> </b>
	</p>

	<table>
		<thead>
			<tr>
				<th> No </th>
				<th> Nama Mahasiswa </th>
				<th> NRP </th>
				<th> Program Studi </th>
				<th> Hasil </th>
				<th> Status </th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($detail) > 0) : ?>

				<?php $i = 1; ?>
				<?php foreach ($detail as $d) : ?>

					<tr>
						<td> <?= $i++ ?> </td>
						<td> <?= $d->nama_mahasiswa ?> </td>
						<td> <?= $d->nrp ?> </td>
						<td> <?= $d->nama_program_studi ?> </td>
						<td> <?= $d->hasil ?> </td>
						<?php if ($d->status == 'Diterima') : ?>
							<td style="color: green;"> <?= $d->status ?> </td>
						<?php elseif ($d->status == 'Cadangan') : ?>
							<td style="color: blue;"> <?= $d->status ?> </td>
						<?php else : ?>
							<td style="color: red;"> <?= $d->status ?> </td>
						<?php endif; ?>
					</tr>

				<?php endforeach; ?>

			<?php else : ?>
				<tr>
					<td colspan="5" align="center"> Tidak Ada </td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>

	<p>
		Mahasiswa Cadangan
	</p>

	<table>
		<thead>
			<tr>
				<th> No </th>
				<th> Nama Mahasiswa </th>
				<th> NRP </th>
				<th> Program Studi </th>
				<th> Hasil </th>
				<th> Status </th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($cadangan) > 0) : ?>

				<?php $i = 1; ?>
				<?php foreach ($cadangan as $d) : ?>

					<tr>
						<td> <?= $i++ ?> </td>
						<td> <?= $d->nama_mahasiswa ?> </td>
						<td> <?= $d->nrp ?> </td>
						<td> <?= $d->nama_program_studi ?> </td>
						<td> <?= $d->hasil ?> </td>
						<?php if ($d->status == 'Diterima') : ?>
							<td style="color: green;"> <?= $d->status ?> </td>
						<?php elseif ($d->status == 'Cadangan') : ?>
							<td style="color: blue;"> <?= $d->status ?> </td>
						<?php else : ?>
							<td style="color: red;"> <?= $d->status ?> </td>
						<?php endif; ?>
					</tr>

				<?php endforeach; ?>

			<?php else : ?>
				<tr>
					<td colspan="5" align="center"> Tidak Ada </td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</body>

</html>