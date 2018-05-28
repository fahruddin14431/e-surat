
<?php  
$id_user = $_GET['id_user'];

$crud = new Crud();
$res  = $crud->delete("tb_user","id_user = '$id_user'");

if ($res) {
    header("location:index.php?page=view_dinas");
}
?>