<?php


$sql = "SELECT * FROM category"; // SQL with parameters
$stmt = $conn->prepare($sql); 

$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result


// fetch data   
while($row = $result->fetch_assoc()){

echo '<option value="'.$row["category_id"].'"> '. $row["category_name"].' </option>';

// echo $row["category_name"];
}



?>
