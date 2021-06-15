<p class="pull-right">
	<div class="btn-group pull-right">
		<a href="<?php echo base_url('admin/pelatihan') ?>" title="kembali" class="btn btn-info btn-md">
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
</thead>
<tbody>
	<tr>
		<td>Tanggal Kunjungan</td>
		<td> <?php echo strftime('%e %B %Y', strtotime($object->tanggal_kunjungan))?></td>
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
		<td>Tujuan Kunjungan</td>
		<td> <?php echo $object->tanggal_kunjungan ?></td>
	</tr>
	<tr>
		<td>Dokumen</td>
		<td>
		<a href="<?php echo base_url('admin/magang/dokumen/'.$object->id_pelatihan) ?>" target="_blank" class="btn btn-warning btn-xs mt-1"><i class="fa fa-book"></i> Dokumen</a>
		</td>
	</tr>
</tbody>
</table>