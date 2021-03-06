<p>
	<a href="<?php echo $this->agent->referrer(); ?>" class="btn btn-info btn-md">
		<i class="fa fa-backward"></i> Kembali
	</a>
</p>

<?php
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('admin/user/edit_profile/').$this->session->userdata('id_user'), 'class="form-horizontal"');
?>

<div class="form-inline">
	<label class="col-md-2 control-label" for="nama">Nama Profile</label>
	<div class="col-md-5">
		<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value="<?php echo $user->nama ?>" required>
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