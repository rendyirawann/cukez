<?php
    require "base/koneksi.php";
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM user WHERE (username='$username') AND (email='$email') and password='$password'";
        $login = mysqli_query($conn, $query);
        $cek = mysqli_num_rows($login);
      }

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($login);

        if ($data['level']=="admin") {  
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['level'] = "admin";
            $_SESSION['password'] = "$password";
            echo "<script>
            alert('Login Successfull');
            document.location.href = 'admin.php';
            </script>";
        }elseif ($data['level']=="user") {
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['level'] = "user";
            $_SESSION['password'] = "$password";
            echo "<script>
            alert('Login Successfull');
            document.location.href = 'admin.php';
            </script>";
        }else {
            header("location:login.php");
        }
    }else {
        header("location:login.php");
    }