<?php 

$id_pegawai = $_GET['id_pegawai'];
$crud       = new Crud();
$result     = $crud->view(" SELECT * FROM tb_pegawai INNER JOIN tb_login 
                            ON tb_pegawai.id_pegawai = tb_login.id_pegawai
                            WHERE tb_pegawai.id_pegawai = '$id_pegawai'")[0];
?>

<div class="row">
    <!-- Column -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-block">

                <h3>Ubah Data Dinas</h3>

                <form action="m_dinas/edit.php" method="POST">

                    <div class="form-group">
                        <h5>Dinas</h5>
                        <input required type="text" name="nama" value="<?= $result['nama'] ?>" class="form-control" placeholder="Dinas"/> 
                    </div>

                    <button type="submit" name="id_pegawai" value="<?= $result['id_pegawai'] ?>"  class="btn btn-success">
                        SIMPAN
                    </button>     

                </form>

            </div>
        </div>
    </div>
</div> 