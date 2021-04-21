<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url() ?>assets/magang/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/magang/index.css">

    <title>Form Pendaftaran PKL</title>
    </head>
    <body>

<?php
// Error upload
if(isset($error)) {
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}

// Notifikasi
if($this->session->flashdata('sukses')){
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
}

// Notifikasi
if($this->session->flashdata('warning')){
    echo '<p class="alert alert-warning">';
    echo $this->session->flashdata('warning');
}

// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form open
echo form_open_multipart(base_url('magang/daftar'),' class="form-horizontal"');
?>
    
    <br><br>

    <div class="container" style= "border: 3px solid rgb(17, 214, 70); border-radius: 2%; background-color: rgb(250,250,250); padding: 40px; ">
        
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <img src="<?php echo base_url() ?>assets/smartbptp/img/logobptp.png" alt="" style="height: 200px;">
        
                <h1 style="color: rgb(17, 214, 70);">Formulir Pengajuan Magang/PKL </h1>
                <h1 style="color: rgb(17, 214, 70);">Balai Pengkajian Teknologi Pertanian Jakarta</h1>
                
                <br>
                <!-- <form method="POST" enctype="multipart/form-data"> -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama<label style="color: red;">*</label></label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama')?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="instansi" class="form-label">Asal Instansi/Sekolah/Perguruan Tinggi<label style="color: red;">*</label></label>
                        <input type="text" class="form-control" id="instansi" name="instansi" value="<?php echo set_value('instansi')?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_induk" class="form-label">Nomor Induk<label style="color: red;">*</label></label>
                        <input type="text" class="form-control" id="nomor_induk" name="nomor_induk" value="<?php echo set_value('nomor_induk')?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat<label style="color: red;">*</label></label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo set_value('alamat')?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon<label style="color: red;">*</label></label>
                        <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?php echo set_value('nomor_telepon')?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address<label style="color: red;">*</label></label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo set_value('email')?>" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_masuk" class="form-label">Tanggal Mulai Magang<label style="color: red;">*</label></label>
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?php echo set_value('tanggal_masuk')?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_keluar" class="form-label">Tanggal Selesai Magang<label style="color: red;">*</label></label>
                        <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" value="<?php echo set_value('tanggal_keluar')?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bidang Materi<label style="color: red;">*</label></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="materi" id="budidaya" value="Budidaya">
                            <label class="form-check-label" for="budidaya">
                                Budidaya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="materi" id="pascapanen" value="Pasca Panen">
                            <label class="form-check-label" for="pascapanen">
                                Pasca Panen
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="materi" id="peternakan" value="Peternakan">
                            <label class="form-check-label" for="peternakan">
                                Peternakan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="materi" id="other" value="">
                            <label class="form-check-label" for="other">
                                Yang Lainnya...
                            </label>
                            <input type="text" class="form-control" id="other" name="other">
                        </div>
                        <div class="col-md-3">
                            
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" >Upload Dokumen<label style="color: red;">*</label></label>
                        <input type="file" class="form-control" name="dokumen" aria-describedby="fileHelp" required>
                        <div id="fileHelp" class="form-text">Upload surat permohonan dalam bentuk gambar atau pdf.</div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-lg btnhijau">Kirim</button>
                <!-- </form> -->
            </div>
        </div>
    </div>

    <?php echo form_close(); ?>

    <br><br>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>

    <script src="<?php echo base_url() ?>assets/magang/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
   
  </body>
</html>