<?php setlocale (LC_TIME, 'id_ID'); ?>
<div class="container text-justify">
        <br>
        <h3>Pelayanan PKL/Magang/Penelitian</h3>
        <br>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card" style="width: 17rem;">
                    <img src="<?php echo base_url() ?>assets/smartbptp/img/kunjungan2.jpg" class="card-img-top" alt="...">
                  </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="width: 17rem;">
                    <img src="<?php echo base_url() ?>assets/smartbptp/img/kunjungan2.jpg" class="card-img-top" alt="...">
                  </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="width: 17rem;">
                    <img src="<?php echo base_url() ?>assets/smartbptp/img/kunjungan2.jpg" class="card-img-top" alt="...">
                  </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="width: 17rem;">
                    <img src="<?php echo base_url() ?>assets/smartbptp/img/kunjungan2.jpg" class="card-img-top" alt="...">
                  </div>
            </div>
        </div>
    </div>
    

    <div class="container text-justify">
            <br>
            <p>BPTP Jakarta membuka kesempatan siswa Sekolah Menengah Kejuruan untuk melakukan Praktek Kerja Lapangan, serta kesempatan dan peluang kerjasama magang dan penelitian bagi Perguruan Tinggi yang berminat melakukan praktek lapangan/magang ataupun penelitian khususnya mengenai pertanian perkotaan di BPTP Jakarta.</p>
            <a href="<?php echo base_url('magang/daftar') ?>" class="btn btnhijau">Daftar Disini</a>
            <br>
    </div>

    <div class="container"></div>

    <div class="container table-responsive-sm">
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