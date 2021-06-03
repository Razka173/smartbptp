<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<style type="text/css" media="print">
		body {
			font-family: Arial;
			font-size: 12px;
		}
		.cetak {
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}
		table {
			border: solid thin #000;
			border-collapse: collapse;
		}
		td td {
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th {
			text-align: left;
			background-color: #f5f5f5;
			font-weight: bold;
		}
		h1 {
			margin-bottom: 0.5cm;
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
	<style type="text/css" media="screen">
		body {
			font-family: Arial;
			font-size: 12px;
		}
		.cetak {
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}
		table {
			border: solid thin #000;
			border-collapse: collapse;
		}
		td td {
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th {
			text-align: left;
			background-color: #f5f5f5;
			font-weight: bold;
		}
		h1 {
			margin-bottom: 0.5cm;
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
</head>
<body onload="print()">
	<div class="cetak">
		<?php setlocale (LC_TIME, 'id_ID'); ?>
		<h1><?php echo $title ?></h1>
		<table class="table table-bordered" width="100%">
		<thead>
			<tr class="bg-success">
				<th width=5%>NO</th>
				<th width=20%>NAMA</th>
				<th width=20%>INSTANSI</th>
				<th width=20%>TUJUAN KUNJUNGAN</th>
				<th width=20%>TANGGAL KUNJUNGAN</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; foreach($peserta as $peserta) { ?>
			<tr>
				<td> <?php echo $i ?> </td>
				<td> <?php if(strlen($peserta->nama)>30){echo substr($peserta->nama, 0, 19)."...";}else{echo $peserta->nama;} ?></td>
				<td> <?php if(strlen($peserta->instansi)>30){echo substr($peserta->instansi, 0, 30)."...";}else{echo $peserta->instansi;} ?> </td>
				<td> <?php if(strlen($peserta->tujuan_kunjungan)>30){echo substr($peserta->tujuan_kunjungan, 0, 30)."...";}else{echo $peserta->tujuan_kunjungan;} ?> </td>
				<td><?php echo strftime('%e %B %Y', strtotime($peserta->tanggal_kunjungan)) ?></td>
			</tr>
			<?php $i++; } ?>
		</tbody>
		</table>
	</div>
</body>
</html>