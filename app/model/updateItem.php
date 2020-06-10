<?php

include_once __DIR__ . '/../app.php';





if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];

    //$item = db_selectOne("SELECT * FROM `store` WHERE `store`.`id` = ? ", [$id]);

    //dd($_POST);

    if(!empty($_POST["name"])){
        $name = test_input($_POST["name"]);
        db_execute("UPDATE `store` SET `name` = ? WHERE `store`.`id` = ?;",[$name, $id]);
    }


    if(!empty($_POST["type"])){
        $type = test_input($_POST["type"]);
        db_execute("UPDATE `store` SET `type` = ? WHERE `store`.`id` = ?;",[$type, $id]);
    }

    if(!empty($_POST["price"])){
        $price = test_input($_POST["price"]);
        db_execute("UPDATE `store` SET `price` = ? WHERE `store`.`id` = ?;",[$price, $id]);
    }

    if(!empty($_POST["unit"])){
        $unit = test_input($_POST["unit"]);
        db_execute("UPDATE `store` SET `unit` = ? WHERE `store`.`id` = ?;",[$unit, $id]);
    }

    if(!empty($_POST["description"])){
        $description = test_input($_POST["description"]);
        db_execute("UPDATE `store` SET `description` = ? WHERE `store`.`id` = ?;",[$description, $id]);
    }

    flash("Položka byla úspěšně změněna.", 'success');

}

return redirect('admin&subpage=store');