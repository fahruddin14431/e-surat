<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">

            <div class="row">
                <div class="col-md-6">
                    <h3>
                        Surat Masuk
                        <a href="index.php?page=add_surat_masuk" class="btn btn-success">Tambah</a>
                    </h3>
                </div>
                <!-- <div class="col-md-3"></div> -->
                <!-- filter -->
                <div class="col-md-6">
                    <div class="form-inline pull-right">
                        <label><b>Filter : &ensp;</b></label>
                        <select id="filter_dinas" class="form-control">
                            <option value=""> -- Semua Dinas -- </option>
                            <?php 
                                $crud   = new Crud();
                                $result = $crud->view("SELECT * FROM tb_pegawai WHERE id_jabatan = '5'");          
                                foreach ($result as  $value):
                            ?>
                            <option value="<?= $value['nama'] ?>"><?= $value['nama'] ?></option>
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
                            <th>Perihal</th>
                            <th>Tanggal Surat Penerimaan</th>
                            <th>Tanggal Surat</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $crud   = new Crud();
                            $result = $crud->view(" SELECT * FROM tb_surat_masuk
                                                    INNER JOIN tb_jabatan ON tb_surat_masuk.id_jabatan = tb_jabatan.id_jabatan 
                                                    INNER JOIN tb_pegawai ON tb_surat_masuk.id_pegawai = tb_pegawai.id_pegawai"
                                                 );            
                            $no = 1;
                            foreach ($result as $value):
                        ?>
                        <tr>
                            <td><?= $no++."." ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['no_surat'] ?></td>
                            <td><?= $value['perihal'] ?></td>
                            <td><?= $value['tanggal_surat'] ?></td>
                            <td><?= $value['tanggal_surat_penerimaan'] ?></td>
                            <td><?= $value['jabatan'] ?></td>
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