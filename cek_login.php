<?php
    session_start();
    include "koneksi.php";
    $id_user = $_POST['id_users'];
    $pass = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE id_users='$id_user' AND password='$pass'";

    if ($_POST["captcha_code"]==$_SESSION["captcha_code"]){
        $login = mysqli_query($con, $sql);
        $ketemu = mysqli_num_rows($login);
        $r = mysqli_fetch_array($login);
        if($ketemu>0){
        $_SESSION['id_user'] = $r['id_users'];
        $_SESSION['pass'] = $r['password'];

        echo "USER BERHASIL LOGIN <br><br>";
        echo "id_users = ", $_SESSION['id_user'],"<br>";
        echo "password = ", $_SESSION['pass'],"<br><br>";
        echo "<a href=logout.php><b>LOGOUT</b></a></center>";
    }else{
        echo"<center>Login gagal! username & password tidak benar<br>";
        echo"<a href=form_login.php><b>ULANGI LAGI</b></a></center>";
    }
    mysqli_close($con);
    }else{
        echo "<center>Login gagal! Captcha tidak sesuai<br>";
        echo "<a href=form_login.php><b>ULANGI LAGI</b></a></center>";
    }  
?>