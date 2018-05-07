
<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_surat_masuk = $crud->makeId("tb_surat_masuk", "id_surat_masuk", "SUM");
$scan_surat     = $_FILES['scan_surat']["tmp_name"];

$target_file = "../../file/surat_masuk/" . basename($_FILES["scan_surat"]["name"]);

if (move_uploaded_file($scan_surat, $target_file)) {
    $data = array(
        'id_surat_masuk' => $id_surat_masuk,
        'tanggal'        => date("Y-m-d"),
        'file_surat'     => basename($_FILES["scan_surat"]["name"])
    );    
}

$res = $crud->insert("tb_surat_masuk", $data);

if ($res) {
    header("location:../index.php?page=view_surat_masuk_tu");
}

?>