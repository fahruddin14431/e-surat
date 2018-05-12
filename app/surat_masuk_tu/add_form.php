<div class="row">
    <!-- Column -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-block">

                <h3>Tambah Data Surat Masuk</h3>

                <form action="surat_masuk_tu/add.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <h5>Asal Surat Surat</h5>

                        <select required name="id_pegawai" class="form-control">
                            <option value=""> -- Asal Surat -- </option>
                            <?php 
                                $crud   = new Crud();
                                $result = $crud->view("SELECT * FROM tb_pegawai WHERE id_jabatan = '5'");          
                                foreach ($result as  $value):
                            ?>
                            <option value="<?= $value['id_pegawai'] ?>"><?= $value['nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <h5>No Surat</h5>
                        <input type="text" name="no_surat" required class="form-control" placeholder="No Surat">
                    </div>

                    <div class="form-group">
                        <h5>Perihal</h5>
                        <input type="text" name="perihal" required class="form-control" placeholder="Perihal">
                    </div>

                    <div class="form-group">
                        <h5>Tanggal Penerimaan</h5>
                        <input type="date" name="tgl_penerimaan" required class="form-control">
                    </div>

                    <div class="form-group">
                        <h5>Tanggal Surat</h5>
                        <input type="date" name="tgl_surat" required class="form-control">
                    </div>

                    <div class="form-group">
                        <h5>Ditunjukan Kepada</h5>

                        <select required name="id_jabatan" class="form-control">
                            <option value=""> -- Ditunjukan Kepada -- </option>
                            <?php 
                                $crud   = new Crud();
                                $result = $crud->view(" SELECT * FROM tb_jabatan
                                                        WHERE id_jabatan NOT IN(4,5)");          
                                foreach ($result as  $value):
                            ?>
                            <option value="<?= $value['id_jabatan'] ?>"><?= $value['jabatan'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

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