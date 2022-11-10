<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Invoicey";
$debug = 0;

function get_connection(){
    global $servername, $username, $password, $dbname;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch(PDOException $_e) {
        echo "Connection failed: ".$_e->getMessage();
    }

    return $conn;
}

function select($conn, $table, $order="id "){
    $sql = "SELECT * FROM {$table} ORDER BY {$order}";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll();
}

function select_cond($conn, $table, $after_where){
    $sql = "SELECT * FROM {$table} WHERE {$after_where}";
    echoIt($sql);
    
    $stmt = $conn->query($sql);
    return $stmt->fetchAll();
}

function insert($conn, $table, $columns, $values){
    $sql = "INSERT INTO {$table}({$columns}) VALUES ({$values});";
    echoIt($sql);
    $conn->prepare($sql)->execute();
}

function echoIt($str){
    global $debug;
    if($debug){
        echo "\n".$str;
    }
}

?>