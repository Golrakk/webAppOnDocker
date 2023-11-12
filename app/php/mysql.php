<?php

    $servername = "db";
$username = "user";
$password = "password";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/*

    // Insertion des données dans la table allied_land
    $allied_table = "allied_land";

    for ($i=0; $i < count($array[$allied_table]); $i++) { 
        $data_request = "INSERT IGNORE INTO ".$allied_table." (productiD, productImage, productName, productPrice, productStock) VALUES (".($i+1).", '".$array[$allied_table][$i]["image"]."', '".$array[$allied_table][$i]["name"]."', ".$array[$allied_table][$i]["price"].", ".$array[$allied_table][$i]["stock"].")";
        $data_error = mysqli_query($conn, $data_request) or die ("MySQL request error : ".$data_request);
    }

    // Insertion des données dans la table enemy_land
    $enemy_table = "enemy_land";

    for ($i=0; $i < count($array[$enemy_table]); $i++) { 
        $data_request = "INSERT IGNORE INTO ".$enemy_table." (productiD, productImage, productName, productPrice, productStock) VALUES (".($i+1).", '".$array[$enemy_table][$i]["image"]."', '".$array[$enemy_table][$i]["name"]."', ".$array[$enemy_table][$i]["price"].", ".$array[$enemy_table][$i]["stock"].")";
        $data_error = mysqli_query($conn, $data_request) or die ("MySQL request error : ".$data_request);
    }

    // Insertion des données dans la table moxes
    $moxes_table = "moxes";

    for ($i=0; $i < count($array[$moxes_table]); $i++) { 
        $data_request = "INSERT IGNORE INTO ".$moxes_table." (productiD, productImage, productName, productPrice, productStock) VALUES (".($i+1).", '".$array[$moxes_table][$i]["image"]."', '".$array[$moxes_table][$i]["name"]."', ".$array[$moxes_table][$i]["price"].", ".$array[$moxes_table][$i]["stock"].")";
        $data_error = mysqli_query($conn, $data_request) or die ("MySQL request error : ".$data_request);
    }

    // Insertion des données dans la table power_nines
    $power_nines_table = "power_nines";

    for ($i=0; $i < count($array[$power_nines_table]); $i++) { 
        $data_request = "INSERT IGNORE INTO ".$power_nines_table." (productiD, productImage, productName, productPrice, productStock) VALUES (".($i+1).", '".$array[$power_nines_table][$i]["image"]."', '".$array[$power_nines_table][$i]["name"]."', ".$array[$power_nines_table][$i]["price"].", ".$array[$power_nines_table][$i]["stock"].")";
        $data_error = mysqli_query($conn, $data_request) or die ("MySQL request error : ".$data_request);
    }
    
    mysqli_close($conn);
    */
?>