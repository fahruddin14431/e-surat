<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">

                <h3>
                    Master Pegawai
                    <a href="index.php?page=add_pegawai" class="btn btn-success">Tambah</a>
                </h3>

                <table class="table table-stripped table-bordered" id="data_table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $crud   = new Crud();
                            $result = $crud->view(" SELECT * FROM tb_user
                                                    INNER JOIN tb_jabatan ON tb_user.id_jabatan = tb_jabatan.id_jabatan
                                                    INNER JOIN tb_login ON tb_user.id_user = tb_login.id_user
                                                    WHERE NOT tb_login.status = 'DINAS'"
                                                );            
                            $no = 1;
                            foreach ($result as $value):
                        ?>
                        <tr>
                            <td><?= $no++."." ?></td>
                            <td><?= $value['nip'] ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['jabatan'] ?></td>
                            <td>
                                <a href="index.php?page=edit&id_user=<?= $value['id_user'] ?>" class="btn btn-warning">Ubah</a>
                                <a href="index.php?page=delete&id_user=<?= $value['id_user'] ?>" onClick="return confirm('Data Akan Dihapus !')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div> 