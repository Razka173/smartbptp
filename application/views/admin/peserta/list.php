<?php setlocale (LC_TIME, 'id_ID'); ?>
<h2>Peserta Saat Ini Berjumlah: <?= count($peserta); ?> Peserta</h2>
<table class="table table-bordered" id="adataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Instansi</th>
            <th>Materi</th>
            <th>Bulan Magang</th>
            <th class="col-2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($peserta as $peserta) { ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $peserta->nama ?></td>
            <td><?php echo $peserta->instansi ?></td>
            <td><?php echo $peserta->materi ?></td>
            <td><?php echo strftime('%B %Y', strtotime($peserta->tanggal_masuk)) ?></td>
            <td>
                <a href="<?php echo base_url('admin/peserta/detail/'.$peserta->id_peserta) ?>" class="btn btn-info btn-xs col-12"><i class="fa fa-eye"></i> Detail</a>

                <a href="<?php echo base_url('admin/peserta/dokumen/'.$peserta->id_peserta) ?>" target="_blank" class="btn btn-warning btn-xs col-12 mt-1"><i class="fa fa-book"></i> Dokumen</a>

                <?php include('delete.php') ?>
            </td>


        </tr>
        <?php $no++;
        } ?>
    </tbody>
</table>
