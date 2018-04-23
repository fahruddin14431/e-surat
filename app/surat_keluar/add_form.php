<div class="row">
    <!-- Column -->
    <div class="col-lg-10">
        <div class="card">
            <div class="card-block">

                <h3>Tambah Data Surat Keluar</h3>

                <form action="surat_keluar/add.php" method="POST">

                    <div class="form-group">
                        <h5>Dinas Tujuan</h5>

                        <select required class="js-example-basic-multiple" name="id_pegawai[]" multiple="multiple" class="form-control">                            
                            <?php 
                                $sess_dinas = $_SESSION['sess_user']['sess_id_pegawai'];
                                $crud   = new Crud();
                                $result = $crud->view(" SELECT * FROM `tb_pegawai` 
                                                        WHERE `id_jabatan`='5'
                                                    ");          
                                foreach ($result as  $value):
                            ?>
                            <option value="<?= $value['id_pegawai'] ?>"><?= $value['nama'] ?></option>
                            <?php endforeach ?>
                        </select>

                    </div>   

                    <div class="form-group">
                        <h5>Jenis Surat</h5>

                        <select required name="id_jenis_surat" class="form-control">
                            <option value=""> -- Pilih Jenis Surat -- </option>
                            <?php 
                                $crud   = new Crud();
                                $result = $crud->view("SELECT * FROM tb_jenis_surat");          
                                foreach ($result as  $value):
                            ?>
                            <option value="<?= $value['id_jenis_surat'] ?>"><?= $value['jenis_surat'] ?></option>
                            <?php endforeach ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <h5>Isi Surat Keluar</h5>
                        <textarea required name="isi_surat" id="editor" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">                    
                        <input required type="submit" class="btn btn-success form-control"/> 
                    </div>         

                </form>

            </div>
        </div>
    </div>
</div> 
<script>
// config ckeditor
CKEDITOR.replace( 'editor', {
    height: 400
});

// select2
$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        placeholder:"-- Pilih Dinas Tujuan --",
        width: '100%'
    });
});
</script>


