<div class="row">
    <!-- Column -->
    <div class="col-lg-10">
        <div class="card">
            <div class="card-block">

                <h3>Tambah Data Surat Keluar</h3>

                <form action="surat_keluar/add.php" method="POST">

                    <div class="form-group">
                        <h5>Kop Surat</h5>

                        <select required name="id_format_surat" class="form-control">
                            <option value=""> -- Pilih Kop Surat -- </option>
                            <?php 
                                $crud   = new Crud();
                                $result = $crud->view("SELECT * FROM tb_format_surat");          
                                foreach ($result as  $value):
                            ?>
                            <option value="<?= $value['id_format_surat'] ?>"><?= $value['nama_kop'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <h5>Tanggal Surat Dibuat</h5>
                        <input type="date" name="tanggal_surat_dibuat" required class="form-control">
                    </div>  

                    <div class="form-group">
                        <h5>Lampiran</h5>
                        <input type="text" name="lampiran" required class="form-control" placeholder="Lampiran">
                    </div>   

                    <div class="form-group">
                        <h5>Perihal</h5>

                        <select required name="id_jenis_surat" id="id_jenis_surat" class="form-control">
                            <option value=""> -- Pilih Perihal -- </option>
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
                        <h5>No Surat</h5>
                        <input type="text" name="no_surat" id="no_surat" required class="form-control" placeholder="No Surat">
                    </div> 

                    <div class="form-group">
                        <h5>Kepada</h5>

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
                        <h5>Isi Surat Keluar</h5>
                        <textarea required name="isi_surat" id="editor" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <h5>Yang membuat surat</h5>

                        <select required name="atas_nama" class="form-control">                            
                            <?php 
                                $crud   = new Crud();
                                $result = $crud->view(" SELECT * FROM `tb_user` INNER JOIN tb_jabatan
                                                        ON tb_user.id_jabatan = tb_jabatan.id_jabatan
                                                        WHERE tb_jabatan.`id_jabatan` IN (1,2)
                                                    ");          
                                foreach ($result as  $value):
                            ?>
                            <option value="<?= $value['nama']."-".$value['nip'] ?>"><?= $value['nama']." - ".$value['jabatan'] ?></option>
                            <?php endforeach ?>
                            <option value="AGUSTINUS CH.DULA - XXX XXX XXX">AGUSTINUS CH.DULA - BUPATI</option>
                        </select>

                    </div>  

                    <div class="form-group">
                        <h5>Tembusan</h5>
                        <textarea required name="tembusan" id="editor1" cols="30" rows="10" class="form-control"></textarea>
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

CKEDITOR.replace( 'editor1', {
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
                $("#no_surat").val(data.data.no_surat);
                CKEDITOR.instances["editor"].setData(data.data.isi_surat);
                
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError); 
            }
        });
    });

    // select2
    $('.js-example-basic-multiple').select2({
        placeholder:"-- Kepada --",
        width: '100%'
    });


});
</script>


