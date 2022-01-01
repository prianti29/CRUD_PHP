<?php



//connect with root
$approot = $_SERVER['DOCUMENT_ROOT']."/CRUD/";

include_once($approot. "vendor/autoload.php"); //connect with vendor
use bitm\Banner;

$_banner = new Banner();

$banners= $_banner->delete();




















?>