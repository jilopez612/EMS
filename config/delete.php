<?php

require_once('db.php');

$id = $_POST['id'];

$delete_stmt = $con->prepare("DELETE FROM ems_data WHERE id = ?");
$delete_stmt->bind_param("s", $id);
$delete_stmt->execute();
$delete_stmt->close();

?>