<?php
include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
use bitm\Banner;

$data = $_POST;

//validation of user data

//validation title
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
    header('location:create.php');
}
else
{
    $_banner = new Banner();
    $banner = $_banner->Store($data);
}
?>