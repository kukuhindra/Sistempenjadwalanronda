
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jadwal Ronda</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('admin')?>">Home</a></li>
              <li class="breadcrumb-item active">Jadwal Ronda</li>
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
                                                <th>Hari</th>
                                                <th>Jam Mulai</th>
                                                <th>Jam Selesai</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                        <?php if (empty($qjadwal)) { ?>
                                                        <tr>
                                                            <td colspan="5">-</td>
                                                        </tr>
                                                        <?php } else {
                                                        $num = 0;
                                                        foreach ($qjadwal as $rowjadwal) {
                                                            $num++; ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $num ?>
                                                                </td>
                                                                <td>
                                                                    <a href="<?= base_url() ?>admin/djadwal/<?=  $rowjadwal->hari ?>"><?= $rowjadwal->hari ?></a>
                                                                </td>
                                                                <td>
                                                                    <?= $rowjadwal->jam_mulai?>
                                                                </td>
                                                                <td>
                                                                    <?= $rowjadwal->jam_selesai?>
                                                                </td>
                                                                <td class="project-actions text-right">
                  
                          <a class="btn btn-info btn-sm" href="<?= base_url() ?>admin/formja/add/<?= $rowjadwal->id_jadwal ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Input
                          </a>
                      </td>
                                            </tr>
                                            <?php }
                                                    } ?>
                </tbody>
                <tfoot>
                <tr>
               
                <th>No</th>
                                                <th>Hari</th>
                                                <th>Jam Mulai</th>
                                                <th>Jam Selesai</th>
                                                <th>Action</th>
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