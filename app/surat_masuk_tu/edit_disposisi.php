
<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_surat_masuk = $_POST['id_surat_masuk'];
$scan_surat     = $_FILES['scan_surat']["tmp_name"];
$target_file    = "../../file/surat_masuk/" . basename($_FILES["scan_surat"]["name"]);

if(empty($scan_surat)){
    $data = array(
        'id_user'                   => $_POST['id_user'],
        'no_surat'                  => $_POST['no_surat'],
        'no_agenda'                 => $_POST['no_agenda'],
        'perihal'                   => $_POST['perihal'],
        'tanggal_surat'             => $_POST['tgl_surat'],        
    );    

}else if (move_uploaded_file($scan_surat, $target_file)) {
    $data = array(
        'id_user'                   => $_POST['id_user'],
        'no_surat'                  => $_POST['no_surat'],
        'no_agenda'                 => $_POST['no_agenda'],
        'perihal'                   => $_POST['perihal'],
        'tanggal_surat'             => $_POST['tgl_surat'],        
        'file_surat'                => basename($_FILES["scan_surat"]["name"])
    );    
}
$res = $crud->update("tb_surat_masuk", $data, "id_surat_masuk = '$id_surat_masuk'");
if ($res) {
    header("location:../index.php?page=view_surat_masuk_tu");
}

?>