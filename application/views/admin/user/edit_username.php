<p class="pull-right">
	<div class="btn-group pull-right">
		<a href="<?php echo base_url('admin/user') ?>" title="kembali" class="btn btn-info btn-md">
			<i class="fa fa-backward"></i> Kembali
		</a>
	</div>
</p>

<?php
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('admin/user/edit_username/').$this->session->userdata('id_user'), 'class="form-horizontal"');
?>

<div class="form-inline">
	<label class="col-md-2 control-label" for="username">Username</label>
	<div class="col-md-5">
		<input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" required>
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