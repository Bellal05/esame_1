<?php

require 'db_conn.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM utenti WHERE email = ?");
    $stmt ->bind_param("s" , $mail);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($password== $user["password"] && $mail == $user['email']) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['password'] = $user['password'];
        echo "Login riuscito!";
        header("Location: area-riservata.php");
        exit;
    } else {
        header("Location: login.php");
        $_SESSION['login_status'] = 'Email o password errati!';
        exit();
    }
}
?>