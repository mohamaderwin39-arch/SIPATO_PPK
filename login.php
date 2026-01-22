<?php
session_start();
include "config/database.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']); // gunakan HANYA jika DB pakai md5

    $query = mysqli_query($conn,
        "SELECT * FROM admin 
         WHERE username='$username' 
         AND password='$password'"
    );

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['login'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<script>alert('LOGIN GAGAL'); window.location='index.html';</script>";
    }

} else {
    echo "Form tidak terkirim";
}
?>
