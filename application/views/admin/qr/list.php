<p>
    <a href="<?php echo base_url('admin/qr/tambah') ?>" class="mt-1 btn btn-info btn-md">
        <i class="fa fa-plus"></i> Tambah QR
    </a>
    <a href="<?php echo base_url('admin/qr/generate') ?>" class="mt-1 btn btn-success btn-md">
        <i class="fa fa-plus"></i> Tambah QR Otomatis
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
            <th width="5%">No</th>
            <th width="45%">Data</th>
            <th width="30%">Gambar</th>
            <th width="20%">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php setlocale (LC_TIME, 'id_ID'); ?>
        <?php $no = 1; ?>
        <?php foreach($qr_code as $qr_code){?>
        <tr>
            <td> <?php echo $no ?> </td>
            <td> <?php if(strlen($qr_code->data)>40){echo substr($qr_code->data, 0, 40)."...";}else{echo $qr_code->data;} ?></td>
            <td> 
                <img src="<?php echo base_url('assets/qrcode/images/').$qr_code->gambar ?>" class="img img-responsive img-thumbnail" width=250 alt="">
            </td>
            <td> 
                <a href="<?php echo base_url('admin/qr/download/'.$qr_code->id_qrcode) ?>" target="_blank" class="btn btn-warning btn-xs col-12 mt-1"><i class="fa fa-download"></i> Download</a>

                <?php include('delete.php') ?>
            </td>
        </tr>
    <?php $no++ ?>
    <?php }?>  
    </tbody>
</table>