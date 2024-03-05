<?php


if ($act == 'add_save') {
    $id_list = "";
    $id_user = "";
    $tanggal = "";
    $nominal = "";
    
} 
elseif ($act == 'upd_save')
 {
    foreach ($qdetjimpitan as $rowdetjimpitan) 
    {
        $id_list = $rowdetjimpitan->id_list;
        $id_user = $rowdetjimpitan->id_user;
        $tanggal = $rowdetjimpitan->tanggal;
        $nominal = $rowdetjimpitan->nominal;
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
            <h1>Form Jimpitan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('operator')?>">Home</a></li>
              <li class="breadcrumb-item active">Form Jimpitan</li>
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
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= base_url() ?>operator/formj/<?=$act?>/<?= $id_list?>" method="post" >
                <div class="card-body">
                <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="id_user" class=" form-control-label">Nama Lengkap</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" name="id_user" id="id_user" value="<?= $nama ?>">
                                                    <?php foreach ($ljimpitan as $rm) {
												if ($rm->id_user == $id_user) {
                                                    echo "<option value=" . $rm->id_user . " selected>" . $rm->nama . "</option>";
                                                }
												else {
													echo "<option value=" . $rm->id_user . ">" . $rm->nama . "</option>";
												}
											}
											?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="tanggal" class=" form-control-label">Tanggal</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="date" id="tanggal" name="tanggal" placeholder="Tanggal" value="<?= $tanggal ?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="nominal" class=" form-control-label">Nominal</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="text" id="nominal" name="nominal" placeholder="nominal" value="<?= $nominal ?>" class="form-control" required>
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
