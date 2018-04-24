<div class="row">
    <!-- Column -->
    <div class="col-lg-10">
        <div class="card">
            <div class="card-block">

                <h3>Tambah Data Jenis Surat</h3>

                <form action="m_jenis_surat/add.php" method="POST">                

                    <div class="form-group">
                        <h5>No Surat</h5>
                        <input required type="text" name="no_surat" class="form-control" placeholder="No Surat"/> 
                    </div>

                    <div class="form-group">
                        <h5>Jenis Surat</h5>
                        <input required type="text" name="jenis_surat" class="form-control" placeholder="Jenis Surat"/> 
                    </div>

                    <div class="form-group">
                        <h5>Isi Surat</h5>
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
</script>