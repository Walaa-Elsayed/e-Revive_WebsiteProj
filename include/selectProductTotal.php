<?php

include 'conn.php';

if (session_status() !== PHP_SESSION_ACTIVE) {

    session_start();
}

if (isset($_SESSION['user_name'])) {



    $user_name = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];

    $sql_get_total = "SELECT count(*) AS total_product FROM product  WHERE user_id =  $user_id "; // SQL with parameters
    $stmt = $conn->prepare($sql_get_total);

    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $total = $row['total_product'];
    }



    echo $total . ' Products';
} else {
    header("Location:../not-allawed-page.php"); /* Redirect browser */

    exit;
}
