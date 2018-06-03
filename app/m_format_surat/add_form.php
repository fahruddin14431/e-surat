<div class="row">
    <!-- Column -->
    <div class="col-lg-10">
        <div class="card">
            <div class="card-block">

                <h3>Tambah Data Format Surat</h3>

                <form action="m_format_surat/add.php" method="POST" enctype="multipart/form-data">                

                    <div class="form-group">
                        <h5>Kop Surat</h5>
                        <textarea required name="kop_surat" id="editor" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <h5>Logo</h5>
                        <input type="file" name="logo" required>
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
</script>