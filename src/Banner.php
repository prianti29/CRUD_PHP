<?php
namespace bitm;
use PDO;
class Banner
{
    public function Index(){
        session_start();

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);


$query = "SELECT * FROM `banner`";

$stmt = $conn->prepare($query);

$result = $stmt->execute();

$banners = $stmt->fetchAll();
return $banners;

    }
    public function show(){
        $webroot = 'http://localhost/CRUD/';

$_id = $_GET['id'];

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM `banner` WHERE id = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':id', $_id);

$result = $stmt->execute();

$banner = $stmt->fetch();
return $banner;
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

$query = "DELETE FROM `banner` WHERE `banner`.`id` = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':id', $_id);

$result = $stmt->execute();

//var_dump($result);

if ($result){
    $_SESSION['message'] = "Banner is deleted successfully";
}else{
    $_SESSION['message'] = "Banner is not deleted";
}
header("location:index.php");
    }
}

?>