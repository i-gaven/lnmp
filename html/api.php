<?php
$data = ["name" => "gaven", "age" => 19, "sex" => "M"];
header('Content-Type: application/json');
echo json_encode($data);
?>
