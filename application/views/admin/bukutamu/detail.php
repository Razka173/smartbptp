<p class="pull-right">
	<div class="btn-group pull-right">
		<a href="<?php echo base_url('admin/bukutamu') ?>" title="kembali" class="btn btn-info btn-md">
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
		<th width="25%">NIK</th>
		<th> <?php echo $object->nik ?></th>
	</tr>
	<tr>
		<th width="25%">TELEPON</th>
		<th> <?php echo $object->nomor_telepon ?></th>
	</tr>
	<tr>
		<th width="25%">TUJUAN</th>
		<th> <?php echo $object->tujuan_kunjungan ?></th>
	</tr>
</thead>
</table>