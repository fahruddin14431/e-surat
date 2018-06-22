<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">
            
                <div class="row">
                    <div class="col-md-4">
                        <h3>Laporan Surat Keluar</h3>
                    </div>

                    <!-- filter -->
                    <div class="col-md-8">
                        <form action="index.php?page=view_laporan_surat_keluar" method="POST" class="form-inline pull-right">
                            <label><b>Tanggal awal : &ensp;</b></label>
                            <input type="date" value="<?= isset($_POST['tgl_awal'])?$_POST['tgl_awal']:"";?>" id="min" name="tgl_awal" class="form-control">                 
                            &ensp;&ensp;
                            <label><b>Tanggal akhir : &ensp;</b></label>
                            <input type="date" value="<?= isset($_POST['tgl_akhir'])?$_POST['tgl_akhir']:"";?>" id="max" name="tgl_akhir" class="form-control">                 
                            &ensp;
                            <button type="submit" value="CARI" class=" btn btn-info">
                                CARI
                            </button>
                        </form>
                    </div>
                    <!-- end filter -->

                </div>

                <table class="table table-stripped table-bordered" id="data_table_report">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>No Surat</th>
                            <th>Lampiran</th>
                            <th>Perihal</th>
                            <th>Kepada</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $crud     = new Crud();

                            $tgl_awal  = isset($_POST['tgl_awal'])?$_POST['tgl_awal']:"";
                            $tgl_akhir = isset($_POST['tgl_akhir'])?$_POST['tgl_akhir']:"";

                            $sql = "SELECT *, tb_surat_keluar.no_surat as fix_no_surat FROM tb_surat_keluar
                                    INNER JOIN tb_jenis_surat ON tb_surat_keluar.id_jenis_surat = tb_jenis_surat.id_jenis_surat
                                    INNER JOIN tb_detail_surat_keluar ON tb_surat_keluar.id_surat_keluar = tb_detail_surat_keluar.id_surat_keluar
                                    INNER JOIN tb_user ON tb_user.id_user = tb_detail_surat_keluar.id_user
                                    WHERE status = '1'";

                            if($tgl_awal && $tgl_akhir){
                                $sql.= " AND tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
                            }

                            // condition bidang
                            // ambil data dari session bidang
                            $sess_id_jabatan = $_SESSION['sess_user']['sess_id_user'];
                            $id_jabatan      = $crud->view("SELECT id_jabatan FROM tb_user WHERE id_user='$sess_id_jabatan'")[0]['id_jabatan'];
                            if($auth->isBidang()){
                                $sql .=" AND tb_detail_surat_keluar.id_jabatan = '$id_jabatan'";
                            }

                            $result   = $crud->view($sql);            
                            $no = 1;
                            foreach ($result as $value):
                        ?>
                        <tr>
                            <td><?= $no++."." ?></td>
                            <td><?= $value['tanggal'] ?></td>
                            <td><?= $value['fix_no_surat'] ?></td>
                            <td><?= $value['lampiran'] ?></td>
                            <td><?= $value['jenis_surat'] ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['status']==0?"Pending":"Acc" ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div> 
<script>
$(document).ready(function() {
    
var datatable = $('#data_table_report').DataTable({
    dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
});
</script>