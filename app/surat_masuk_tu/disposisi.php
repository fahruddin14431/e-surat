<!-- Bootstrap Core CSS -->
<link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<?php  
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include "../helper/crud.php";
include "../../assets/mpdf/mpdf.php";

$mpdf = new mPDF();
$mpdf->debug = true;
$mpdf->allow_output_buffering = true;

// format surat
$crud   = new Crud();
$result = $crud->view("SELECT * FROM tb_format_surat")[0];

$logo   = "../../assets/images/" . $result['logo'];
$kop    = $result['kop_surat'];


$id_surat   = $_POST['id_surat'];
$result1    = $crud->view("SELECT * FROM tb_surat_masuk WHERE id_surat_masuk = '$id_surat'")[0];

$id_jabatan = $result1['id_jabatan'];
$id_dari    = $result1['id_user'];

$jabatan = $crud->view("SELECT jabatan FROM tb_jabatan WHERE id_jabatan = '$id_jabatan'")[0]['jabatan'];
$dari    = $crud->view("SELECT nama FROM tb_user WHERE id_user = '$id_dari'")[0]['nama'];

ob_start();
?>
<table width="100%" class="table table-responsive">
	<tbody>
		<tr>
            <td colspan="6" class="text-center">
                <img src="<?= $logo ?>" width="100px" height="100px">
            </td>
            <td colspan="6" class="text-center">
                <?= $kop ?>
            </td>
		</tr>
		<tr>
			<td colspan="6">
                <p>Kartu Disposisi</p>
            </td>
			<td colspan="6">
                <p>Tanggal : <?= $result1['tanggal_surat'] ?></p>
            </td>
		</tr>
        <tr>
			<td colspan="6">
                <p>Indeks Masalah:</p>
            </td>
			<td colspan="6">
                <p>No Agenda : <?= $result1['no_agenda'] ?></p>
            </td>
		</tr>
        <tr>
			<td colspan="12">
                <p>Perihal : <?= $result1['perihal'] ?></p>
            </td>
		</tr>
        <tr>
			<td colspan="12">
                <p>Dari : <?= $dari ?></p>
            </td>
		</tr>
        <tr>
			<td colspan="6">
                <p>Tanggal Surat : <?= $result1['tanggal_surat'] ?></p>
            </td>
			<td colspan="6">
                <p>No Surat : <?= $result1['no_surat'] ?></p>
            </td>
		</tr>
        <tr>
			<td colspan="6">
                <p>Instruksi Kepala BKPD : <?= $_POST['instruksi'] ?></p>
            </td>
			<td colspan="6">
                <p>Kepala Sekertaris BKPD</p>
            </td>
		</tr>
        <tr>
			<td colspan="6">
                
            </td>
			<td colspan="6">
                <p>Diteruskan Kepada Kepala Bidang : <?= $jabatan ?></p>
            </td>
		</tr>
	</tbody>
</table>

<?php
$html = ob_get_contents();
ob_end_clean();
$stylesheet = file_get_contents('../../assets/plugins/bootstrap/css/bootstrap.min.css'); // external css
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html,2);

$post_file = "../../file/surat_masuk/".$id_surat.".pdf";

$mpdf->Output($post_file,"F");

$data = array(
    'id_jabatan'  => $_POST['id_jabatan'],
    'instruksi'   => $_POST['instruksi'],
    'file_surat'  => $id_surat.".pdf",
    'status'      => 1,
);
$res = $crud->update("tb_surat_masuk", $data, "id_surat_masuk = '$id_surat'");

if ($res) {
    header("location:../index.php?page=view_disposisi");
}
?>