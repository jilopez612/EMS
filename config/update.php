<?php

require_once('db.php');

$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$position = $_POST['position'];
$email = $_POST['email'];
$salary = $_POST['salary'];
$bday = $_POST['bday'];
$gender = $_POST['gender'];
$status = $_POST['status'];
$number = $_POST['number'];
$endcontract = $_POST['endcontract'];

$update_stmt = $con->prepare("UPDATE ems_data SET name = ?, age = ?, position = ?, email = ?, salary = ?, bday = ?, gender = ?, status = ?, number = ?, endcontract = ? WHERE id = ?");
$update_stmt->bind_param("ssssdssssss", $name, $age, $position, $email, $salary, $bday, $gender, $status, $number, $endcontract, $id);
$update_stmt->execute();
$update_stmt->close();


?>