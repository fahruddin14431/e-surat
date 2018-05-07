<div class="row">
    <!-- Column -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-block">

                <h3>Tambah Data Surat Masuk</h3>

                <form action="surat_masuk_tu/add.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <h5>File Surat</h5>
                        <input type="file" name="scan_surat" required>
                    </div>

                    <div class="form-group">                    
                        <input required type="submit" class="btn btn-success form-control"/> 
                    </div>         

                </form>

            </div>
        </div>
    </div>
</div>