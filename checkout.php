<?php
include 'config.php';


if (isset($_POST['cardname'])) {
    $name = $_POST['cardname'];
    $type = $_POST['o_type'];
    $date = $_POST['date'];
    $o_code = $_POST['o_code'];
    $price = $_POST['price'];

    $sql = "INSERT INTO `order`(`o_code`, `o_name`, `o_type`, `o_date`, `o_amount`) VALUES ('".$o_code."','".$name."','".$type."','".$date."','".$price."')";
    if (mysqli_query($conn, $sql)) {
        echo "Records inserted successfully.";
        header("Location: ./payment.php?status=success");
        die();
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
