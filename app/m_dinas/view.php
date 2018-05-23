<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">

                <h3>
                    Master Instansi
                    <a href="index.php?page=add_dinas" class="btn btn-success">Tambah</a>
                </h3>

                <table class="table table-stripped table-bordered" id="data_table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Dinas</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $crud   = new Crud();
                            $result = $crud->view(" SELECT * FROM tb_pegawai
                                                    INNER JOIN tb_jabatan ON tb_pegawai.id_jabatan = tb_jabatan.id_jabatan
                                                    INNER JOIN tb_login ON tb_pegawai.id_pegawai = tb_login.id_pegawai
                                                    WHERE tb_login.status = 'DINAS'"
                                                );            
                            $no = 1;
                            foreach ($result as $value):
                        ?>
                        <tr>
                            <td><?= $no++."." ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td>
                                <a href="index.php?page=edit_dinas&id_pegawai=<?= $value['id_pegawai'] ?>" class="btn btn-warning">Ubah</a>
                                <a href="index.php?page=delete_dinas&id_pegawai=<?= $value['id_pegawai'] ?>" onClick="return confirm('Data Akan Dihapus !')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div> 