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
$result = $crud->view(" SELECT *, tb_surat_keluar.no_surat as fix_no_surat, tb_surat_keluar.lampiran as fix_lampiran FROM tb_surat_keluar
                        INNER JOIN tb_jenis_surat ON tb_surat_keluar.id_jenis_surat = tb_jenis_surat.id_jenis_surat
                        INNER JOIN tb_detail_surat_keluar ON tb_surat_keluar.id_surat_keluar = tb_detail_surat_keluar.id_surat_keluar
                        WHERE tb_surat_keluar.id_surat_keluar='$id_surat_keluar'")[0];

$result1 = $crud->view("SELECT * FROM tb_format_surat WHERE id_format_surat='".$result['id_format_surat']."'")[0];
$logo    = "../assets/images/" . $result1['logo'];
$kop     = $result1['kop_surat'];

ob_end_clean();
ob_start();

// 20 = laporan keuangan

if($result['id_jenis_surat']=="20" || $result['id_jenis_surat']=="11"):
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
                <p>Labuan Bajo, <?= date("d-m-Y", strtotime($result['tanggal'])); ?></p>
            </div>        
        </div>
    
        <div style="width:100%;">
            <div style="width:50%"></div>
            <div style="width:50%; float:right">
            <p>Kepada</p>
            Yth
            <br>
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
            </div>
        </div>
    
        <div style="width:100%;">
             <div style="text-align:center">
                <p ><b><u><?= $result['jenis_surat']?></u></b></p>
                <p ><?= $result['fix_no_surat'] ?></p>
            </div>
        </div>
    
        <div style="width:100%">
            <?= $result['isi'] ?>
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
                        $data = explode("-",$result['atas_nama']);
                    ?>
                    <?= $data[0]=="IR. Sebastianus Wantung"?"":"A.n " ?>Kepala Badan Kepegawaian Pendidikan dan Pelatihan<br>
                    Daerah Kabupaten Manggarai Barat 
                    <br>
                    <img src="../assets/ttd/<?= $data[0]=="IR. Sebastianus Wantung"?"ttd_kepala.jpeg":"ttd_bupati.jpeg" ?>" width="160px" height="160px">
                    <br>               
                    <b><u><?= $data[0] ?></u></b><br>
                    Pembina Utama Muda <br>
                    NIP. <?= $data[1] ?>
                </p>
            </div>
        </div>
    
        <div style="width:100%">
            <div style="width:80%">
                <p><b>Tembusan </b> : disampaikan dengan hormat kepada :</p>
                <p><?= $result['tembusan'] ?></p>
            </div>
            <div style="width:20%">
                
            </div>
        </div>
    
    </div>
    <!-- lampiran -->
    <pagebreak />
    <p>Lampiran Surat</p>
    <div style="width:100%;">
        <?= $result['fix_lampiran'] ?>
    </div>
    <div style="width:100%;">
        <div style="width:60%; float:left">
        
        </div>
        <div style="width:40%">
            <br><br>
            <p>                
                <?php 
                    $data = explode("-",$result['atas_nama']);
                ?>
                <?= $data[0]=="IR. Sebastianus Wantung"?"":"A.n " ?>Kepala Badan Kepegawaian Pendidikan dan Pelatihan<br>
                Daerah Kabupaten Manggarai Barat 
                <br>
                <img src="../assets/ttd/<?= $data[0]=="IR. Sebastianus Wantung"?"ttd_kepala.jpeg":"ttd_bupati.jpeg" ?>" width="160px" height="160px">
                <br>               
                <b><u><?= $data[0] ?></u></b><br>
                Pembina Utama Muda <br>
                NIP. <?= $data[1] ?>
            </p>
        </div>
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
                <p>Labuan Bajo, <?= date("d-m-Y", strtotime($result['tanggal'])); ?></p>
            </div>        
        </div>
    
        <div style="width:100%;">
            <div style="width:50%; float:left">
                <p>Nomor : <?= $result['fix_no_surat'] ?> </p>
                <p>Lampiran : - </p>
                <p>Perihal : <b><u><?= $result['jenis_surat']?></u></b> </p>
            </div>
            <div style="width:50%; ">
            <p>Kepada</p>
            Yth
            <br>
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
            </div>
        </div>
    
        <div style="width:100%">
            <?= $result['isi'] ?>
        </div>
    
        <div style="width:100%">
            <div style="width:60%; ">
            </div>
            <div style="width:40%; float:right">
                <br><br>
                <p>                
                    <?php 
                        $data = explode("-",$result['atas_nama']);
                    ?>
                    <?= $data[0]=="IR. Sebastianus Wantung"?"":"A.n " ?>Kepala Badan Kepegawaian Pendidikan dan Pelatihan<br>
                    Daerah Kabupaten Manggarai Barat 
                    <br>
                    <img src="../assets/ttd/<?= $data[0]=="IR. Sebastianus Wantung"?"ttd_kepala.jpeg":"ttd_bupati.jpeg" ?>" width="160px" height="160px">
                    <br>               
                    <b><u><?= $data[0] ?></u></b><br>
                    Pembina Utama Muda <br>
                    NIP. <?= $data[1] ?>
                </p>
            </div>
        </div>
    
        <div style="width:100%">
            <div style="width:80%">
                <p><b>Tembusan </b> : disampaikan dengan hormat kepada :</p>
                <p><?= $result['tembusan'] ?></p>
            </div>
            <div style="width:20%">
                
            </div>
        </div>
    
    </div>
    
    <!-- lampiran -->
    <pagebreak />
    <p>Lampiran Surat</p>
    <div style="width:100%;">
        <?= $result['fix_lampiran'] ?>
    </div>
    <!-- end lampiran -->
    
    <!-- end template public-->
    
    
<?php 
endif;


$html = ob_get_contents();
ob_end_clean();
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