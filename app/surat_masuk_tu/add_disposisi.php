<?php 
$id_surat = $_GET['id_surat'];
?>
<div class="row">
    <!-- Column -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-block">

                <h3>Disposisi Surat</h3>

                <form action="surat_masuk_tu/disposisi.php" method="POST">
        
                    <div class="form-group">
                        <h5>Disposisi</h5>

                        <select required name="id_jabatan" class="form-control">
                            <option value=""> -- Ditunjukan Kepada -- </option>
                            <?php 
                                $crud   = new Crud();
                                $result = $crud->view(" SELECT * FROM tb_jabatan
                                                        WHERE id_jabatan IN(6,7,8,9,10)");          
                                foreach ($result as  $value):
                            ?>
                            <option value="<?= $value['id_jabatan'] ?>"><?= $value['jabatan'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <h5>Instruksi</h5>
                        <input type="text" name="instruksi" class="form-control" required>
                    </div>

                   <div class="form-group">                                    
                    <button type="submit" name="id_surat" value="<?= $id_surat ?>"  class="btn btn-success">
                        SIMPAN
                    </button>
                </div>                

                </form>

            </div>
        </div>
    </div>
</div>