<?php

require_once('db.php');

$name = $_POST['name'];
$age = $_POST['age'];
$position = $_POST['position'];
$email = $_POST['emial'];
$salary = $_POST['salary'];
$bday = $_POST['bday'];
$gender = $_POST['gender'];
$status = $_POST['status'];
$number = $_POST['number'];
$endcontract = $_POST['endcontract'];

$add_stmt = $con->prepare("INSERT INTO ems_data (name, age, position, email, salary, bday, gender, status, number, endcontract) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$add_stmt->bind_param("ssssssdssss", $name, $age, $position, $email, $salary, $bday, $gender, $status, $number, $endcontract);
$add_stmt->execute();
$add_stmt->close();


?>