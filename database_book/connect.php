<?php
$servername = "db5011042605.hosting-data.io";
$username = "dbu5510833";
$password = "Ss09120127028";
$dbname = "dbs9333543";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//    $sth = $conn->prepare("SELECT rate FROM $tableName");
//    $colcount = $sth->columnCount();

/*echo "Connected successfully";*/
 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}