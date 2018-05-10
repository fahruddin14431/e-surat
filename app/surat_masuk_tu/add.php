
<?php  

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../helper/crud.php";
$crud = new Crud();

$id_surat_masuk = $crud->makeId("tb_surat_masuk", "id_surat_masuk", "SUM");
$scan_surat     = $_FILES['scan_surat']["tmp_name"];

$target_file = "../../file/surat_masuk/" . basename($_FILES["scan_surat"]["name"]);

if (move_uploaded_file($scan_surat, $target_file)) {
    $data = array(
        'id_surat_masuk'            => $id_surat_masuk,
        'no_surat'                  => $_POST['no_surat'],
        'perihal'                   => $_POST['perihal'],
        'tanggal_surat_penerimaan'  => $_POST['tgl_penerimaan'],
        'tanggal_surat'             => $_POST['tgl_surat'],        
        'id_jabatan'                => $_POST['id_jabatan'],        
        'file_surat'                => basename($_FILES["scan_surat"]["name"])
    );    

}

$res = $crud->insert("tb_surat_masuk", $data);

if ($res) {
    header("location:../index.php?page=view_surat_masuk_tu");
}

?>