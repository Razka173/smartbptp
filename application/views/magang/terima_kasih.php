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

<?php 
header("Refresh:10; url={$url}");
?>
<div class="row h-100">
	<div class="col-sm-12 my-auto">
		<div class="jumbotron text-center">
			<h2 class="display-3">Terima kasih sudah mendaftar!</h2>
            <p>Dimohon segera konfirmasi ke kantor BPTP Jakarta di hari kerja</p>
		</div>
	</div>
</div>
