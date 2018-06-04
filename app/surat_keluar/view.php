<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">

                <h3>
                    Surat Keluar
                    <a href="index.php?page=add_surat_keluar" class="btn btn-success">Tambah</a>
                </h3>

                <table class="table table-stripped table-bordered" id="data_table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>No Surat</th>
                            <th>Lampiran</th>
                            <th>Perihal</th>
                            <th>Kepada</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $crud   = new Crud();
                            $result = $crud->view(" SELECT * FROM tb_surat_keluar
                                                    INNER JOIN tb_jenis_surat ON tb_surat_keluar.id_jenis_surat = tb_jenis_surat.id_jenis_surat
                                                    INNER JOIN tb_detail_surat_keluar ON tb_surat_keluar.id_surat_keluar = tb_detail_surat_keluar.id_surat_keluar
                                                    INNER JOIN tb_user ON tb_user.id_user = tb_detail_surat_keluar.id_user
                                               ");            
                            $no = 1;
                            foreach ($result as $value):
                        ?>
                        <tr>
                            <td><?= $no++."." ?></td>
                            <td><?= $value['tanggal'] ?></td>
                            <td><?= $value['no_surat'] ?></td>
                            <td><?= $value['lampiran'] ?></td>
                            <td><?= $value['jenis_surat'] ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['status']==0?"Pending":"Acc" ?></td>
                            <td>
                                <a href="../file/surat_keluar/<?= $value['file_surat'] ?>" class="btn btn-info">Unduh</a>
                                <?php if($auth->isKepalaBadan()): ?>
                                <a href="index.php?page=acc_surat_keluar&id_surat_keluar=<?= $value['id_surat_keluar'] ?>" class="btn btn-primary">ACC</a>
                                <?php endif ?>

                                <a href="index.php?page=delete_surat_keluar&id_surat_keluar=<?= $value['id_surat_keluar'] ?>" onClick="return confirm('Data Akan Dihapus !')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div> 
