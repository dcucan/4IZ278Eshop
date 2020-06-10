<?php

$host = 'localhost';
$user = 'root';
$password = 'kolotoc.Zuzka';
$dbname = 'eshop';

//set DSN
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

//create a pdo instance
$pdo = new PDO($dsn, $user, $password);

$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function db_selectAll($sql, $params = [])
{
    global $pdo;

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function db_selectOne($sql, $params = [])
{
    global $pdo;

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetch();
}

function db_execute($sql, $params = [])
{
    global $pdo;

    $stmt = $pdo->prepare($sql);
    return $stmt->execute($params);
}


function db_getPages($limit, $query)
{
    global $pdo;

    $stmt = $pdo->query($query);
    $total_results = $stmt->fetchColumn();
    $total_pages = ceil($total_results / $limit);
    return $total_pages;
}

function insertInto($sql, $params = [])
{
    global $pdo;
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $pdo->lastInsertId();
}
