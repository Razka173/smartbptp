<h2>Peserta Saat Ini Berjumlah: <?= count($peserta); ?> Peserta</h2>
<table class="table table-bordered" id="adataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Instansi</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($peserta as $peserta) { ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $peserta->nama ?></td>
            <td><?php echo $peserta->instansi ?></td>
            <td><?php echo $peserta->email ?></td>
            <td><?php echo $peserta->status ?></td>
            <td>
                <a href="<?php echo base_url('admin/peserta/edit/'.$peserta->id_peserta) ?>" class="btn btn-warning btn-xs col-12"><i class="fa fa-edit"></i> Edit</a>

                <?php include('delete.php') ?>
            </td>


        </tr>
        <?php $no++;
        } ?>
    </tbody>
</table>
