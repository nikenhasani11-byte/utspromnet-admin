<?php 
session_start();
    require 'function.php';

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");

        // cek username
        if(mysqli_num_rows($result) === 1){

            // cek password
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['password'])){
                // set session
                $_SESSION['session_login'] = true;
                $_SESSION['username'] = $username;

                header('Location: index.php');
                exit;
            }else{
                echo "<script>
                    alert('Password yang kamu masukkan salah!');
                    </script>
                ";  
            }
        }else{
            echo "<script>
                alert('Username yang kamu masukkan salah atau tidak ditemukan!');
                </script>
            ";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nikreative Studio | Log in Admin</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #fce4e4, #f8caca);
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-container {
    width: 100%;
    max-width: 540px;
    text-align: center;
    padding: 15px;
    margin: auto;
}

.login-container h1 {
    font-size: 20px;
    font-weight: bold;
    color: #171717;
    margin-bottom: 20px;
}

.login-box {
    width: 500px;
    background-color: #ffffff;
    padding: 25px 35px;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
    text-align: left;
}

.login-box input {
    width: 100%;
    height: 44px;
    padding: 10px 14px;
    margin-bottom: 14px;
    border: 1px solid #ddd;
    border-radius: 7px;
    font-size: 16px;
    outline: none;
    transition: 0.3s;
}

.login-box input:focus {
    border-color: #f28aa1;
    box-shadow: 0 0 5px rgba(242, 138, 161, 0.4);
}

.remember {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #555;
    font-size: 15px;
}

.remember input {
    width: 17px;
    height: 17px;
    margin: 0;
    accent-color: #f28aa1;
}
</style>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <h1>Nikreative Studio</h1>
  </div>

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>

          <div class="col-4">
          <a href="produk.php" class="btn btn-primary btn-block">Sign In</a>
          </div>
        </div>
      </form>

  </div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
