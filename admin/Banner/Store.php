<?php
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
use bitm\Banner;
$_banner = new Banner();
$banner = $_banner->Store();
?>