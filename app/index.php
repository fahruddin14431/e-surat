<?php
session_start();
include "helper/auth.php";
$auth = new Auth();		

ob_start();
if (empty($_SESSION['sess_user'])) {
    header("location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
	<title>E-surat</title>
	<!-- box css -->
	<link href="../assets/css/box.css" rel="stylesheet">
	<!-- Bootstrap Core CSS -->
	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- chartist CSS -->
	<!-- <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
	<link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
	<link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet"> -->
	<!--This page css - Morris CSS -->
	<link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="../assets/css/style.css" rel="stylesheet">
	<!-- You can change the theme colors from here -->
	<link href="../assets/css/colors/blue.css" id="theme" rel="stylesheet">
	<!-- data table -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
	<!-- custom css -->
	<style>
	* {
		font-size: 13px;
		line-height: 1.428;
	}
	</style>
	<!-- All Jquery -->
	<script src="../assets/plugins/jquery/jquery.min.js"></script>
	
	<!-- select2 -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<!-- data table -->
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

	<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>

</head>
	<!-- ckeditorr -->
	<script src="//cdn.ckeditor.com/4.9.2/full-all/ckeditor.js"></script>

<body class="fix-header fix-sidebar card-no-border">
   
	<!-- Preloader - style you can find in spinners.css -->
   
	<!-- <div class="preloader">
		<svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
	</div> -->
   
	<!-- Main wrapper - style you can find in pages.scss -->
   
	<div id="main-wrapper">
	   
		<!-- Topbar header - style you can find in pages.scss -->
	   
		<header class="topbar">
			<nav class="navbar top-navbar navbar-toggleable-sm navbar-light">			   
				<!-- Logo -->			   
				<div class="navbar-header">
					<a class="navbar-brand" href="index.html">
						<!-- Logo icon --><b>
							<!--You can put here icon as well / <i class="wi wi-sunset"></i> /-->				
							<!-- Light Logo icon -->
							<img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
						</b>
						<!--End Logo icon -->
						<!-- Logo text --><span>						 
						 <!-- Light Logo text -->    
						 <!-- <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a> -->
						 <b style="font-size:15px;color:white">Korespondensi Digital</b>
						 
				</div>			   
				<!-- End Logo -->			   
				<div class="navbar-collapse">				   
					<!-- toggle and nav items -->				   
					<ul class="navbar-nav mr-auto mt-md-0">
						<!-- This is  -->
						<li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>					   
						<!-- Search -->					   
						<!-- <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a> -->
							<!-- <form class="app-search">
								<input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form> -->
						<!-- </li> -->
					</ul>
				   
					<!-- User profile and search -->
				   
					<ul class="navbar-nav my-lg-0">
					   
						<!-- Profile -->
					   
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/user.png" alt="user" class="profile-pic m-r-10" />
								<?= $auth->getUser($_SESSION['sess_user']['sess_id_user'])." - <b>".$_SESSION['sess_user']['sess_status']."</b>" ?>					
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>
	   
		<!-- End Topbar header -->
	   
	   
		<!-- Left Sidebar - style you can find in sidebar.scss  -->
	   
		<aside class="left-sidebar">
			<!-- Sidebar scroll-->
			<div class="scroll-sidebar">
				<!-- Sidebar navigation-->
				<nav class="sidebar-nav">
					<ul id="sidebarnav">

					<!-- ROLE MENU ACTOR -->
					<!-- global menu -->
					<li> 
						<a class="waves-effect waves-dark" href="index.php?page=view_dashbord" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu"> Dashboard</span></a>
					</li>				
					<?php if($auth->isKepalaBadan()): ?>
						<li> 
							<a class="waves-effect waves-darkenvelope-open" href="index.php?page=view_surat_masuk_tu" aria-expanded="false"><i class="fa fa-envelope-open"></i><span class="hide-menu"> Surat Masuk</span></a>
						</li>
						<li> 
							<a class="waves-effect waves-dark" href="index.php?page=view_surat_keluar" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu">Surat Keluar</span></a>
						</li>
					<?php elseif($auth->isAdmin()): ?>
						<li> 
							<a class="waves-effect waves-dark" href="index.php?page=view_user" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu"> Master User</span></a>
						</li>
						<li> 
							<a class="waves-effect waves-dark" href="index.php?page=view_jenis_surat" aria-expanded="false"><i class="fa fa-tags"></i><span class="hide-menu"> Master Jenis Surat</span></a>
						</li>
						<li> 
							<a class="waves-effect waves-dark" href="index.php?page=view_format_surat" aria-expanded="false"><i class="fa fa-file"></i><span class="hide-menu"> Master Format Surat</span></a>
						</li>
					<?php elseif($auth->isTU()): ?>						
						<li> 
							<a class="waves-effect waves-darkenvelope-open" href="index.php?page=view_surat_masuk_tu" aria-expanded="false"><i class="fa fa-envelope-open"></i><span class="hide-menu">Transaksi Surat Masuk</span></a>
						</li>
						<li> 
							<a class="waves-effect waves-dark" href="index.php?page=view_surat_keluar" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu">Transaksi Surat Keluar</span></a>
						</li>
						<li> 
							<a class="waves-effect waves-dark" href="index.php?page=view_laporan_surat_masuk" aria-expanded="false"><i class="fa fa-clipboard"></i><span class="hide-menu"> Laporan Surat Masuk</span></a>
						</li>
						<li> 
							<a class="waves-effect waves-dark" href="index.php?page=view_laporan_surat_keluar" aria-expanded="false"><i class="fa fa-clipboard"></i><span class="hide-menu"> Laporan Surat Keluar</span></a>
						</li>
					<?php elseif($auth->isInstansi()): ?>
						<li> 
							<a class="waves-effect waves-darkenvelope-open" href="index.php?page=view_surat_masuk" aria-expanded="false"><i class="fa fa-envelope-open"></i><span class="hide-menu"> Surat Masuk</span></a>
						</li>
						<!-- <li> 
							<a class="waves-effect waves-dark" href="index.php?page=view_laporan_surat_masuk" aria-expanded="false"><i class="fa fa-clipboard"></i><span class="hide-menu"> Laporan Surat Masuk</span></a>
						</li>
						<li> 
							<a class="waves-effect waves-dark" href="index.php?page=view_laporan_surat_keluar" aria-expanded="false"><i class="fa fa-clipboard"></i><span class="hide-menu"> Laporan Surat Keluar</span></a>
						</li> -->
					<?php elseif($auth->isBidang()): ?>
						<li> 
							<a class="waves-effect waves-darkenvelope-open" href="index.php?page=view_surat_masuk_tu" aria-expanded="false"><i class="fa fa-envelope-open"></i><span class="hide-menu"> Surat Masuk</span></a>
						</li>
						<li> 
							<a class="waves-effect waves-darkenvelope-open" href="index.php?page=view_surat_keluar" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu"> Surat Keluar</span></a>
						</li>
						<li> 
							<a class="waves-effect waves-dark" href="index.php?page=view_laporan_surat_masuk" aria-expanded="false"><i class="fa fa-clipboard"></i><span class="hide-menu"> Laporan Surat Masuk</span></a>
						</li>
						<li> 
							<a class="waves-effect waves-dark" href="index.php?page=view_laporan_surat_keluar" aria-expanded="false"><i class="fa fa-clipboard"></i><span class="hide-menu"> Laporan Surat Keluar</span></a>
						</li>
					<?php endif ?>
					
					<!-- global menu -->
					

					<!-- ROLE MENU ACTOR -->
					</ul>
				</nav>
				<!-- End Sidebar navigation -->
			</div>
			<!-- End Sidebar scroll-->
			<!-- Bottom points-->
			<div class="sidebar-footer">
				<!-- item--><a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
				<!-- item--><a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
				<!-- item--><a href="../logout.php" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>
			<!-- End Bottom points-->
		</aside>
	   
		<!-- End Left Sidebar - style you can find in sidebar.scss  -->
	   
	   
		<!-- Page wrapper  -->
	   
		<div class="page-wrapper">
		   
			<!-- Container fluid  -->
		   
			<div class="container-fluid"><br>
				<!-- Start Page Content -->              

				<?php

				$page = isset( $_GET['page'])?$_GET['page']:"";

				if($page){
					
					if($page == "view_dashbord"){
						include "dashbord/view.php";

					// menu admin

					// m_pegawai
					}else if($page == "view_user"){
						include "m_pegawai/view.php";
					}else if($page == "add_user"){
						include "m_pegawai/add_form.php";
					}else if($page == "edit"){
						include "m_pegawai/edit_form.php";
					}else if($page == "delete"){
						include "m_pegawai/delete.php";
					}
					//end m_pegawai

					// m_jenis_surat
					else if($page == "view_jenis_surat"){
						include "m_jenis_surat/view.php";		
					}else if($page == "add_jenis_surat"){
						include "m_jenis_surat/add_form.php";
					}else if($page == "detail"){
						include "m_jenis_surat/detail.php";
					}else if($page == "edit_jenis_surat"){
						include "m_jenis_surat/edit_form.php";
					}else if($page == "delete_jenis_surat"){
						include "m_jenis_surat/delete.php";
					}
					// end m_jenis_surat

					else if($page == "view_format_surat"){
						include "m_format_surat/view.php";		
					}else if($page == "add_format_surat"){
						include "m_format_surat/add_form.php";		
					}else if($page == "edit_format_surat"){
						include "m_format_surat/edit_form.php";		
					}else if($page == "delete_format_surat"){
						include "m_format_surat/delete.php";		
					}

					// m_dinas
					else if($page == "view_dinas"){
						include "m_dinas/view.php";		
					}else if($page == "add_dinas"){
						include "m_dinas/add_form.php";	
					}else if($page == "edit_dinas"){
						include "m_dinas/edit_form.php";
					}else if($page == "delete_dinas"){
						include "m_dinas/delete.php";
					}
					// end m_dinas

					// end admin

					// TU

					// surat keluar
					else if($page == "view_surat_keluar"){
						include "surat_keluar/view.php";
					}else if($page == "add_surat_keluar"){
						include "surat_keluar/add_form.php";
					}else if($page == "acc_surat_keluar"){
						include "surat_keluar/acc_surat.php";
					}else if($page == "edit_surat_keluar"){
						include "surat_keluar/edit_form.php";
					}else if($page == "delete_surat_keluar"){
						include "surat_keluar/delete.php";
					}
					// end surat keluar

					// surat masuk
					else if($page == "view_surat_masuk_tu"){
						include "surat_masuk_tu/view.php";
					}else if($page == "add_surat_masuk"){
						include "surat_masuk_tu/add_form.php";
					}else if($page == "edit_surat_masuk_tu"){
						include "surat_masuk_tu/edit_form.php";
					}else if($page == "delete_surat_masuk"){
						include "surat_masuk_tu/delete.php";
					}
					// end  surat masuk

					else if($page == "view_disposisi"){
						include "surat_masuk_tu/view_disposisi.php";
					}else if($page == "add_form_disposisi"){
						include "surat_masuk_tu/add_form_disposisi.php";
					}

					// end TU

					// dinas

					else if($page == "view_surat_masuk"){
						include "surat_masuk/view.php";
					}

					// end dinas

					// kepala dinas
					else if($page == "view_disposisi"){
						include "surat_masuk_tu/view_disposisi.php";
					}else if($page == "add_disposisi"){
						include "surat_masuk_tu/add_disposisi.php";
					}
					// end kepala dinas

					// laporan
					else if($page == "view_laporan_surat_keluar"){
						include "laporan/view_surat_keluar.php";
					}else if($page == "view_laporan_surat_masuk"){
						include "laporan/view_surat_masuk.php";
					}

				}else{
					include "dashbord/view.php";
				}
				
				?>
			   
				<!-- End PAge Content -->               
			</div>
			<!-- End Container fluid  -->  
			<!-- footer -->
			<footer class="footer"> E-surat <?= date("Y-m-d") ?> </footer>
			<!-- End footer -->
		</div>
		<!-- End Page wrapper  -->
	</div>
	<!-- End Wrapper -->
	
	<!-- Bootstrap tether Core JavaScript -->
	<script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- slimscrollbar scrollbar JavaScript -->
	<script src="../assets/js/jquery.slimscroll.js"></script>
	<!--Wave Effects -->
	<script src="../assets/js/waves.js"></script>
	<!--Menu sidebar -->
	<script src="../assets/js/sidebarmenu.js"></script>
	<!--stickey kit -->
	<script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
	<!--Custom JavaScript -->
	<script src="../assets/js/custom.min.js"></script>
	<!-- This page plugins -->
	<!-- chartist chart -->
	<script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
	<script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
	<!--c3 JavaScript -->
	<script src="../assets/plugins/d3/d3.min.js"></script>
	<script src="../assets/plugins/c3-master/c3.min.js"></script>
	<!-- Chart JS -->
	<script src="../assets/js/dashboard1.js"></script>
	
	<script>

	$(document).ready(function() {
		$('#data_table').DataTable({
			responsive: true,
			"language": {
				"sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
				"sProcessing":   "Sedang memproses...",
				"sLengthMenu":   "Tampilkan _MENU_ entri",
				"sZeroRecords":  "Tidak ditemukan data yang sesuai",
				"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
				"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
				"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
				"sInfoPostFix":  "",
				"sSearch":       "Cari:",
				"sUrl":          "",
				"oPaginate": {
					"sFirst":    "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext":     "Selanjutnya",
					"sLast":     "Terakhir"
				}
        	}
			<?= $_GET['page']=="view_format_surat"?",searching: false":"" ?>
		});
	});
	</script>
</body>
</html>