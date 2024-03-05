
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Anggota Ronda</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('admin')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=site_url('admin/jadwal')?>">Jadwal Ronda</a></li>
              <li class="breadcrumb-item active">Anggota Ronda</li>
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
                                                <th>Nama</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                        <?php if (empty($qdjadwal)) { ?>
                                                        <tr>
                                                            <td colspan="3">-</td>
                                                        </tr>
                                                        <?php } else {
                                                        $num = 0;
                                                        foreach ($qdjadwal as $rowdjadwal) {
                                                            $num++; ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $num ?>
                                                                </td>
                                                                <td>
                                                                    <?= $rowdjadwal->nama?>
                                                                </td>
                                                                <td class="project-actions text-lift">
                                                                <a class="btn btn-danger btn-sm" href="<?= base_url() ?>admin/delja/<?= $rowdjadwal->id_user ?>" onclick="return confirm('Anda yakin akan meghapus <?= $rowdjadwal->nama ?>')">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                                                </td>
                                            </tr>
                                            <?php }
                                                    } ?>
                                        </tbody>
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