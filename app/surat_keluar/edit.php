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

$id_format_surat= 1;//$_POST['id_format_surat'];
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
// 20 = laporan keuangan

if($id_jenis_surat=="20"):
    ?>
    
    <!-- start template keuangan-->
    <div style="width:100%;">
    
        <div style="width:100%;">
            <div style="width:20%; float:left">
                <img src="<?= $logo ?>" width="100px" height="100px">
            </div>
            <div style="width:80%">
                <br>
                <b><?= $kop ?></b>
            </div>        
        </div>
    
        <div style="width:100%">
            <hr>
        </div>
    
        <div style="width:100%">
            <div style="width:70%">
            </div>
            <div style="width:30%; float:right">
                <p>Labuan Bajo, <?= date("d-m-Y", strtotime($tanggal)); ?></p>
            </div>        
        </div>
    
        <div style="width:100%;">
            <div style="width:50%"></div>
            <div style="width:50%; float:right">
            <p>Kepada</p> 
            Yth
            <br>
            <?php
            foreach ($dinas as $key => $value) {
                $key++;
                $get_nama_dinas = $crud->view("SELECT nama FROM tb_user WHERE id_user='$value'")[0];
                echo $key.".".$get_nama_dinas['nama']."<br>";
            }
            ?>
            <br>
            <p>Di</p>
            <p class="pull-right"><?= $_POST['dari']?></p>
            </div>
        </div>
    
        <div style="width:100%;">
             <div style="text-align:center">
                <p ><b><u><?= $get_jenis_surat['jenis_surat']?></u></b></p>
                <p ><?= $no_surat ?></p>
            </div>
        </div>
    
        <div style="width:100%">
            <?= $isi ?>
        </div>
    
        <div style="width:100%">
            <div style="width:60%; float:left">
                <p>Diterima Tanggal</p>
                <p>Penerima</p>
                <p>....................................</p>
                <br>
                <p><u>....................................</u></p>
                <p>NIP ...................................</p>
            </div>
            <div style="width:40%">
                <br><br>
                <p>                
                    <?php 
                        $data = explode("-",$_POST['atas_nama']);
                    ?>
                    <?= $data[0]=="IR. Sebastianus Wantung"?"":"A.n " ?>Kepala Badan Kepegawaian Pendidikan dan Pelatihan<br>
                    Daerah Kabupaten Manggarai Barat <br><br>               
                    <b><u><?= $data[0] ?></u></b><br>
                    Pembina Utama Muda <br>
                    NIP. <?= $data[1] ?>
                </p>
            </div>
        </div>
    
        <div style="width:100%">
            <div style="width:80%">
                <p><b>Tembusan </b> : disampaikan dengan hormat kepada :</p>
                <p><?= $_POST['tembusan'] ?></p>
            </div>
            <div style="width:20%">
                
            </div>
        </div>
    
    </div>
    <!-- lampiran -->
    <pagebreak />
    <p>Lampiran Surat</p>
    <div style="width:100%;">
        <?= $lampiran ?>
    </div>
    <!-- end lampiran -->
    <!-- end template keuangan-->
    
    <?php  else:  ?>
    
    <!-- start template public-->
    <div style="width:100%;">
    
        <div style="width:100%;">
            <div style="width:20%; float:left">
                <img src="<?= $logo ?>" width="100px" height="100px">
            </div>
            <div style="width:80%">
                <br>
                <b><?= $kop ?></b>
            </div>        
        </div>
    
        <div style="width:100%">
            <hr>
        </div>
    
        <div style="width:100%">
            <div style="width:70%">
            </div>
            <div style="width:30%; float:right">
                <p>Labuan Bajo, <?= date("d-m-Y", strtotime($tanggal)); ?></p>
            </div>        
        </div>
    
        <div style="width:100%;">
            <div style="width:50%; float:left">
                <p>Nomor : <?= $no_surat ?> </p>
                <p>Lampiran : - </p>
                <p>Perihal : <b><u><?= $get_jenis_surat['jenis_surat']?></u></b> </p>
            </div>
            <div style="width:50%; ">
            <p>Kepada</p> 
            Yth
            <br>
            <?php
            foreach ($dinas as $key => $value) {
                $key++;
                $get_nama_dinas = $crud->view("SELECT
                                                    user.nama
                                                FROM
                                                    tb_user AS user
                                                INNER JOIN tb_detail_surat_keluar AS surat_keluar ON user.id_user = surat_keluar.id_user
                                                WHERE surat_keluar.id_user='$value'")[0];
                echo $key.".".$get_nama_dinas['nama']."<br>";
            }
            ?>
            <br>
            <p>Di</p>
            <p class="pull-right"><?= $_POST['dari']?></p>
            </div>
        </div>
    
        <div style="width:100%">
            <?= $isi ?>
        </div>
    
        <div style="width:100%">
            <div style="width:60%; ">
            </div>
            <div style="width:40%; float:right">
                <br><br>
                <p>                
                    <?php 
                        $data = explode("-",$_POST['atas_nama']);
                    ?>
                    <?= $data[0]=="IR. Sebastianus Wantung"?"":"A.n " ?>Kepala Badan Kepegawaian Pendidikan dan Pelatihan<br>
                    Daerah Kabupaten Manggarai Barat <br><br>               
                    <b><u><?= $data[0] ?></u></b><br>
                    Pembina Utama Muda <br>
                    NIP. <?= $data[1] ?>
                </p>
            </div>
        </div>
    
        <div style="width:100%">
            <div style="width:80%">
                <p><b>Tembusan </b> : disampaikan dengan hormat kepada :</p>
                <p><?= $_POST['tembusan'] ?></p>
            </div>
            <div style="width:20%">
                
            </div>
        </div>
    
    </div>
    
    <!-- lampiran -->
    <pagebreak />
    <p>Lampiran Surat</p>
    <div style="width:100%;">
        <?= $lampiran ?>
    </div>
    <!-- end lampiran -->
    
    <!-- end template public-->
    
    
    <?php 
endif;

$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML($html);

$id_surat_keluar = $_POST['id_surat_keluar'];

$post_file = "../../file/surat_keluar/".$id_surat_keluar.".pdf";

$mpdf->Output($post_file,"F");

// insert surat keluar
$data = array(
    'id_surat_keluar' => $id_surat_keluar,
    'id_format_surat' => $id_format_surat,
    'id_jenis_surat'  => $id_jenis_surat,
    'tanggal'         => $tanggal,
    'isi'             => $isi,
    'no_surat'        => $no_surat,
    'lampiran'        => $lampiran,
    'tembusan'        => $tembusan,
    'file_surat'      => $id_surat_keluar.".pdf",
    'atas_nama'       => $_POST['atas_nama']
);

$res = $crud->update("tb_surat_keluar", $data, "id_surat_keluar = '$id_surat_keluar'");

if ($res) {
    header("location:../index.php?page=view_surat_keluar");
}

?>