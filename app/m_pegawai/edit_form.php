<?php 

$id_user = $_GET['id_user'];
$crud       = new Crud();
$result     = $crud->view(" SELECT * FROM tb_user INNER JOIN tb_login 
                            ON tb_user.id_user = tb_login.id_user
                            WHERE tb_user.id_user = '$id_user'")[0];
?>

<div class="row">
    <!-- Column -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-block">

                <h3>Ubah Data User</h3>

                <form action="m_pegawai/edit.php" method="POST">

                <div class="form-group">
                    <h5>NIP</h5>
                    <input type="text" value="<?= $result['nip'] ?>" name="nip" class="form-control" placeholder="NIP"/> 
                    <i>*biarkan kosong selain pegawai</i>
                </div>

                <div class="form-group">
                    <h5>Nama</h5>
                    <input required type="text" name="nama" value="<?= $result['nama'] ?>" class="form-control" placeholder="Nama"/> 
                </div>

                <div class="form-group">
                    <h5>Hak Akses</h5>

                    <select required name="id_jabatan" class="form-control">
                        <option value=""> -- Pilih Hak Akses -- </option>
                        <?php 
                            $crud   = new Crud();
                            $res    = $crud->view("SELECT * FROM tb_jabatan");          
                            foreach ($res as $value):
                        ?>
                        <option <?= ($result['id_jabatan']==$value['id_jabatan'])?"selected":"" ?> value="<?= $value['id_jabatan'] ?>"><?= $value['jabatan'] ?></option>
                        <?php endforeach ?>
                    </select>
                
                </div>

                <!-- <div class="form-group">
                    <h5>Username</h5>
                    <input required type="text" name="nama_pengguna" class="form-control" placeholder="Username"/> 
                </div>

                <div class="form-group">
                    <h5>Password</h5>
                    <input required type="text" name="kata_sandi" class="form-control" placeholder="Password"/> 
                </div>        -->

                <div class="form-group">
                    <h5>Status</h5>
                    <select required name="status" class="form-control">
                        <option value=""> -- Pilih Status -- </option>
                        <?php 
                            $res = array('KEPALA BADAN', 'ADMIN', 'TU', 'DINAS');
                            foreach ($res as $value):
                        ?>
                        <option <?= ($result['status']==$value)?"selected":"" ?> value="<?= $value ?>"><?= $value ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">                                    
                    <button type="submit" name="id_user" value="<?= $result['id_user'] ?>"  class="btn btn-success">
                        SIMPAN
                    </button>
                </div>         

                </form>

            </div>
        </div>
    </div>
</div> 