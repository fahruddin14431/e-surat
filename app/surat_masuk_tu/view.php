<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">

                <h3>
                    Surat Masuk
                    <a href="index.php?page=add_surat_masuk" class="btn btn-success">Tambah</a>
                </h3>

                <table class="table table-stripped table-bordered" id="data_table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Surat Masuk</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $crud   = new Crud();
                            $result = $crud->view(" SELECT * FROM tb_surat_masuk");            
                            $no = 1;
                            foreach ($result as $value):
                        ?>
                        <tr>
                            <td><?= $no++."." ?></td>
                            <td><?= $value['id_surat_masuk'] ?></td>
                            <td><?= $value['tanggal'] ?></td>
                            <td>
                                <a href="../file/surat_masuk/<?= $value['file_surat'] ?>" class="btn btn-info">Unduh</a>
                                <!-- <a href="index.php?page=delete_surat_keluar&id_surat_keluar=<?= $value['id_surat_keluar'] ?>" onClick="return confirm('Data Akan Dihapus !')" class="btn btn-danger">Hapus</a> -->
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div> 