
<?php  

include "../helper/crud.php";
$crud = new Crud();

$data = array(
    'no_surat'    => $_POST['no_surat'],
    'jenis_surat' => $_POST['jenis_surat'],
    'isi_surat'   => $_POST['isi_surat']
);

$res = $crud->insert("tb_jenis_surat",$data);

if ($res) {
    header("location:../index.php?page=view_jenis_surat");
}

?>