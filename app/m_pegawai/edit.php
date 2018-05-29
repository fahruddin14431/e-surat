
<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_user = $_POST['id_user'];

// update pegawai
$data = array(
    'nip'        => $_POST['nip'], 
    'nama'       => $_POST['nama'], 
    'id_jabatan' => $_POST['id_jabatan']
);

$res = $crud->update("tb_user",$data, "id_user = '$id_user'");

// update login
$data1 = array(
    'status'        => $_POST['status']
);

$res1 = $crud->update("tb_login",$data1, "id_user = '$id_user'");

if ($res && $res1) {
    header("location:../index.php?page=view_user");
}

?>