<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">

            <div class="row">
                <div class="col-md-6">
                    <h3>
                        Disposisi Surat
                        <?php if($auth->isTu()): ?>
                            <a href="index.php?page=add_form_disposisi" class="btn btn-success">Tambah</a>
                        <?php endif ?>
                    </h3>
                </div>
                <!-- <div class="col-md-3"></div> -->
                <!-- filter -->
                <?php if(!$auth->isTU()): ?>
                <div class="col-md-6">
                    <div class="form-inline pull-right">
                        <label><b>Filter : &ensp;</b></label>
                        <select id="filter_dinas" class="form-control">
                            <option value=""> -- Semua Kepala Bidang -- </option>
                            <?php 
                                $crud   = new Crud();
                                $result = $crud->view(" SELECT * FROM tb_jabatan
                                                        WHERE id_jabatan IN(6,7,8,9,10)");          
                                foreach ($result as  $value):
                            ?>
                            <option value="<?= $value['jabatan'] ?>"><?= $value['jabatan'] ?></option>
                            <?php endforeach ?>
                        </select>                        
                    </div>
                </div>
                <?php endif ?>
                <!-- end filter -->
            </div>

                <table class="table table-stripped table-bordered" id="data_table_filter">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Asal Surat</th>
                            <th>No Agenda</th>
                            <th>Perihal</th>
                            <th>Tanggal Surat</th>
                            <th>Status</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $crud   = new Crud();
                            if($auth->isTU()):
                            $sql = "SELECT * FROM tb_surat_masuk
                                    INNER JOIN tb_jabatan ON tb_surat_masuk.id_jabatan = tb_jabatan.id_jabatan 
                                    INNER JOIN tb_user ON tb_surat_masuk.id_user = tb_user.id_user
                                    WHERE tb_jabatan.id_jabatan NOT IN(2)";
                            elseif($auth->isKepalaBadan()):
                                $sql = "SELECT * FROM tb_surat_masuk
                                        INNER JOIN tb_jabatan ON tb_surat_masuk.id_jabatan = tb_jabatan.id_jabatan 
                                        INNER JOIN tb_user ON tb_surat_masuk.id_user = tb_user.id_user
                                        WHERE tb_jabatan.id_jabatan NOT IN(2) AND status='0'";
                            endif;
                            $result = $crud->view($sql);            
                            $no = 1;
                            foreach ($result as $value):
                        ?>
                        <tr>
                            <td><?= $no++."." ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['no_agenda'] ?></td>
                            <td><?= $value['perihal'] ?></td>
                            <td><?= $value['tanggal_surat'] ?></td>
                            <td><?= $value['status']=="0"?"Pending":"Success" ?></td>
                            <td><?= $value['jabatan'] ?></td>
                            <td>
                                <a href="../file/surat_masuk/<?= $value['scan_surat'] ?>" class="btn btn-info <?= !empty($value['scan_surat'])?"":"disabled" ?>">Unduh</a>

                                <?php if($auth->isKepalaBadan()): ?>
                                    <a href="index.php?page=add_disposisi&id_surat=<?= $value['id_surat_masuk'] ?>" class="btn btn-primary <?= $value['status']=="0"?"":"disabled" ?>">Disposisi</a>
                                <?php elseif($auth->isTU()): ?>
                                    <a href="index.php?page=edit_disposisi&id_surat_masuk=<?= $value['id_surat_masuk'] ?>" class="btn btn-warning">Ubah</a>
                                    <a href="index.php?page=delete_disposisi&id_surat_masuk=<?= $value['id_surat_masuk'] ?>" onClick="return confirm('Data Akan Dihapus !')" class="btn btn-danger">Hapus</a>
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
<?php if(!$auth->isTU()): ?>
<script>
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var filter_dinas = $('#filter_dinas').val();
        if(filter_dinas == data[6] || filter_dinas == ""){            
            return true;
        }
        return false
        
    });

    var table = $('#data_table_filter').DataTable();

    $('select').on('change', function() {                
        table.draw();    
    });
</script>
<?php else: ?>
<script>

$('#data_table_filter').DataTable();

</script>
<?php endif ?>