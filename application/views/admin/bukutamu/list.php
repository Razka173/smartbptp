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
            <th width="20%">Instansi</th>
            <th width="20%">Tujuan</th>
            <th width="20%">Tanggal Kunjungan</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php setlocale (LC_TIME, 'id_ID'); ?>
        <?php $no = 1; ?>
        <?php foreach($tamu as $tamu){?>
        <tr>
            <td> <?php echo $no ?> </td>
            <td> <?php if(strlen($tamu->nama)>30){echo substr($tamu->nama, 0, 30)."...";}else{echo $tamu->nama;} ?></td>
            <td> <?php if(strlen($tamu->instansi)>30){echo substr($tamu->instansi, 0, 30)."...";}else{echo $tamu->instansi;} ?></td>
            <td> <?php if(strlen($tamu->tujuan_kunjungan)>30){echo substr($tamu->tujuan_kunjungan, 0, 30)."...";}else{echo $tamu->tujuan_kunjungan;} ?> </td>
            <td> <?php echo strftime('%A, %e %B %Y', strtotime($tamu->date_created)) ?></td>
            <td>
                <a href="<?php echo base_url('admin/bukutamu/detail/'.$tamu->id_bukutamu) ?>" class="btn btn-info btn-xs col-12"><i class="fa fa-eye"></i> Detail</a>
                <?php include('delete.php') ?>
            </td>
        </tr>
        <?php $no++ ?>
        <?php }?>
        
    </tbody>
</table>