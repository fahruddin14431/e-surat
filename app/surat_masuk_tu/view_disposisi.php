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
                            <a href="index.php?page=add_surat_masuk" class="btn btn-success">Tambah</a>
                        <?php endif ?>
                    </h3>
                </div>
                <!-- <div class="col-md-3"></div> -->
                <!-- filter -->
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
                            <option value="<?= $value['id_jabatan'] ?>"><?= $value['jabatan'] ?></option>
                            <?php endforeach ?>
                        </select>                        
                    </div>
                </div>
                <!-- end filter -->
            </div>

                <table class="table table-stripped table-bordered" id="data_table_filter">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Asal Surat</th>
                            <th>No Surat</th>
                            <th>No Agenda</th>
                            <th>Perihal</th>
                            <th>Tanggal Surat Penerimaan</th>
                            <th>Tanggal Surat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $crud   = new Crud();
                            $sql = "SELECT * FROM tb_surat_masuk
                                    INNER JOIN tb_jabatan ON tb_surat_masuk.id_jabatan = tb_jabatan.id_jabatan 
                                    INNER JOIN tb_user ON tb_surat_masuk.id_user = tb_user.id_user
                                    WHERE tb_surat_masuk.id_jabatan = 1 ";

                            $result = $crud->view($sql);            
                            $no = 1;
                            foreach ($result as $value):
                        ?>
                        <tr>
                            <td><?= $no++."." ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['no_surat'] ?></td>
                            <td><?= $value['no_agenda'] ?></td>
                            <td><?= $value['perihal'] ?></td>
                            <td><?= $value['tanggal_surat'] ?></td>
                            <td><?= $value['tanggal_surat_penerimaan'] ?></td>
                            <td>
                                <a href="../file/surat_masuk/<?= $value['file_surat'] ?>" class="btn btn-info">Unduh</a>
                            
                                <a href="index.php?page=add_disposisi&id_surat=<?= $value['id_surat_masuk'] ?>" class="btn btn-primary">Disposisi</a>
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
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var filter_dinas = $('#filter_dinas').val();
        if(filter_dinas == data[1] || filter_dinas == ""){
            return true;
        }
        return false
        
    });

    var table = $('#data_table_filter').DataTable();

    $('select').on('change', function() {
        table.draw();    
});
</script>