<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">

            <div class="row">
                <div class="col-md-6">
                    <h3>
                        Surat Masuk
                        <?php if($auth->isTu()): ?>
                            <a href="index.php?page=add_surat_masuk" class="btn btn-success">Tambah</a>
                        <?php endif ?>
                    </h3>
                </div>
            </div>

                <table class="table table-stripped table-bordered" id="data_table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Penerimaan</th>
                            <th>No Agenda</th>
                            <th>Indeks Masalah</th>
                            <th>Perihal</th>
                            <th>Dari</th>
                            <th>Tanggal Surat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $crud   = new Crud();

                            $sql = "SELECT * FROM tb_surat_masuk
                                    INNER JOIN tb_user ON tb_surat_masuk.id_user = tb_user.id_user
                                    INNER JOIN tb_detail_surat_masuk ON tb_detail_surat_masuk.id_surat_masuk = tb_surat_masuk.id_surat_masuk
                                    WHERE status = '0'";     

                            // condition bidang
                            // ambil data dari session bidang
                            $sess_id_jabatan = $_SESSION['sess_user']['sess_id_user'];
                            $id_jabatan      = $crud->view("SELECT id_jabatan FROM tb_user WHERE id_user='$sess_id_jabatan'")[0]['id_jabatan'];
                            
                            if($auth->isBidang()){
                                $sql .= " AND tb_detail_surat_masuk.id_jabatan = '$id_jabatan' ";
                            }

                            $sql .= "GROUP by tb_surat_masuk.id_surat_masuk";
                            

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
                            <td>
                                <!-- <a href="../file/surat_masuk/<?= $value['file_surat'] ?>" class="btn btn-info">Unduh File</a> -->
                                <a href="../file/surat_masuk/<?= $value['scan_surat'] ?>" class="btn btn-primary">Unduh Scan 1</a>
                                <?php if(!empty($value['scan_surat2'])):?>
                                <a href="../file/surat_masuk/<?= $value['scan_surat2'] ?>" class="btn btn-primary">Unduh Scan 2</a>
                                <?php endif ?>
                                <?php if($auth->isTU()): ?>
                                <a href="index.php?page=edit_surat_masuk_tu&id_surat_masuk=<?= $value['id_surat_masuk'] ?>" class="btn btn-warning">Ubah</a>
                                <a href="index.php?page=delete_surat_masuk&id_surat_masuk=<?= $value['id_surat_masuk'] ?>" onClick="return confirm('Data Akan Dihapus !')" class="btn btn-danger">Hapus</a>
                                <?php endif ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div> 

<script>
$('#data_table_filter').DataTable();
</script>