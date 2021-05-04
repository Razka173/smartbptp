<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <div class="container" style= "border: 3px solid rgb(17, 214, 70); border-radius: 2%; background-color: rgb(250,250,250); padding: 40px; ">
        
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <img src="<?php echo base_url() ?>assets/smartbptp/img/logobptp.png" alt="" style="height: 200px;">
        
                <h1 style="color: rgb(17, 214, 70);">Formulir Pengajuan Magang/PKL </h1>
                <h1 style="color: rgb(17, 214, 70);">Balai Pengkajian Teknologi Pertanian Jakarta</h1>
                
                <br>
<?php
setlocale (LC_TIME, 'id_ID');
// Error upload
if(isset($error)) {
    echo '<div class="alert alert-danger">';
    echo $error;
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
echo form_open_multipart(base_url('pkl/daftar'),' class="form-horizontal"');
?>

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
                        <div id="numberHelp" class="form-text">We'll never share your phone number with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address<label style="color: red;">*</label></label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo set_value('email')?>" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="">
                        <label for="" class="form-label">Bulan Magang<label style="color: red;">*</label></label>
                    </div>
                    <div class="mb-3">
                        <select id="month" name=month>
                            <option value='01'>Januari</option>
                            <option value='02'>Februari</option>
                            <option value='03'>Maret</option>
                            <option value='04'>April</option>
                            <option value='05'>Mei</option>
                            <option value='06'>Juni</option>
                            <option value='07'>Juli</option>
                            <option value='08'>Agustus</option>
                            <option value='09'>September</option>
                            <option value='10'>Oktober</option>
                            <option value='11'>November</option>
                            <option value='12'>Desember</option>
                        </select>
                        <select id="year" name=year>
                            <option value='<?php echo date("Y"); ?>'><?php echo date("Y"); ?></option>
                            <option value='<?php echo date("Y")+1; ?>'><?php echo date("Y")+1; ?></option>
                            <option value='<?php echo date("Y")+2; ?>'><?php echo date("Y")+2; ?></option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Bidang Materi<label style="color: red;">*</label></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="materi" id="budidaya" value="Budidaya" checked>
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
                            <input class="form-check-input" type="radio" name="materi" id="sosekonomi" value="Sosial Ekonomi">
                            <label class="form-check-label" for="sosekonomi">
                                Sosial Ekonomi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="materi" id="smk" value="SMA/SMK">
                            <label class="form-check-label" for="smk">
                                SMA/SMK
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
                        <label for="" >Jumlah Anggota</label></label>
                        <select class="form-select" id="jumlah_anggota" name="jumlah_anggota">
                          <option value="1">1 Orang</option>
                          <option value="2">2 Orang</option>
                          <option value="3">3 Orang</option>
                          <option value="4">4 Orang</option>
                          <option value="5">5 Orang</option>
                          <option value="6">6 Orang</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nama_anggota" class="form-label">Nama Anggota <i>(optional)</i></label>
                        <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" aria-describedby="anggotaHelp" value="<?php echo set_value('nama_anggota')?>">
                        <div id="anggotaHelp" class="form-text">Contoh : Ivan Adi Putra, Razka Agniatara, Adini Gufroni</div>
                    </div>

                    <div class="mb-3">
                        <label for="" >Upload Dokumen<label style="color: red;">*</label></label>
                        <input type="file" class="form-control" name="dokumen" aria-describedby="fileHelp" value="<?php echo set_value('dokumen')?>" required>
                        <div id="fileHelp" class="form-text">Upload surat permohonan dalam bentuk gambar atau pdf.</div>
                    </div>
                    <div class="mb-3">
                        <label for="capthca">Security Code<label style="color: red;">*</label></label>
                        <div class="mb-1"><?php echo $captcha['image'] ?></div>
                        <input type="text" class="form-inline" style="width: 150" placeholder="Security Code" name="captcha" id="captcha" value="" required>
                    </div>
                    <div class="mb-3">
                        <label style="color: red;"><i>*cukup satu perwakilan anggota yang mengisi</i></label>
                    </div>
                
                    <button type="submit" name="submit" class="btn btn-lg btnhijau">Kirim</button> 
            </div>
        </div>
    </div>

<?php 
echo form_close(); 
?>

    <br><br>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>

    <script src="<?php echo base_url() ?>assets/magang/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
   
  </body>
</html>