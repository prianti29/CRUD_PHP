
<?php


$webroot = 'http://localhost/CRUD/';
//connect with root
$approot = $_SERVER['DOCUMENT_ROOT']."/CRUD/";

include_once($approot. "vendor/autoload.php"); //connect with vendor
// use bitm\Banner;
use bitm\Carts;

$_cart = new Carts();

$carts= $_cart->delete();


?>
