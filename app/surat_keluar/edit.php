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

$id_format_surat= $_POST['id_format_surat'];
$result         = $crud->view("SELECT * FROM tb_format_surat WHERE id_format_surat='$id_format_surat'")[0];
$logo           = "../../assets/images/" . $result['logo'];
$kop            = $result['kop_surat'];

$tanggal        = $_POST['tanggal_surat_dibuat'];
$lampiran       = $_POST['lampiran'];
$id_jenis_surat = $_POST['id_jenis_surat'];
$isi            = $_POST['isi_surat'];
$dinas          = $_POST['id_user'];
$no_surat       = $_POST['no_surat'];
$tembusan       = $_POST['tembusan'];

$get_jenis_surat = $crud->view("SELECT * FROM tb_jenis_surat WHERE id_jenis_surat='$id_jenis_surat'")[0];

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
            <p>Nomor : <?= $no_surat ?> </p>
            <br>
            <p>Lampiran : <?= $_POST['lampiran'] ?></p>
            <br>
            <p>Perihal :<?= $get_jenis_surat['jenis_surat']?> </p>

        </td>
        <td colspan="6">
            <b>Kepada</b>
            <p>Yth</p>
                <?php
                foreach ($dinas as $key => $value) {
                    $key++;
                    $get_nama_dinas = $crud->view("SELECT nama FROM tb_user WHERE id_user='$value'")[0];
                    echo $key.".".$get_nama_dinas['nama']."<br>";
                }
                ?>
                <br>
                <p>di Labuhan Bajo</p>
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
                <?php 
                $data = explode("-",$_POST['atas_nama']);
                ?>
                <b><u><?= $data[0] ?></u></b><br>
                Pembina Utama Muda <br>
                NIP. <?= $data[1] ?>
            </p>
        </td>
    </tr>
    <tr>
        <td colspan="9">
            <p><?= $_POST['tembusan'] ?></p>
        </td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
<!-- end template -->


<?php 
$id_surat_keluar = $_POST['id_surat_keluar'];

$html = ob_get_contents();
ob_end_clean();
$stylesheet = file_get_contents('../../assets/plugins/bootstrap/css/bootstrap.min.css'); // external css
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html,2);

$post_file = "../../file/surat_keluar/".$id_surat_keluar.".pdf";

$mpdf->Output($post_file,"F");

// insert surat keluar
$data = array(
    'id_surat_keluar' => $id_surat_keluar,
    'id_jenis_surat'  => $id_jenis_surat,
    'tanggal'         => $tanggal,
    'isi'             => $isi,
    'no_surat'        => $no_surat,
    'lampiran'        => $lampiran,
    'tembusan'        => $tembusan,
    'file_surat'      => $id_surat_keluar.".pdf"
);

$res = $crud->update("tb_surat_keluar", $data, "id_surat_keluar = '$id_surat_keluar'");

if ($res) {
    header("location:../index.php?page=view_surat_keluar");
}

?>