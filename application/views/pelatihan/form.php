<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/smartbptp/img/logobptp.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/smartbptp/index.css">

    <script src="<?php echo base_url() ?>/assets/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <title><?php echo (isset($title)) ? $title : "Smart BPTP"; ?></title>

    </head>
    
<body>
    
    <br><br>

    <div class="container" style= "border: 2px solid rgb(17, 214, 70); border-radius: 2%; background-color: rgb(250,250,250); padding: 40px; ">
        
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <img src="<?php echo base_url() ?>assets/smartbptp/img/logobptp.png" alt="" style="height: 200px;">
        
                <h1 style="color: rgb(17, 214, 70);">Formulir Pengajuan Studi Banding, Kunjungan Edukatif, Pelatihan Teknologi Pertanian Perkotaan</h1>
                
                <br>

<?php
setlocale (LC_TIME, 'id_ID');
// Error upload
if(isset($error)) {
    echo '<div class="alert alert-danger">'.$error;
    echo '</div>';
}

// Notifikasi
if($this->session->flashdata('sukses')){
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}

// Notifikasi
if($this->session->flashdata('warning')){
    echo '<div class="alert alert-danger">';
    echo $this->session->flashdata('warning');
    echo '</div>';
}

// Notifikasi error
echo validation_errors('<div class="alert alert-danger">','</div>');

// Form open
echo form_open_multipart(base_url('pelatihan/daftar'),' class="form-horizontal"');
?>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama<label style="color: red;">*</label></label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama')?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="asalinstansi" class="form-label">Asal Instansi<label style="color: red;">*</label></label>
                        <input type="text" class="form-control" id="instansi" name="instansi" value="<?php echo set_value('instansi')?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat<label style="color: red;">*</label></label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo set_value('alamat')?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon<label style="color: red;">*</label></label>
                        <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?php echo set_value('nomor_telepon')?>" required>
                        <div id="numberHelp" class="form-text">We'll never share your phone number with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address<label style="color: red;">*</label></label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email')?>" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_kunjungan" class="form-label">Tanggal Hari Kunjungan<label style="color: red;">*</label></label>
                        <input type="date" class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tujuan Kunjungan<label style="color: red;">*</label></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tujuan_kunjungan" id="studibanding" value="Studi Banding" checked>
                            <label class="form-check-label" for="studibanding">
                                Studi Banding
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tujuan_kunjungan" id="kunjunganedu" value="Kunjungan Edukatif">
                            <label class="form-check-label" for="kunjunganedu">
                                Kunjungan Edukatif
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tujuan_kunjungan" id="pelatihan" value="Pelatihan">
                            <label class="form-check-label" for="pelatihan">
                                Pelatihan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tujuan_kunjungan" id="yglainnya" value="">
                            <label class="form-check-label" for="yglainnya">
                                Yang Lainnya:
                            </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="yglainnya" name="yglainnya">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" >Upload Dokumen<label style="color: red;">*</label></label>
                        <input type="file" class="form-control" name="dokumen" aria-describedby="fileHelp" required>
                        <div id="fileHelp" class="form-text">Upload surat permohonan dalam bentuk gambar atau pdf.</div>
                    </div>
                    <div class="mb-3">
                        <label for="capthca">Security Code<label style="color: red;">*</label></label>
                        <div class="mb-1"><?php echo $captcha['image'] ?></div>
                        <input type="text" class="form-inline" style="width: 150" placeholder="Security Code" name="captcha" id="captcha" value="" required>
                    </div>
                    <button type="submit" name="kirim" class="btn btnhijau">Kirim</button>
            </div>
        </div>
    </div>
    <br><br>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
   
    </body>
</html>