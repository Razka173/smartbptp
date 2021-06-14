<p>
  <a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-success btn-md">
    <i class="fa fa-plus"></i> Tambah admin
  </a>
  <a href="<?php echo base_url('admin/user/detail/').$this->session->userdata('id_user') ?>" class="btn btn-info btn-md">
    <i class="fa fa-eye"></i> Profile
  </a>
  <a href="<?php echo base_url('admin/user/ganti_password/').$this->session->userdata('id_user') ?>" class="btn btn-danger btn-md">
    <i class="fa fa-edit"></i> Ganti Password
  </a>
</p>


<?php 
// Notifikasi
if($this->session->flashdata('sukses')){
  echo '<p class="alert alert-success">';
  echo $this->session->flashdata('sukses');
}
if($this->session->flashdata('warning')){
  echo '<p class="alert alert-warning">';
  echo $this->session->flashdata('warning');
}
?>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Nama</th>
      <th>Username</th>
      <th>Email</th>
      <th>Login Terakhir</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($admin as $admin){?>
    <tr>
      <td> <?php echo $admin->nama ?></td>
      <td> <?php echo $admin->username ?></td>
      <td> <?php echo $admin->email ?></td>
      <th> <?php echo $this->simple_login->time_elapsed_string($admin->last_login); ?> </th>
    </tr>
    <?php }?>
  </tbody>
</table>

