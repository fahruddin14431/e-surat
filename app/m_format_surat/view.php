<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">

                <h3>
                    Master Format Surat
                    <a href="index.php?page=add_format_surat" class="btn btn-success">Tambah</a>
                </h3>

                <table class="table table-stripped table-bordered text-center" id="data_table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Logo</th>
                            <th>Kop</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $crud   = new Crud();
                            $result = $crud->view("SELECT * FROM tb_format_surat");            
                            $no = 1;
                            foreach ($result as $value):
                        ?>
                        <tr>
                            <td><?= $no++."." ?></td>
                            <td>
                                <img src="../assets/images/<?= $value['logo']?>" alt="" width="60%" height="25%">
                            </td>
                            <td><?= $value['kop_surat'] ?></td>
                            <td>
                                <a href="index.php?page=edit_format_surat&id_format_surat=<?= $value['id_format_surat'] ?>" class="btn btn-warning">Ubah</a>
                                <a href="index.php?page=delete_format_surat&id_format_surat=<?= $value['id_format_surat'] ?>" onClick="return confirm('Data Akan Dihapus !')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div> 

