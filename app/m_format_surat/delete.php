
<?php  
$id_format_surat = $_GET['id_format_surat'];

$crud = new Crud();

// delete image
$image = $crud->view("SELECT * FROM tb_format_surat WHERE id_format_surat = '$id_format_surat'")[0]['logo'];            
$target_file = "../assets/images/" . $image;
unlink($target_file);

$res  = $crud->delete("tb_format_surat","id_format_surat = '$id_format_surat'");
if ($res) {
    header("location:index.php?page=view_format_surat");
}
?>