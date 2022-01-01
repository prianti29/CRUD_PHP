<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/

session_start();

$_name = $_POST['name'];
$_link = $_POST['link'];
$_is_draft= $_POST['is_draft'];

$_created_at = date('Y-m-d h:i:s',time());



if(array_key_exists('is_draft',$_POST)){
    $_is_draft = $_POST ['is_draft'];
}
else{
    $_is_draft = 0;
}



$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO `category` (`name`,`link`,`created_at`,`is_draft`) 
          VALUES (:name, :link, :created_at, :is_draft);";

$stmt = $conn->prepare($query);

$result = $stmt->execute(array(
    ':name' => $_name,
    ':link' => $_link,
    ':created_at' => $_created_at,
    ':is_draft', $_is_draft
));



if ($result){
    $_SESSION['message'] = "Category is added successfully";
}else{
    $_SESSION['message'] = "Category is not added";
}

header("location:index.php");
?>