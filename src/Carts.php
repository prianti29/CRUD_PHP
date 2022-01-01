<?php

namespace bitm;
use PDO;

class Carts{
    //for index
    public function index(){
        session_start();

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);


$query = "SELECT * FROM `cart`";

$stmt = $conn->prepare($query);

$result = $stmt->execute();

$carts = $stmt->fetchAll();
return $carts;

    }
    //for show
    public function show(){
    

$_id = $_GET['id'];

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM `cart` WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $_id);
$result = $stmt->execute();
$cart = $stmt->fetch();
return $cart;
    }
    public function delete()
    {
session_start();
$_id = $_GET['id'];

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "DELETE FROM `cart` WHERE `cart`.`id` = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $_id);
$result = $stmt->execute();

//var_dump($result);
if ($result){
    $_SESSION['message'] = "Cart is deleted successfully";
}else{
    $_SESSION['message'] = "Cart is not deleted";
}
header("location:index.php");
    }
}