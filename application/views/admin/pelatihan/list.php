<?php setlocale (LC_TIME, 'id_ID'); ?>
<p>
  <a href="<?php echo base_url('admin/pelatihan/pdf')?>" target="_blank" class="btn btn-success btn-md">
    <i class="fa fa-print"></i> Cetak PDF
  </a>
</p>

<h2>Total Pelatihan: <?= count($peserta); ?> Pelatihan</h2>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th class="col-auto">No</th>
            <th class="col-auto">Nama</th>
            <th class="col-auto">Instansi</th>
            <th class="col-auto">Tanggal Kunjungan</th>
            <th class="col-xl-2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($peserta as $peserta) { ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $peserta->nama ?></td>
            <td><?php echo $peserta->instansi ?></td>
            <td><?php echo strftime('%e %B %Y', strtotime($peserta->tanggal_kunjungan)) ?></td>
            <td>
                <a href="<?php echo base_url('admin/pelatihan/detail/'.$peserta->id_pelatihan) ?>" class="btn btn-info btn-xs col-12"><i class="fa fa-eye"></i> Detail</a>

                <a href="<?php echo base_url('admin/pelatihan/dokumen/'.$peserta->id_pelatihan) ?>" target="_blank" class="btn btn-warning btn-xs col-12 mt-1"><i class="fa fa-book"></i> Dokumen</a>

                <?php include('delete.php') ?>
            </td>


        </tr>
        <?php $no++;
        } ?>
    </tbody>
</table>
