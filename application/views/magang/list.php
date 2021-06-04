<?php setlocale (LC_TIME, 'id_ID'); ?>
<div class="container text-justify">
        <br>
        <h3>Pelayanan PKL/Magang/Penelitian</h3>
        <br>
    </div>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-2">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="<?php echo base_url() ?>assets/smartbptp/img/kunjungan.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="<?php echo base_url() ?>assets/smartbptp/img/kunjungan.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="<?php echo base_url() ?>assets/smartbptp/img/kunjungan.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            <div class="col-mb-2 text-justify">
                <p>BPTP Jakarta menerima permohonan untuk melakukan studi banding, kunjungan edukatif, dan pelatihan pertanian perkotaan. Berbagai fasilitas dan teknologi hasil pengkajian yang terdapat di BPTP Jakarta menjadi materi yang menarik untuk dikunjungi dan dipelajari.</p>
                <a href="form/form-pelatihan.php" class="btn btnhijau">Daftar Disini</a>
            </div>
        </div>
    </div>

    <div class="container"></div>

    <div class="container table-responsive">
        <br> <br>
        <h5>Daftar Mahasiswa PKL Tahun <?php echo date("Y"); ?></h5>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Instansi</th>
                <th scope="col">Waktu Pelaksanaan</th>
            </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($pkl as $pkl){?>
            <tr>
                <th scope="row"><?php echo $no ?></th>
                <td><?php echo $pkl->nama; if($pkl->jumlah_anggota>1){echo " (kelompok)";}?></td>
                <td><?php echo $pkl->instansi ?></td>
                <td><?php echo strftime('%B %Y', strtotime($pkl->tanggal_masuk)) ?></td>
            </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
    </div>