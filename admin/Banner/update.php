<?php
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
use bitm\Banner;
$data = $_POST;
//function for empty value
function is_empty($value)
{
   if($value == '')
   {
       return true;
   }
   else
   {
       return false;
   }
}
if(is_empty($data['title']))
{
    session_start();
    $_SESSION['message'] = "Title can't be empty.Please enter title";
    header('location:edit.php?id='.$data['id']);
}
else{
    $_banner = new Banner();
    $banner = $_banner->update($data);
}
?>

