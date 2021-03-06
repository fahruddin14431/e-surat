<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">

                <div class="row">
                    <div class="col-md-4">
                        <h3>Laporan Surat Masuk</h3>
                    </div>

                    <!-- filter -->
                    <div class="col-md-8">
                        <form action="index.php?page=view_laporan_surat_masuk" method="POST" class="form-inline pull-right">
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
                            <th>Tanggal Penerimaan</th>
                            <th>No Agenda</th>
                            <th>Indeks Masalah</th>
                            <th>Perihal</th>
                            <th>Dari</th>
                            <th>Tanggal Surat</th>
                            <th>Disposisi Kepada</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $crud   = new Crud();

                            $tgl_awal  = isset($_POST['tgl_awal'])?$_POST['tgl_awal']:"";
                            $tgl_akhir = isset($_POST['tgl_akhir'])?$_POST['tgl_akhir']:"";

                            $sql = "SELECT * FROM tb_surat_masuk
                                    INNER JOIN tb_jabatan ON tb_surat_masuk.id_jabatan = tb_jabatan.id_jabatan 
                                    INNER JOIN tb_user ON tb_surat_masuk.id_user = tb_user.id_user
                                    WHERE status='0'";  
                                    
                            if($tgl_awal && $tgl_akhir){
                                $sql.= " AND tanggal_surat BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
                            }

                            // condition bidang
                            // ambil data dari session bidang
                            $sess_id_jabatan = $_SESSION['sess_user']['sess_id_user'];
                            $id_jabatan      = $crud->view("SELECT id_jabatan FROM tb_user WHERE id_user='$sess_id_jabatan'")[0]['id_jabatan'];
                            if($auth->isBidang()){
                                $sql .=" AND tb_surat_masuk.id_jabatan = '$id_jabatan'";
                            }

                            $result = $crud->view($sql);                     
                            $no = 1;
                            foreach ($result as $value):
                        ?>
                        <tr>
                            <td><?= $no++."." ?></td>
                            <td><?= $value['tanggal_surat_penerimaan'] ?></td>
                            <td><?= $value['no_agenda'] ?></td>
                            <td><?= $value['indeks_masalah'] ?></td>
                            <td><?= $value['perihal'] ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['tanggal_surat'] ?></td>
                            <td><?= $value['jabatan'] ?></td>
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
    responsive: true,
    "language": {
        "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing":   "Sedang memproses...",
        "sLengthMenu":   "Tampilkan _MENU_ entri",
        "sZeroRecords":  "Tidak ditemukan data yang sesuai",
        "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix":  "",
        "sSearch":       "Cari:",
        "sUrl":          "",
        "oPaginate": {
            "sFirst":    "Pertama",
            "sPrevious": "Sebelumnya",
            "sNext":     "Selanjutnya",
            "sLast":     "Terakhir"
        }
    },
    dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'pdfHtml5'
        ]
    });
});
</script>