<?php 

session_start();

include 'app/helper/crud.php';

$nama_pengguna = $_POST['nama_pengguna'];
$kata_sandi    = $_POST['kata_sandi'];

// fecth data
$crud   = new Crud();
$sql    = "SELECT * FROM tb_login WHERE nama_pengguna = '$nama_pengguna' AND kata_sandi = '$kata_sandi'";
$check  = $crud->checkIfExist($sql);

// check condition
$_SESSION['sess_user'] = array();
if ($check) {
    $res = $crud->view($sql)[0];
    $_SESSION['sess_user'] = array(
        "sess_nama_pengguna" => $res['nama_pengguna'],
        "sess_id_user"    => $res['id_user'],
        "sess_status"        => $res['status']
    );
    header("location:app/index.php?page=view_dashbord");
}else{
    echo "<script>alert('Login Gagal'); window.location = '../e-surat';</script>";
}




?>