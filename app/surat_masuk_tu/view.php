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

                <table class="table table-stripped table-bordered" id="data_table_filter">
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
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $crud   = new Crud();

                            $sql = "SELECT * FROM tb_surat_masuk
                                    INNER JOIN tb_jabatan ON tb_surat_masuk.id_jabatan = tb_jabatan.id_jabatan 
                                    INNER JOIN tb_user ON tb_surat_masuk.id_user = tb_user.id_user
                                    WHERE status='0' AND tb_jabatan.id_jabatan != 1";                                    

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
                            <td>
                                <a href="../file/surat_masuk/<?= $value['file_surat'] ?>" class="btn btn-info">Unduh File</a>
                                <a href="../file/surat_masuk/<?= $value['scan_surat'] ?>" class="btn btn-primary">Unduh Scan</a>
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