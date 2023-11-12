<?php

$servername = "db";
$username = "user";
$password = "password";
$dbname = "db";

$cnx = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql= "SELECT * FROM users";
                    $result = $cnx->query($sql);

    if (isset($_POST["login"]) && isset($_POST["pwd"])) {
        while ($array = $result->fetch_assoc()) {
            if (($_POST["login"] == $array["login"]) && ($_POST["pwd"] == $array["password"])) {
                session_start();
                $_SESSION["ID"] = $_POST["login"];
                $_SESSION["rank"] = $array["access"];
                header("location: ../index.php");
                exit;
            } else if (($_POST["login"] == $array["login"]) && ($_POST["pwd"] != $array["password"])){
                header("location: ../index.php?page=Sign+In&error=0");
                exit;
            }
        }
        header("location: ../index.php?page=Sign+In&error=-1");
        exit();
    } else {
        header("location: ../index.php?page=Sign+In&error=-1");
        exit();
    }
?>