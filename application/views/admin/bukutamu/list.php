<p>
  <a href="<?php echo base_url('admin/bukutamu/pdf') ?>" class="btn btn-success btn-md">
    <i class="fa fa-print"></i> Cetak PDF
  </a>
</p>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th class="col-auto">No.</th>
      <th class="col-auto">Nama</th>
      <th class="col-auto">NIK</th>
      <th class="col-auto">Nomor Telepon</th>
      <th class="col-auto">Tanggal Kunjungan</th>
    </tr>
  </thead>
  <tbody>
    <?php setlocale (LC_TIME, 'id_ID'); ?>
    <?php $no = 1; ?>
    <?php foreach($tamu as $tamu){?>
    <tr>
      <td> <?php echo $no ?> </td>
      <td> <?php if(strlen($tamu->nama)>30){echo substr($tamu->nama, 0, 19)."...";}else{echo $tamu->nama;} ?> </td>
      <td> <?php echo $tamu->nik ?></td>
      <td> <?php if(strlen($tamu->nomor_telepon)>15){echo substr($tamu->nomor_telepon, 0, 14)."...";}else{echo $tamu->nomor_telepon;} ?> </td>
      <td> <?php echo strftime('%A, %e %B %Y', strtotime($tamu->date_created)) ?></td>
    </tr>
    <?php $no++ ?>
    <?php }?>
    
  </tbody>
</table>

