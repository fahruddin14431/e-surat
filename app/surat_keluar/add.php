<!-- Bootstrap Core CSS -->
<link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<?php 
include "../helper/crud.php";
include "../../assets/mpdf/mpdf.php";
$mpdf = new mPDF();
$mpdf->debug = true;
$mpdf->allow_output_buffering = true;
$mpdf->$keep_table_proportions = true;
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

// 11 = usulan karpeg
// 20 = laporan keuangan

if($id_jenis_surat=="20" || $id_jenis_surat=="11"):
?>

<!-- start template keuangan dan karpeg-->
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
<div style="width:100%;">
    <div style="width:60%;">
       
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
<!-- end lampiran -->
<!-- end template keuangan dan karpeg-->

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
            $get_nama_dinas = $crud->view("SELECT nama FROM tb_user WHERE id_user='$value'")[0];
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

$id_surat_keluar = $crud->makeId("tb_surat_keluar", "id_surat_keluar", "SUK");
$html = ob_get_contents();
ob_end_clean();
$stylesheet = file_get_contents('../../assets/plugins/bootstrap/css/bootstrap.min.css'); // external css
// $mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html,2);
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
    'atas_nama'       => $_POST['atas_nama'],
    'dari'            => $_POST['dari']
);
$res = $crud->insert("tb_surat_keluar",$data);
foreach ($_POST['id_user'] as $id_user) {
    $data1 = array(
        'id_user'         => $id_user,
        'id_surat_keluar' => $id_surat_keluar,
        'id_jabatan'      => $_POST['id_jabatan']
    );
    
    $res1 = $crud->insert("tb_detail_surat_keluar",$data1);
}
if ($res && $res1) {
    header("location:../index.php?page=view_surat_keluar");
}
?>