
<?php  

include "../helper/crud.php";
$crud = new Crud();

$logo     = $_FILES['logo']["tmp_name"];

$target_file = "../../assets/images/" . basename($_FILES["logo"]["name"]);

if (move_uploaded_file($logo, $target_file)) {
    $data = array(
        'kop_surat'  => $_POST['kop_surat'],
        'logo'       => basename($_FILES["logo"]["name"])
    );
}
$res = $crud->insert("tb_format_surat",$data);

if ($res) {
    header("location:../index.php?page=view_format_surat");
}

?>