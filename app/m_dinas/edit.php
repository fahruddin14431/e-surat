
<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_user = $_POST['id_user'];

$data = array(
    'nama'       => $_POST['nama']
);

$res = $crud->update("tb_user",$data, "id_user = '$id_user'");

if ($res) {
    header("location:../index.php?page=view_dinas");
}

?>