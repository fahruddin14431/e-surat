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

                <h3>Ubah Data Dinas</h3>

                <form action="m_dinas/edit.php" method="POST">

                    <div class="form-group">
                        <h5>Dinas</h5>
                        <input required type="text" name="nama" value="<?= $result['nama'] ?>" class="form-control" placeholder="Dinas"/> 
                    </div>

                    <button type="submit" name="id_user" value="<?= $result['id_user'] ?>"  class="btn btn-success">
                        SIMPAN
                    </button>     

                </form>

            </div>
        </div>
    </div>
</div> 