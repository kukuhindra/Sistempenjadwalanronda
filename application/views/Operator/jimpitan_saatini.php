
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jimpitan Hari ini</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('operator')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=site_url('operator/list_jimpitan')?>">List Jimpitan</a></li>
              <li class="breadcrumb-item active">Jimpitan Hari ini</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        <div class="project-actions text-left"> 
              <a class="btn btn-primary btn-sm" href="<?=site_url('operator/formj/add')?>">
                              Tambah Data
                              <i class="fas fa-plus">
                              </i>
                          </a>
              </div>
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
                                                <th>nama</th>
                                                <th>No Rumah</th>
                                                <th>Tanggal</th>
                                                <th>Nominal</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (empty($jimpitan)) { ?>
                                                        <tr>
                                                            <td colspan="7">-</td>
                                                        </tr>
                                                        <?php } else {
                                                        $num = 0;
                                                        foreach ($jimpitan as $rowjimpitan) {
                                                            $num++; ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $num ?>
                                                                </td>
                                                                <td>
                                                                    <?= $rowjimpitan->nama ?>
                                                                </td>
                                                                <td>
                                                                    <?= $rowjimpitan->no_rmh ?>
                                                                </td>
                                                                <td>
                                                                    <?= $rowjimpitan->tanggal ?>
                                                                </td>
                                                                <td>
                                                                    <?= $rowjimpitan->nominal?>
                                                                </td>
                                                                <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="<?= base_url() ?>operator/formj/upd/<?= $rowjimpitan->id_list?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="<?= base_url() ?>operator/deljh/<?= $rowjimpitan->id_list ?>" onclick="return confirm('Anda yakin akan meghapus <?= $rowjimpitan->nama ?>')">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                                            </tr>
                                            <?php }
                                                    } ?>
                                        </tbody>
                <tfoot>
                <tr>
                <th>No</th>
                                                <th>nama</th>
                                                <th>No Rumah</th>
                                                <th>Tanggal</th>
                                                <th>Nominal</th>
                                                <th>action</th>
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