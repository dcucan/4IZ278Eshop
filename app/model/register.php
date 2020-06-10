<?php

include_once __DIR__ . '/../app.php';

//Register User


$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = test_input($_POST['nameReg']);
    $surname = test_input($_POST['surnameReg']);
    $email = test_input($_POST['emailReg']);
    $password = test_input($_POST['passwordReg']);
    $passwordAgain = test_input($_POST['passwordRegAg']);


    if (!empty(db_selectOne("SELECT email FROM user WHERE email=?", [$email]))) {
        $errors['email'] = "Tento email již existuje";
    }

    if ($password != $passwordAgain) {
        $errors['password'] = "Zadaná hesla se neshodují.";
    }

    if (!@preg_match('.{6,}', $password)) {
        //$errors['passwordreg'] = "Heslo musí mít alespoň 6 znaků, jedno písmeno a jednu číslici.";
    }


    if (empty($errors)) {

        $hash = password_hash($password, PASSWORD_BCRYPT);

        insertInto("INSERT INTO user(`name`, `surname`, `email`, `password`) VALUES (?, ?, ?, ?)", [
            $name, $surname, $email, $hash,
        ]);

        flash('Uspěšně registrován!');
    } else {
        flash("Zadali jste nesprávné údaje. Buď se neshodují hesla, nebo váš email již existuje.", 'danger');
    }
}

return redirect('signin');
