<p>
  <a href="<?php echo base_url('admin/bukutamu/pdf')?>" target="_blank" class="btn btn-success btn-md">
    <i class="fa fa-print"></i> Cetak PDF
  </a>
</p>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th width="5%">No</th>
      <th width="20%">Nama</th>
      <th width="15%">Instansi</th>
      <th width="20%">Tujuan</th>
      <th width="20%">Nomor Telepon</th>
      <th width="20%">Tanggal Kunjungan</th>
    </tr>
  </thead>
  <tbody>
    <?php setlocale (LC_TIME, 'id_ID'); ?>
    <?php $no = 1; ?>
    <?php foreach($tamu as $tamu){?>
    <tr>
      <td> <?php echo $no ?> </td>
      <td> <?php if(strlen($tamu->nama)>30){echo substr($tamu->nama, 0, 20)."...";}else{echo $tamu->nama;} ?></td>
      <td> <?php if(strlen($tamu->instansi)>30){echo substr($tamu->instansi, 0, 20)."...";}else{echo $tamu->instansi;} ?></td>
      <td> <?php if(strlen($tamu->tujuan_kunjungan)>30){echo substr($tamu->tujuan_kunjungan, 0, 30)."...";}else{echo $tamu->tujuan_kunjungan;} ?> </td>
      <td> <?php if(strlen($tamu->nomor_telepon)>15){echo substr($tamu->nomor_telepon, 0, 15)."...";}else{echo $tamu->nomor_telepon;} ?></td>
      <td> <?php echo strftime('%A, %e %B %Y', strtotime($tamu->date_created)) ?></td>
    </tr>
    <?php $no++ ?>
    <?php }?>
    
  </tbody>
</table>

