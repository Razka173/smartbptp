<?php setlocale (LC_TIME, 'id_ID'); ?>
<p>
  <a href="<?php echo base_url('admin/magang/pdf')?>" target="_blank" class="btn btn-success btn-md">
    <i class="fa fa-print"></i> Cetak PDF
  </a>
</p>

<h2>Total Peserta Magang/PKL: <?= count($peserta); ?> Peserta</h2>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th class="">Nama</th>
            <th class="">Instansi</th>
            <th class="">Materi</th>
            <th class="">Bulan Magang</th>
            <th width="20%">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($peserta as $peserta) { ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $peserta->nama; if($peserta->jumlah_anggota>1){echo " (kelompok)";} ?></td>
            <td><?php echo $peserta->instansi ?></td>
            <td><?php echo $peserta->materi ?></td>
            <td><?php echo strftime('%B %Y', strtotime($peserta->tanggal_masuk)) ?></td>
            <td>
                <a href="<?php echo base_url('admin/magang/detail/'.$peserta->id_peserta) ?>" class="btn btn-info btn-xs col-12"><i class="fa fa-eye"></i> Detail</a>

                <a href="<?php echo base_url('admin/magang/dokumen/'.$peserta->id_peserta) ?>" target="_blank" class="btn btn-warning btn-xs col-12 mt-1"><i class="fa fa-book"></i> Dokumen</a>

                <?php include('delete.php') ?>
            </td>


        </tr>
        <?php $no++;
        } ?>
    </tbody>
</table>
