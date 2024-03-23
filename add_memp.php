<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    $add_name = $_SESSION["name"];
    $date = $_POST['date'];
    $unit = $_POST['unit'];
    $reject = $_POST['reject'];
    $tariff= 3702;
    $revenue = $tariff * $unit;

    $sql = "insert into memp(user,date, unit,reject,tariff,Revenue) values(?,?,?,?,?,?)";
    $statment = $connection->prepare($sql);

    $statment->bind_param("ssssss",$add_name, $date, $unit,$reject,$tariff, $revenue);

    $statment->execute();

    header("Location:./memp.php");
} else {
}
?>
?>