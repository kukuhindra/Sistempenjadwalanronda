<?php


if ($act == 'add_save') {
    $id_user = "";
    $nama = "";
    $no_rmh = "";
    $telepon = "";
    $username = "";
    $password = "";
    $level = "";
}
 elseif ($act == 'upd_save') 
{
    foreach ($qdetwarga as $rowtedwarga) 
    {
        $id_user = $rowtedwarga->id_user;
        $nama = $rowtedwarga->nama;
        $no_rmh = $rowtedwarga->no_rmh;
        $telepon = $rowtedwarga->telepon;
        $username = $rowtedwarga->username;
        $password = $rowtedwarga->password;
        $level = $rowtedwarga->level;
    }
}

?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Warga</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('admin')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=site_url('admin/warga')?>">Data Warga</a></li>
              <li class="breadcrumb-item active">Form Warga</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-5">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= base_url() ?>admin/form/<?= $act ?>/<?=$id_user?>" method="post" >
                <div class="card-body">
                <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="nama" class=" form-control-label">Nama Lengkap</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nama" name="nama" placeholder="Masukan Nama Lengkap" value="<?= $nama ?>" class="form-control" required/>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="no_rmh" class=" form-control-label">No Rumah</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="text" id="no_rmh" name="no_rmh" placeholder="Masukan Nomor Rumah" value="<?= $no_rmh?>"class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="telepon" class=" form-control-label">No HP/Telepon</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="text" id="telepon" name="telepon" placeholder="Masukan Nomor HP/Telepon" value="<?= $telepon ?>" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="username" class=" form-control-label">Username</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="text" id="username" name="username" placeholder="Masukan Username" value="<?= $username ?>" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="password" id="password" name="password" placeholder="Buat Password" value="<?= $password ?>" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="level" class=" form-control-label">Level</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="level" id="level" class="form-control" value="" required>
                                                        <option value="0">Pilih Level</option>
                                                        <option value="1">Administrator</option>
                                                        <option value="2">Operator</option>
                                                        <option value="3">User</option>
                                                    </select>
                                                </div>
                                            </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>