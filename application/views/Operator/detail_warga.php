
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Warga</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
			  <li class="breadcrumb-item"><a href="<?=site_url('operator')?>">Home</a></li>
			  <li class="breadcrumb-item"><a href="<?=site_url('operator/warga')?>">Data Warga</a></li>
              <li class="breadcrumb-item active">Detail Warga</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
              <table class="table table-bordered">
											<tbody>
												<?php if(empty($qwargad)) { ?>
												<?php header("Location: ".base_url());?>
die();
												<?php }else {
            
                foreach ($qwargad as $rowwarga) {
                 ?>
												<tr>
													<td>
														Nama
													</td>
													<td>
														<?=$rowwarga->nama?>
													</td>
												</tr>
												<tr>
													<td>
														No rumah
													</td>
													<td>
														<?=$rowwarga->no_rmh?>
													</td>
												</tr>
												<tr>
													<td>
														Telepon
													</td>
													<td>
														<?=$rowwarga->telepon?>
													</td>
												</tr>
                                                <tr>
												<td>
													Jadwal Ronda
												</td>
												<td>
													<?=$rowwarga->hari?>
												</td>
                                                </tr>
												<tr>
												<td>
													Level
												</td>
												<td>
													<?php
													if ($rowwarga->level == 1)
													{
														echo "Admin";
													}
													elseif ($rowwarga->level == 2)
													{
														echo "Operator";
													}
													else 
													{
														echo "Warga";

													}
													?>
												</td>
												</tr>
												<?php }} ?>
											</tbody>
										</table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->