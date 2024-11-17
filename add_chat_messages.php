<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    $username = $_SESSION["name"];
    $message = $_POST['message'];
    $image_id = $_POST['image_id'];
    $image_name = $_POST['image_name'];
    $created_at =  $date = date('Y-m-d');;

    $sql = "insert into chat_messages(username, message, image_id, image_name, created_at) values(?,?,?,?,?)";
    $statment = $connection->prepare($sql);

    $statment->bind_param("sssss",$username, $message, $image_id, $image_name, $created_at);

    $statment->execute();

    // Redirect back to the previous page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();

} else {
    
}
