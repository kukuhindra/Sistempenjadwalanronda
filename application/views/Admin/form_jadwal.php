<?php
foreach ($qjadwal as $qhjadwal)
{
    $haris = $qhjadwal->hari;
    $id_jadwals = $qhjadwal->id_jadwal;
}

if ($act == 'add_save') {
    $id_jadwal_detail = "";
    $id_jadwal = "";
    $id_user = "";
    $hari = "";
} 
elseif ($act == 'upd_save')
 {
    foreach ($qdetjadwal as $rowdetjadwal) 
    {
        $id_jadwal_detail = $rowdetjadwal->$id_jadwal_detail;
        $id_jadwal = $rowdetjadwal->$id_jadwal;
        $id_user = $rowdetjadwal->id_user;
        $hari = $rowdetjadwal->hari;
       
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
            <h1>Form Jadwal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('admin')?>">Home</a></li>
              <li class="breadcrumb-item active">Form Jadwal</li>
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
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h1 class="card-title"></h1>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url() ?>admin/formja/<?= $act ?>/<?= $id_jadwal_detail?>" method="post" class="form-horizontal">
              <div class="card-body">
                <div class="row form-group">     
                                                <div class="col col-md-3">
                                                    <label for="id_jadwal" class=" form-control-label">Hari</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="text" id="hari" name="hari" placeholder="hari" value="<?= $haris ?>" class="form-control">
                                                <input type="text" hidden  id="id_jadwal" name="id_jadwal" placeholder="id_jadwal" value="<?= $id_jadwals ?>" class="form-control">
                                                </div>
                                            </div>
                                   <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="id_user" class=" form-control-label">Nama Lengkap</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" name="id_user" id="id_user" >
                                                    <?php foreach ($ljimpitan as $rm) {
												if ($rm->nama == $nama) {
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
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
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
