<p class="pull-right">
	<div class="btn-group pull-right">
		<a href="<?php echo base_url('admin/magang') ?>" title="kembali" class="btn btn-info btn-md">
			<i class="fa fa-backward"></i> Kembali
		</a>
	</div>
</p>

<div class="clearfix"></div><hr>
<table class="table table-bordered">
<thead>
	<tr>
		<th width="25%">NAMA</th>
		<th> <?php echo $object->nama ?></th>
	</tr>
	<tr>
		<th width="25%">INSTANSI</th>
		<th> <?php echo $object->instansi ?></th>
	</tr>
	<tr>
		<th width="25%">NOMOR INDUK</th>
		<th> <?php echo $object->nomor_induk ?></th>
	</tr>
</thead>
<tbody>
	<tr>
		<td>Bulan Masuk</td>
		<td> <?php echo strftime('%B %Y', strtotime($object->tanggal_masuk))?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td> <?php echo $object->alamat ?></td>
	</tr>
	<tr>
		<td>Nomor Telepon</td>
		<td> <?php echo $object->nomor_telepon ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td> <?php echo $object->email ?></td>
	</tr>
	<tr>
		<td>Materi</td>
		<td> <?php echo $object->materi ?></td>
	</tr>
<?php if($object->jumlah_anggota>1){ ?>
	<tr>
		<td>Jumlah Anggota</td>
		<td> <?php echo $object->jumlah_anggota ?></td>
	</tr>
	<tr>
		<td>Nama Anggota</td>
		<td> <?php echo $object->nama_anggota ?></td>
	</tr>
<?php } ?>
	<tr>
		<td>Dokumen</td>
		<td>
		<a href="<?php echo base_url('admin/magang/dokumen/'.$object->id_peserta) ?>" target="_blank" class="btn btn-warning btn-xs mt-1"><i class="fa fa-book"></i> Dokumen</a>
		</td>
	</tr>
</tbody>
</table>