
<?php

$approot = $_SERVER['DOCUMENT_ROOT']."/CRUD/";

include_once($approot. "vendor/autoload.php"); //connect with vendor
use bitm\Banner;

use bitm\admin;
$_admin = new Admin();

$admins= $_admin->delete();



?>
