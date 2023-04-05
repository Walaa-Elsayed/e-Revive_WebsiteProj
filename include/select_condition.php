<?php

$sql = "SELECT * FROM conditiontype"; // SQL with parameters
$stmt = $conn->prepare($sql); 

$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result


// fetch data   
while($row = $result->fetch_assoc()){

echo '<option value="'.$row["condition_id"].'"> '. $row["condition_name"].' </option>';

// echo $row["category_name"];
}



?>
