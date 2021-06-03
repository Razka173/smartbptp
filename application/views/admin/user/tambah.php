<p>
	<a href="<?php echo base_url('admin/user') ?>" title="kembali" class="btn btn-info btn-md">
		<i class="fa fa-backward"></i> Kembali
	</a>
</p>

<?php
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open(base_url('admin/user/tambah'), 'class="form-horizontal"');
?>

<div class="form-inline">
	<label class="col-md-2 control-label" for="nama">Nama Lengkap</label>
	<div class="col-md-5">
		<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value="<?php echo set_value('nama') ?>" required>
	</div>
</div>

<hr>

<div class="form-inline">
	<label class="col-md-2 control-label" for="email">Email</label>
	<div class="col-md-5">
		<input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required>
	</div>
</div>

<hr>

<div class="form-inline">
	<label class="col-md-2 control-label" for="username">Username</label>
	<div class="col-md-5">
		<input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" required>
	</div>
</div>

<hr>

<div class="form-inline">
	<label class="col-md-2 control-label" for="password">Password</label>
	<div class="col-md-5">
		<input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
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