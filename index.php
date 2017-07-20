<?php
require_once "config.php";

$users = new Users();

//$users->show(1);
$users = Users::all();

echo json_encode($users);