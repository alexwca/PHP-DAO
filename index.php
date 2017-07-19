<?php
require_once "config.php";

$dao = new DAO();

$usuarios = $dao -> select("SELECT * FROM `users`");

echo json_encode($usuarios);