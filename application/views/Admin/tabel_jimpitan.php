
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Jimpitan Perhari</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('admin')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=site_url('admin/list_jimpitan')?>">List Jimpitan</a></li>
              <li class="breadcrumb-item active">Data Jimpitan Perhari</li>
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
                                                <th>Tanggal</th>
                                                <th>Jumlah</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (empty($qjimpitan)) { ?>
                                                        <tr>
                                                            <td colspan="3">-</td>
                                                        </tr>
                                                        <?php } else {
                                                        $num = 0;
                                                        foreach ($qjimpitan as $rowjimpitan) {
                                                            $num++; ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $num ?>
                                                                </td>
                                                                <td><a href="<?= base_url() ?>admin/detail_jimpitan/<?=  $rowjimpitan->tanggal ?>">
                                                                    <?= $rowjimpitan->tanggal ?></a>
                                                                </td>
                                                                <td>
                                                                    <?= $rowjimpitan->jumlah?>
                                                                </td>
                                            </tr>
                                            <?php }
                                                    } ?>
                </tbody>
                <tfoot>
                <tr>
               
                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Jumlah</th>
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