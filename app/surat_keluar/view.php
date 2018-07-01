<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">

                <h3>
                    Surat Keluar
                    <?php if($auth->isTU()):?>
                    <a href="index.php?page=add_surat_keluar" class="btn btn-success">Tambah</a>
                    <?php endif ?>
                </h3>

                <table class="table table-stripped table-bordered" id="data_table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>No Surat</th>
                            <th>Perihal</th>
                            <th>Kepada</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $crud   = new Crud();
                            
                            $sql = "SELECT *, tb_surat_keluar.no_surat as fix_no_surat FROM tb_surat_keluar
                                    INNER JOIN tb_jenis_surat ON tb_surat_keluar.id_jenis_surat = tb_jenis_surat.id_jenis_surat
                                    INNER JOIN tb_detail_surat_keluar ON tb_surat_keluar.id_surat_keluar = tb_detail_surat_keluar.id_surat_keluar
                                    INNER JOIN tb_user ON tb_user.id_user = tb_detail_surat_keluar.id_user";
                            // condition bidang
                            // ambil data dari session bidang
                            $sess_id_jabatan = $_SESSION['sess_user']['sess_id_user'];
                            $id_jabatan      = $crud->view("SELECT id_jabatan FROM tb_user WHERE id_user='$sess_id_jabatan'")[0]['id_jabatan'];
                            if($auth->isBidang()){
                                $sql .=" WHERE tb_detail_surat_keluar.id_jabatan = '$id_jabatan'";
                            }
                            $result = $crud->view($sql);            
                            $no = 1;
                            foreach ($result as $value):
                        ?>
                        <tr>
                            <td><?= $no++."." ?></td>
                            <td><?= $value['tanggal'] ?></td>
                            <td><?= $value['fix_no_surat'] ?></td>
                            <td><?= $value['jenis_surat'] ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['status']==0?"Pending":"Acc" ?></td>
                            <td>
                                <a href="../file/surat_keluar/<?= $value['file_surat'] ?>" class="btn btn-info">Unduh</a>
                                <?php if($auth->isKepalaBadan() && $value['status']==0): ?>
                                <a href="index.php?page=acc_surat_keluar&id_surat_keluar=<?= $value['id_surat_keluar'] ?>" onClick="return confirm('Acc Surat Keluar !')" class="btn btn-primary">ACC</a>
                                <?php endif ?>
                                <?php if($auth->isTU() && $value['status']==0 ):?>
                                <!-- <a href="index.php?page=edit_surat_keluar&id_surat_keluar=<?= $value['id_surat_keluar'] ?>" class="btn btn-warning">Ubah</a> -->
                                <?php endif ?>
                                <?php if(!$auth->isBidang()):?>
                                <a href="index.php?page=delete_surat_keluar&id_surat_keluar=<?= $value['id_surat_keluar'] ?>" onClick="return confirm('Data Akan Dihapus !')" class="btn btn-danger">Hapus</a>
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
