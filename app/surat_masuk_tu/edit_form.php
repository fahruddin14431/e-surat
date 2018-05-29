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
                        <h5>Asal Surat Surat</h5>

                        <select required name="id_user" class="form-control">
                            <option value=""> -- Asal Surat -- </option>
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
                        <h5>No Surat</h5>
                        <input type="text" value="<?= $result1['no_surat'] ?>" name="no_surat" required class="form-control" placeholder="No Surat">
                    </div>

                    <div class="form-group">
                        <h5>No Agenda</h5>
                        <input type="text" value="<?= $result1['no_agenda'] ?>" name="no_agenda" required class="form-control" placeholder="No Agenda">
                    </div>

                    <div class="form-group">
                        <h5>Perihal</h5>
                        <input type="text" value="<?= $result1['perihal'] ?>" name="perihal" required class="form-control" placeholder="Perihal">
                    </div>

                    <div class="form-group">
                        <h5>Tanggal Penerimaan</h5>
                        <input type="date" value="<?= $result1['tanggal_surat_penerimaan'] ?>" name="tgl_penerimaan" required class="form-control">
                    </div>

                    <div class="form-group">
                        <h5>Tanggal Surat</h5>
                        <input type="date" name="tgl_surat" value="<?= $result1['tanggal_surat'] ?>" required class="form-control">
                    </div>

                    <div class="form-group">
                        <h5>File Scan Surat</h5>
                        <input type="file" name="scan_surat">
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