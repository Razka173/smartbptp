<p>
	<a href="<?php echo $this->agent->referrer(); ?>" class="btn btn-info btn-md">
		<i class="fa fa-backward"></i> Kembali
	</a>
</p>

<?php
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('admin/qr/tambah'), 'class="form-horizontal"');
?>

<div class="form-inline">
	<label class="col-md-2 control-label" for="data">Text QR</label>
	<div class="col-md-5">
		<input type="text" name="data" id="data" class="form-control" placeholder="Isi Text QR..." value="<?php echo set_value('data') ?>" required>
	</div>
</div>

<hr>

<div class="form-inline">
	<label class="col-md-2 control-label"></label>
	<div class="col-md-5">
		<button class="btn btn-success btn-lg" name="submit" type="submit">
			<i class="fa fa-save"></i> Simpan
		</button>
		<button class="btn btn-info btn-lg" name="reset" type="reset">
			<i class="fa fa-times"></i> Reset
		</button>
	</div>
</div>

<?php echo form_close(); ?>