<?php

var_dump("call");

session_start();
var_dump("pred" . $_SESSION['user']);
session_destroy();

var_dump($_SESSION['user']);

header('Location: https://petshobby.cz/4IZ278/public/?page=account#');
