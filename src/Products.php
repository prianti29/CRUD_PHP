<?php

namespace bitm;
use PDO;


class Products
{
    public function index(){
        session_start();

        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        
        $query = "SELECT * FROM `product` WHERE is_deleted = 0";
        $stmt = $conn->prepare($query);
        $result = $stmt->execute();
        $products = $stmt->fetchAll();
        return $products;
    }
    public function show()
    {
       
$_id = $_GET['id'];

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM `product` WHERE id = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':id', $_id);

$result = $stmt->execute();

$product = $stmt->fetch();
return $product;



    }

}
?>



