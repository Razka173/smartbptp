<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-center mb-4">
	<h1 class="h3 mb-0 text-gray-800">Buku Tamu</h1>
</div>

<div class="row">

<!-- PENGUNJUNG HARI INI -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengunjung hari ini</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hari_ini->total ?> Orang</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- PENGUNJUNG MINGGU INI -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengunjung minggu ini</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $minggu_ini->total ?> Orang</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- PENGUNJUNG BULAN INI -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pengunjung Bulan ini</div>
          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $bulan_ini->total ?> Orang</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- PENGUNJUNG TAHUN INI -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pengunjung Tahun ini</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tahun_ini->total ?> Orang</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-around mb-4">
  <h1 class="h3 mb-0 text-gray-800">Magang/PKL</h1>
  <h1 class="h3 mb-0 text-gray-800">Pelatihan Teknologi</h1>
</div>

<div class="row">

<!-- PENGUNJUNG HARI INI -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Peserta magang/pkl bulan ini</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hari_ini->total ?> Orang</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- PENGUNJUNG MINGGU INI -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Peserta Magang/pkl</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $minggu_ini->total ?> Orang</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- PENGUNJUNG BULAN INI -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pelatihan Teknologi bulan ini</div>
          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $bulan_ini->total ?> Orang</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- PENGUNJUNG TAHUN INI -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Pelatihan Teknologi</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tahun_ini->total ?> Orang</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>