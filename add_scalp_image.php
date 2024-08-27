<?php
session_start();
if (isset($_SESSION["name"])) {
    include 'config.php';

    // Directory where you want to save the uploaded images
    $target_dir = "uploads/";

    // Get today's date
    $date = date('Y-m-d');

    // Initialize an array to store the image names
    $imageNames = [];

    // Array of image fields
    $imageFields = ['image1', 'image2', 'image3', 'image4'];

    foreach ($imageFields as $index => $imageField) {
        // Check if the file was uploaded
        if (isset($_FILES[$imageField]) && $_FILES[$imageField]['error'] == 0) {
            // Create a new file name with the current date and the format 'data-image-1', 'data-image-2', etc.
            $newFileName = 'image-' . ($index + 1) . '.' . strtolower(pathinfo($_FILES[$imageField]["name"], PATHINFO_EXTENSION));

            // Set the full path for the file
            $target_file = $target_dir . $newFileName;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES[$imageField]["tmp_name"], $target_file)) {
                $imageNames[$index] = $newFileName;
            } else {
                $imageNames[$index] = null; // In case of an error, store null
            }
        } else {
            $imageNames[$index] = null; // If no file was uploaded, store null
        }
    }

    // Prepare the SQL query
    $sql = "INSERT INTO scalp_image(date, image_1, image_2, image_3, image_4) VALUES(?, ?, ?, ?, ?)";
    $statment = $connection->prepare($sql);

    // Bind parameters to the SQL query
    $statment->bind_param("sssss", $date, $imageNames[0], $imageNames[1], $imageNames[2], $imageNames[3]);

    // Execute the query
    $statment->execute();

    // Redirect to another page after successful operation
    header("Location: ./Aluminum.php");
}
