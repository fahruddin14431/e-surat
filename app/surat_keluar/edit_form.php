<?php 

$id_surat_keluar = $_GET['id_surat_keluar'];
$crud            = new Crud();
$result1         = $crud->view(" SELECT * FROM tb_surat_keluar
                                WHERE id_surat_keluar = '$id_surat_keluar'")[0];
$result2         = $crud->view(" SELECT * FROM tb_detail_surat_keluar
                                WHERE id_surat_keluar = '$id_surat_keluar'")[0];                                
?>
<div class="row">
    <!-- Column -->
    <div class="col-lg-10">
        <div class="card">
            <div class="card-block">

                <h3>Ubah Data Surat Keluar</h3>

                <form action="surat_keluar/edit.php" method="POST">

                    <!-- <div class="form-group">
                        <h5>Kop Surat</h5>

                        <select required name="id_format_surat" class="form-control">
                            <option value=""> -- Pilih Kop Surat -- </option>
                            <?php 
                                $crud   = new Crud();
                                $result = $crud->view("SELECT * FROM tb_format_surat");          
                                foreach ($result as  $value):
                            ?>
                            <option <?= $result1['id_format_surat']==$value['id_format_surat']?"selected":"" ?> value="<?= $value['id_format_surat'] ?>"><?= $value['nama_kop'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div> -->

                    <div class="form-group">
                        <h5>Tanggal Surat Dibuat</h5>
                        <input type="date" name="tanggal_surat_dibuat" value='<?= $result1['tanggal'] ?>'  required class="form-control">
                    </div>  

                    <!-- <div class="form-group">
                        <h5>Lampiran</h5>
                        <input value='<?= $result1['lampiran'] ?>' type="text" name="lampiran" required class="form-control" placeholder="Lampiran">
                    </div>    -->

                    <div class="form-group">
                        <h5>Perihal</h5>

                        <select required name="id_jenis_surat" id="id_jenis_surat" class="form-control">
                            <option value=""> -- Pilih Perihal -- </option>
                            <?php 
                                $crud   = new Crud();
                                $result = $crud->view("SELECT * FROM tb_jenis_surat");          
                                foreach ($result as  $value):
                            ?>
                            <option <?= $result1['id_jenis_surat']==$value['id_jenis_surat']?"selected":"" ?> value="<?= $value['id_jenis_surat'] ?>"><?= $value['jenis_surat'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <h5>No Surat</h5>
                        <input value='<?= $result1['no_surat'] ?>' type="text" name="no_surat" id="no_surat" required class="form-control" placeholder="No Surat">
                    </div>     

                    <div class="form-group">
                        <h5>Isi Surat Keluar</h5>
                        <textarea required name="isi_surat" id="editor" cols="30" rows="10" class="form-control"><?= $result1['isi'] ?></textarea>
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
                        </select>

                    </div>  

                    <div class="form-group">
                        <h5>Tembusan</h5>
                        <textarea required name="tembusan" id="editor1" cols="30" rows="10" class="form-control"><?= $result1['tembusan'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <h5>Lampiran</h5>
                        <textarea required name="lampiran" id="editor2" cols="30" rows="10" class="form-control"><?= $result1['lampiran'] ?></textarea>
                    </div>

                    <div class="form-group">                    
                        <button type="submit" name="id_surat_keluar" value="<?= $id_surat_keluar ?>"  class="btn btn-success">
                            SIMPAN
                        </button>
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

CKEDITOR.replace( 'editor2', {
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
                CKEDITOR.instances["editor"].setData(data.data.lampiran);
                
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


