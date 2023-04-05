<?php


$sql = "SELECT * FROM brandtype"; // SQL with parameters
$stmt = $conn->prepare($sql); 

$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result


// fetch data   
while($row = $result->fetch_assoc()){

echo '<option value="'.$row["brand_id"].'"> '. $row["brand_name"].' </option>';

}



?>
