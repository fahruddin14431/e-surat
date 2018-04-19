<div class="row">
    <!-- Column -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-block">

                <h3>
                    Master Jenis Surat
                    <a href="index.php?page=add_jenis_surat" class="btn btn-success">Tambah</a>
                </h3>

                <table class="table table-stripped table-bordered" id="data_table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Surat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $crud   = new Crud();
                            $result = $crud->view("SELECT * FROM tb_jenis_surat");            
                            $no = 1;
                            foreach ($result as $value):
                        ?>
                        <tr>
                            <td><?= $no++."." ?></td>
                            <td><?= $value['jenis_surat'] ?></td>
                            <td>
                                <a href="index.php?page=edit_jenis_surat&id_jenis_surat=<?= $value['id_jenis_surat'] ?>" class="btn btn-warning">Ubah</a>
                                <a href="index.php?page=delete_jenis_surat&id_jenis_surat=<?= $value['id_jenis_surat'] ?>" onClick="return confirm('Data Akan Dihapus !')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div> 