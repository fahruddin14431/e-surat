<div class="row">

	<div class="col-lg-10 col-xs-12">
		<div class="box box-danger">
			<div class="inner">
				<h2 class="white-text strong">
					Badan Kepegawaian Pendidikan dan Pelatihan Daerah Kabupaten Manggarai Barat-Flores – NTT 
					<br>
					<?= $auth->getUser($_SESSION['sess_user']['sess_id_user']) ?>
				</h2>
				<h3><marquee>selamat datang di aplikasi korespondensi digital berbasis website pada Badan Kepegawaian Pendidikan dan Pelatihan daerah kabupaten Manggarai Barat</marquee></h3>
				<?php 
				$id_user = $_SESSION['sess_user']['sess_id_user'];
				$crud    = new Crud();
				$image   = $crud->view("SELECT gambar FROM tb_user WHERE id_user = '$id_user'")[0]['gambar'];
				?>
				<img src="../assets/images/<?= !empty($image)?"dashbord/".$image:"bg.jpeg" ?>" width="100%">
				<br><br>
				<p><i>Oleh Maria Philomena Erni</i></p>
				<br>
			</div>
			<div class="icon">
				<i class="md md-description"></i>
			</div>
			<a href="#" class="small-box-footer">Panel Info
				<i class="fa fa-info-circle"></i>
			</a>
		</div>
	</div>

</div> 