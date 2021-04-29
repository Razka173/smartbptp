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
        
                <h1 style="color: rgb(17, 214, 70);">Formulir Pengajuan Studi Banding, Kunjungan Edukatif, Pelatihan Teknologi Pertanian Perkotaan</h1>
                
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
                        <input type="tel" class="form-control" id="notelp" name="notelp" required>
                        <div id="numberHelp" class="form-text">We'll never share your phone number with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address<label style="color: red;">*</label></label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="tglkunjungan" class="form-label">Tanggal Hari Kunjungan<label style="color: red;">*</label></label>
                        <input type="text" class="form-control" id="tglkunjungan" name="tglkunjungan" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tujuan Kunjungan<label style="color: red;">*</label></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tujuankunjungan" id="studibanding" value="Studi Banding">
                            <label class="form-check-label" for="studibanding">
                                Studi Banding
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tujuankunjungan" id="kunjunganedu" value="Kunjungan Edukatif">
                            <label class="form-check-label" for="kunjunganedu">
                                Kunjungan Edukatif
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tujuankunjungan" id="pelatihan" value="Pelatihan">
                            <label class="form-check-label" for="pelatihan">
                                Pelatihan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tujuankunjungan" id="yglainnya" value="">
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
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
   
    </body>
</html>