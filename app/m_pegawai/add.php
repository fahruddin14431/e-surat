
<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_user = $crud->makeId("tb_user", "id_user", "PEG");

// insert pegawai
$data = array(
    'id_user'    => $id_user,
    'nip'        => $_POST['nip'], 
    'nama'       => $_POST['nama'], 
    'id_jabatan' => $_POST['id_jabatan']
);

$res = $crud->insert("tb_user",$data);

// insert login
$data1 = array(
    'nama_pengguna' => $_POST['nama_pengguna'], 
    'kata_sandi'    => $_POST['kata_sandi'], 
    'id_user'       => $id_user,
    'status'        => $_POST['status']
);

$res1 = $crud->insert("tb_login",$data1);

if ($res && $res1) {
    header("location:../index.php?page=view_user");
}

?>