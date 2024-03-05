<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="<?=base_url()?>/assets/assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?=base_url()?>/assets/assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?=base_url()?>/assets/assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>/assets/assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?=base_url()?>/assets/assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge6">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <H3 >Silahkan Mendaftar</H3>
                            </a>
                        </div>
                        <div class="login-form">
                                       <form action="<?= base_url() ?>admin/form/<?= $act ?>" method="post" >
                <div class="card-body">
                <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="nama" class=" form-control-label">Nama Lengkap</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="nama" name="nama" placeholder="Masukan Nama Lengkap" value="" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="blok" class=" form-control-label">Blok Rumah</label>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="no_rmh" class=" form-control-label">No Rumah</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="text" id="no_rmh" name="no_rmh" placeholder="Masukan Nomor Rumah" value=""class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="telepon" class=" form-control-label">No HP/Telepon</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="text" id="telepon" name="telepon" placeholder="Masukan Nomor HP/Telepon" value="" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="username" class=" form-control-label">Username</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="text" id="username" name="username" placeholder="Masukan Username" value="" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="password" id="password" name="password" placeholder="Buat Password" value="" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="level" class=" form-control-label">Level</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="level" id="level" class="form-control" value="" required>
                                                        <option value="0">Pilih Level</option>
                                                        <option value="3">User</option>
                                                    </select>
                                                </div>
                                            </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a  href="<?= base_url('Login')?>" class="btn btn-primary">Batal</a>
                </div>
              </form>
              </div>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="#">Sign In</a>
                                </p>
                            </div>
                     
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?=base_url()?>/assets/assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?=base_url()?>/assets/assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?=base_url()?>/assets/assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?=base_url()?>/assets/assets/vendor/slick/slick.min.js">
    </script>
    <script src="<?=base_url()?>/assets/assets/vendor/wow/wow.min.js"></script>
    <script src="<?=base_url()?>/assets/assets/vendor/animsition/animsition.min.js"></script>
    <script src="<?=base_url()?>/assets/assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?=base_url()?>/assets/assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?=base_url()?>/assets/assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?=base_url()?>/assets/assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?=base_url()?>/assets/assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=base_url()?>/assets/assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?=base_url()?>/assets/assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?=base_url()?>/assets/assets/js/main.js"></script>

</body>

</html>
<!-- end document-->