
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Absensi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('user')?>">Home</a></li>
              <li class="breadcrumb-item active">Data absensi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                                                <th>No</th>
                                                <th>Hari/Tanggal</th>
                                                <th>Nama</th>
                                                <th>Status</th>
                                                <th>Waktu Berangkat</th>
                                                <th>Waktu Pulang</th>
                                                <th>Denda</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                        <?php if (empty($qabsensi)) { ?>
                                                        <tr>
                                                            <td colspan="7">-</td>
                                                        </tr>
                                                        <?php } else {
                                                        $num = 0;
                                                        foreach ($qabsensi as $rowabsensi) {
                                                            $num++; ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $num ?>
                                                                </td>
                                                                <td>
                                                                   <?= $rowabsensi->hari ?>/<?= $rowabsensi->tanggal ?>
                                                                </td>
                                                                <td>
                                                                    <?= $rowabsensi->nama?>
                                                                </td>
                      
                                                                <td>
                                                                <button id="btnPinjam" class="btn btn-circle btn-info btn-xs m-b-10"><?= $rowabsensi->Status ?></button>
                                                                </td>
                                                                <td>
                                                                    <?= $rowabsensi->waktu_berangkat?>
                                                                </td>
                                                                <td>
                                                                    <?= $rowabsensi->waktu_pulang?>
                                                                </td>
                                                                <td>
                                                                    <?= $rowabsensi->denda?>
                                                                </td>
                      
                                                               
                                            </tr>
                                            <?php }
                                                    } ?>
                                        </tbody>
                <tfoot>
                <tr>
                <th>No</th>
                                                <th>Hari/Tanggal</th>
                                                <th>Nama</th>
                                                <th>Status</th>
                                                <th>Waktu Berangkat</th>
                                                <th>Waktu Pulang</th>
                                                <th>Denda</th>
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