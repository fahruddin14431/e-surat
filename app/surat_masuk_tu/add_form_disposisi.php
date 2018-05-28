<div class="row">
    <!-- Column -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-block">

                <h3>Tambah Data Surat Masuk</h3>

                <form action="surat_masuk_tu/add_disposisi_proses.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <h5>Asal Surat Surat</h5>

                        <select required name="id_user" class="form-control">
                            <option value=""> -- Asal Surat -- </option>
                            <?php 
                                $crud   = new Crud();
                                $result = $crud->view("SELECT * FROM tb_user WHERE id_jabatan = '5'");          
                                foreach ($result as  $value):
                            ?>
                            <option value="<?= $value['id_user'] ?>"><?= $value['nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <h5>No Surat</h5>
                        <input type="text" name="no_surat" required class="form-control" placeholder="No Surat">
                    </div>                                        

                    <div class="form-group">
                        <h5>No Agenda</h5>
                        <input type="text" name="no_agenda" required class="form-control" placeholder="No Agenda">
                    </div>

                    <div class="form-group">
                        <h5>Perihal</h5>
                        <input type="text" name="perihal" required class="form-control" placeholder="Perihal">
                    </div>

                    <div class="form-group">
                        <h5>Tanggal Surat</h5>
                        <input type="date" name="tgl_surat" required class="form-control">
                    </div>

                    <div class="form-group">
                        <h5>File Surat</h5>
                        <input type="file" name="scan_surat" required>
                    </div>

                    <div class="form-group">                    
                        <input required type="submit" value="SIMPAN" class="btn btn-success form-control"/> 
                    </div>         

                </form>

            </div>
        </div>
    </div>
</div>