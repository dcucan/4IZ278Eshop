<?php

include_once __DIR__ . '/../app.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = db_selectOne("SELECT * FROM user WHERE email = ?", [
        $_POST['email'],
    ]);

    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user;
        flash('Úspěšně prihlášen');
        redirect("account");
    } else {
        alert("Zadali jste nesprávné přihlašovací údaje.");
    }
}
