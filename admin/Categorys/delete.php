
<?php

session_start();

$_id = $_GET['id'];

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);

$query = "DELETE FROM `category` WHERE `category`.`id` = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':id', $_id);

$result = $stmt->execute();

//var_dump($result);

if ($result){
    $_SESSION['message'] = "Category is deleted successfully";
}else{
    $_SESSION['message'] = "Category is not deleted";
}


header("location:index.php");

?>
