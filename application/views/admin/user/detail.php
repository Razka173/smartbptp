<p>
		<a href="<?php echo base_url('admin/user') ?>" title="kembali" class="btn btn-info btn-md">
			<i class="fa fa-backward"></i> Kembali
		</a>
		<a href="<?php echo base_url('admin/user/edit_profile/').$this->session->userdata('id_user') ?>" class="btn btn-warning btn-md">
    		<i class="fa fa-edit"></i> Edit Profile
  		</a>
		<a href="<?php echo base_url('admin/user/edit_email/').$this->session->userdata('id_user') ?>" class="btn btn-warning btn-md">
			<i class="fa fa-edit"></i> Edit Email
		</a>
		<a href="<?php echo base_url('admin/user/edit_username/').$this->session->userdata('id_user') ?>" class="btn btn-warning btn-md">
    		<i class="fa fa-edit"></i> Edit Username
  		</a>
  		<a href="<?php echo base_url('admin/user/ganti_password/').$this->session->userdata('id_user') ?>" class="btn btn-danger btn-md">
    		<i class="fa fa-edit"></i> Ganti Password
  		</a>
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
		<th> <?php echo $object->username ?></th>
	</tr>
	<tr>
		<th width="25%">NOMOR INDUK</th>
		<th> <?php echo $object->email ?></th>
	</tr>
</thead>
</table>