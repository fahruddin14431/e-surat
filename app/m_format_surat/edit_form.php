<?php 

$id_format_surat = $_GET['id_format_surat'];
$crud            = new Crud();
$result          = $crud->view(" SELECT * FROM tb_format_surat WHERE id_format_surat= '$id_format_surat'")[0];
?>
<div class="row">
    <!-- Column -->
    <div class="col-lg-10">
        <div class="card">
            <div class="card-block">

                <h3>Tambah Data Format Surat</h3>

                <form action="m_format_surat/edit.php" method="POST" enctype="multipart/form-data">                

                    <div class="form-group">
                        <h5>Kop Surat</h5>
                        <textarea required name="kop_surat" id="editor" cols="30" rows="10" class="form-control"><?= $result['kop_surat']?></textarea>
                    </div>

                    <div class="form-group">
                        <h5>Logo</h5>
                        <img src="../assets/images/<?= $result['logo'] ?>" width="100px" height="100px" alt="">
                        <input type="file" name="logo" require class="form-control">
                    </div>
        
                    <div class="form-group">                    
                        <button type="submit" name="id_format_surat" value="<?= $result['id_format_surat'] ?>"  class="btn btn-success">
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
</script>