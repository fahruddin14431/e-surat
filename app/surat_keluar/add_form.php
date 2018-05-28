<div class="row">
    <!-- Column -->
    <div class="col-lg-10">
        <div class="card">
            <div class="card-block">

                <h3>Tambah Data Surat Keluar</h3>

                <form action="surat_keluar/add.php" method="POST">

                    <div class="form-group">
                        <h5>Dinas Tujuan</h5>

                        <select required class="js-example-basic-multiple" name="id_user[]" multiple="multiple" class="form-control">                            
                            <?php 
                                $sess_dinas = $_SESSION['sess_user']['sess_id_user'];
                                $crud   = new Crud();
                                $result = $crud->view(" SELECT * FROM `tb_user` 
                                                        WHERE `id_jabatan`='5'
                                                    ");          
                                foreach ($result as  $value):
                            ?>
                            <option value="<?= $value['id_user'] ?>"><?= $value['nama'] ?></option>
                            <?php endforeach ?>
                        </select>

                    </div>   

                    <div class="form-group">
                        <h5>Jenis Surat</h5>

                        <select required name="id_jenis_surat" id="id_jenis_surat" class="form-control">
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
                        <input required type="submit" value="SIMPAN" class="btn btn-success form-control"/> 
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


$(document).ready(function() {

    // ajax change isi surat
    $("#id_jenis_surat").change(function(){
        $.ajax({
            type : "POST",
            url  : "../app/surat_keluar/get_isi_surat.php",
            data : {id_jenis_surat : $("#id_jenis_surat").val()},
            dataType : "json",
            success: function(data){
                CKEDITOR.instances["editor"].setData(data.data);
                
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError); 
            }
        });
    });

    // select2
    $('.js-example-basic-multiple').select2({
        placeholder:"-- Pilih Dinas Tujuan --",
        width: '100%'
    });


});
</script>


