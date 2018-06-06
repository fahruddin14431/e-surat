<?php 

$id_surat_masuk = $_GET['id_surat_masuk'];
$crud           = new Crud();
$result1         = $crud->view(" SELECT * FROM tb_surat_masuk
                            WHERE id_surat_masuk = '$id_surat_masuk'")[0];
?>
<div class="row">
    <!-- Column -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-block">

                <h3>Ubah Data Surat Masuk</h3>

                <form action="surat_masuk_tu/edit.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <h5>Tanggal Penerimaan</h5>
                        <input type="date" name="tgl_penerimaan" value="<?= $result1['tanggal_surat_penerimaan'] ?>" required class="form-control">
                    </div>

                    <div class="form-group">
                        <h5>No Agenda</h5>
                        <input type="text" name="no_agenda" required class="form-control" placeholder="No Agenda" value="<?= $result1['no_agenda'] ?>">
                    </div>

                    <div class="form-group">
                        <h5>Indeks Masalah</h5>
                        <input type="text" name="indeks_masalah" required class="form-control" placeholder="Indeks Masalah" value="<?= $result1['indeks_masalah'] ?>">
                    </div>

                    <div class="form-group">
                        <h5>Dari</h5>

                        <select required name="id_user" class="form-control">
                            <option value=""> -- Dari -- </option>
                            <?php 
                                $crud   = new Crud();
                                $result = $crud->view("SELECT * FROM tb_user WHERE id_jabatan = '5'");          
                                foreach ($result as  $value):
                            ?>
                            <option <?= $result1['id_user']==$value['id_user']?"selected":"" ?> value="<?= $value['id_user'] ?>"><?= $value['nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <h5>Tanggal Surat</h5>
                        <input type="date" name="tgl_surat" required class="form-control" value="<?= $result1['tanggal_surat'] ?>">
                    </div>

                    <div class="form-group">
                        <h5>No Surat</h5>
                        <input type="text" name="no_surat" required class="form-control" placeholder="No Surat" value="<?= $result1['no_surat'] ?>">
                    </div>

                    <div class="form-group">
                        <h5>Instruksi</h5>
                        <input type="text" name="instruksi" required class="form-control" placeholder="Instruksi" value="<?= $result1['instruksi'] ?>">
                    </div>

                    <div class="form-group">
                        <h5>Kepada</h5>

                        <select required name="id_jabatan" class="form-control">
                            <option value=""> -- Kepada -- </option>
                            <?php 
                                $crud   = new Crud();
                                $result = $crud->view("SELECT * FROM tb_jabatan WHERE id_jabatan IN(6,7,8,9,10)");          
                                foreach ($result as  $value):
                            ?>
                            <option <?= $result1['id_jabatan']==$value['id_jabatan']?"selected":"" ?> value="<?= $value['id_jabatan'] ?>"><?= $value['jabatan'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>                    

                    <div class="form-group">
                        <h5>Perihal</h5>
                        <input type="text" name="perihal" required class="form-control" placeholder="Perihal" value="<?= $result1['perihal'] ?>">
                    </div>                    

                    <div class="form-group">
                        <h5>Scan Surat 1</h5>
                        <input type="file" name="scan_surat" required>
                    </div>

                    <div class="form-group">
                        <h5>Scan Surat 2</h5>
                        <input type="file" name="scan_surat2" required>
                    </div>

                    <div class="form-group">                                    
                        <button type="submit" name="id_surat_masuk" value="<?= $result1['id_surat_masuk'] ?>"  class="btn btn-success">
                            SIMPAN
                        </button>
                    </div>                 

                </form>

            </div>
        </div>
    </div>
</div>