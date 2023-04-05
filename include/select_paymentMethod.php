<?php

$sql = "SELECT * FROM paymentype"; // SQL with parameters
$stmt = $conn->prepare($sql); 

$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result


// fetch data   
while($row = $result->fetch_assoc()){

echo '<option value="'.$row["payment_id"].'"> '. $row["payment_name"].' </option>';


}



?>
