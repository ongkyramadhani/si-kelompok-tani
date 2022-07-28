<?php 
  session_start();
  require "koneksi.php";
  error_reporting(0);
  $username  = $_REQUEST['username'];
  $password = $_REQUEST['password'];

  $admin = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'") or die(mysqli_error($koneksi));
  $cek = mysqli_fetch_array($admin);
  $ketua = mysqli_query($koneksi, "SELECT * FROM ketua WHERE username='$username' AND password='$password'") or die(mysqli_error($koneksi));
  $cek2  = mysqli_fetch_array($ketua);
  if(isset($_POST['login'])){
    if($cek['level'] == 'admin'){
      $_SESSION['id_user'] =$cek['id_user'];
      $_SESSION['level']   =$cek['level'];
      ?> <script>window.location='admin/index.php'</script> <?php
    }else if($cek['level'] == 'atasan'){
      $_SESSION['id_user'] =$cek['id_user'];
      $_SESSION['level']   =$cek['level'];
      ?> <script>window.location='atasan/index.php'</script> <?php
    }else if($cek2['level'] == 'ketua'){
      $_SESSION['id_ke'] = $cek2['id_ke'];
      $_SESSION['level']       =$cek2['level'];
      ?> <script>window.location='user/index.php'</script> <?php
    }else{
      ?><script>alert('Gagal Login');window.location="index.php"; </script><?php
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Online Dinas Pertanian</title>
  <link rel="stylesheet" href="css_page.css">
  <link href='kalsel.png' rel='icon' type='image/x-icon'/>
</head>
<body>
  <style>
.bottom:before {
  transform: rotate(-45deg);
  background: #42f5ef;
}
.bottom:after {
  transform: rotate(-135deg);
  background: #42f5bf;
}
  .btn-primary {
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}</style>

<div class="container" onclick="onclick">
  <div class="top"></div>
    <div class="bottom"></div>
    <form action="" method="post">
      <div class="center">
        <img src="kalsel.png" width="75" alt="">
        <h3 class="">Masukan Username dan Password</h3>
        <input type="text" name="username" placeholder="Username"/>
        <input type="password" name="password" placeholder="Password"/>
        <button class="btn-primary" type="submit" name="login"> Login</button>
        <h2>&nbsp;</h2>
      </div>  
    </form>
  </div>
  
</body>
</html>