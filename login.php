<link href="sweetalert.css" rel="stylesheet">
  <?php 
    include('koneksi.php');

    if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($koneksi, htmlentities($_POST['username']));
    $password = mysqli_real_escape_string($koneksi, htmlentities ($_POST['password']));
    //$password = md5 ($_POST['password']);
                                 
    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password' ") or die(mysqli_error($koneksi));

    if(mysqli_num_rows($sql) == 0){
    echo"<br/>";
    echo "<script>alert('Username atau Password Salah')</script>";
    echo '<script type="text/javascript">window.location="index.php"</script>';

    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'") or die(mysqli_error($koneksi));      
    }else{

    session_start();

    $row = mysqli_fetch_assoc($sql);
    $_SESSION['id_user']        =$row['id_user'];
    $_SESSION['level']           =$row['level'];

                                    
                                    
    if($row['level'] == 'admin'){
      //echo "<script>alert('Success')</script>";
      //echo '<script type="text/javascript">window.location="admin/index.php"</script>';

      echo"<script>
      setTimeout(function () {  
        swal({
          title: 'LOGIN',
          text:  'Anda Berhasil Login',
          type: 'success',
          timer: 1500,
          showConfirmButton: true
        });  
      },1); 
      window.setTimeout(function(){ 
        window.location.replace('admin/index.php');
      } ); 
      </script>";
                                    
      }elseif($row['level'] == 'user'){
        echo"<script>
        setTimeout(function () {  
          swal({
            title: 'LOGIN',
            text:  'Anda Berhasil Login',
            type: 'success',
            timer: 1500,
            showConfirmButton: true
          });  
        },1); 
        window.setTimeout(function(){ 
          window.location.replace('user/index.php');
        } ); 
        </script>";
                                     
      }
      elseif($row['level'] == 'atasan'){
        //echo "<script>alert('Success')</script>";
        //echo '<script type="text/javascript">window.location="user/index.php"</script>';
        
        echo"<script>
        setTimeout(function () {  
          swal({
            title: 'LOGIN',
            text:  'Anda Berhasil Login',
            type: 'success',
            timer: 1500,
            showConfirmButton: true
          });  
        },1); 
        window.setTimeout(function(){ 
          window.location.replace('atasan/index.php');
        } ); 
        </script>";
      }
      else{
        header('location:index.php');
      }
    }
  }
  ?>
<script src="alert/sweetalert.min.js"></script>