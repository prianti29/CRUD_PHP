<?php

//connect with root
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");

use bitm\admin;

$_admin = new Admin();
$admins= $_admin->delete();

?>