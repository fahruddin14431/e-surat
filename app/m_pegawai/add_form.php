<div class="row">
    <!-- Column -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-block">

                <h3>Tambah Data User</h3>

                <form action="m_pegawai/add.php" method="POST">

                <div class="form-group">
                    <h5>NIP</h5>
                    <input type="text" name="nip" class="form-control" placeholder="NIP"/> 
                    <i>*biarkan kosong selain pegawai</i>
                </div>
                

                <div class="form-group">
                    <h5>Nama</h5>
                    <input required type="text" name="nama" class="form-control" placeholder="Nama"/> 
                </div>

                <div class="form-group">
                    <h5>Hak Akses</h5>

                    <select required name="id_jabatan" class="form-control">
                        <option value=""> -- Pilih Hak Akses -- </option>
                        <?php 
                            $crud   = new Crud();
                            $result = $crud->view("SELECT * FROM tb_jabatan");          
                            foreach ($result as  $value):
                        ?>
                        <option value="<?= $value['id_jabatan'] ?>"><?= $value['jabatan'] ?></option>
                        <?php endforeach ?>
                    </select>

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
                    <h5>Status</h5>
                    <select required name="status" class="form-control">
                        <option value=""> -- Pilih Status -- </option>
                        <?php 
                            // $result = array('KEPALA BADAN', 'ADMIN', 'TU', 'PEGAWAI','DINAS');
                            $result = array('KEPALA BADAN', 'ADMIN', 'TU', 'BIDANG','INSTANSI');
                            foreach ($result as  $value):
                        ?>
                        <option value="<?= $value ?>"><?= $value ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">                    
                    <input required type="submit" value="SIMPAN" class="btn btn-success form-control"/> 
                </div>         

                </form>

            </div>
        </div>
    </div>
</div> 