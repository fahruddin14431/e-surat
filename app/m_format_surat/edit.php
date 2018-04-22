
<?php  

include "../helper/crud.php";
$crud = new Crud();

$id_format_surat = $_POST['id_format_surat'];
$logo            = $_FILES['logo'];

if(isset($logo)){
    $target_file = "../../assets/images/" . basename($_FILES["logo"]["name"]);
    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
        $data = array(
            'kop_surat' => $_POST['kop_surat'],
            'logo'      => basename( $_FILES["logo"]["name"])
        );  
    }
}else{
    $data = array(
        'kop_surat' => $_POST['kop_surat']
    );    
}
$res = $crud->update("tb_format_surat", $data, "id_format_surat = '$id_format_surat'");

if ($res) {
    header("location:../index.php?page=view_format_surat");
}

?>