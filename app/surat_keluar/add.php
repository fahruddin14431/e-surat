<!-- Bootstrap Core CSS -->
<link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<?php 

include "../helper/crud.php";
include "../../assets/mpdf/mpdf.php";

$mpdf = new mPDF();
$mpdf->debug = true;
$mpdf->allow_output_buffering = true;

// format surat
$crud   = new Crud();
$result = $crud->view("SELECT * FROM tb_format_surat")[0];

$logo           = "../../assets/images/" . $result['logo'];
$kop            = $result['kop_surat'];
$isi            = $_POST['isi_surat'];
$dinas          = $_POST['id_pegawai'];
$id_jenis_surat = $_POST['id_jenis_surat'];

$get_jenis_surat = $crud->view("SELECT * FROM tb_jenis_surat WHERE id_jenis_surat='$id_jenis_surat'")[0];

ob_start();
?>

<!-- start template -->
<table class="table table-bordered">
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
            <p>Nomor : <?= $get_jenis_surat['no_surat']?> </p>
            <br>
            <p>Lampiran : </p>
            <br>
            <p>Perihal :<?= $get_jenis_surat['jenis_surat']?> </p>

        </td>
        <td colspan="6">
            <b>Kepada</b>
            <p>Yth</p>
                <?php
                foreach ($dinas as $key => $value) {
                    $key++;
                    $get_nama_dinas = $crud->view("SELECT nama FROM tb_pegawai WHERE id_pegawai='$value'")[0];
                    echo $key.".".$get_nama_dinas['nama']."<br>";
                }
                ?>
        </td>
    </tr>
    <tr>
        <td colspan="12">
            <?= $isi ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="9" class="text-center">
            <p>
                Kepala Badan Kepegawaian Pendidikan dan Pelatihan<br>
                Daerah Kabupaten Manggarai Barat <br><br><br><br>
            
                <b><u>Ir. Sebastiana Wantung</u></b><br>
                Pembina Utama Muda <br>
                NIP. 196508041997031002
            </p>
        </td>
    </tr>
    <tr>
        <td colspan="9"></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
<!-- end start -->


<?php 
$id_surat_keluar = $crud->makeId("tb_surat_keluar", "id_surat_keluar", "SUK");

$html = ob_get_contents();
ob_end_clean();
$stylesheet = file_get_contents('../../assets/plugins/bootstrap/css/bootstrap.min.css'); // external css
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html,2);

$post_file = "../../file/".$id_surat_keluar.".pdf";

$mpdf->Output($post_file,"F");

// insert surat keluar
$data = array(
    'id_surat_keluar' => $id_surat_keluar,
    'id_jenis_surat'  => $id_jenis_surat,
    'file_surat'      => $id_surat_keluar.".pdf"
);

$res = $crud->insert("tb_surat_keluar",$data);

foreach ($_POST['id_pegawai'] as $id_pegawai) {
    $data1 = array(
        'id_pegawai'      => $id_pegawai,
        'id_surat_keluar' => $id_surat_keluar    
    );
    
    $res1 = $crud->insert("tb_detail_surat_keluar",$data1);
}

if ($res && $res1) {
    header("location:../index.php?page=view_surat_keluar");
}

?>