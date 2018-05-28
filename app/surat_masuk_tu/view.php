<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">

            <div class="row">
                <div class="col-md-6">
                    <h3>
                        Surat Masuk
                        <?php if($auth->isTu()): ?>
                            <a href="index.php?page=add_surat_masuk" class="btn btn-success">Tambah</a>
                        <?php endif ?>
                    </h3>
                </div>
                <!-- <div class="col-md-3"></div> -->
                <!-- filter -->
                <?php if(!$auth->isPegawai()): ?>
                <div class="col-md-6">
                    <div class="form-inline pull-right">
                        <label><b>Filter : &ensp;</b></label>
                        <select id="filter_dinas" class="form-control">
                            <option value=""> -- Semua Dinas -- </option>
                            <?php 
                                $crud   = new Crud();
                                $result = $crud->view("SELECT * FROM tb_user WHERE id_jabatan = '5'");          
                                foreach ($result as  $value):
                            ?>
                            <option value="<?= $value['nama'] ?>"><?= $value['nama'] ?></option>
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
                            <th>No Surat</th>
                            <th>No Agenda</th>
                            <th>Perihal</th>
                            <th>Tanggal Surat Penerimaan</th>
                            <th>Tanggal Surat</th>
                            <?php if($auth->isPegawai()): ?>
                            <th>Instruksi</th>
                            <?php endif ?>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $crud   = new Crud();

                            // get id jabatan from id pegawai
                            $id_user = $_SESSION['sess_user']['sess_id_user'];
                            $sql = "SELECT id_jabatan FROM tb_user WHERE id_user = '$id_user'";
                            $id_jabatan = $crud->view($sql)[0]['id_jabatan'];
                            
                            if($auth->isPegawai()):                            
                                $sql = "SELECT * FROM tb_surat_masuk
                                        INNER JOIN tb_jabatan ON tb_surat_masuk.id_jabatan = tb_jabatan.id_jabatan 
                                        INNER JOIN tb_user ON tb_surat_masuk.id_user = tb_user.id_user
                                        WHERE tb_surat_masuk.status = '1' AND tb_surat_masuk.id_jabatan = '$id_jabatan' ";
                            else:                        
                                $sql = "SELECT * FROM tb_surat_masuk
                                        INNER JOIN tb_jabatan ON tb_surat_masuk.id_jabatan = tb_jabatan.id_jabatan 
                                        INNER JOIN tb_user ON tb_surat_masuk.id_user = tb_user.id_user
                                        WHERE status='0' AND tb_jabatan.id_jabatan != 1";                                    
                            endif;     

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
                            <?php if($auth->isPegawai()): ?>
                            <td><?= $value['instruksi'] ?></td>
                            <?php endif ?>
                            <td>
                                <a href="../file/surat_masuk/<?= $value['file_surat'] ?>" class="btn btn-info">Unduh</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div> 
<?php if(!$auth->isPegawai()): ?>
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
<?php else: ?>
<script>

$('#data_table_filter').DataTable();

</script>
<?php endif ?>