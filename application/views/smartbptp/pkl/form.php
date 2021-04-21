<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../index.css">

    <title>Form Pendaftaran PKL</title>
    </head>
    <body>
    
    <br><br>

    <div class="container" style= "border: 2px solid rgb(17, 214, 70); border-radius: 2%; background-color: rgb(250,250,250); padding: 40px; ">
        
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <img src="../img/logobptp.png" alt="" style="height: 200px;">
        
                <h1 style="color: rgb(17, 214, 70);">Formulir Pengajuan Magang/PKL</h1>
                <h1 style="color: rgb(17, 214, 70);">Balai Pengkajian Teknologi Pertanian Jakarta</h1>
                
                <br>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama<label style="color: red;">*</label></label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="asalinstansi" class="form-label">Asal Instansi/Sekolah/Perguruan Tinggi<label style="color: red;">*</label></label>
                        <input type="text" class="form-control" id="asalinstansi" name="asalinstansi" required>
                    </div>
                    <div class="mb-3">
                        <label for="noinduk" class="form-label">Nomor Induk<label style="color: red;">*</label></label>
                        <input type="text" class="form-control" id="noinduk" name="noinduk" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat<label style="color: red;">*</label></label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="notelp" class="form-label">Nomor Telepon<label style="color: red;">*</label></label>
                        <input type="number" class="form-control" id="notelp" name="notelp" required>
                        <div id="numberHelp" class="form-text">We'll never share your phone number with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address<label style="color: red;">*</label></label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="bulan" class="form-label">Bulan Magang<label style="color: red;">*</label></label>
                        <input type="text" class="form-control" id="bulan" name="bulan" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bidang Materi<label style="color: red;">*</label></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bidangmateri" id="budidaya" value="Budidaya">
                            <label class="form-check-label" for="budidaya">
                                Budidaya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bidangmateri" id="pascapanen" value="Pasca Panen">
                            <label class="form-check-label" for="pascapanen">
                                Pasca Panen
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bidangmateri" id="peternakan" value="Peternakan">
                            <label class="form-check-label" for="peternakan">
                                Peternakan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bidangmateri" id="sosekonomi" value="Sosial Ekonomi">
                            <label class="form-check-label" for="sosekonomi">
                                Sosial Ekonomi
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bidangmateri" id="smk" value="SMA/SMK">
                            <label class="form-check-label" for="smk">
                                SMA/SMK
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bidangmateri" id="yglainnya" value="">
                            <label class="form-check-label" for="yglainnya">
                                Yang Lainnya:
                            </label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="yglainnya" name="yglainnya" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" >Upload Dokumen<label style="color: red;">*</label></label>
                        <input type="file" class="form-control" name="dokumen" aria-describedby="fileHelp" required>
                        <div id="fileHelp" class="form-text">Upload surat permohonan dalam bentuk gambar atau pdf.</div>
                    </div>
                    <button type="submit" name="kirim" class="btn btnhijau">Kirim</button>
                </form>
            </div>
        </div>
    </div>

    <br><br>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
   
    </body>
</html>