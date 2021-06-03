<p>
	<a href="<?php echo base_url('admin/user') ?>" title="kembali" class="btn btn-info btn-md">
		<i class="fa fa-backward"></i> Kembali
	</a>
</p>

<?php
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('admin/user/ganti_password/').$this->session->userdata('id_user'), 'class="form-horizontal"');

// Notifikasi
if($this->session->flashdata('sukses')){
  echo '<p class="alert alert-success">';
  echo $this->session->flashdata('sukses');
  // echo '</div>';
}
if($this->session->flashdata('warning')){
  echo '<p class="alert alert-warning">';
  echo $this->session->flashdata('warning');
  // echo '</div>';
}

?>

<div class="form-inline">
	<label class="col-md-2 control-label" for="password">Password Lama</label>
	<div class="col-md-5">
		<input type="password" name="old_password" id="old_password" class="form-control" placeholder="Password" value="" required>
	</div>
</div>

<div class="form-inline">
	<label class="col-md-2 control-label" for="new_password">Password Baru</label>
	<div class="col-md-5">
		<input type="password" name="new_password" id="new_password" class="form-control" placeholder="Password" value="" required>
	</div>
</div>

<div class="form-inline">
	<label class="col-md-2 control-label" for="conf_password">Konfirmasi Password</label>
	<div class="col-md-5">
		<input type="password" name="conf_password" id="conf_password" class="form-control" placeholder="Password" value="" required>
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