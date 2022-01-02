<?php

//connect with root
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");

use bitm\Banner;

$_banner = new Banner();
$banners= $_banner->delete();

?>