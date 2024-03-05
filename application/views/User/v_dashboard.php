
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('user')?>">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php if (isset($total_warga)) {
                            echo $total_warga;
                          } else {
                            echo "Data tidak muncul!";
                          } ?></h3>

                <p>Total Warga</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="<?=site_url('user/warga')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php if (isset($total_hari)) {
                        echo $total_hari;
                      } else {
                        echo "Data tidak muncul!";
                      } ?><sup style="font-size: 20px">Hari</sup></h3>

                <p>Total Pelaksanaan</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?=site_url('user/jimpitan_perhari')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php if (empty($jumlah_bgt)) {
                      } else {
                        foreach ($jumlah_bgt as $rowjmlh) {

                        echo "$rowjmlh->jumlah_bgt";
                      } 
                    }?></h3>

                <p>Total Jimpitan</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
             
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Jadwal Ronda Hari ini</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>No HP</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                        <?php if (empty($qabsen)) { ?>
                                                        <tr>
                                                            <td colspan="3">-</td>
                                                        </tr>
                                                        <?php } else {
                                                        $num = 0;
                                                        foreach ($qabsen as $rowabsensi) {
                                                            $num++; ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $num ?>
                                                                </td>
                                                                <td>
                                                                    <?= $rowabsensi->nama?>
                                                                </td>
                                                                <td>
                                                                    <?= $rowabsensi->telepon?>
                                                                </td>
                                            </tr>
                                            <?php }
                                                    } ?>
                                        </tbody>
                <tfoot>
                <tr>
                <th>No</th>
                                                <th>Nama</th>
                                                <th>No HP</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>