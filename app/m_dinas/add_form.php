<div class="row">
    <!-- Column -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-block">

                <h3>Tambah Data Instansi</h3>

                <form action="m_dinas/add.php" method="POST">

                    <div class="form-group">
                        <h5>Instansi</h5>
                        <input required type="text" name="nama" class="form-control" placeholder="Instansi"/> 
                    </div>

                    <div class="form-group">
                        <h5>Username</h5>
                        <input required type="text" name="nama_pengguna" class="form-control" placeholder="Username"/> 
                    </div>

                    <div class="form-group">
                        <h5>Password</h5>
                        <input required type="password" name="kata_sandi" class="form-control" placeholder="Password"/> 
                    </div>       

                    <div class="form-group">                    
                        <input required type="submit" value="SIMPAN" class="btn btn-success form-control"/> 
                    </div>         

                </form>

            </div>
        </div>
    </div>
</div> 