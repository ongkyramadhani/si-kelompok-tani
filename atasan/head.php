<?php require_once ('../koneksi.php');
 session_start(); 
//Check whether the session variable SESS_MEMBER_ID is present or not error 500
if (!isset($_SESSION['id_user']) || (trim($_SESSION['id_user']) == '')) { ?>
<script>
window.location = "../";
</script>
<?php 
}
$session_id=$_SESSION['id_user'];

$user_query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$session_id'")or die(mysqli_error($koneksi));
$user_row = mysqli_fetch_array($user_query);

$_SESSION['message'] = "Hallo";
$_SESSION['msg_type'] = "berhasil";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dinas Perkebunan dan Peternakan Prov. Kal-Sel</title>
  <link href='../kalsel.png' rel='icon' type='image/x-icon'/>
  <!-- Google Font: Source Sans Pro AdminLTELogo -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../kalsel.png" alt="AdminLTELogo" height="120" width="90">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user-cog"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Account</span>
          <div class="dropdown-divider"></div>
          <a href="../logout.php" onClick="javascript: return confirm('Anda Yakin Ingin Logout ?');" class="dropdown-item">
            <ion-icon name="log-out-outline"></ion-icon> LogOut
          </a>
          
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pegawai.php" class="nav-link">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="wilayah.php" class="nav-link">
                  <i class="fas fa-map-marked-alt nav-icon"></i>
                  <p>Wilayah Binaan</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="kelompok.php" class="nav-link">
                  <i class="fas fa-globe nav-icon"></i>
                  <p>Kelompok Tani</p>
                </a>
              </li> -->
              <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li> -->
            </ul>
          </li>
          <br>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-signature"></i>
              <p>
                Seluruh Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ketua.php" class="nav-link">
                  <i class="fas fa-book-reader nav-icon"></i>
                  <p>Akun Ketua Kelompok</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kelompok.php" class="nav-link">
                  <i class="nav-icon fas fa-globe nav-icon"></i>
                  <p>Kelompok Tani</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="anggota.php" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Anggota Kelompok Tani</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="bantuan.php" class="nav-link">
                  <i class="fas fa-hand-holding-usd nav-icon"></i>
                  <p>Surat Bantuan KT</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="monitoring.php" class="nav-link">
                  <i class="fas fa-eye nav-icon"></i>
                  <p>Monitoring Bantuan KT</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-folder-open nav-icon"></i>
              <p>
                Disposisi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pengajuan.php" class="nav-link">
                  <i class="fas fa-file-invoice-dollar nav-icon"></i>
                  <p>Pengajuan Bantuan KT</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>