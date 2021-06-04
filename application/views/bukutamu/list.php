<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- JS -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bukutamu/index.css">
    <title><?php echo (isset($title)) ? $title : "Formulir Data Diri Pengunjung BPTP Jakarta"; ?></title>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar" >
        <!-- Brand -->
        <a class="navbar-brand" href="https://jakarta.litbang.pertanian.go.id/">
            <img src="<?php echo base_url() ?>assets/smartbptp/img/logobptp.png" alt="logo" style="width:50px;">
        </a>
    </nav>

    <div style="background-image: url(<?php echo base_url() ?>assets/smartbptp/img/field1.jpg); background-size: cover;height: 100%; background-position: center;">

    <br>

<<<<<<< HEAD
    <div class="container-welcome" >
        <br>
        <p style="font-family: sans-serif;" class="fs-2 text-light">Selamat Datang</p>
        <p style="font-family: sans-serif;" class="fs-6 text-light">Calon Pengunjung Balai Pengkajian Teknologi Pertanian Jakarta</p>
        <p style="font-family: sans-serif;" class="fs-7 text-light"></p>
        <br>
=======
    <div class="container-welcome mt-5" >
        <p style="font-family: monospace;" class="fs-2 text-light">Selamat Datang</p>
        <p style="font-family: monospace;" class="fs-6 text-light">Calon Pengunjung Balai Pengkajian Teknologi Pertanian Jakarta</p>
        <p style="font-family: monospace;" class="fs-7 text-light"></p>

>>>>>>> 916159ae8e61de868b59043eb2ae01eff92b7d6f
    </div>

    <div class="container" style= "border: 2px solid rgb(191, 255, 196); border-radius: 2%; background-color: rgb(255,255,255); padding: 1px; width: 90%">
        <div class="row justify-content-center">
            <!-- <div class="col-md-1 col-md-offset-2"></div> -->
            <div class="col-10 col-sm-10 col-md-10 col-lg-10 text-center">

<?php  
// Notifikasi error
echo validation_errors('<div class="alert alert-danger">','</div>');

// Notifikasi
if($this->session->flashdata('sukses')){
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}

// Form open
echo form_open_multipart(base_url('bukutamu'),' class="form-horizontal"');
?>
                    <div class="mb-1 mt-5">
                        <input type="text" placeholder="Nama Lengkap" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama')?>" required>
                    </div>

                    <div class="mb-1">
                        <input type="text" placeholder="Asal Instansi" class="form-control" id="instansi" name="instansi" value="<?php echo set_value('instansi')?>" required>
                    </div>

                    <div class="mb-1">
                        <input type="text" placeholder="Tujuan Kunjungan" class="form-control" id="tujuan" name="tujuan" value="<?php echo set_value('tujuan')?>" required>
                    </div>
                    
                    <div class="mb-1">
                        <input type="text" placeholder="NIK" class="form-control" id="nik" name="nik" value="<?php echo set_value('nik')?>" required>
                    </div>

                    <div class="mb-1">
                        <input type="text" placeholder="Nomor Telepon" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?php echo set_value('nomor_telepon')?>" required>
                    </div>
                    <div class="mb-2 mt-2">
                        <div class="mb-1"><?php echo $captcha['image'] ?>
                        <input type="text" class="form-control" placeholder="Security Code" name="captcha" id="captcha" value="" required>
                    </div>
                    <button type="submit" name="submit" class="btn btnhijau col-6">Submit</button>
<?php 
echo form_close(); 
?>
            </div>
        </div>
    </div>
    
</body>
</html>