<?php
session_start();

// CREDENZIALI STATICHE
$credenziali = [
    'email' => 'davinci@mail.it',
    'password' => '123456',
    'nome' => 'Amministratore'
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($mail === $credenziali['email'] && $password === $credenziali['password']) {
        $_SESSION['id'] = 1; 
        $_SESSION['nome'] = $credenziali['nome'];
        $_SESSION['email'] = $credenziali['email'];

        header("Location: area-riservata.php");
        exit;
    } else {
        $_SESSION['login_status'] = 'Email o password errati!';
        header("Location: login.php");
        exit;
    }
}
?>
