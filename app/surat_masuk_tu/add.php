
<?php  

include "../helper/crud.php";
include "../../assets/mpdf/mpdf.php";

$crud = new Crud();

$mpdf = new mPDF();
$mpdf->debug = true;
$mpdf->allow_output_buffering = true;

$result = $crud->view("SELECT * FROM tb_format_surat")[0];

$logo   = "../../assets/images/" . $result['logo'];
$kop    = $result['kop_surat'];

ob_start();
?>
<!-- start template -->
<table class="table">
    <tr>
        <td colspan="2" class="text-center">
            <img src="<?= $logo ?>" width="100px" height="100px">
        </td>
        <td colspan="10" class="text-center">
            <?= $kop ?>
        </td>
    </tr>
    <tr>
        <td colspan="6">      
            <p>KARTU DISPOSISI</p>
        </td>
        <td colspan="6">
            <p>Tanggal : <?= date("d-m-Y", strtotime($_POST['tgl_penerimaan'])); ?></p>
        </td>
    </tr>
    <tr>
        <td colspan="6">      
            <p>Indeks Masalah : <?= $_POST['indeks_masalah'] ?></p>
        </td>
        <td colspan="6">
            <p>No Agenda : <?= $_POST['no_agenda'] ?></p>
        </td>
    </tr>
    <tr>
        <td colspan="12">      
            <p>Perihal : <?= $_POST['perihal'] ?></p>
        </td>        
    </tr>
    <tr>
        <td colspan="12">      
            <?php 
                $id_user = $_POST['id_user'];
                $nama = $crud->view("SELECT nama FROM tb_user WHERE id_user ='$id_user'")[0]['nama'];
            ?>
            <p>Dari : <?= $nama ?></p>
        </td>        
    </tr>
    <tr>
        <td colspan="6">      
            <p>Tanggal Surat : <?= date("d-m-Y", strtotime($_POST['tgl_surat'])); ?></p>
        </td>
        <td colspan="6">
            <p>No Surat : <?= $_POST['no_surat'] ?></p>
        </td>
    </tr>
    <tr>
        <td colspan="6">      
            <p>Instruksi Kepala BKPPD : <?= $_POST['instruksi'] ?></p>
        </td>
        <td colspan="6">
            <p>Kepada Sekertasis BKPPD </p>
        </td>
    </tr>
    <tr>
        <td colspan="6">      
        </td>
        <td colspan="6">
            <?php 
                $id_jabatan = $_POST['id_jabatan'];
                $jabatan = $crud->view("SELECT jabatan FROM tb_jabatan WHERE id_jabatan ='$id_jabatan'")[0]['nama'];
            ?>
            <p>Diteruskan Kepada : <?= $jabatan ?></p>
        </td>        
    </tr>
    
</table>
<!-- end start -->
<?php 

$html = ob_get_contents();
ob_end_clean();
$stylesheet = file_get_contents('../../assets/plugins/bootstrap/css/bootstrap.min.css'); // external css
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html,2);

$id_surat_masuk  = $crud->makeId("tb_surat_masuk", "id_surat_masuk", "SUM");
$scan_surat      = $_FILES['scan_surat']["tmp_name"];
$scan_surat2     = $_FILES['scan_surat2']["tmp_name"];

$target_file  = "../../file/surat_masuk/" . $id_surat_masuk."-1.".strtolower(pathinfo(basename($_FILES["scan_surat"]["name"]),PATHINFO_EXTENSION));

$post_file    = "../../file/surat_masuk/" . $id_surat_masuk.".pdf";

$mpdf->Output($post_file,"F");

if (move_uploaded_file($scan_surat, $target_file)) {

    if(isset($scan_surat2)){
        $target_file2 = "../../file/surat_masuk/" . $id_surat_masuk."-2.".strtolower(pathinfo(basename($_FILES["scan_surat2"]["name"]),PATHINFO_EXTENSION));
        move_uploaded_file($scan_surat2, $target_file2);
    }
    $data = array(
        'id_surat_masuk'            => $id_surat_masuk,
        'id_user'                   => $_POST['id_user'],
        'no_surat'                  => $_POST['no_surat'],
        'no_agenda'                 => $_POST['no_agenda'],
        'indeks_masalah'            => $_POST['indeks_masalah'],
        'perihal'                   => $_POST['perihal'],
        'tanggal_surat_penerimaan'  => $_POST['tgl_penerimaan'],
        'tanggal_surat'             => $_POST['tgl_surat'],        
        'instruksi'                 => $_POST['instruksi'],        
        'file_surat'                => $id_surat_masuk.".pdf",        
        'scan_surat'                => $id_surat_masuk."-1.".strtolower(pathinfo(basename($_FILES["scan_surat"]["name"]),PATHINFO_EXTENSION)),        
    );    
    if(!empty($scan_surat2)){
       $data+=array('scan_surat2'=> $id_surat_masuk."-2.".strtolower(pathinfo(basename($_FILES["scan_surat2"]["name"]),PATHINFO_EXTENSION)));
    }
}
$res = $crud->insert("tb_surat_masuk", $data);

$res2;
foreach ($_POST['distribusi'] as $value) {
    $data = array(
        "id_surat_masuk"    => $id_surat_masuk,
        "id_jabatan"        => $value
    );
    $res2 = $crud->insert("tb_detail_surat_masuk", $data);
}

$res3 = $crud->insert("tb_detail_surat_masuk", array(
                                                    "id_surat_masuk"    => $id_surat_masuk,
                                                    "id_jabatan"        => $_POST['id_jabatan']
                                                ));

if ($res & $res2 & $res3) {
    header("location:../index.php?page=view_surat_masuk_tu");
}
?>