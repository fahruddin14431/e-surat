<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">

                <h3>Surat Masuk</h3>

                <table class="table table-stripped table-bordered" id="data_table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $dinas  = $_SESSION['sess_user']['sess_id_user'];
                            $crud   = new Crud();
                            $result = $crud->view( "SELECT * FROM tb_surat_keluar
                                                    INNER JOIN tb_jenis_surat ON tb_surat_keluar.id_jenis_surat = tb_jenis_surat.id_jenis_surat
                                                    INNER JOIN tb_detail_surat_keluar ON tb_surat_keluar.id_surat_keluar = tb_detail_surat_keluar.id_surat_keluar
                                                    AND tb_detail_surat_keluar.id_user = '$dinas'"
                                                );            
                            $no = 1;
                            foreach ($result as $value):
                        ?>
                        <tr>
                            <td><?= $no++."." ?></td>
                            <td><?= $value['jenis_surat'] ?></td>
                            <td><?= $value['tanggal'] ?></td>
                            <td>
                                <a href="../file/surat_keluar/<?= $value['file_surat'] ?>" class="btn btn-info">Unduh</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div> 