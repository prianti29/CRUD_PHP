
<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/

session_start();

$_name = $_POST['name'];
$_email = $_POST['email'];
$_password = $_POST['password'];

$_created_at = date('Y-m-d h:i:m', time());

//echo $_title;

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO `admin` (`name`,`email`,`password`,`created_at`) 
          VALUES (:name, :email, :password, :created_at);";

$stmt = $conn->prepare($query);

$stmt->bindParam(':name', $_name);
$stmt->bindParam(':email', $_email);
$stmt->bindParam(':password', $_password);
$stmt->bindParam(':created_at', $_created_at);


/*
$result = $stmt->execute(array(
    ':name' => $_name,
    ':email' => $_email,
    ':password' => $_password,
     ':created_at', $_created_at

)); */

$result = $stmt->execute();

//var_dump($result);


if ($result){
    $_SESSION['message'] = "Admin is added successfully";
}else{
    $_SESSION['message'] = "Admin is not added";
}

// this is for the location set to store.php to main home page index.php
header("location:index.php");
?>
