<?php 

$id_jenis_surat = $_GET['id_jenis_surat'];
$crud           = new Crud();
$result         = $crud->view(" SELECT * FROM tb_jenis_surat WHERE id_jenis_surat= '$id_jenis_surat'")[0];
?>

<div class="row">
    <!-- Column -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-block">

                <h3>Ubah Data Jenis Surat</h3>

                <form action="m_jenis_surat/edit.php" method="POST">

                <div class="form-group">
                    <h5>Jenis Surat</h5>
                    <input required type="text" value="<?= $result['jenis_surat'] ?>" name="jenis_surat" class="form-control" placeholder="Jenis Surat"/> 
                </div>

                <div class="form-group">                                    
                    <button type="submit" name="id_jenis_surat" value="<?= $result['id_jenis_surat'] ?>"  class="btn btn-success">
                        SIMPAN
                    </button>
                </div>         

                </form>

            </div>
        </div>
    </div>
</div> 