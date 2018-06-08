<div class="row">
    <!-- Column -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">
            
            <div class="row">
                <div class="col-md-6">
                    <h3>
                        Master User
                        <a href="index.php?page=add_user" class="btn btn-success">Tambah</a>
                    </h3>
                </div>
                <div class="col-md-6">
                    <!-- filter -->
                    <div class="form-inline pull-right">
                        <label><b>Filter : &ensp;</b></label>
                        <select id="filter_jabatan" class="form-control">
                            <option value=""> -- Semua -- </option>
                            <?php 
                                $crud   = new Crud();
                                $result = $crud->view(" SELECT DISTINCT(jabatan) FROM tb_user
                                                        INNER JOIN tb_jabatan ON tb_user.id_jabatan = tb_jabatan.id_jabatan
                                                        INNER JOIN tb_login ON tb_user.id_user = tb_login.id_user
                                                        WHERE tb_jabatan.id_jabatan IN (1,2,3,4,5)"
                                                    );          
                                foreach ($result as  $value):
                            ?>
                            <option value="<?= $value['jabatan'] ?>"><?= $value['jabatan'] ?></option>
                            <?php endforeach ?>
                            <option value="Bidang">Bidang</option>
                        </select>                        
                    </div>                    
                    <!-- end filter -->
                </div>
            </div>

                

                <table class="table table-stripped table-bordered" id="data_table_filter">
                    <thead>
                        <tr>
                            <th>No</th>
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
                                                    INNER JOIN tb_login ON tb_user.id_user = tb_login.id_user"
                                                );            
                            $no = 1;
                            foreach ($result as $value):
                        ?>
                        <tr>
                            <td><?= $no++."." ?></td>
                            <td><?= $value['nama'] ?></td>
                            <?php 
                            $jabatan ="";
                            if($value['jabatan']=="Kepala BKPPD" || 
                               $value['jabatan']=="Sekretaris"||
                               $value['jabatan']=="STAFF"||
                               $value['jabatan']=="Dinas")
                            {
                                $jabatan = $value['jabatan'];
                            }
                            else
                            {
                                $jabatan = "Bidang";
                            }

                            ?>
                            <td><?= $jabatan ?></td>
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

<script>
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var filter_jabatan = $('#filter_jabatan').val();
		if(filter_jabatan == data[2] || filter_jabatan == ""){
			return true;
		}
		return false
		
	});

	$(document).ready(function() {
		var table = $('#data_table_filter').DataTable();

		$('select').on('change', function() {
			table.draw();    
		});

	});
</script>