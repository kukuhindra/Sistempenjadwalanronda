
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Warga</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=site_url('admin')?>">Home</a></li>
              <li class="breadcrumb-item active">Data Warga</li>
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
              <a class="btn btn-primary btn-sm" href="<?=site_url('admin/form/add')?>">
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
                                                <th>Nama</th>
                                                <th>No Rumah</th>
                                                <th>No Telepon</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (empty($qwarga)) { ?>
                                                        <tr>
                                                            <td colspan="6">-</td>
                                                        </tr>
                                                        <?php } else {
                                                        $num = 0;
                                                        foreach ($qwarga as $rowwarga) {
                                                            $num++; ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $num ?>
                                                                </td>
                                                                <td>
                                                                    <?= $rowwarga->nama ?>
                                                                </td>
                                                                <td>
                                                                    <?= $rowwarga->no_rmh ?>
                                                                </td>
                                                                <td>
                                                                    <?= $rowwarga->telepon?>
                                                                </td>
            
                                                                <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="<?= base_url() ?>admin/detail_warga/<?= $rowwarga->id_user ?>">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="<?= base_url() ?>admin/form/upd/<?= $rowwarga->id_user ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="<?= base_url() ?>admin/del/<?= $rowwarga->id_user ?>" onclick="return confirm('Anda yakin akan meghapus <?= $rowwarga->nama ?>')">
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