<!-- Bootstrap Core CSS -->
<link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<?php  

include_once "helper/crud.php";
include "../assets/mpdf/mpdf.php";

$mpdf = new mPDF('utf-8', "LEGAL");
$mpdf->debug = true;
$mpdf->allow_output_buffering = true;

// format surat
$crud   = new Crud();
$id_surat_keluar = $_GET['id_surat_keluar'];
$result = $crud->view(" SELECT * FROM tb_surat_keluar
                        INNER JOIN tb_jenis_surat ON tb_surat_keluar.id_jenis_surat = tb_jenis_surat.id_jenis_surat
                        INNER JOIN tb_detail_surat_keluar ON tb_surat_keluar.id_surat_keluar = tb_detail_surat_keluar.id_surat_keluar
                        WHERE tb_surat_keluar.id_surat_keluar='$id_surat_keluar'")[0];

$result1 = $crud->view("SELECT * FROM tb_format_surat WHERE id_format_surat='".$result['id_format_surat']."'")[0];
$logo    = "../assets/images/" . $result1['logo'];
$kop     = $result1['kop_surat'];

ob_end_clean();
ob_start();
?>
<!-- start template -->
<table class="table">
    <tr>
        <td colspan="1" class="text-center">
            <img src="<?= $logo ?>" width="100px" height="100px">
        </td>
        <td colspan="11" class="text-center">
        <?= $kop ?>
        </td>
    </tr>
    <tr>
        <td colspan="8"></td>
        <td colspan="4">
            <p class="pull-right">Labuan Bajo, <?= date("d-m-Y", strtotime($tanggal)); ?></p>
        </td>
    </tr>
    <tr>
        <td colspan="6">
            <p>Nomor : <?= $result['no_surat']?> </p>
            <br>
            <p>Lampiran : <?= $result['lampiran'] ?></p>
            <br>
            <p>Perihal :<?= $result['jenis_surat']?> </p>

        </td>
        <td colspan="6">
            <b>Kepada</b>
            <p>Yth</p>
                <?php
                $result1 = $crud->view(" SELECT * FROM `tb_detail_surat_keluar` INNER JOIN tb_user ON tb_user.id_user = tb_detail_surat_keluar.id_user WHERE id_surat_keluar='$id_surat_keluar'");
                $no = 1;
                foreach ($result1 as $value) {
                    echo $no++.".".$value['nama']."<br>";
                }
                ?>
                <br>
                <p>Di</p>
                <p class="pull-right"><?= $result['dari']?></p>
        </td>
    </tr>
    <tr>
        <td colspan="12">
            <?= $result['isi'] ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="9" class="text-center pull-right">
            <p>
                Kepala Badan Kepegawaian Pendidikan dan Pelatihan<br>
                Daerah Kabupaten Manggarai Barat 
                <br>
                <?php 
                $data = explode("-",$result['atas_nama']);
                ?>
                <img src="../assets/ttd/<?= $data[0]=="IR. Sebastianus Wantung"?"ttd_kepala.jpeg":"ttd_bupati.jpeg" ?>" width="160px" height="160px">
                <br>             
                <b><u><?= $data[0] ?></u></b><br>
                Pembina Utama Muda <br>
                NIP. <?= $data[1] ?>
            </p>
        </td>
    </tr>
    <tr>
        <td colspan="9">
            <p><?= $result['tembusan'] ?></p>
        </td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
<!-- end template -->
<?php
$html = ob_get_contents();
ob_end_clean();
$stylesheet = file_get_contents('../assets/plugins/bootstrap/css/bootstrap.min.css'); // external css
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html,2);

$post_file = "../file/surat_keluar/".$id_surat_keluar.".pdf";

$mpdf->Output($post_file,"F");

// update status surat keluar
$data = array(
    'status' => 1
);

$res = $crud->update("tb_surat_keluar",$data," id_surat_keluar='$id_surat_keluar'");

if($res){
    header("location:index.php?page=view_surat_keluar");
}

?>