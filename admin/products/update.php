<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/

session_start();
$approot = $_SERVER['DOCUMENT_ROOT'].'/CRUD/';

if($_FILES['picture']['name'] != ''){
    // Working with image
    $target = $_FILES['picture']['tmp_name'];
    $destination = $approot.'uploads/' .$_FILES['picture']['name'];

    $isFileMoved = move_uploaded_file($target, $destination);
    if ($isFileMoved){
        $_picture = $_FILES['picture']['name'];
    }
    else{
        $_picture = null;
    }
}else{
    $_picture = $_POST['old_picture'];
}

$_id = $_POST['id'];
$_title = $_POST['title'];


if (array_key_exists('is_active', $_POST)) {
    $_is_active = $_POST['is_active'];
} else {
    $_is_active = 0;
}

if (array_key_exists('is_deleted', $_POST)) {
    $_is_deleted = $_POST['is_deleted'];
} else {
    $_is_deleted = 0;
}
$_modified_at = date('Y-m-d h:i:s',time());

$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');

$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "UPDATE `product` 
          SET `title` = :title, 
          `picture` = :picture,
          `is_active` = :is_active,
          `is_deleted` = :is_deleted,
          `modified_at` = :modified_at 
          WHERE `product`.`id` = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':title', $_title);
$stmt->bindParam(':picture', $_picture);
$stmt->bindParam(':is_active', $_is_active);
$stmt->bindParam(':is_deleted', $_is_deleted);
$stmt->bindParam(':modified_at', $_modified_at);
$stmt->bindParam(':id', $_id);

$result = $stmt->execute();

if ($result){
    $_SESSION['message'] = "Product is updated successfully";
}else{
    $_SESSION['message'] = "Product is not updated";
}

header("location:index.php");

?>

