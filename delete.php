<?php
require_once './connection.php';

$id = $_REQUEST["id"];
$sql = "DELETE FROM users where id = :id";
$query = $conn->prepare($sql);
$query->bindParam(":id", $id, PDO::PARAM_STR);
$query->execute();
header("Location: admin.php");

?>