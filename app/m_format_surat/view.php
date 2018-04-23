<div class="row">
    <!-- Column -->
    <div class="col-lg-10">
        <div class="card">
            <div class="card-block">

                <h3>Master Format Surat</h3>

                <?php
                    $crud           = new Crud();
                    $result         = $crud->view(" SELECT * FROM tb_format_surat")[0];
                ?>

                 <form action="m_format_surat/edit.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <h5>Kop Surat</h5>
                        <textarea name="kop_surat" id="editor" cols="30" rows="10" class="form-control"><?= $result['kop_surat']?></textarea>
                    </div>

                    <div class="form-group">
                        <h5>Logo</h5>
                        <img src="../assets/images/<?= $result['logo']?>" alt="" width="25%" height="25%">
                        <input  type="file" name="logo" class="form-control" placeholder="Logo"/> 
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
<!-- config ckeditor -->
<script>
CKEDITOR.replace( 'editor', {
    height: 200
});
</script>
