<?php

include_once __DIR__ . '/../app.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = test_input($_POST["name"]);
    $type = test_input($_POST["type"]);
    $price = test_input($_POST["price"]);
    $unit = test_input($_POST["unit"]);
    $description = test_input($_POST["description"]);

    if (!empty(db_selectOne("SELECT `name` FROM `store` WHERE `name`=?", [$name]))) {
        $errors['name'] = "Tato položka již existuje.";
    }

    if (empty($errors)) {

        insertInto("INSERT INTO store(`name`, `unit`, `price`, `description`,`type`) VALUES (?, ?, ?, ?, ?)", [
            $name, $unit, $price, $description, $type
        ]);

        flash('Položka byla úspěšně přidána!');
    } else {
        flash("Tato položka již existuje.", 'danger');
    }
}

return redirect('admin&subpage=store');
