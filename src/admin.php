<?php

namespace bitm;

use PDO;

class Admin{
    //Index function
    public function index()
    {
        session_start();

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        
        
        $query = "SELECT * FROM `admin`";
        
        $stmt = $conn->prepare($query);
        
        $result = $stmt->execute();
    
        $admins = $stmt->fetchAll();
        return $admins;
        
        /*echo "<pre>";
        print_r($products);
        echo "</pre>";*/

    }
    //show function
    public function show()
    {
            $_id = $_GET['id'];

            //Connect to database
            $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
                'root', '');
            //set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);

            $query = "SELECT * FROM `admin` WHERE id = :id";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $_id);

            $result = $stmt->execute();

            $admin = $stmt->fetch();
            return $admin;
    }

    // Delete function
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

        $query = "DELETE FROM `admin` WHERE `admin`.`id` = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();
        if ($result){
            $_SESSION['message'] = "Admin is deleted successfully";
        }else{
            $_SESSION['message'] = "Admin is not deleted";
        }
        header("location:index.php");
    }


    public function Edit()
    {     
        $_id = $_GET['id'];
        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM `admin` WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $result = $stmt->execute();
        $admin = $stmt->fetch();
        return $admin;
    }
}

?>